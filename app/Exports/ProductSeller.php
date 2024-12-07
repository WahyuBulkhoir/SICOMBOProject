<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, WithEvents, WithMapping};
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Carbon\Carbon;

class ProductSeller implements FromCollection, WithHeadings, WithEvents, WithMapping
{
    protected $sellerId;

    public function __construct($sellerId)
    {
        $this->sellerId = $sellerId;
    }

    public function collection()
    {
        return Product::where('seller_id', $this->sellerId)
            ->select('seller_id', 'title', 'category', 'quantity', 'price')
            ->get();
    }

    public function map($product): array
    {
        return [
            $product->seller_id,
            $product->title,
            $product->category,
            $product->quantity,
            $product->price,
        ];
    }

    public function headings(): array
    {
        return [
            ['Laporan Produk dengan Seller ID: ' . $this->sellerId],
            ['Tanggal: ' . Carbon::now()->format('d F Y')],
            [],
            [
                'Seller ID',
                'Title',
                'Category',
                'Quantity',
                'Price',
            ]
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $sheet->mergeCells('A1:E1');
                $sheet->mergeCells('A2:E2');
                $sheet->getStyle('A1:E2')->getFont()->setBold(true);
                $sheet->getStyle('A1:E2')->getAlignment()->setHorizontal('center');
                $sheet->getStyle('A4:E4')->getFont()->setBold(true);
                $products = Product::where('seller_id', $this->sellerId)->get();
                $totalPrice = $products->sum('price');
                $lastRow = $sheet->getHighestRow() + 1;
                $sheet->setCellValue('D' . $lastRow, 'Total Price');
                $sheet->setCellValue('E' . $lastRow, $totalPrice);
                $sheet->getStyle('D' . $lastRow . ':E' . ($lastRow + 1))->getFont()->setBold(true);
                $sheet->getStyle("A$lastRow:E$lastRow")->applyFromArray([
                    'borders' => [
                        'bottom' => [
                            'borderStyle' => Border::BORDER_THICK,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);

                $this->applyStyles($sheet, $lastRow + 1);
            },
        ];
    }

    private function applyStyles($sheet, $lastRow)
    {
        $sheet->getStyle("A4:E$lastRow")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        foreach (range('A', 'E') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        foreach ($sheet->getRowDimensions() as $dimension) {
            $dimension->setRowHeight(-1);
        }
    }
}

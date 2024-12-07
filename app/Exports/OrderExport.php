<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, WithEvents, WithMapping};
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Carbon\Carbon;

class OrderExport implements FromCollection, WithHeadings, WithEvents, WithMapping
{
    protected $sellerId;

    public function __construct()
    {
        $this->sellerId = Auth::id();
    }

    public function collection()
    {
        return Order::whereHas('product', fn($query) => $query->where('seller_id', $this->sellerId))
                    ->with('product')
                    ->get();
    }

    public function map($order): array
    {
        return [
            $order->name,
            $order->rec_address,
            $order->phone,
            $order->product->title,
            $order->product->price,
            $order->payment_status,
            $order->status,
        ];
    }

    public function headings(): array
    {
        return [
            ['Laporan Pesanan dengan Seller ID: ' . $this->sellerId],
            ['Tanggal: ' . Carbon::now()->format('d F Y')],
            [],
            [
                'Customer Name',
                'Address',
                'Phone',
                'Product Title',
                'Price',
                'Payment Status',
                'Status',
            ]
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $sheet->mergeCells('A1:G1');
                $sheet->mergeCells('A2:G2');
                $sheet->getStyle('A1:G2')->getFont()->setBold(true);
                $sheet->getStyle('A1:G2')->getAlignment()->setHorizontal('center');
                $sheet->getStyle('A4:G4')->getFont()->setBold(true);
                $totalPrice = Order::whereHas('product', fn($query) => $query->where('seller_id', $this->sellerId))
                                   ->get()
                                   ->sum(fn($order) => $order->product->price);
                $lastRow = $sheet->getHighestRow() + 1;
                $sheet->setCellValue('D' . $lastRow, 'Total Price');
                $sheet->setCellValue('E' . $lastRow, $totalPrice);
                $sheet->getStyle('D' . $lastRow . ':E' . $lastRow)->getFont()->setBold(true);
                $sheet->getStyle("A$lastRow:G$lastRow")->applyFromArray([
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
        $sheet->getStyle("A4:G$lastRow")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
        foreach (range('A', 'G') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }
        foreach ($sheet->getRowDimensions() as $dimension) {
            $dimension->setRowHeight(-1);
        }
    }
}

<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, WithEvents, WithMapping};
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

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
            'Customer Name',
            'Address',
            'Phone',
            'Product Title',
            'Price',
            'Payment Status',
            'Status',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $sheet->getStyle('A1:G1')->getFont()->setBold(true);

                $totalPrice = Order::whereHas('product', fn($query) => $query->where('seller_id', $this->sellerId))
                                //    ->where('payment_status', 'paid')
                                //    ->with('product')
                                   ->get()
                                   ->sum(fn($order) => $order->product->price);

                $lastRow = $sheet->getHighestRow() + 1;
                $sheet->setCellValue('D' . $lastRow, 'Total Price');
                $sheet->setCellValue('E' . $lastRow, $totalPrice);
                $sheet->getStyle('D' . $lastRow . ':E' . $lastRow)->getFont()->setBold(true);

                $this->applyStyles($sheet, $lastRow);
            },
        ];
    }

    private function applyStyles($sheet, $lastRow)
    {
        $sheet->getStyle("A1:G$lastRow")->applyFromArray([
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
<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithEvents
{
    /**
     * Mengambil data untuk export.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('id', 'name', 'email', 'role', 'created_at')->get();
    }

    /**
     * Header untuk file Excel.
     */
    public function headings(): array
    {
        return [
            'No',
            'Name',
            'Email',
            'Role',
            'Created At',
        ];
    }

    /**
     * Mapping data setiap row.
     */
    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->role,
            \Carbon\Carbon::parse($user->created_at)->format('Y-m-d H:i:s'),
        ];
    }

    /**
     * Styling untuk worksheet.
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk header
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => '#000000'],
                    'size' => 12,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'B9FBC0'],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
            // Style untuk seluruh cell
            'A1:E' . ($sheet->getHighestRow()) => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ],
            // Style untuk kolom dengan format khusus
            'A2:A' . ($sheet->getHighestRow()) => [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }

    /**
     * Event untuk memodifikasi sheet setelah dibuat.
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Atur tinggi baris untuk header
                $event->sheet->getRowDimension(1)->setRowHeight(25);

                // Bungkus teks di kolom tertentu
                $event->sheet->getStyle('D2:D' . $event->sheet->getHighestRow())
                    ->getAlignment()
                    ->setWrapText(true);

                // Atur lebar kolom tertentu
                $event->sheet->getColumnDimension('D')->setWidth(30);

                // Membekukan baris pertama
                $event->sheet->freezePane('A2');
            },
        ];
    }
}

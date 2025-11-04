<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductsExport implements FromCollection, WithHeadings, WithStyles, WithCustomStartCell, ShouldAutoSize
{
    public function collection()
    {
        return Product::select('id', 'product_name', 'unit', 'type', 'qty', 'producer')->get();
    }

    public function headings(): array
    {
        return [
            ['PT. Melati Jaya Abadi'],
            ['Laporan Data Produk'],
            ['Periode Desember 2025'],
            [],
            ['ID', 'Nama Produk', 'Satuan', 'Tipe', 'Kuantitas', 'Produsen'] // Header kolom
        ];
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function styles(Worksheet $sheet)
    {
        // Gabungkan sel untuk judul
        $sheet->mergeCells('A1:F1');
        $sheet->mergeCells('A2:F2');
        $sheet->mergeCells('A3:F3');

        // Format teks judul
        $sheet->getStyle('A1:A3')->applyFromArray([
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
        ]);

        // Warna header tabel
        $sheet->getStyle('A5:F5')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => 'solid',
                'color' => ['rgb' => 'BDD7EE'],
            ],
            'alignment' => [
                'horizontal' => 'center',
            ],
            'borders' => [
                'allBorders' => ['borderStyle' => 'thin'],
            ],
        ]);
    }
}

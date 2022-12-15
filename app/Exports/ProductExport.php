<?php

namespace App\Exports;

use App\Models\Product;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Category Id',
            'Name',
            'Price',
            'Description',
            'Offer',
            'Image',
            'Created At',
            'Updated At',
        ];
    }

    // public function map($product): array
    // {
    //     return [
    //         $product->created_at,
    //         Date::dateTimeToExcel($product->created_at),
    //         Date::dateTimeToExcel($product->updated_at),
    //     ];
    // }

    // // Set Date Format
    // public function columnFormats(): array
    // {
    //     return [
    //         'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    //         'I' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    //     ];
    // }

    // public function columnFormats(): array
    // {
    //     return [
    //         'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    //         'I' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
    //     ];
    // }
}

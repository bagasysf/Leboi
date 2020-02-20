<?php

namespace App\Exports;

use App\Transaction;
use App\TransactionDetail;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\FromCollection;


class TransactionsExport implements FromQuery, WithMapping, WithHeadings, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return $transaction = Transaction::where('status', 'payed');
    }

    /**
     * @return array
     * @var Invoice $invoice
     */
    public function map($transaction): array
    {
        return [
            $transaction->id,
            $transaction->user->name,
            $transaction->total,
            $transaction->status,
            Date::dateTimeToExcel($transaction->created_at),
        ];
    }

    public function headings(): array
    {
        return [
            'Id Transaction',
            'Barberman',
            'Total Price',
            'Status Transaction',
            'Created At',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}

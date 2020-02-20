<?php

namespace App\Exports;

use App\Transaction;
use App\TransactionDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransactionDetailsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $transaction = Transaction::where('status', 'payed')->get();
        $transactionDetail = TransactionDetail::where('transaction_id', $transaction->id)->get();
        return $transactionDetail->get();
    }
}

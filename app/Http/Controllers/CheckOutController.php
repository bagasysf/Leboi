<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index() {
        $transactions = Transaction::where('user_id', auth()->user()->id)->where('status', 'waiting')->first();
        return view('home.checkout', [
            'transactions' => $transactions,
            'details' => $transactions ? TransactionDetail::where('transaction_id', $transactions->id)->get() : [],
        ]);
    }
}

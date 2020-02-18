<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function index() {
        $transactions = Transaction::where('user_id', auth()->user()->id)->where('status', 'waiting')->first();
        return view('checkout.index', [
            'transactions' => $transactions,
            'details' => $transactions ? TransactionDetail::where('transaction_id', $transactions->id)->get() : [],
        ]);
    }

    public function edit($id) {
        $transactions = Transaction::where('user_id', auth()->user()->id)->where('status', 'waiting')->first();
        $transactionDetails = TransactionDetail::where('transaction_id', $transactions->id)->where('product_id', $id)->first();
        return view('checkout.index', [
            'transactionDetails' => $transactionDetails,
        ]);


    }

    public function payment($id)
    {
        // Update status to payment, then cashier take next process
        Transaction::where('id', $id)->update(['status' => 'payment']);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->where('status', 'waiting')->first();
        $transactionDetails = TransactionDetail::where('transaction_id', $transactions->id)->where('product_id', $id)->first();
        $transactionDetails->delete();
        $products = Product::find($id);
        $minTotal = $transactionDetails->quantity * $products->price;
        if($transactions){
            $transaction = $transactions;
            $transaction->total = $transactions->total - $minTotal;
            $transaction->save();
        }


        return redirect('/checkout');
    }
}

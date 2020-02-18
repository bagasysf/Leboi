<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $title = 'Order Page';
        $header = 'Orders';
        $checkout = Transaction::where('status', 'payment')->get();
//        dd($checkout);
        return view('orders.index', [
            'checkout' => $checkout,
//            'details' => $checkout ? TransactionDetail::where('transaction_id', $checkout->id)->get() : [],
            'title' => $title,
            'header' => $header,
        ]);
    }

    public function view($id) {
        $title = 'Order Page';
        $header = 'Orders';
        $checkout = Transaction::where('id', $id)->where('status', 'payment')->first();
//        dd($checkout);
        return view('orders.view', [
            'checkout' => $checkout,
            'details' => $checkout ? TransactionDetail::where('transaction_id', $id)->get() : [],
            'title' => $title,
            'header' => $header,
        ]);
    }

    public function payed($id)
    {
        // Update status to payment, then cashier take next process
        Transaction::where('id', $id)->update(['status' => 'payed']);
        return redirect('orders');
    }

}

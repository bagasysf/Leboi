<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\TransactionDetail;
use App\Kernel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        $title = 'Order Page';
        $header = 'Orders';
        $checkouts = Transaction::where('status','payment')->where('id_transaction','like','%'.$cari.'%')->paginate(8);
        return view('orders.index', [
            'checkouts' => $checkouts,
            'title' => $title,
            'header' => $header,
        ]);
    }

    public function view($id)
    {
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

    public function cancel($id)
    {
        // Update status to cancel, if something wrong with transactions
        Transaction::where('id', $id)->update(['status' => 'cancel']);
        return redirect('orders');
    }

}

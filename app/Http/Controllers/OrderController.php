<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Package;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        $title = 'Order Page';
        $header = 'Orders';
        $checkout = Transaction::where('status', 'payment')->where('total', 'like', "%" . $cari . "%")->paginate(8);
//        $packages = Package::where('name', 'like', "%" . $cari . "%")->paginate(8);
//        $checkouts = Transaction::query();
//        $columns = ['user_id', 'total', 'status', 'created_at', 'updated_at'];
//        foreach ($columns as $column) {
//            $checkout->orWhere($column, 'like', '%' . $cari . '%');
//        }
//        $checkouts = $checkout->paginate(8);
        return view('orders.index', [
            'checkout' => $checkout,
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

}

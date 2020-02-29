<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        $title = 'Order Page';
        $header = 'Orders';
        $checkout = Transaction::where('status', 'payed')->where('total', 'like', "%" . $cari . "%")->paginate(8);
//        $packages = Package::where('name', 'like', "%" . $cari . "%")->paginate(8);
//        $checkouts = Transaction::query();
//        $columns = ['user_id', 'total', 'status', 'created_at', 'updated_at'];
//        foreach ($columns as $column) {
//            $checkout->orWhere($column, 'like', '%' . $cari . '%');
//        }
//        $checkouts = $checkout->paginate(8);
        return view('sales.index', [
            'checkout' => $checkout,
            'title' => $title,
            'header' => $header,
        ]);
    }
}

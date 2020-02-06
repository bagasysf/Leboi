<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __invoke($id)
    {
        $products = Product::find($id);
        // TODO: Insert to table transactions
        // TODO : Assume that we dont have any data
        $transactions = Transaction::create([
            'total' => $products->price,
            'user_id' => auth()->user()->id,
            'status' => 'waiting',
        ]);

        dd($transactions);

        return redirect()->back();
    }
}

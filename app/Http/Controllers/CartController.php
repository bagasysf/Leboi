<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Int_;

class CartController extends Controller
{
    public function __invoke($id)
    {
        // TODO: Check if transaction is exist, and then insert to table transaction
        $checkTransactionExist = Transaction::where('user_id', auth()->user()->id)->where('status', 'waiting')->first();
        $products = Product::find($id);
        if ($checkTransactionExist) {
            $transactions = $checkTransactionExist;
            $transactions->total = $checkTransactionExist->total + $products->price;
            $transactions->save();
        } else {
            $transactions = Transaction::create([
                'id_transaction' => 'LETR'.\Str::random(5),
                'total' => $products->price,
                'user_id' => auth()->user()->id,
                'status' => 'waiting',
            ]);
        }

        // TODO : As usually we can simply use dd for checking data
        // dd($transactions);

        // TODO : Check if transaction_id is exist, and then insert to table transacriondetail
        $checkDetailExist = TransactionDetail::where('transaction_id', $transactions->id)->where('product_id', $products->id)->first();
        if ($checkDetailExist) {
            $detail = $checkDetailExist;
            $detail->quantity = $checkDetailExist->quantity + 1;
            $detail->sub_total = $checkDetailExist->sub_total + $products->price;
            $detail->save();
        } else {
            $transactions = TransactionDetail::create([
                'transaction_id' => $transactions->id,
                'product_id' => $products->id,
                'quantity' => 1,
                'sub_total' => $products->price,
            ]);
        }

        // TODO : As usually we can simply use dd for checking data
        // dd($checkDetailExist);

        return redirect()->back();
    }
}

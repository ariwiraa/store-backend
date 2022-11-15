<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\product;
use App\Models\transaction;
use App\Models\transactionDetail;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details');

        $data['uuid'] = 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999);


        $transaction = transaction::create($data);

        foreach ($request->transaction_details as $product) {
            $details[] = new transactionDetail([
                'transaction_id' => $transaction->id,
                'products_id' => $product
            ]);

            //Mengurangi jumlah quantity 
            product::find($product)->decrement('quantity');
        }

        $transaction->details()->saveMany($details);

        return ResponseFormatter::success($transaction);
    }
}

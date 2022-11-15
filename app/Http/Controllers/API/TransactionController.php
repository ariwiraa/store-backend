<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $product = transaction::with(['details.product'])->find($id);

        if ($product)
            return ResponseFormatter::success($product, "DAta transaksi berhasil diambil");
        else
            return ResponseFormatter::error(null, "data transaksi gagal diambil", 404);
    }
}

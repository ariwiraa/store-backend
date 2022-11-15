<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $income = transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $sales = transaction::count();
        $items = transaction::orderBy('id', 'DESC')->take(5)->get();
        $pie = [
            'pending' => transaction::where('transaction_status', 'PENDING')->count(),
            'failed' => transaction::where('transaction_status', 'failed')->count(),
            'success' => transaction::where('transaction_status', 'success')->count(),
        ];
        return view('pages.dashboard', compact('income', 'sales', 'items', 'pie'));
    }
}

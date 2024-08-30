<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $tanggalHariIni = Carbon::today()->toDateString();

        $hasil = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->whereDate('orders.order_date', $tanggalHariIni)
            ->select(
                DB::raw('SUM(order_items.subtotal) AS total_penjualan'),
                DB::raw('SUM(order_items.quantity) AS jumlah_produk_terjual')
            )
            ->first();
        return view('dashboard.index', compact('hasil'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request){
        $customer = Customer::all();
        if ($request->ajax()) {
            $query = Product::where('stock', '>', 0)->get();
    
            return datatables()::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $addBarang  = '<button class="edit btn btn-primary btn-sm mr-2" id="addProductButton">Tambah</button>';
                    return '<div class="d-flex gap-2">'.$addBarang.'</div>';
                })
                ->make(true);
        }
        return view('order.index', compact('customer'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => '',
            'order_date' => 'required|date',
            'order_items.*.product_id' => 'required|integer|exists:products,id',
            'order_items.*.quantity' => 'required|integer',
            'order_items.*.unit_price' => 'required|numeric',
            'order_items.*.subtotal' => 'required|numeric',
        ]);

        $totalAmount = array_sum(array_column($validated['order_items'], 'subtotal'));
    
    
            $order = Order::create([
                'customer_id' => $validated['customer_id'],
                'order_date' => $validated['order_date'],
                'total_amount' => $totalAmount,
            ]);
            
            foreach ($validated['order_items'] as $item) {
                OrderItems::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'], 
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'subtotal' => $item['subtotal'],
                ]);
                $product = Product::find($item['product_id']);
                if ($product) {
                    $product->stock -= $item['quantity'];
                    $product->save();
                }
            }

            toastr()->success('Transaksi Successfully');
            return redirect()->route('order.index');
    
    }
}

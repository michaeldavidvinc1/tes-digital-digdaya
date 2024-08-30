<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Order::latest()->get();
    
            return datatables()::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit  = '<button class="edit btn btn-secondary btn-sm mr-2" data-id="'.$row->id.'" data-toggle="modal" data-target="#exampleModal">Detail</button>';
                    return '<div class="d-flex gap-2">'.$btnEdit.'</div>';
                })
                ->make(true);
        }
        return view('transaksi.index');
    }

    public function getOrderDetails($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found',
            ]);
        }

        $customer = Customer::find($order->customer_id);

        // Fetch order items
        $orderItems = OrderItems::where('order_id', $id)->get();

        // Fetch products using the correct column name
        $products = Product::whereIn('id', $orderItems->pluck('product_id'))->get()->keyBy('id');

        $formattedItems = $orderItems->map(function ($item) use ($products) {
            $product = $products->get($item->product_id);
            return [
                'product_name' => $product ? $product->name : 'N/A',
                'category' => $product ? $product->category : 'N/A',
                'unit_price' => $item->unit_price,
                'quantity' => $item->quantity,
                'subtotal' => $item->subtotal,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => [
                'customer_name' => $customer ? $customer->name : 'N/A',
                'order_date' => $order->order_date,
                'total_amount' => $order->total_amount,
                'items' => $formattedItems,
            ],
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::latest()->get();
    
            return datatables()::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit  = '<a href="'.route('product.edit', $row->id).'" class="edit btn btn-warning btn-sm mr-2">Edit</a>';
                    $btnDelete = '<button class="btn btn-danger btn-sm" id="buttonDelete" data-url="'.route('product.destroy', $row->id).'">Delete</button>';
                    return '<div class="d-flex gap-2">'.$btnEdit.$btnDelete.'</div>';
                })
                ->make(true);
        }
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'price' => 'required|min:1',
            'stock' => 'required|min:1',
        ]);

        Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
            'price' => $request->price,
            'stock' => $request->stock,
        ]); 

        toastr()->success('Create Product Successfully');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Product::findOrFail($id);
        return view('product.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'price' => 'required|min:1',
            'stock' => 'required|min:1',
        ]);

        $data->name = $request->name;
        $data->category = $request->category;
        $data->desc = $request->desc;
        $data->price = $request->price;
        $data->stock = $request->stock;
        $data->save();

        toastr()->success('Update Product Successfully');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        return response()->json(['success' => "Records deleted successfully."]);
    }
}

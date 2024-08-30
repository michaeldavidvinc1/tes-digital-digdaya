<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Customer::latest()->get();
    
            return datatables()::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btnEdit  = '<a href="'.route('customer.edit', $row->id).'" class="edit btn btn-warning btn-sm mr-2">Edit</a>';
                    $btnDelete = '<button class="btn btn-danger btn-sm" id="buttonDelete" data-url="'.route('customer.destroy', $row->id).'">Delete</button>';
                    return '<div class="d-flex gap-2">'.$btnEdit.$btnDelete.'</div>';
                })
                ->make(true);
        }
        return view('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]); 

        toastr()->success('Create Customer Successfully');
        return redirect()->route('customer.index');
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
        $data = Customer::findOrFail($id);
        return view('customer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Customer::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->save();

        toastr()->success('Update Customer Successfully');
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();
        return response()->json(['success' => "Records deleted successfully."]);
    }
}

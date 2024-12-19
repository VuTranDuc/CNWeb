<?php

namespace App\Http\Controllers;

use App\Models\renter;
use App\Models\laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laptops = laptop::with('renter')->paginate(5);
        return view('laptops.index', compact('laptops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $laptops = laptop::with('renter')->get();
        return view('laptops.create', compact('laptops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'specification' => 'required',
            'rental_status' => 'required',
        ]);

        laptop::create($request->all());
        return redirect()->route('laptops.index')->with("message", "Thêm mới thành công");;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $laptop = laptop::with('renter')->find($id);
        return view('laptops.show', compact('laptop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $renter = renter::all();
        $laptops = laptop::with('renter')->get();
        $laptopID = laptop::with('renter')->find($id);
        return view('laptops.edit', compact('laptopID', 'renter', 'laptops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        laptop::find($id)->update($request->all());
        return redirect()->route('laptops.index')->with("message", "Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(laptop $laptop)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\hardware_devices;
use Illuminate\Http\Request;

class HardwareDevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hardware_devices = hardware_devices::with('it_center')->get();
        return view('index', compact('hardware_devices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(hardware_devices $hardware_devices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hardware_devices $hardware_devices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hardware_devices $hardware_devices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hardware_devices $hardware_devices)
    {
        //
    }
}

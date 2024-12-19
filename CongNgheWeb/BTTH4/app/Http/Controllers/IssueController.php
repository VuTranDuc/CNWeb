<?php

namespace App\Http\Controllers;

use App\Models\issue;
use Illuminate\Http\Request;
use App\Models\computer;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = issue::with('computer')->paginate(10);
        return view('issues.index', compact("issues"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computers = computer::all();
        return view('issues.create', compact("computers"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required',
            'reported_date' => 'required',
            'urgency' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        issue::create($request->all());
        return redirect()->route('issues.index')->with('message', 'Issue created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $issue = issue::with('computer')->find($id);
        return view('issues.show', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $computers = computer::all();
        $issue = issue::with('computer')->find($id);

        return view('issues.edit', compact("computers", "issue"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_id' => 'required',
            'reported_by' => 'required',
            'reported_date' => 'required',
            'urgency' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        $issue = issue::find($id);
        $issue->update($request->all());
        return redirect()->route("issues.index")->with('message', 'Issue updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        issue::destroy($id);
        return redirect()->route("issues.index")->with('message', 'Issue deleted successfully.');
    }
}

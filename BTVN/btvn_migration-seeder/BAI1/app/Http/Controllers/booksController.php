<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use App\Models\libraries;
use Illuminate\Container\Attributes\DB;

class booksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = books::with("library")->paginate(5);
        return view("books.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $libraries = libraries::all();
        return view("books.create", compact("libraries"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        books::create($request->all());
        return redirect()->route("books.index")->with("message", "Thêm mới thành công");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = books::with("library")->find($id);
        return view("books.show", compact("book"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = books::find($id);
        $libraries = libraries::all();
        return view("books.edit", compact("book", "libraries"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = books::find($id);
        $book->update($request->all());
        return redirect()->route("books.index")->with("message", "Cập nhật thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        books::destroy($id);
        return redirect()->route("books.index")->with("message", "Xóa thành công");
    }
}

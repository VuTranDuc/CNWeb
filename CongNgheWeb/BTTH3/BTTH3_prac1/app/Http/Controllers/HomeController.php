<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Sale;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Kiểm tra xem người dùng đã chọn "medicine" hoặc "sale"
        $view = $request->get('view');

        // Lấy dữ liệu tùy theo lựa chọn
        if ($view == 'medicine') {
            $medicines = Medicine::all();  // Lấy tất cả các medicine
            return view('home', compact('medicines'));  // Truyền dữ liệu vào view
        } elseif ($view == 'sale') {
            $sales = Sale::all();  // Lấy tất cả các sale
            return view('home', compact('sales'));  // Truyền dữ liệu vào view
        }

        // Nếu không có lựa chọn, trả về trang chủ mà không có dữ liệu
        return view('home');
    }
}


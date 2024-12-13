<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassModel; // Đổi tên nếu model Class có tên khác
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Kiểm tra tùy chọn người dùng
        $view = $request->get('view');

        // Lấy dữ liệu tùy theo lựa chọn
        if ($view == 'students') {
            $students = Student::with('class')->get(); // Lấy thông tin students cùng lớp
            return view('home', compact('students')); // Truyền dữ liệu vào view
        } elseif ($view == 'classes') {
            $classes = ClassModel::all(); // Lấy danh sách classes
            return view('home', compact('classes')); // Truyền dữ liệu vào view
        }

        // Nếu không có lựa chọn, trả về trang chủ
        return view('home');
    }
}

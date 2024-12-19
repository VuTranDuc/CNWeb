<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>Document</title>
</head>

<body>
    <div class="navbar bg-dark ">
        <h1 class="text-light mx-2">Chi tiết Laptop</h1>
        <a href="{{route('laptops.index')}}"><button class="btn btn-success mx-2">Quay lại</button></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="mt-3"><b>Hãng sản xuất</b><span class="ml-5">{{$laptop->brand}}</span></p>
                <p class="mt-3"><b>Mẫu laptop</b><span class="ml-5">{{$laptop->model}}</span></p>
                <p class="mt-3"><b>Thông số kĩ thuật</b><span class="ml-5">{{$laptop->specification}}</span></p>
                <p class="mt-3"><b>Trạng thái</b><span class="ml-5">@if($laptop->rental_status) Đang cho thuê @else Chưa cho thuê @endif</span></p>
            </div>
            <div class="col">
                <p class="mt-3"><b>Người thuê</b><span class="ml-5">@if($laptop->rental_status) {{$laptop->renter->name}} @endif</span></p>
                <p class="mt-3"><b>Số điện thoại người thuê</b><span class="ml-5">@if($laptop->rental_status) {{$laptop->renter->phone_number}} @endif</span></p>
                <p class="mt-3"><b>Email người thuê</b><span class="ml-5">@if($laptop->rental_status) {{$laptop->renter->email}} @endif</span></p>

            </div>
        </div>
    </div>
</body>

</html>
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
        <h1 class="text-light mx-2">Chi tiết sách</h1>
        <a href="{{route('books.index')}}"><button class="btn btn-success mx-2">Quay lại</button></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="mt-3"><b>Mã sách</b><span class="ml-5">{{$book->id}}</span></p>
                <p class="mt-3"><b>Tiêu đề</b><span class="ml-5">{{$book->title}}</span></p>
                <p class="mt-3"><b>Tác giả</b><span class="ml-5">{{$book->author}}</span></p>
                <p class="mt-3"><b>Năm xuất bản</b><span class="ml-5">{{$book->publication_year}}</span></p>
                <p class="mt-3"><b>Thể loại</b><span class="ml-5">{{$book->genre}}</span></p>
            </div>
            <div class="col">
                <p class="mt-3"><b>Thuộc thư viện</b><span class="ml-5">{{$book->library->name}}</span></p>
                <p class="mt-3"><b>Địa chỉ thư viện</b><span class="ml-5">{{$book->library->address}}</span></p>
                <p class="mt-3"><b>Điện thoại liên hệ</b><span class="ml-5">{{$book->library->contact_number}}</span></p>

            </div>
        </div>
    </div>
</body>

</html>
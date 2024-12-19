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
        <h1 class="text-light mx-2">Chi tiết vấn đề </h1>
        <a href="{{route('issues.index')}}"><button class="btn btn-success mx-2">Quay lại</button></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="mt-3"><b>Mã vấn đề</b><span class="ml-5">{{$issue['id']}}</span></p>
                <p class="mt-3"><b>Tên máy tính</b><span class="ml-5">{{$issue->computer->computer_name}}</span></p>
                <p class="mt-3"><b>Người báo cáo </b><span class="ml-5">{{$issue->reported_by}}</span></p>
                <p class="mt-3"><b>Ngày báo cáo</b><span class="ml-5">{{$issue->reported_date}}</span></p>
                <p class="mt-3"><b>Mô tả</b><span class="ml-5">{{$issue->description}}</span></p>
                <p class="mt-3"><b> Mức độ</b><span class="ml-5">{{$issue->urgency}}</span></p>
                <p class="mt-3"><b>Trạng thái</b><span class="ml-5">{{$issue->status}}</span></p>
            </div>
            <div class="col">


            </div>
        </div>
    </div>
</body>

</html>
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
        <h1 class="text-light mx-2">Thêm laptops mới </h1>
        <a href="{{route('laptops.index')}}"><button class="btn btn-success mx-2">Quay lại</button></a>
    </div>
    <div class="container">
        <form action="{{route('laptops.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Hãng sản xuất</label>
                <select class="form-control" id="" name="brand">
                    @foreach($laptops as $laptop)
                    <option value="{{$laptop->brand}}">{{$laptop->brand}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Mẫu laptop</label>
                <select class="form-control" id="" name="model">
                    @foreach($laptops as $laptop)
                    <option value="{{$laptop->model}}">{{$laptop->model}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Thông số kỹ thuật</label>
                <input type="text" class="form-control" id="" name="specification">
            </div>
            <div class="form-group">
                <label for="">Trạng thái</label>
                <select class="form-control" name="rental_status" id="">
                    <option value="0">Chưa cho thuê</option>
                    <option value="1">Đang cho thuê</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Người thuê</label>
                <select class="form-control" name="renter_id" id="">
                    @foreach($laptops as $laptop)
                    <option value="{{$laptop->renter_id}}">{{$laptop->renter->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Thêm</button>

        </form>
    </div>
</body>

</html>
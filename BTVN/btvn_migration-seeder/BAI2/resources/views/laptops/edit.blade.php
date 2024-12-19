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
        <h1 class="text-light mx-2">Sửa thông tin laptops </h1>
        <a href="{{route('laptops.index')}}"><button class="btn btn-success mx-2">Quay lại</button></a>
    </div>
    <div class="container">
        <form action="{{route('laptops.update',$laptopID->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Hãng sản xuất</label>
                <select class="form-control" id="" name="model">
                    @foreach($laptops as $laptop)
                    <option value="{{$laptop->brand}}" {{$laptop->brand == $laptopID->brand?'selected':''}}>{{$laptop->brand}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Mẫu laptop</label>
                <select class="form-control" id="" name="model">
                    @foreach($laptops as $laptop)
                    <option value="{{$laptop->model}}" {{$laptop->model == $laptopID->model?'selected':''}}>{{$laptop->model}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Thông số kỹ thuật</label>
                <input type="text" class="form-control" id="" name="specification" value="{{$laptopID->specification}}">
            </div>
            <div class="form-group">
                <label for="">Trạng thái</label>
                <select class="form-control" name="rental_status" id="">
                    <option value="0" {{$laptopID->rental_status==0 ?'selected':''}}>Chưa cho thuê</option>
                    <option value="1" {{$laptopID->rental_status==1 ?'selected':''}}>Đang cho thuê</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Người thuê</label>
                <select class="form-control" name="renter_id" id="">
                    @foreach($laptops as $laptop)
                    <option value="{{$laptop->renter_id}}" {{$laptop->renter_id == $laptopID->renter_id?'selected':''}}>@if($laptopID->rental_status) {{$laptop->renter->name}} @endif</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Sửa</button>

        </form>
    </div>
</body>

</html>
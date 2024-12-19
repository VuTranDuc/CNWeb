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
        <h1 class="text-light mx-2">Sửa thông tin vấn đề </h1>
        <a href="{{route('issues.index')}}"><button class="btn btn-success mx-2">Quay lại</button></a>
    </div>
    <div class="container">
        <form action="{{route('issues.update',$issue->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Máy tính</label>
                <select name="computer_id" id="" class="form-control">
                    @foreach($computers as $computer)
                    <option value="{{$computer->id}} " {{$issue->computer_id==$computer->id?'selected': ''}}>{{$computer->computer_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Người báo cáo sự cố</label>
                <input type="text" value="{{$issue->reported_by}}" class="form-control" name="reported_by">
            </div>
            <div class="form-group">
                <label for="">Thời gian báo cáo</label>
                <input type="datetimelocal" value="{{$issue->reported_date}}" class="form-control" name="reported_date">
            </div>
            <div class="form-group">
                <label for="">Mô tả chi tiết vấn đề </label>
                <input type="text" class="form-control" value="{{$issue->description}}" name="description">
            </div>
            <div class="form-group">
                <label for="">Mức độ sự cố</label>
                <select name="urgency" id="" class="form-control">
                    <option value="Low" {{$issue->urgency=='Low'?'selected':''}}>Low</option>
                    <option value="Medium" {{$issue->urgency=='Medium'?'selected':''}}>Medium</option>
                    <option value="Hight" {{$issue->urgency=='Hight'?'selected':''}}>Hight</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Trạng thái</label>
                <select name="status" id="" class="form-control">
                    <option value="open" {{$issue->status=='Open'?'selected':''}}>open</option>
                    <option value="Resolved" {{$issue->status=='Resolved'?'selected':''}}>Resoloved</option>
                    <option value="In Progress" {{$issue->status=='In Progress'?'selected':''}}>In Program</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Sửa</button>

        </form>
    </div>
</body>

</html>
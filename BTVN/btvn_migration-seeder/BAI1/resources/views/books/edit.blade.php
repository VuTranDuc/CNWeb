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
        <h1 class="text-light mx-2">Sửa thông tin sách </h1>
        <a href="{{route('books.index')}}"><button class="btn btn-success mx-2">Quay lại</button></a>
    </div>
    <div class="container">
        <form action="{{route('books.update',$book->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}">
            </div>
            <div class="form-group">
                <label for="author">Tác giả</label>
                <input type="text" class="form-control" id="author" name="author" value="{{$book->author}}">
            </div>
            <div class="form-group">
                <label for="publication_year">Năm xuất bản</label>
                <input type="text" class="form-control" id="publication_year" name="publication_year" value="{{$book->publication_year}}">
            </div>
            <div class="form-group">
                <label for="genre">Thể loại</label>
                <input type="text" class="form-control" id="genre" name="genre" value="{{$book->genre}}">
            </div>
            <div class="form-group">
                <label for="library_id">Thuộc thư viện</label>
                <select class="form-control" id="library_id" name="library_id">
                    @foreach($libraries as $library)
                    <option value="{{ $library->id }}" {{ $library->id == $book->library_id ? 'selected' : '' }}>{{ $library->name }} </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>

        </form>
    </div>
</body>

</html>
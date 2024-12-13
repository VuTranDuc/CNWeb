<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>

    <!-- Form để chọn hiển thị các dữ liệu -->
    <form method="GET" action="{{ route('home') }}">
        <button type="submit" name="view" value="medicine">Show Medicines</button>
        <button type="submit" name="view" value="sale">Show Sales</button>
    </form>

    <!-- Hiển thị thông tin tùy theo lựa chọn -->
    @if(request('view') == 'medicine')
        <h2>Medicines</h2>
        <!-- Duyệt và hiển thị danh sách medicine -->
        @foreach($medicines as $medicine)
            <p>{{ $medicine->name }} - {{ $medicine->price }} VND</p>
        @endforeach
    @elseif(request('view') == 'sale')
        <h2>Sales</h2>
        <!-- Duyệt và hiển thị danh sách sale -->
        @foreach($sales as $sale)
            <p>Sale ID: {{ $sale->sale_id }} | Medicine ID: {{ $sale->medicine_id }} | Quantity: {{ $sale->quantity }} | Date: {{ $sale->sale_date }}</p>
        @endforeach
    @else
        <p>Please select a category to view.</p>
    @endif
</body>
</html>

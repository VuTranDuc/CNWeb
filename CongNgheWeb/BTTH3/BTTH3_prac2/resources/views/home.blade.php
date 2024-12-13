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
        <button type="submit" name="view" value="students">Show Students</button>
        <button type="submit" name="view" value="classes">Show Classes</button>
    </form>

    <!-- Hiển thị thông tin tùy theo lựa chọn -->
    @if(request('view') == 'students')
        <h2>Students</h2>
        <!-- Duyệt và hiển thị danh sách students -->
        @foreach($students as $student)
            <p>
                Name: {{ $student->first_name }} {{ $student->last_name }}<br>
                Date of Birth: {{ $student->date_of_birth }}<br>
                Parent Phone: {{ $student->parent_phone }}<br>
                Class: {{ $student->class->grade_level ?? 'N/A' }} - Room {{ $student->class->room_number ?? 'N/A' }}
            </p>
        @endforeach
    @elseif(request('view') == 'classes')
        <h2>Classes</h2>
        <!-- Duyệt và hiển thị danh sách classes -->
        @foreach($classes as $class)
            <p>
                Grade Level: {{ ucfirst($class->grade_level) }}<br>
                Room Number: {{ $class->room_number }}
            </p>
        @endforeach
    @else
        <p>Please select a category to view.</p>
    @endif
</body>
</html>
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
        <button type="submit" name="view" value="computers">Show Computers</button>
        <button type="submit" name="view" value="issues">Show Issues</button>
    </form>

    <!-- Hiển thị thông tin tùy theo lựa chọn -->
    @if(request('view') == 'computers')
        <h2>Computers</h2>
        <!-- Duyệt và hiển thị danh sách computers -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Operating System</th>
                    <th>Processor</th>
                    <th>Memory</th>
                </tr>
            </thead>
            <tbody>
                @foreach($computers as $computer)
                    <tr>
                        <td>{{ $computer->id }}</td>
                        <td>{{ $computer->computer_name }}</td>
                        <td>{{ $computer->model }}</td>
                        <td>{{ $computer->operating_system }}</td>
                        <td>{{ $computer->processor }}</td>
                        <td>{{ $computer->memory }} GB</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(request('view') == 'issues')
        <h2>Issues</h2>
        <!-- Duyệt và hiển thị danh sách issues -->
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Computer ID</th>
                    <th>Reported By</th>
                    <th>Reported Date</th>
                    <th>Description</th>
                    <th>Urgency</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($issues as $issue)
                    <tr>
                        <td>{{ $issue->id }}</td>
                        <td>{{ $issue->computer_id }}</td>
                        <td>{{ $issue->reported_by }}</td>
                        <td>{{ $issue->reported_date }}</td>
                        <td>{{ $issue->description }}</td>
                        <td>{{ $issue->urgency }}</td>
                        <td>{{ $issue->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Please select a category to view.</p>
    @endif
</body>
</html>

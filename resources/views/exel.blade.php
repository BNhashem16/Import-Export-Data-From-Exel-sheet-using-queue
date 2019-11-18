<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 5.8 - Import Export Data in CSV File</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <br />
    <h3 align="center">Task 1 => Import & Export Data From Exel sheet</h3>
    <br />
    <div class="panel panel-default">
        <div class="panel-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" accept=".xlsx">
                <br>
                <button class="btn btn-success">Import User Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
            </form>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Age</th>
                    <th>Phone</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->age }}</td>
                        <td>{{ $row->phone }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $data->links() !!}
        </div>
    </div>
</div>
</body>
</html>

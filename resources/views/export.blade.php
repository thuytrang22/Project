<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Excel</title>
</head>
<body>
    <h1>Export Excel</h1>
    <a href="{{ route('download.export', ['filename' => $filename]) }}">Export File</a>
    <form action="{{ url('/export') }}" method="get">
        @csrf
        <button type="submit">Export Excel</button>
    </form>
</body>
</html>
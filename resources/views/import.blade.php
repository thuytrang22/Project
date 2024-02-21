<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Excel</title>
</head>
<body>
    <h1>Import Excel</h1>
    
    <form action="{{ url('/import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="import_file" accept=".xlsx">
        <button type="submit">Import Excel</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Add template

    <form action="{{ route('admin.addTemplate')}}" method="POST">
        @csrf
        <span>template_name</span>
        <input type="number" name="template_name" placeholder="template_name">
        <br>
        <span>type</span>
        <input type="text" name="type" placeholder="type">
        <br>
        <span>source_code</span>
        <input type="text" name="source_code" placeholder="source_code">
        <br>

        <button type="submit">Request</button>
    </form>
</body>
</html>

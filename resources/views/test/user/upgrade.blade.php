<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Become an Advertiser

    <form action="{{ route('user.upgrade')}}" method="POST">
        @csrf
        <span>Company Name</span>
        <input type="text" name="company_name" placeholder="Company Name">
        <br>
        <span>Phone Number</span>
        <input type="text" name="phone_number" placeholder="Phone Number">
        <br>
        <span>Details</span>
        <input type="text" name="details" placeholder="Details">
        <br>
        <span>Images</span>
        <input type="file" name="images" placeholder="Images">
        <br>
        <button type="submit">Request</button>
    </form>
</body>
</html>

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

    <form action="{{ route('post.advertiser.addOffer')}}" method="POST">
        @csrf
        <span>campaign_name</span>
        <input type="text" name="campaign_name" placeholder="campaign_name">
        <br>
        <span>campaign_starts</span>
        <input type="date" name="campaign_starts" placeholder="campaign_starts">
        <br>
        <span>campaign_ends</span>
        <input type="date" name="campaign_ends" placeholder="campaign_ends">
        <br>
        <hr>
        <span>tickets_left</span>
        <input type="number" name="tickets_left" placeholder="tickets_left">
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

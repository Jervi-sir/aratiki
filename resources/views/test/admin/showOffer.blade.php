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
    <br>
    {{ $offer->advertiser()->first() }}
    <br>
    {{ $offer->template()->first() }}
    <br>
    {{ $offer->is_verified }}
    <br>
    {{ $offer->is_active }}
    <br>
    {{ $offer->tickets_left }}
    <br>
    {{ $offer->images }}
    <br>
    {{ $offer->details }}
    <br>
    {{ $offer->campaign_name }}
    <br>
    {{ $offer->campaign_starts }}
    <br>
    {{ $offer->campaign_ends }}
    <br>
    <br>

    @if (!$offer->is_verified)
    <form action="{{ route('admin.confirmOffer', ['id' => $offer->id])}}" method="POST">
        @csrf
        <button type="submit">Confirm</button>
    </form>
    @endif

</body>
</html>

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
    {{ $adv->company_name }}
    <br>
    {{ $adv->phone_number }}
    <br>
    {{ $adv->is_verified }}
    <br>
    {{ $adv->details }}
    <br>
    {{ $adv->images }}
    <br>

    @if (!$adv->is_verified)
    <form action="{{ route('admin.confirmAdv', ['id' => $adv->id])}}" method="POST">
        @csrf
        <button type="submit">Confirm</button>
    </form>
    @endif

</body>
</html>

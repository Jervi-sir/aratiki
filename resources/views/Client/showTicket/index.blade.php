@extends('_layouts.master')
{{-- [] --}}

@section('head')
    @vite('resources/views/Client/showTicket/styles.scss')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('head')
@endsection

@section('body')
<div class="ticket-container">
    <div class="top-ticket">
        <h2 class="action">{{ __('client.show_qr') }}</h2>
        <div class="qrcode" id="qrcode"></div>
        <h3 class="price">{{ $ticket['price'] }}</h3>
    </div>

    <div class="cut">
        <img src="../../images/cut.svg" alt="aratiki">
    </div>
    <div class="bottom-ticket">
        <h1 class="title">{{ $ticket['event_name'] }}</h1>
        <h5 class="promoter">By {{ $ticket['advertiser_name'] }}</h5>
        <h4 class="location">{{ $ticket['location'] }}</h4>
        <div class="timeline">
            <div class="start">
                <span class="hours">{{ $ticket['event_time_starts'] }}</span>
                <span class="date">{{ $ticket['event_date_starts'] }}</span>
            </div>
            <div class="arrow">
                <img src="../../images/arrow.svg" alt="aratiki">
            </div>

            <div class="end">
                <span class="hours">{{ $ticket['event_time_ends'] }}</span>
                <span class="date">{{ $ticket['event_date_ends'] }}</span>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    qrcodeBlade = {!! json_encode($ticket['qrcode']) !!}
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: qrcodeBlade,
        width: 256,
        height: 256,
        colorDark : "#ffffff",
        colorLight : "#203354",
        correctLevel : QRCode.CorrectLevel.H
    });
</script>
@endsection

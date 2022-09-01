<div class="join">
    @guest
    <div class="option">
        <h2>Don't have an account?</h2>
        <h4>Please join us</h4>
        <a href="{{ route('register') }}" class="join-button"> Create Your Account </a>
    </div>
    @endguest
    @if (Auth()->user()->role_id == 3)
    <div class="option">
        <h2>Wanna promote your events?</h2>
        <a href="{{ route('get.advertiser.join') }}" class="join-button"> Fill Your Request </a>
        <h5>
            For <strong>FREE</strong> since it's all about helping people to reach
            out to you
        </h5>
    </div>
    @endif
  </div>

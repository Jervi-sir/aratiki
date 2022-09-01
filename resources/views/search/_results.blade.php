<div class="result-events">
    <div class="header">
      <h4>Results</h4>
      <a href="#">View all</a>
    </div>
    <div class="card-horizental-container">
        @foreach ($events as $event)
            @include('home._card', ['event' => $event])
        @endforeach
    </div>

</div>

<style>
    .card-horizental-container {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      /*width: 200%;*/
      padding: 0 0 1.2rem 0;
    }
</style>

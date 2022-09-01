<div class="popular-events">
    <div class="header">
      <h4>Popular Events</h4>
      <a href="#">View all</a>
    </div>
    <div class="card-horizental-container">
        @foreach ($events as $event)
            @include('home._card', ['event' => $event])
        @endforeach
    </div>

    <!-- Categories -->
    @include('home._categories')
</div>

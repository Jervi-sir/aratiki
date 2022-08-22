<div class="card-container">
    <div class="card">
      <div class="image">
        <img class="preview" src="https://images.pexels.com/photos/1105666/pexels-photo-1105666.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" width="260" height="150" alt="" />
        <a href="#" class="bookmark">
          <img src="images/bookmark.svg" alt="" />
        </a>
        <div class="date">
          <span>{{ $event['date'] }}</span>
        </div>
      </div>
      <div class="details">
        <div class="row">
          <div class="titles">
            <span class="title">{{ $event['name'] }}</span>
            <span class="promoter">{{ $event['promoter'] }}</span>
          </div>
          <div class="duration">
            <span>{{ $event['duration'] }}</span>
          </div>
        </div>
        <div class="row">
          <div class="location">
            <img src="images/location['svg" alt="" />
            <span>{{ $event['location'] }}</span>
          </div>
          <div class="price">
            <span>{{ $event['price'] }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>

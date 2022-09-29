<div x-data="changeImages" class="images">
    <div class="main-images">
        <div class="location">
            <img src="../../images/flag.svg" alt="">
            <span>{{ 'media/' . $offer['location'] }}</span>
        </div>
        <div class="bookmark">
            <img src="../../images/bookmark.svg" alt="">
        </div>
        <div class="preview">
            <img src="{{ env('APP.ENV') }}{{ '/media/' . $offer['images'][0] }}" alt="">
        </div>
        <div class="nav-images">
            <div class="left">
                <div @click="selectThis(0)" id="images1" class="select-image active"></div>
                <div @click="selectThis(1)"  id="images2" class="select-image"></div>
                <div @click="selectThis(2)"  id="images3" class="select-image"></div>
            </div>
            <div class="date">
                {{ $offer['date'] }}
            </div>
            <div class="right">
                <div @click="selectThis(3)"  id="images4" class="select-image"></div>
                <div @click="selectThis(4)"  id="images5" class="select-image"></div>
            </div>
        </div>
    </div>
    <div class="secondary-images">
        @foreach ($offer['images'] as $item)
        <div class="thumbnail">
            <img src="{{ env('APP.ENV') }}{{ '/media/' . $item }}" alt="">
        </div>
        @endforeach
    </div>
</div>
<script>
    function changeImages() {
        return {

        }
    }
</script>
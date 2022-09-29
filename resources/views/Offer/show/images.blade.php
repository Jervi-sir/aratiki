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
            <img :src="main_img" alt="">
        </div>
        <div class="nav-images">
            <div class="left">
                <div @click="selectThis(0)"  id="images1" class="select-image" :class="{ 'active' : active == 0}"></div>
                <div @click="selectThis(1)"  id="images2" class="select-image" :class="{ 'active' : active == 1}"></div>
                <div @click="selectThis(2)"  id="images3" class="select-image" :class="{ 'active' : active == 2}"></div>
            </div>
            <div class="date">
                {{ $offer['date'] }}
            </div>
            <div class="right">
                <div @click="selectThis(3)"  id="images4" class="select-image" :class="{ 'active' : active == 3}"></div>
                <div @click="selectThis(4)"  id="images5" class="select-image" :class="{ 'active' : active == 4}"></div>
            </div>
        </div>
    </div>
    <div class="secondary-images">
        @foreach ($offer['images'] as $item)
        <div class="thumbnail">
            <img src="{{ $item }}" alt="">
        </div>
        @endforeach
    </div>
</div>
<script>
    function changeImages() {
        return {
            main_img: {!! json_encode($offer['images'][0]) !!},
            active: 0,
            images: {
                0: { source: {!!json_encode($offer['images'][0])!!}},
                1: { source: {!!json_encode($offer['images'][1])!!}},
                2: { source: {!!json_encode($offer['images'][2])!!}},
                3: { source: {!!json_encode($offer['images'][3])!!}},
                4: { source: {!!json_encode($offer['images'][4])!!}},
            },
            selectThis(index) {
                if(this.images[index]['source']) {
                    this.main_img = '';
                    this.active = index;
                    this.main_img = this.images[index]['source'];
                }
            }

        }
    }
</script>
<div x-data="{ open: false }" class="categories-container">
    <label for="">
        <span>Event Categories</span>
        <button @click="open = ! open">View All</button>
    </label>
    <div class="categories-list">
        @foreach ($categories as $category)
        <div class="category">
            <img src="../../images/{{ $category['type'] }}.svg" alt="">
            <span>{{ $category['name'] }}</span>
        </div>
        @endforeach
    </div>

    <div class="categories-slide" x-show="open" x-transition>
        <div class="bg-box" @click="open = ! open"></div>
        <div class="box">
            <div class="top">
                <div class="title">
                    <img src="../../images/Logo_mini.svg" alt="">
                    <h3>Categories</h3>
                </div>
                <button @click="open = ! open">
                    <img src="../../images/cancel.svg" alt="">
                </button>
            </div>
            <div class="link-list">
                @foreach ($categories as $category)
                <a class="category" href="{{ route('homepage') }}">
                    <img src="../../images/{{ $category['type'] }}.svg" alt="">
                    <span>{{ $category['name'] }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
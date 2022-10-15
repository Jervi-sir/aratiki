<div x-data="{ open: false }" class="categories-container">
    <label for="">
        <span>{{ __('home.event_categories') }}</span>
        <button @click="open = ! open">{{ __('home.view_all') }}</button>
    </label>
    <div class="categories-list">
        @for ($i = 0; $i < 3; $i++)
        <a href="{{ $categories[$i]['url'] }}" class="category">
            <img src="../../images/{{ $categories[$i]['type'] }}.svg" alt="aratiki, {{ $categories[$i]['type'] }}">
            <span>{{ $categories[$i]['name'] }}</span>
        </a>
        @endfor
    </div>

    <div class="categories-slide" x-show="open" x-transition style="display: none">
        <div class="bg-box" @click="open = ! open"></div>
        <div class="box">
            <div class="top">
                <div class="title">
                    <img src="../../images/Logo_mini.svg" alt="aratiki">
                    <h3>{{ __('home.categories') }}</h3>
                </div>
                <button @click="open = ! open">
                    <img src="../../images/cancel.svg" alt="aratiki">
                </button>
            </div>
            <div class="link-list">
                @foreach ($categories as $category)
                <a class="category" href="{{ $category['url'] }}">
                    <img src="../../images/{{ $category['type'] }}.svg" alt="aratiki, {{ $category['type'] }}">
                    <span>{{ $category['name'] }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
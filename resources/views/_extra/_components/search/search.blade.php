@vite('resources/views/_extra/_components/search/search.scss')
<form action="{{ route('search') }}" method="GET" class="search-container">
    @csrf
    <div class="search">
        <button>
            <img src="../../images/search.svg" alt="">
        </button>
        <input type="text" value="{{ $value }}" placeholder="Search any event offer, with specific Location">
    </div>
</form>

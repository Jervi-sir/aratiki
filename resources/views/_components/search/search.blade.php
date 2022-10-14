@vite('resources/views/_components/search/search.scss')
<form action="{{ route('search.form') }}" method="GET" class="search-container">
    <div class="search">
        <button>
            <img src="../../images/search.svg" alt="">
        </button>
        <input type="text" name="keywords" value="{{ $value }}" placeholder="Search any event offer, with specific Location">
    </div>
</form>

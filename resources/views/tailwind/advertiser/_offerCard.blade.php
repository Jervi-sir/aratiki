<div class="w-full sm:w-1/2 md:w-1/3 xl:max-w-sm p-4">
    <div class="c-card block bg-white shadow-md hover:shadow-xl rounded-lg overflow-hidden">
        <div class="relative pb-48 overflow-hidden h-64">
            <img class="absolute inset-0 h-full w-full object-cover"
                src="{{ '../../' . $offer['main_image'] }}"
            >
        </div>
        <div class="p-4">
            @if($offer['is_verified'])
            <span class="bg-orange-200 text-orange-800 inline-block px-2 py-1 leading-none rounded-full font-semibold uppercase tracking-wide text-xs">
                Verified
            </span>
            @else
            <span class="bg-red-200 text-red-800 inline-block px-2 py-1 leading-none rounded-full font-semibold uppercase tracking-wide text-xs">
                Not Verified
            </span>
            @endif
            @if($offer['is_active'])
            <span class="bg-green-200 text-green-800 inline-block px-2 py-1 leading-none rounded-full font-semibold uppercase tracking-wide text-xs">
                Active
            </span>
            @endif
            <h2 class="mt-2 mb-2  font-bold">
                {{ $offer['campaign_name'] }}
            </h2>
            <p class="text-sm">
                {{ $offer['details'] }}
            </p>
            <div class="mt-3 flex items-center">
                <span class="font-bold text-xl">
                    {{ $offer['price'] }}
                </span>
                &nbsp;
                <span class="text-sm font-semibold">
                    DA
                </span>
            </div>
        </div>
        <div class=" p-4 border-t border-b text-xs text-gray-700">
            <div class="flex items-center gap-2 mb-2">
                <span>
                    <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.48615 12.7377C0.702344 7.38946 0 6.84056 0 4.875C0 2.1826 2.23857 0 5 0C7.76143 0 10 2.1826 10 4.875C10 6.84056 9.29766 7.38946 5.51385 12.7377C5.26555 13.0874 4.73443 13.0874 4.48615 12.7377ZM5 6.90625C6.1506 6.90625 7.08333 5.99683 7.08333 4.875C7.08333 3.75317 6.1506 2.84375 5 2.84375C3.8494 2.84375 2.91667 3.75317 2.91667 4.875C2.91667 5.99683 3.8494 6.90625 5 6.90625Z" fill="#292D32"/></svg>
                </span>
                <span>
                    {{ $offer['location'] }}
                </span>
            </div>
            <div class="flex items-center gap-2 mb-2">
                <span>
                    <svg width="13" height="13" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"/></svg>
                </span>
                <span>
                    {{ $offer['phone_number'] }}
                </span>
            </div>
        </div>
        <div class="p-4 border-t border-b text-xs text-gray-700">
            <span class="flex items-center mb-1">
                <span class="font-bold"> Total tickets</span>
                &nbsp;
                <span>{{ $offer['total_tickets'] }}</span>
            </span>
            <span class="flex items-center mb-1">
                <span class="font-bold"> Total Sold</span>
                &nbsp;
                <span>{{ $offer['tickets_sold'] }}</span>
            </span>
        </div>
        <div class="p-4 border-t border-b text-xs text-gray-700">
            <span class="flex items-center mb-1">
                <span class="font-bold"> Date Start</span>
                &nbsp;
                <span>{{ $offer['campaign_starts'] }}</span>
            </span>
            <span class="flex items-center mb-1">
                <span class="font-bold"> Date End</span>
                &nbsp;
                <span>{{ $offer['campaign_ends'] }}</span>
            </span>
        </div>
        <a href="{{ route('get.advertiser.offer', ['id' => $offer['offer_id']]) }}" class="w-full text-center shadow bg-slate-800 hover:bg-slate-900 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
            Show/Edit
        </a>
    </div>

</div>

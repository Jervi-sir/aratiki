<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Campaign Name
                </th>
                <th scope="col" class="px-6 py-3">
                    is Verified
                </th>
                <th scope="col" class="px-6 py-3">
                    is Active
                </th>
                <th scope="col" class="px-6 py-3">
                    Tickets Left
                </th>
                <th scope="col" class="px-6 py-3">
                    Period
                </th>

            </tr>
        </thead>
        <tbody>
            @foreach ($offers as $offer)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('get.advertiser.editOffer', ['id' => $offer->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    {{ $offer->campaign_name }}
                </th>
                <td class="px-6 py-4">
                    {{ $offer->is_verified }}
                </td>
                <td class="px-6 py-4">
                    {{ $offer->is_active }}
                </td>
                <td class="px-6 py-4">
                    {{ $offer->tickets_left }}
                </td>
                <td class="px-6 py-4">
                    {{ $offer->campaign_starts }}
                    {{ $offer->campaign_ends }}
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

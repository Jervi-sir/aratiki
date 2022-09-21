<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" >
        {{ $label }}
    </label>
    <div class="flex overflow-hidden text-gray-700 leading-tight bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg ">
        <input
            required
            type="number"
            min="0"
            name="{{ $request_name }}"
            placeholder="{{ $placeholder }}"
            class="w-full py-2 ml-2 focus:outline-none focus:bg-white border-none focus:border-purple-500 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
        <div class="bg-blue-500 text-white flex flex-col justify-center px-4">DA</div>
    </div>
</div>

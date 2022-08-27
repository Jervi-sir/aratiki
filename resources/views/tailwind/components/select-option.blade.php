<div class="md:flex md:items-center mb-6">
    <label class="block text-gray-700 text-sm font-bold mb-2" >
        {{ $label }}
    </label>
    <select name="{{ $request_name }}" id="type" class="w-full py-2 px-4 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option disabled selected>{{ $placeholder }}</option>
        @foreach($templates as $template)
        <option value="{{ $template->id }}">{{ $template->template_name }}</option>
        @endforeach
    </select>
</div>

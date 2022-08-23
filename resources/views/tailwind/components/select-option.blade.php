<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="type">
            {{ $label }}
        </label>
    </div>
    <div class="md:w-2/3">
        <select name="{{ $request_name }}" id="type" class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
            @foreach($templates as $template)
            <option value="{{ $template->id }}">{{ $template->template_name }}</option>
            @endforeach
        </select>
    </div>
</div>

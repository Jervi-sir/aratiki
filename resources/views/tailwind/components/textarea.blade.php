<div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="details">
        {{ $label }}
      </label>
    </div>
    <div class="md:w-2/3">
        <textarea required id="details" rows="4" name="{{ $request_name }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 appearance-none border-2 border-gray-200 rounded  py-2 px-4  leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Describe this event..."></textarea>
    </div>
  </div>

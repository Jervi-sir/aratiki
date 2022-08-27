<div x-data="phoneNumber" class="relative mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2" >
        Phone number
    </label>
    <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="phone_number"
        type="text"
        placeholder="Enter your phone number"
        required
        @keypress="validateNumber"
        @if ($value)
        value="{{$value}}"
        @endif
    >
</div>

<script>
    function phoneNumber() {
        return {
            message: 'twinki',
            validateNumber(event) {
                let keyCode = event.keyCode;
                if (keyCode < 46 || keyCode > 57) {
                    event.preventDefault();
                }
            },
        }
    }

</script>

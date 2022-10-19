@if (session()->has('notify.message'))
@vite('resources/views/_components/notification/notification.scss')
<div
x-data="{ show:true }"
x-show="show"
x-transition.duration.500ms
x-init="setTimeout(() => show = false, 2000)"
class="notify-container"
>
  <div class="notify-box">
    @if(session()->get('notify.type') === 'announce')
    <div class="notify-icon">
        <img src="../images/announce.svg" alt="aratiki success">
    </div>
    @endif
    @if(session()->get('notify.type') === 'success')
          <div class="notify-icon">
              <img src="../images/success.svg" alt="aratiki success">
          </div>
      @endif
      @if(session()->get('notify.type') === 'error')
          <div class="notify-icon">
            <img src="../images/error.svg" alt="aratiki error">
          </div>
      @endif
      <div class="notify-context">
          <p class="notify-title">
              {{ session()->get('notify.title') }}
          </p>
      </div>
      <div class="cross-button">
          <button @click="show = false" class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
          </button>
      </div>
  </div>
</div>

@endif

{{ session()->forget('notify.message') }}


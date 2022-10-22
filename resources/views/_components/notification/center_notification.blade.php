@if (session()->has('notify_center_title'))
    @vite('resources/views/_components/notification/center_notification.scss')
    <div
    x-data="{ show:true }"
    x-show="show"
    x-transition.duration.200ms
    x-init="setTimeout(() => show = false, 3000)"
    class="success-container"
    >
        <img src="../../images/check_success.svg" alt="aratiki success">
        <h1>{{ session()->get('notify_center_title') }}</h1>
        <h5>{{ session()->get('notify_center_message') }}</h5>
    </div>
    {{ session()->forget(['notify_center_title', 'notify_center_title']) }}
@endif

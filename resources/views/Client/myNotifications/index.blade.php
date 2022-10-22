@extends('_layouts.master')
{{-- [done] --}}
@section('title')
    {{ __('client.mynotifications') }}
@endsection

@section('head')
    @vite('resources/views/Client/myNotifications/styles.scss')
@endsection

@section('body')
<div class="bg-blue"></div>
<div class="profile-container">
    <div class="profile-card">
        <div class="details">
            <div class="left">
                <div class="username">{{ $user['name'] }}</div>
                <div class="phone">{{ $user['phone_number'] }}</div>
                <div class="bio">{{ $user['bio'] }}</div>
            </div>
            <div class="right">
                <img src="../../images/promoter.png" alt="aratiki">
            </div>
        </div>
        <div class="total-n-edit">
            <div class="total-tickets">
                <span>{{ __('client.total tickets') }}:</span>
                <span>{{ $user['total_tickets'] }} {{ __('client.tickets') }}</span>
                <span class="nb-active">({{ $user['active_tickets'] }} {{ __('client.active') }})</span>
            </div>
            <a href="{{ route('user.edit') }}" class="edit-btn">
                {{ __('client.edit') }}
            </a>
        </div>
    </div>
</div>


<div class="notification-list">
    <label for="">
        <span>{{ __('client.notifications') }}</span>
        <span class="nb-active">  </span>
    </label>
    @if (count($notifications) == 0) 
        <h3 class="no-notifications">{{ __('client.no_notifications') }}</h3>
    @else
    @foreach ($notifications as $notification)
    <a 
        @if (($notification['url']) != '')
        href="{{ route('user.notificationredirect', ['index' => $loop->index, 'redirect' => $notification['url'] ]) }}"
        @endif  
        class="notification-row"
        >
        <div class="left">
            <img src="../../images/{{ $notification['type'] }}.svg" alt="aratiki announcements">
        </div>

        <div class="middle">
            <div class="title">{{ $notification['title'] }}</div>
            <div class="details">{{ $notification['details'] }}</div>
        </div>

        <div class="right">
            <div class="visited">
                @if ($notification['notVisited'] == true)
                <img src="../../images/not_visited.svg" alt="atariki visted">
                @else
                <img src="../../images/visited.svg" alt="atariki visted">
                @endif
            </div>
            <div class="date">
                {{ $notification['writtenDate'] }}
            </div>
        </div>
        
    </a>
    @endforeach
    @endif

</div>
@endsection

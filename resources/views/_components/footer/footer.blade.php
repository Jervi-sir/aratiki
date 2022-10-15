@vite('resources/views/_components/footer/footer.scss')
<footer>
    <div class="top-container">
        <div class="left">
            <a href="#">{{ __('_components.mobile_app') }}</a>
            <a href="#">{{ __('_components.community') }}</a>
            <a href="#">{{ __('_components.about_us') }}</a>
        </div>
        <div class="logo">
            <img src="../../images/logo_blue.svg" alt="aratiki logo">
        </div>
        <div class="right">
            <a href="#">{{ __('_components.help') }}</a>
            <a href="#">{{ __('_components.privacy') }}</a>
            <a href="#">{{ __('_components.become_advertiser') }}</a>
        </div>
    </div>
    <div class="social-container">
        <div class="social-list">
            <a href="#"><img src="../../images/social.svg" alt="aratiki social"></a>
            <a href="#"><img src="../../images/social.svg" alt="aratiki social"></a>
            <a href="#"><img src="../../images/social.svg" alt="aratiki social"></a>
            <a href="#"><img src="../../images/social.svg" alt="aratiki social"></a>
        </div>
    </div>
    <div class="bottom-container">
        <span>{{ __('_components.copyrights') }}</span>
        <span>©</span>
        <span>ارا تيكي</span>
    </div>
</footer>

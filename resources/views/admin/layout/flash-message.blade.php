@if (Session::has('status'))
<p class="alert p-3 rounded ml-5 mt-3 bg-warning text-dark login-box text-white animated bounceOutUp"
    style="animation-duration: 14s;position: absolute;top: 40px;right: 10px;z-index: 9999;">
    <i class="bi bi-chat-square-dots-fill"></i>
    {{ Session::get('status') }}
</p>
@endif
@if (session()->exists('error'))
    <div class="message error">
        {{ session('error') }}
    </div>
@endif

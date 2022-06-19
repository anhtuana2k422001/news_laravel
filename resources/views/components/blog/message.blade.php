@props(['status'])
@if(session()->has($status))
    <div class="alert alert-{{ $status == 'success' ? 'success' : 'danger' }} global-message {{ $status == 'success' ? 'success' : 'error' }} ">
        {{ session($status) }}
    </div>
@endif
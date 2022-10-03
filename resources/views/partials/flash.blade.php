<div class="container mt-2">
    @foreach (session('flash_notification', collect())->toArray() as $message)
        <div class="alert alert-dismissible alert-{{ $message['level'] }} {{ $message['important'] ? 'alert-important' : '' }} fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            {!! $message['message'] !!}
        </div>
    @endforeach
</div>

{{ session()->forget('flash_notification') }}

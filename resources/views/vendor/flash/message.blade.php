@foreach (session('flash_notification', collect())->toArray() as $message)
    <div class="alert
                    alert-{{ $message['level'] }}
    {{ $message['important'] ? 'alert-dismissible' : '' }}"
         role="alert"
    >
        @if ($message['important'])
            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true"
            >&times;
            </button>
        @endif
        @if($message['overlay'])
            <h4>
                @switch($message['level'])
                    @case('success')
                    <i class="icon fa fa-check"></i>
                    @break
                    @case('warning')
                    <i class="icon fa fa-warning"></i>
                    @break
                    @case('info')
                    <i class="icon fa fa-info"></i>
                    @break
                    @case('danger')
                    <i class="icon fa fa-ban"></i>
                    @break
                @endswitch
                {{ $message['title'] }}
            </h4>
        @endif

        {!! $message['message'] !!}
    </div>
@endforeach

{{ session()->forget('flash_notification') }}

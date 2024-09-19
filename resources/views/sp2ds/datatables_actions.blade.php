<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}
    </button>

    <div class="dropdown-menu" x-placement="bottom-start">
        <a href="{{ route('sp2d.edit', $sp2d->id) }}" class="dropdown-item">
            <i class="ti ti-edit action-btn"></i>{{ __('Edit') }}
        </a>
        {{-- <div class="dropdown-divider"></div> --}}
        <a href="{{ route('sp2d.index') }}" class="dropdown-item text-danger" data-toggle="tooltip"
            data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $sp2d->id }}')">
            <i class="ti ti-trash action-btn"></i>{{ __('Delete') }}
        </a>
        {!! Form::open(['method' => 'DELETE', 'route' => ['sp2d.destroy', $sp2d->id], 'id' => 'delete-form-' . $sp2d->id]) !!}
        {!! Form::close() !!}
    </div>
</div>

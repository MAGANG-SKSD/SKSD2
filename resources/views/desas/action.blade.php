<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}
    </button>

    <div class="dropdown-menu" x-placement="bottom-start">
        <!-- Edit action -->
        <a href="{{ route('desas.edit', $desa->desa_id) }}" class="dropdown-item">
            <i class="ti ti-edit action-btn"></i>{{ __('Edit') }}
        </a>

        <!-- Delete action -->
        <a href="{{ route('desas.index') }}" class="dropdown-item text-danger" data-toggle="tooltip"
            data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $desa->desa_id }}')">
            <i class="ti ti-trash action-btn"></i>{{ __('Delete') }}
        </a>

        <!-- Form for deletion -->
        {!! Form::open(['method' => 'DELETE', 'route' => ['desas.destroy', $desa->desa_id], 'id' => 'delete-form-' . $desa->desa_id]) !!}
        {!! Form::close() !!}
    </div>
</div>

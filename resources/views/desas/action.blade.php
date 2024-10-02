<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}
    </button>

    <div class="dropdown-menu" x-placement="bottom-start">
        <!-- Ganti $desa->id dengan $desa->desa_id -->
        <a href="{{ route('desas.edit', $desa->desa_id) }}" class="dropdown-item">
            <i class="ti ti-edit action-btn"></i>{{ __('Edit') }}
        </a>

        <!-- Ganti $desa->id dengan $desa->desa_id -->
        <a href="{{ route('desas.index') }}" class="dropdown-item text-danger" data-toggle="tooltip"
            data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $desa->desa_id }}')">
            <i class="ti ti-trash action-btn"></i>{{ __('Delete') }}
        </a>

        <!-- Ganti $desa->id dengan $desa->desa_id -->
        {!! Form::open(['method' => 'DELETE', 'route' => ['desas.destroy', $desa->desa_id], 'id' => 'delete-form-' . $desa->desa_id]) !!}
        {!! Form::close() !!}
    </div>
</div>

<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}
    </button>

    <div class="dropdown-menu" x-placement="bottom-start">
        <button class="dropdown-item" onclick="toggleStatus({{ $realisasi->id }}, {{ $realisasi->status ? 0 : 1 }})">
            <i class="ti ti-toggle-{{ $realisasi->status ? 'on' : 'off' }} action-btn"></i>
            {{ $realisasi->status ? 'Disable' : 'Enable' }}
        </button>
        
        <a href="{{ route('realisasi_anggarans.edit', $realisasi->id) }}" class="dropdown-item">
            <i class="ti ti-edit action-btn"></i>{{ __('Edit') }}
        </a>

        <div class="dropdown-divider"></div>

        <a href="{{ route('realisasi_anggarans.index') }}" class="dropdown-item text-danger" data-toggle="tooltip"
            data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $realisasi->id }}')">
            <i class="ti ti-trash action-btn"></i>{{ __('Delete') }}
        </a>
        
        {!! Form::open(['method' => 'DELETE', 'route' => ['realisasi_anggarans.destroy', $realisasi->id], 'id' => 'delete-form-' . $realisasi->id]) !!}
        {!! Form::close() !!}
    </div>
</div>

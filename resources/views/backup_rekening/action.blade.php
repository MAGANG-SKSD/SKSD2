<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}
    </button>

    <div class="dropdown-menu" x-placement="bottom-start">
        <!-- Ganti $norekening->id dengan ID yang relevan dari model NoRekening -->
        <a href="{{ route('no_rekenings.edit', $noRekening->id) }}" class="dropdown-item">
            <i class="ti ti-edit action-btn"></i>{{ __('Edit') }}
        </a>

        <!-- Ganti $norekening->id dengan ID yang relevan dari model NoRekening -->
        <a href="{{ route('no_rekenings.index') }}" class="dropdown-item text-danger" data-toggle="tooltip"
            data-original-title="{{ __('Delete') }}" onclick="delete_record('delete-form-{{ $noRekening->id }}')">
            <i class="ti ti-trash action-btn"></i>{{ __('Delete') }}
        </a>

        <!-- Ganti $norekening->id dengan ID yang relevan dari model NoRekening -->
        {!! Form::open(['method' => 'DELETE', 'route' => ['no_rekenings.destroy', $noRekening->id], 'id' => 'delete-form-' . $norekening->id]) !!}
        {!! Form::close() !!}
    </div>
</div>

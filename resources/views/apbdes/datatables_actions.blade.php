<div class="dropdown dash-h-item">
    <button class="custom_btn btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __('Action') }}</button>
    <div class="dropdown-menu" x-placement="bottom-start">
        @can('edit-apbdes')
            <a href="{{ route('apbdes.edit', $apbdes->id) }}" class="dropdown-item"><i
                    class="ti ti-edit action-btn"></i>
                {{ __('Edit') }}</a>
        @endcan
        {{--  <div class="dropdown-divider"></div>  --}}
        @can('delete-apbdes')
            <a href="{{ route('apbdes.index') }}" class="dropdown-item text-danger"
                data-toggle="tooltip" data-original-title="{{ __('Delete') }}"
                onclick="delete_record('delete-form-{{ $apbdes->id }}')"><i
                    class="ti ti-trash action-btn"></i>{{ __('Delete') }}</a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['apbdes.destroy', $apbdes->id], 'id' => 'delete-form-' . $apbdes->id]) !!}
            {!! Form::close() !!}
        @endcan
    </div>
</div>

<div class='btn-group'>
    <a href="{{ route('sp2ds.show', $id) }}" class='btn btn-primary btn-sm'>
        <i class="fa fa-eye"></i> {{ __('View') }}
    </a>
    <a href="{{ route('sp2ds.edit', $id) }}" class='btn btn-warning btn-sm'>
        <i class="fa fa-edit"></i> {{ __('Edit') }}
    </a>
    {!! Form::open(['route' => ['sp2ds.destroy', $id], 'method' => 'delete', 'style' => 'display:inline']) !!}
        {!! Form::button('<i class="fa fa-trash"></i> ' . __('Delete'), [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-sm',
            'onclick' => "return confirm('" . __('Are you sure?') . "')"
        ]) !!}
    {!! Form::close() !!}
</div>

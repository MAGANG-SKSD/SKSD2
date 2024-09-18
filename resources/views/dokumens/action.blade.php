<div class='btn-group'>
    <a href="{{ route('dokumens.show', $id) }}" class='btn btn-primary btn-sm'>
        <i class="fa fa-eye"></i> View
    </a>
    <a href="{{ route('dokumens.edit', $id) }}" class='btn btn-warning btn-sm'>
        <i class="fa fa-edit"></i> Edit
    </a>
    {!! Form::open(['route' => ['dokumens.destroy', $id], 'method' => 'delete', 'style' => 'display:inline']) !!}
        {!! Form::button('<i class="fa fa-trash"></i> Delete', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-sm',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    {!! Form::close() !!}
</div>
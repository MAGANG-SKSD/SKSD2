<div class="table-responsive-sm">
    <table class="table table-striped" id="kelompokNorekenings-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>Id Klasifikasi Belanja</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kelompokNorekenings as $kelompokNorekening)
            <tr>
                <td>{{ $kelompokNorekening->nama }}</td>
            <td>{{ $kelompokNorekening->id_klasifikasi_belanja }}</td>
                <td>
                    {!! Form::open(['route' => ['kelompokNorekenings.destroy', $kelompokNorekening->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kelompokNorekenings.show', [$kelompokNorekening->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('kelompokNorekenings.edit', [$kelompokNorekening->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
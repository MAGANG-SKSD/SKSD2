<a href="{{ route('anggaran-kas.edit', $id) }}" class="btn btn-warning btn-sm">
    <i class="ti ti-edit"></i> {{ __('Edit') }}
</a>
<a href="{{ route('anggaran-kas.destroy', $id) }}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-form-{{ $id }}').submit();">
    <i class="ti ti-trash"></i> {{ __('Delete') }}
</a>
<form id="delete-form-{{ $id }}" action="{{ route('anggaran-kas.destroy', $id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

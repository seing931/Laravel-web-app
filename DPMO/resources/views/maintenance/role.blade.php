@extends('components.layout')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

@section('content')
<div class="container">
    <h4 class="mt-3">ROLE ACCESS SETUP</h4>
    <a href="/roledetail" class="btn btn-info mb-3">
        <i class="bi bi-plus-circle"></i> 
    </a>

    <table id="TRoleList" class="table table-hover table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Role Code</th>
                <th>Role Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $index => $role)
            <tr>
                <td class="dt-font">{{ $index + 1 }}</td>
                <td class="dt-font">{{ $role->rolecode }}</td>
                <td class="dt-font">{{ $role->roledesc }}</td>
                <td class="text-center">
                    <a href="{{ route('role.edit', $role->id) }}" class="text-primary">
                        <i class="bi bi-pencil-square" title="Edit"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-danger delete-btn" data-id="{{ $role->id }}">
                        <i class="bi bi-trash" title="Delete"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src = "https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src = "https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script>
    $(document).ready(function(){
        $("#TRoleList").DataTable();
    });

    $('.delete-btn').click(function () {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route("role.delete", "") }}/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        Swal.fire('Deleted!', response.message, 'success').then(() => {
                            location.reload();
                        });
                    },
                    error: function () {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });

</script>
@endpush


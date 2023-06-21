@extends('layouts.app')

@section('content')
    <h1>Customer Management</h1>

    <div class="mb-3">
        <a href="{{ route('customers.create') }}" class="btn btn-success">Add Customer</a>
    </div>
    <table id="samples-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                
                <th>Created At</th>
                <th>Total Points</th>
                <th>Used Points</th>
                <th>Remaining Points</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>

    <script>
        $(function () {
            $('#samples-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('customers.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'surname', name: 'surname'},
                    
                    {data: 'created_at', name: 'created_at'},
                    {data: 'total_points', name: 'total_points'},
                    {data: 'used_points', name: 'used_points'},
                    {data: 'remaining_points', name: 'remaining_points'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}
                ],
                createdRow: function (row, data, dataIndex) {
                    $(row).attr('data-id', data.id);
                }
            });
        });
    </script>
@endsection

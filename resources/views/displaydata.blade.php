@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User list with DataTables</h2>
    <table class="table table-bordered" id="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>lastname</th>
            <th>Email</th>
        </tr>
        </thead>
    </table>
</div>
<script>
    $(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('index') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'lastname', name: 'lastname' },
                { data: 'email', name: 'email' }
            ]
        });
    });
</script>
@endsection

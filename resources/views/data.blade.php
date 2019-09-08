@section('headscripts')
{{--    <script src="//code.jquery.com/jquery-1.12.3.js"></script>--}}
{{--    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>--}}
{{--    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">--}}


{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
{{--    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
{{--    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.css">--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.js"></script>--}}
@endsection

@extends('layouts.app')



@section('content')
    {{ csrf_field() }}
    <div class="container">
        @if(isset($data))
            <h2>Sample User details</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $dummy)
                    <tr>
                        <td>{{$dummy->id}}</td>
                        <td>{{$dummy->name}}</td>
                        <td>{{$dummy->lastname}}</td>
                        <td>{{$dummy->email}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $data->render() !!}@endif
    </div>
@endsection

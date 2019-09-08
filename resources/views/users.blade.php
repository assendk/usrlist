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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                placeholder="Search users">
                <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search">Search</span>
					</button>
				</span>
            </div>
        </form>
    </div>
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
        @elseif (Session::has('error'))
            <div class="alert alert-warning" role="alert">
                {{Session::get('error')}}
            </div>
        @endif

    </div>
    <div class="container">
        @if(isset($users))
            <h2>Sample User details</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>@sortablelink('id')</th>
                    <th>@sortablelink('name')</th>
                    <th>@sortablelink('lastname')</th>
                    <th>@sortablelink('email')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $udata)
                    <tr>
                        <td>{{$udata->id}}</td>
                        <td>{{$udata->name}}</td>
                        <td>{{$udata->lastname}}</td>
                        <td>{{$udata->email}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {!! $users->render() !!}
            @else
            {{ $message }}
        @endif
    </div>
{{--    --}}
@endsection

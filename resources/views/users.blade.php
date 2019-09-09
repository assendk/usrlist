@section('headscripts')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>User List with kyslik (bugged)</h2>
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
    <br>
    <div class="container">
        @if(isset($users))

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

@section('headscripts')
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

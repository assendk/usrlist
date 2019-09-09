@section('headscripts')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bootgrid/1.3.1/jquery.bootgrid.min.js"></script>--}}
@endsection

@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="container">
                @if($errors)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <div class="row justify-content-center">

                    <div class="profile-header-container">
                        <div class="profile-header-img">
                            <img style="width: 128px; height: auto; max-height: 256px"
                                 class="rounded-circle" src="/avatars/{{ $user->avatar }}"/>
                            <!-- badge -->
                            <div class="rank-label-container">
                                <span class="label label-default rank-label">{{$user->name}}</span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="align-content-center">
                    <form action="/profile-pic" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="avatar" id="avatarFile"
                                   aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">Please upload a valid image
                                file. Size of image should not be more than 2MB.
                            </small>
                        </div>
                        <button type="submit" class="btn btn-primary">Set</button>
                    </form>
                </div>

            </div>

        </div>
        <div class="col-lg-4 col-md-4">
            <div class="container">



            <h2>Profile</h2>


            {!! Form::model($user, ['route' => ['profile.update'], 'method' => 'POST']) !!}
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                </div>
            </div>

            <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                    {!! Form::text('lastname', null, ['class' => 'form-control', 'id' => 'lastname']) !!}
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
                </div>
            </div>

            <div class="form-group row ">
                {!! Form::label('password') !!}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input name="password" type="password" class="form-control" value="" id="password"/>
                </div>
                <span id="helpBlock" class="help-block">If no change, leave blank.</span>
            </div>
            <div class="form-group row ">
                {!! Form::label('password_confirmation') !!}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input name="password_confirmation" type="password" class="form-control" value="" id="password_confirmation"/>
                </div>
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>



@endsection
    {{ csrf_field() }}
{{--<form method="post" action="{{route('profile.edit', $user)}}">--}}
{{--    {{ csrf_field() }}--}}
{{--    {{ method_field('patch') }}--}}

{{--    <input type="text" name="name"  value="{{ $user->name }}" />--}}

{{--    <input type="text" name="name"  value="{{ $user->lastname }}" />--}}

{{--    <input type="email" name="email"  value="{{ $user->email }}" />--}}

{{--    <input type="password" name="password" />--}}

{{--    <input type="password" name="password_confirmation" />--}}

{{--    <button type="submit">Send</button>--}}
{{--</form>--}}

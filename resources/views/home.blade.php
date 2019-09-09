@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Use this command to populate `users` table with 100 random users</p>
                    <code>php artisan db:seed --class=UsersTableSeeder</code>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

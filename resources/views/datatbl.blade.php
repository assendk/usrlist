<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <h2>Index Page</h2>
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

        @foreach($datas as $udata)
            <tr>
                <td>{{$udata->id}}</td>
                <td>{{$udata->name}}</td>
                <td>{{$udata->lastname}}</td>
                <td>{{$udata->email}}</td>
                </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $datas->appends(\Request::except('page'))->render() !!}
</div>
</body>
</html>

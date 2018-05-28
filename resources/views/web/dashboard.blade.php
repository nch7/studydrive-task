@extends('/web/layouts/main')
@section('content')
    <div class="container col-6">
        <table class="table">
            <tbody>
            <tr>
                <td>ID</td>
                <td>{{$user->id}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>{{$user->status}}</td>
            </tr>
            <tr>
                <td></td>
                <td><a href="{{route('logout')}}">Logout</a></td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
@extends('/web/layouts/main')
@section('content')
    <div class="container">
        <div class="col-6 offset-md-3 mt-4">
            <form class="form-signin" action="/" method="post">
                <input name="_token" type="hidden" value="{{csrf_token()}}">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" autofocus>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                </div>
                <di class="form-group">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                </di>
            </form>
        </div>
    </div>
@endsection
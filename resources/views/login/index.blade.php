@extends ('_inc/base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 col-12">
                <div class="card pad-20">
                    <h2 class="text-center">Welcome Back</h2>
                    @if (isset($message))
                        <div class="alert alert-{{ $message['type'] }}" role="alert">
                            {{ $message['body'] }}
                        </div>
                    @else
                        <br>
                    @endif
                    <form action="{{ site_url().'login' }}" method="post">
                        <div class="form-group">
                            <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="input-group mb-3">
                            <input required name="password" type="password" class="form-control" placeholder="Password" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-show" type="button"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>
                        <a href="#">Forgot password? click here</a><br><br>
                        <button type="submit" class="btn btn-success">Login</button>
                        <a class="btn btn-default" href="{{ site_url().'signup' }}">Sign up instead</a>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection
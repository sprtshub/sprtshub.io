@extends ('_inc/base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 col-12">
                <div class="card pad-20">
                    <h2 class="text-center">Sign Up</h2>
                    @if (isset($message))
                        <div class="alert alert-{{ $message['type'] }}" role="alert">
                            {{ $message['body'] }}
                        </div>
                    @endif
                    <form action="{{ site_url().'signup' }}" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Steemit</label>
                            <input required name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Steemit username">
                        </div>
                        <div class="input-group mb-3">
                            <input required pattern=".{51,51}" title="Please use your correct private posting key" name="key" type="password" class="form-control" placeholder="Private posting key" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-show" type="button"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">General</label>
                            <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="input-group mb-3">
                            <input required pattern=".{5,}" title="Minimum is 5 characters" name="password" type="password" class="form-control" placeholder="Password" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-show" type="button"><i class="fa fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="form-check">
                            <input required type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">I accept the terms and conditions</label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Join now</button>
                        <a href="{{ site_url('login') }}" class="btn btn-default">Sign in instead</a>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection
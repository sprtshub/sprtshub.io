@extends ('_inc/base')

@section('content')
    <div class="container">
        <div class="row">
            @include('_inc/sidenav')
            <div class="col-sm-6 col-12">

            </div>
            <div class="col-sm-3">
                @if ($user)

                @else
                    <div class="card pad-10" style="margin-bottom:15px;">
                        <p>Login to view balance</p>
                        <button class="btn btn-primary">Login now</button>
                    </div>
                @endif
                <div class="card pad-10">
                    <p class="text-center"><b>Latest Scores</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection
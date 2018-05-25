@extends ('_inc/base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3 hidden-m">

            </div>
            <div class="col-sm-6 col-12">
                @if (count($pending) !== 0)
                    @foreach($pending as $post)
                        <div class="card mb-3">
                            <div class="card-img-top post-image" style="height:10px; background-color: {{ rand_color() }}"></div>
                            <div class="card-body">
                                <a href="" class="no-decoration post-title">
                                    <h5 class="card-title">{{ ucfirst($post->title) }}</h5>
                                </a>
                                <p class="card-text pending" data-markdown="{{ $post->body }}"></p>
                                @foreach($post->tags as $key => $tag)
                                    <span class="badge badge-{{ rand_class($key) }}">{{ $tag }}</span>
                                @endforeach
                                <br><br>
                                <small class="card-text">Status: <span class="text-warning">Awaiting approval</span></small>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card text-center">
                        <div class="pad-20">
                            <img src="https://png.icons8.com/cotton/80/000000/mission-of-a-company.png">
                            <p class="mb-0 text-muted">You have no post pending approval</p>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-sm-3 hidden-m">

            </div>
        </div>
    </div>
@endsection
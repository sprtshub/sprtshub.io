@extends ('_inc/base')

@section('content')
    <div class="container">
        <div class="row">
            @include('_inc/sidenav')
            <div class="col-sm-4 col-12">
                @if (count($pending) !== 0)
                    @foreach($pending as $post)
                        <div class="card mb-3">
                            <div class="card-img-top post-image" style="height:10px; background-color: {{ rand_color() }}"></div>
                            <div class="card-body">
                                <a href="javascript:;" class="no-decoration post-title pendingTitle">
                                    <h5 class="card-title">{{ ucfirst($post->title) }}</h5>
                                </a>
                                <p class="card-text pending" data-markdown="{{ $post->body }}"></p>
                                @foreach($post->tags_array as $key => $tag)
                                    <span class="badge badge-{{ rand_class($key) }}">{{ $tag }}</span>
                                @endforeach
                                <br><br>
                                <small class="card-text"><a target="_blank" href="{{ site_url().'profile/@'.$post->steem_username }}" class="text-primary">{{ $post->steem_username }}</a> ({{ timeAgo($post->created_at) }})</small>
                            </div>
                            <template>
                                <h5>{{ $post->title }}</h5>
                                <div class="m-b-20">
                                    @foreach($post->tags_array as $key => $tag)
                                        <span class="badge badge-{{ rand_class($key) }}">{{ $tag }}</span>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-sm-2 col-3 z-r-p">
                                        <img class="profile-dp-s" src="{{ 'https://steemitimages.com/u/'.$post->steem_username.'/avatar/small' }}" onerror="this.src='{{ base_url().'img/user.png' }}'"/>
                                    </div>
                                    <div class="col-sm-8 col-9 z-l-p">
                                        <a target="_blank" href="{{ site_url().'profile/@'.$post->steem_username }}" class="no-decoration post-title">
                                            <h5 id="author" class="z-m-b post-title">{{ $post->steem_username }}</h5>
                                        </a>
                                        <p class="text-muted text-15">Posted {{ timeAgo($post->created_at) }}</p>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                                <hr>
                                <div data-author="{{ $post->steem_username }}" data-id="{{ $post->id }}" data-assurance="{{ $post->posting_key }}" class="w-100 post-viewer-p markdownHTML" data-tags="{{ $post->tags }}" data-title="{{ $post->title }}" data-markdown="{{ $post->body }}"></div>
                            </template>
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
            <div class="col-sm-5">
                <div id="pendingBody" class="card pad-20 post-viewer post-viewer-p"></div>
            </div>
        </div>
    </div>
@endsection
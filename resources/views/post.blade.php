@extends ('_inc/base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-7">
                <div class="card">
                    <div class="pad-20">
                        <h3>{{ $postData->title }}</h3>
                        <div class="m-b-20">
                            @foreach($postData->json_metadata->tags as $key => $tag)
                                <span class="badge badge-{{ rand_class($key) }}">{{ $tag }}</span>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-sm-2 col-3 z-r-p">
                                <img class="profile-dp" src="{{ 'https://steemitimages.com/u/'.$postData->author.'/avatar/small' }}" onerror="this.src='{{ base_url().'img/user.png' }}'"/>
                            </div>
                            <div class="col-sm-8 col-9 z-l-p">
                                <div class="user-info">
                                    <a href="{{ site_url().'profile/@'.$postData->author }}" class="no-decoration post-title">
                                        <h5 id="author" class="z-m-b post-title card-title">{{ $postData->author }}</h5>
                                    </a>
                                    <p id="permlink" hidden>{{ $postData->permlink }}</p>
                                    <p class="text-muted text-15">Posted {{ timeAgo($postData->created) }}</p>
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>
                        <hr>
                        <div class="w-100 post-viewer markdownHTML" data-markdown="{{ $postData->body }}"></div>
                        <hr>
                        <div>
                            <p class="text-muted"><i class="fa fa-clock-o"></i> Posted {{ timeAgo($postData->created) }}</p>
                            <p class="card-text">
                                @if (!isset($user->email))
                                    <a href="{{ site_url().'login' }}" class="btn btn-outline-light font-weight-bold text-primary pr-15 no-decoration action-btn">
                                        <i class="pe-7s-like2"></i> {{ $postData->net_votes }}
                                    </a>
                                @else
                                    @if(in_array($user->steem_username, $voters))
                                        <a href="javascript:" class="btn btn-outline-light font-weight-bold text-primary pr-15 no-decoration upvoted action-btn">
                                            <img src="{{ base_url().'img/loading.gif' }}" class="hide" style="max-height: 100%;"/>
                                            <span><i class="pe-7s-like2"></i> {{ $postData->net_votes }}</span>
                                        </a>
                                    @else
                                        <a href="javascript:" class="btn btn-outline-light font-weight-bold text-primary pr-15 no-decoration up-vote action-btn" data-key="{{ $user->posting_key }}" data-author="{{ $postData->author }}" data-permlink="{{ $postData->permlink }}" data-user="{{ $user->steem_username }}">
                                            <img src="{{ base_url().'img/loading.gif' }}" class="hide" style="max-height: 100%;"/>
                                            <span><i class="pe-7s-like2"></i> {{ $postData->net_votes }}</span>
                                        </a>
                                    @endif
                                @endif
                                <a class="btn btn-outline-light no-decoration font-weight-bold text-primary action-btn" href="#">
                                    <i class="pe-7s-comment"></i> {{ $postData->children }}
                                </a>
                                <span class="font-weight-bold text-muted text-15 pull-right payout">${{ number_format((float)$postData->pending_payout_value, 2, '.', '') }}</span>
                            </p>
                            <p class="text-20 font-weight-bold">Comments</p>
                            <div id="commentBody"></div>
                        </div>
                    </div>
                </div>
            </div>
            @include('_inc/sidebar')
        </div>
    </div>
@endsection
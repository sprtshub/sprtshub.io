@if ($posts)
    @foreach($posts as $key=>$post)
        @if ($key == '3')
            <div class="desktop-remove mb-3">
                <a href="{{ site_url() }}">
                    <img style="width:100%" src="{{ base_url().'img/prediction.png' }}"/>
                </a>
            </div>
        @endif
        <div class="card mb-3">
            @if ($post['cover'] != '' && isset($post['url']))
                <a href="{{ site_url().'post/'.prepareLink($post['url']) }}" class="no-decoration post-title">
                    <div class="card-img-top post-image" style="background-image:url({{ $post['cover'] }})"></div>
                </a>
            @else
                <div class="card-img-top post-image" style="height:10px; background-color: {{ rand_color() }}"></div>
            @endif
            <div class="card-body">
                @if (isset($post['url']))
                    <a href="{{ site_url().'post/'.prepareLink($post['url']) }}" class="no-decoration post-title">
                        <h5 class="card-title">{{ ucfirst($post['title']) }}</h5>
                    </a>
                @endif
                <p class="card-text">{{ $post['body'] }}...</p>
                @foreach($post['tags'] as $key => $tag)
                    <span class="badge badge-{{ rand_class($key) }}">{{ $tag }}</span>
                @endforeach
                <p class="card-text mt-10"><a class="text-15 font-weight-bold" href="{{ site_url().'profile/@'.$post['author'] }}">- {{ $post['author'] }} <small class="text-muted">({{ timeAgo($post['created']) }})</small></a></p>
                <p class="card-text">
                    @if (!isset($user->email))
                        <a href="{{ site_url().'login' }}" class="btn btn-outline-light font-weight-bold text-primary pr-15 no-decoration action-btn">
                            <i class="pe-7s-like2"></i> {{ $post['net_votes'] }}
                        </a>
                    @else
                        @if(in_array($user->steem_username, $post['voters']))
                            <a href="javascript:" class="btn btn-outline-light font-weight-bold text-primary pr-15 no-decoration upvoted action-btn">
                                <img src="{{ base_url().'img/loading.gif' }}" class="hide" style="max-height: 100%;"/>
                                <span><i class="pe-7s-like2"></i> {{ $post['net_votes'] }}</span>
                            </a>
                        @else
                            <a href="javascript:" class="btn btn-outline-light font-weight-bold text-primary pr-15 no-decoration up-vote action-btn" data-key="{{ $user->posting_key }}" data-author="{{ $post['author'] }}" data-permlink="{{ $post['permlink'] }}" data-user="{{ $user->steem_username }}">
                                <img src="{{ base_url().'img/loading.gif' }}" class="hide" style="max-height: 100%;"/>
                                <span><i class="pe-7s-like2"></i> {{ $post['net_votes'] }}</span>
                            </a>
                        @endif
                    @endif
                    <a class="btn btn-outline-light no-decoration font-weight-bold text-primary action-btn">
                        <i class="pe-7s-comment"></i> {{ $post['children'] }}
                    </a>
                    @if ($post['last_payout'] == '1970-01-01T00:00:00')
                        <span class="font-weight-bold text-muted text-15 pull-right payout">${{ number_format(round((float)$post['pending_payout_value'], 2), 2, '.', '') }}</span>
                    @else
                        <span class="font-weight-bold text-muted text-15 pull-right payout">${{ number_format(round((float)$post['total_payout_value']+(float)$post['curator_payout_value'], 2), 2, '.', '') }}</span>
                    @endif
                </p>
            </div>
        </div>
    @endforeach
@else
    <div class="card text-center">
        <div class="pad-20">
            <img src="https://png.icons8.com/ultraviolet/100/000000/news.png">
            <p class="mb-0 text-muted">No feeds to show</p>
        </div>
    </div>
@endif
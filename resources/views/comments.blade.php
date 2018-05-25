@if ($comments)
    @foreach($comments as $key=> $comment)
        <div class="row">
            <div class="col-sm-1 col-2">
                <img class="profile-dp-s" src="{{ 'https://steemitimages.com/u/'.$comment['author'].'/avatar/small' }}" onerror="this.src='{{ base_url().'img/user.png' }}'"/>
            </div>
            <div class="col-sm-11 col-10">
                <a href="{{ site_url().'profile/@'.$comment['author'] }}" class="no-decoration post-title">
                    <p class="card-title"><strong>{{ $comment['author'] }}</strong> <small class="text-muted pull-right">{{ timeAgo($comment['created']) }}</small></p>
                </a>
                {{--<p>{{ $comment['body'] }}</p>--}}
                <div class="commentMarkdown" data-markdown="{{ $comment['body'] }}"></div>
            </div>
        </div>
    @endforeach
@else
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 text-center">
            <p class="text-muted font-italic"><i class="pe-7s-chat text-20"></i> No comment on this post yet</p>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endif
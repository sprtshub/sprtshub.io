@extends ('_inc/base')

@section('content')
    @if ($person == 'null')
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>'{{ '@'.$id }}' is not registered with <a target="_blank" href="https://sprtshub.io">sprtshub.io</a></p>
                    <a style="font-size: 12px !important;color:white" href="{{ site_url() }}" class="btn btn-primary">Head back to home</a>
                </div>
            </div>
        </div>
    @else
        <div id="feed-loader" class="hide">
            <div class="card">
                <div class="timeline-wrapper">
                    <div class="timeline-item">
                        <div class="animated-background">
                            <div class="background-masker header-top"></div>
                            <div class="background-masker header-left"></div>
                            <div class="background-masker header-right"></div>
                            <div class="background-masker header-bottom"></div>
                            <div class="background-masker subheader-left"></div>
                            <div class="background-masker subheader-right"></div>
                            <div class="background-masker subheader-bottom"></div>
                            <div class="background-masker content-top"></div>
                            <div class="background-masker content-first-end"></div>
                            <div class="background-masker content-second-line"></div>
                            <div class="background-masker content-second-end"></div>
                            <div class="background-masker content-third-line"></div>
                            <div class="background-masker content-third-end"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-cover" @if (!isset($person->json_metadata->profile->cover_image))
        style="background-image: url({{base_url().'img/greenbanner.png'}})">
            @else style="background-image: url({{ $person->json_metadata->profile->cover_image }}), url({{base_url().'img/greenbanner.png'}})">@endif
            <div class="p-4 mobile-left-right-trim">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-1 col-3">
                            <img class="profile-dp dashed-border" src="{{ 'https://steemitimages.com/u/'.$person->name.'/avatar' }}" onerror="this.src='{{ base_url().'img/user.png' }}'"/>
                        </div>
                        <div class="col-sm-11 col-9">
                            @if (isset($person->json_metadata->profile->signature))
                                <h2 class="post-title text-white">{{ $person->json_metadata->profile->signature }} <span class="badge badge-light text-half">Light</span></h2>
                            @else
                                <h2 class="post-title text-white">{{ $person->name }}
                                    <span class="badge badge-light text-half">
                                    @if ($blockchain->reputation < 10)
                                            beginner
                                        @elseif ($blockchain->reputation >= 10 && $blockchain->reputation < 20)
                                            professional
                                        @elseif ($blockchain->reputation >=20)
                                            veteran
                                        @endif
                                </span>
                                </h2>
                            @endif
                        </div>
                        <p id="author" hidden>{{ $person->name }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container desktop-remove">
            <div class="row" style="background-color: white">
                <div class="col-12">
                    <div class="profile-sidebar pad-20">
                        @if (isset($person->json_metadata->profile->about))
                            <p class="">{{ $person->json_metadata->profile->about }}</p>
                        @endif
                        <p class="mb-5"><i class="pe-7s-clock"></i> Joined {{ timeAgo($person->created) }}</p>
                        <p class="mb-5"><i class="pe-7s-comment"></i> Posted {{ number_format($person->post_count) }} times</p>
                        <p class="mb-5"><i class="pe-7s-medal"></i> Voting Power: {{ round($person->voting_power / 100) }}%</p>
                        @if (isset($user->email) && ($user->steem_username == $person->name))
                        @else
                            <hr>
                            <button class="btn btn-success">Follow user</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-anchor"></div>
        <div class="card-special remove-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 hidden-m"></div>
                    <div class="col-sm-6">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <ul class="nav nav-tabs no-border">
                                    <li id="userPosts" class="sec-nav active">
                                        <a href="" data-toggle="tab" class="profile-nav">
                                            <i class="pe-7s-keypad"></i>
                                            Posts
                                        </a>
                                    </li>
                                    <li id="userPredict" class="sec-nav m-l-a">
                                        <a href="" data-toggle="tab" class="profile-nav">
                                            <i class="pe-7s-magic-wand"></i>
                                            Predict
                                        </a>
                                    </li>
                                    <li id="userWallet" class="sec-nav m-l-a">
                                        <a href="" data-toggle="tab" class="profile-nav">
                                            <i class="pe-7s-credit"></i>
                                            Wallet
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 hidden-m"></div>
                </div>
            </div>
        </div>
        <div class="container shifted-content">
            <div class="row">
                <div class="col-sm-3 hidden-m">
                    <div id="sticky-anchor"></div>
                    <div class="profile-sidebar2">
                        @if (isset($person->json_metadata->profile->about))
                            <p class="text-muted">{{ $person->json_metadata->profile->about }}</p>
                        @endif
                        <p class="text-muted mb-5"><i class="pe-7s-clock"></i> Joined {{ timeAgo($person->created) }}</p>
                        <p class="text-muted mb-5"><i class="pe-7s-comment"></i> Posted {{ number_format($person->post_count) }} times</p>
                        <p class="text-muted mb-5"><i class="pe-7s-medal"></i> Voting Power: {{ round($person->voting_power / 100) }}%</p>
                        @if (isset($user->email) && ($user->steem_username == $person->name))
                        @else
                            <hr>
                            <button class="btn btn-success">Follow user</button>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="profile_content" class="prof-nav"></div>
                    <div id="user_wallet" class="prof-nav hide">
                        <div class="card muted">
                            <div class="pad-10">
                                <p><b>Steemit Balance</b></p>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p>STEEM Balance:</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <p class="pull-right">{{ $person->balance }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 col-7">
                                        <p>SBD Balance:</p>
                                    </div>
                                    <div class="col-md-4 col-5">
                                        <p class="pull-right">{{ $person->sbd_balance }}</p>
                                    </div>
                                </div>
                                <p><b>SprtsHub Balance</b></p>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8 col-8">
                                        <p style="margin-bottom:0;">SprtsHub Reputation:</p>
                                        <small>A score used to measure a user's interaction rate on sprtshub by posting and commenting regularly.</small>
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <p class="pull-right">{{ $blockchain->reputation }}
                                            @if ($blockchain->reputation < 10)
                                                (beginner)
                                            @elseif ($blockchain->reputation >= 10 && $blockchain->reputation < 20)
                                                (professional)
                                            @elseif ($blockchain->reputation >=20)
                                                (veteran)
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-8 col-8">
                                        <p style="margin-bottom:0;">SprtsCoin:</p>
                                        <small>Tradeable media token used within SprtsHub for rewarding interaction and involvement.</small>
                                        @if (isset($user->email) && ($user->steem_username == $person->name))
                                            <br><button style="font-size: 12px !important;" class="btn btn-outline-primary" data-toggle="modal" data-target="#transferModal">Transfer</button>
                                            <!-- Transfer Modal -->
                                            <div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Transfer</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ site_url().'login' }}" method="post">
                                                                <div class="form-group">
                                                                    <input required name="recipient" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Recipient username">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input required name="amount" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter quantity">
                                                                    <small href="#">Your balance is 2 SPC</small>
                                                                </div>
                                                                <div class="input-group mb-3">
                                                                    <input required name="password" type="password" class="form-control" placeholder="Password" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-secondary btn-show" type="button"><i class="fa fa-eye"></i></button>
                                                                    </div>
                                                                </div>
                                                                {{ csrf_field() }}
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Transfer now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <p class="pull-right">{{ $blockchain->coin_bal }} SPC(0 SBD)</p>
                                    </div>
                                </div>
                                <br>
                                <p>History</p>
                                <hr>
                                <div class="row">
                                    @foreach($transactions as $trx)
                                        <div class="col-md-3 col-3">
                                            <small>{{ timeAgo($trx->created_at) }}</small>
                                        </div>
                                        <div class="col-md-5 col-5">
                                            <small>{{ $trx->amount }} {{ $trx->type }}</small>
                                        </div>
                                        <div class="col-md-4 col-4">
                                            <small>{{ $trx->description }}</small>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 hidden-m">
                    <div class="profile-sidebar card text-center pad-20">
                        <h5>New to SprtsHub?</h5>
                        <p>SprtsHub is a decentralized system where contributors get rewarded for their content.</p>
                        <a class="btn btn-outline-primary text-primary">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
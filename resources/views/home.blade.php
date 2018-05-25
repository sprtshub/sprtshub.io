@extends ('_inc/base')

@section('content')
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
    <div class="container">
        <div class="row">
            @include('_inc/sidenav')
            <div class="col-sm-6 col-12">
                <div class="tabbable-panel">
                    <div class="tabbable-line">
                        <ul class="nav nav-tabs ">
                            <li id="allFeed" class="sec-nav">
                                <a href="#all_feed" data-toggle="tab">
                                    <i class="pe-7s-keypad"></i>
                                    All
                                </a>
                            </li>
                            <li id="predictionFeed" class="sec-nav m-l-a">
                                <a href="#prediction_feed" data-toggle="tab">
                                    <i class="pe-7s-magic-wand"></i>
                                    Football
                                </a>
                            </li>
                            <li id="resultsFeed" class="sec-nav m-l-a">
                                <a href="#results_feed" data-toggle="tab">
                                    <i class="pe-7s-edit"></i>
                                    SprtsHub
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="all_feed" class="tab-pane"></div>
                            <div class="tab-pane" id="prediction_feed"></div>
                            <div class="tab-pane" id="results_feed"></div>
                        </div>
                    </div>
                </div>
            </div>
            @include('_inc/sidebar')
        </div>
    </div>
@endsection
<div class="col-sm-3 hidden-m">
    <div class="card pad-10 anchor">
        <a class="sidebar-a" href="{{ site_url() }}">
            <div class="seg @if ($page == 'home') active @endif">
                <i class="pe-7s-pen text-success text-20"></i>
                <p>Posts</p>
            </div>
        </a>
        <a class="sidebar-a" href="{{ site_url().'predictions' }}">
            <div class="seg @if ($page == 'prediction') active @endif">
                <i class="pe-7s-magic-wand text-success text-20"></i>
                <p>Predictions</p>
            </div>
        </a>
        <a class="sidebar-a" href="{{ site_url() }}">
            <div class="seg">
                <i class="pe-7s-flag text-success text-20"></i>
                <p>Guidelines (under dev)</p>
            </div>
        </a>
        <a class="sidebar-a" href="{{ site_url() }}">
            <div class="seg">
                <i class="pe-7s-help2 text-success text-20"></i>
                <p>Help (under dev)</p>
            </div>
        </a>
    </div>
    @if ($user && $user->clearance == 1)
        <div class="card pad-10 anchor" style="margin-top:230px;">
            <p class="text-center"><b>Admin Control</b></p>
            <a class="sidebar-a" href="{{ site_url().'admin/pending' }}">
                <div class="seg @if ($page == 'admin_pending') active @endif">
                    <i class="pe-7s-look text-danger text-20"></i>
                    <p>Unapproved posts</p>
                </div>
            </a>
            <a class="sidebar-a" href="{{ site_url().'predictions' }}">
                <div class="seg">
                    <i class="pe-7s-magic-wand text-danger text-20"></i>
                    <p>All Predictions</p>
                </div>
            </a>
        </div>
    @endif
</div>
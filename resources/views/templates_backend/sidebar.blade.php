<aside class="main-sidebar sidebar-light-primary elevation-4">
    <center>
        <a href="{{ url('/home') }}" class="brand-link">
            <span class="brand-text font-weight-light text-center"><b class="text-center">Admin Panel</b></span>
        </a>
    </center>
    <div class="sidebar">
        <div class="form-inline mt-3">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item @if(Route::currentRouteName() == 'home') active @endif">
                    <a href="{{ url('/home') }}" class="nav-link">
                        <i class="fas fa-tachometer-alt nav-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item @if(Route::currentRouteName() == 'crowd_funding.index') active @endif">
                    <a href="#" class="nav-link">
                        <i class="fas fa-crow nav-icon"></i>
                        <p>
                            Crowd Funding
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('crowd_funding.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List Crowd Funding</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if(Route::currentRouteName() == 'banner.index' || Route::currentRouteName() == 'post.index') active @endif">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs nav-icon"></i>
                        <p>
                            CMS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item @if(Route::currentRouteName() == 'banner.index') active @endif">
                            <a href="{{ route('banner.index') }}" class="nav-link">
                                <i class="fas fa-image nav-icon"></i>
                                <p>Banner</p>
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteName() == 'post.index') active @endif">
                            <a href="{{ route('post.index') }}" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>Post</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if(Route::currentRouteName() == 'adminOrder.index' || Route::currentRouteName() == 'confirm_user' || Route::currentRouteName() == 'success') active @endif">
                    <a href="#" class="nav-link">
                        <i class="fas fa-handshake nav-icon"></i>
                        <p>
                            Transaksi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item @if(Route::currentRouteName() == 'adminOrder.index') active @endif">
                            <a href="{{ route('adminOrder.index') }}" class="nav-link">
                                <i class="fas fa-hand-holding-usd nav-icon"></i>
                                <p>Pending</p>
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteName() == 'confirm_user') active @endif">
                            <a href="{{ url('confirm_user') }}" class="nav-link">
                                <i class="fas fa-user-check nav-icon"></i>
                                <p>Konfirmasi User</p>
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteName() == 'success') active @endif">
                            <a href="{{ url('success') }}" class="nav-link">
                                <i class="fas fa-check-circle nav-icon"></i>
                                <p>Success</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if(Route::currentRouteName() == 'templates_pesan.index') active @endif">
                    <a href="#" class="nav-link">
                        <i class="fab fa-whatsapp nav-icon"></i>
                        <p>
                            WhatsApp
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('templates_pesan.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>List WhatsApp Templates</p>
                            </a>
                        </li>
                        <!-- Add more WhatsApp-related menu items as needed -->
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
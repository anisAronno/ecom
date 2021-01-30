    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
                        <li class="nav-item mt-3">ADMIN</li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item"><a href="{{ url('/logout') }}" class="btn btn-sm btn-primary">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider mt-0" style="margin-bottom: 5px"></li>
                        <li> <a href="{{ url('/') }}"><span> <i class="fas fa-home"></i> </span><span class="hide-menu">Home</span></a></li>
                        <li> <a href="{{ url('/admin') }}"><span> <i class="fas fa-user"></i> </span><span class="hide-menu">Admin</span></a></li>
                        <li> <a href="{{ url('/visitor') }}"><span> <i class="fas fa-users"></i> </span><span class="hide-menu">Visitor</span></a></li>
                        <li> <a href="{{ url('/contact') }}"><span> <i class="fas fa-mail-bulk"></i> </span><span class="hide-menu">Contact</span></a></li>
                        <li> <a href="{{ url('/category') }}"><span> <i class="fas fa-server"></i> </span><span class="hide-menu">Category</span></a></li>
                        <li> <a href="{{ url('/brand') }}"><span> <i class="fas fa-suitcase"></i> </span><span class="hide-menu">Brnad</span></a></li>
                        <li> <a href="{{ url('/products') }}"><span> <i class="fas fa-plus-circle"></i> </span><span class="hide-menu">Products</span></a></li>
                        <li> <a href="{{ url('/order') }}"><span> <i class="fas fa-suitcase"></i> </span><span class="hide-menu">Orders</span></a></li>
                        {{-- <li> <a href="{{ url('/order_details') }}"><span> <i class="fas fa-plus-circle"></i> </span><span class="hide-menu">Order Details</span></a></li> --}}
                        <li> <a href="{{ url('/slider') }}"><span> <i class="fas fa-image"></i> </span><span class="hide-menu">Slider</span></a></li>
                        <li> <a href="{{ url('/others') }}"><span> <i class="fas fa-cog"></i> </span><span class="hide-menu">Generale Settings</span></a></li>
                        <li> <a href="{{ url('/social') }}"><span> <i class="fas fa-thumbs-up"></i> </span><span class="hide-menu">Social Settings</span></a></li>
                        <!-- <li> <a href="{{ url('/message') }}"><span> <i class="fas fa-envelope"></i> </span><span class="hide-menu">Messages</span></a></li>
                        <li> <a href="{{ url('/review') }}"><span> <i class="fas fa-comments"></i> </span><span class="hide-menu">Review</span></a></li>
                        <li> <a href="{{url('/Photo')}}"><span> <i class="far fa-comments"></i> </span><span class="hide-menu">Photo Gallery</span></a></li> -->
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">

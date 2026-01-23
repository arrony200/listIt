<header class="main-header header-style-1 {{ request()->routeIs('home') ? 'home-header' : 'general-header' }}">
    <div class="header-lower">
    <div class="container">
    <div class="outer-box">
            <div class="logo-box">
                <div class="logo">
                    <a href="{{route('home')}}"><img src="/img/logo-black.svg"></a>
                </div>
            </div>
            <div class="menu-area">
                <div class="mobile-nav-toggler">
                    <i class="las la-bars"></i>
                </div>
                <nav class="main-menu navbar-expand-md navbar-light">
                    <ul id="menu-primary-menu" class="navigation clearfix">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('properties')}}">Listing</a></li>
                        <li><a href="{{route('properties')}}?type=0">Land</a></li>
                        <li><a href="{{route('properties')}}?type=1">Apartment</a></li>
                        <li><a href="{{route('properties')}}?type=2">{{__('Villa')}}</a></li>

                        <li class="menu-item-has-children"><a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('categories')}}">Categories</a></li>
                                <li><a href="{{route('pricing')}}">Pricing</a></li>
                                <li><a href="{{route('page','about-us')}}">About Us</a></li>
                                <li><a href="{{route('page','about-us')}}">Blog</a></li>
                            </ul>
                        </li>

                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="btn-box">
                <a href="{{route('home')}}" class="sign-in bgvg"><i class="las la-user"></i>Sign In</a>
                <div class="lang">
                    <span>EN</span>
                    <ul>
                        <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}">EN</a></li>
                        <li><a href="{{ LaravelLocalization::getLocalizedURL('tr') }}">TR</a></li>
                        <li><a href="#">FR</a></li>
                    </ul>
                </div>
                <a href="https://listit.smartdemowp.com/login-page/" class="theme-btn-one">Post Your Ads</a>
            </div>
    </div>
    </div>
    </div>
</header>

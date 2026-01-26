<x-guest-layout>
    <section class="page-title page-breadcrumb">
        <div class="container">
            <div class="content-box centred">
                <div class="title">
                    <h1>Pricing Plan</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to ListIt." href="{{route('home')}}" class="home"><span property="name">Home</span></a><meta property="position" content="1"></span></li><li>/</li><li>All Categories</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="pricing-section sec-pad ">
        <div class="container">
            <div class="sec-title">
                <h2>The Right Plan for Your Business</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing<br> sed do eiusmod tempor incididunt labore</p>
            </div>
            <div class="tabs-box">
                <div class="tab-btn-box centred">
                    <ul class="tab-btns tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#pricing1tab-1">Monthly</li>
                        <li class="tab-btn" data-tab="#pricing1tab-2">Annually</li>
                    </ul>
                </div>
                <div class="tabs-content">
                    <div class="tab active-tab" id="pricing1tab-1">
                        <div class="inner-content">
                        @foreach($pricing_plans as $pricing)
                        @include('components.pricing-plan',['pricing' => $pricing])
                        @endforeach
                        </div>
                        {{-- {{ $pricing_plans->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="download-section sec-pad">
        <div class="container">
            <div class="row align-items-center clearfix">
                <div class="col-sm-12 content-column">
                    <div class="content-box">
                        <div class="download-left-text">
                            <h2>Faster With A Taps <br>On ListIt App </h2>
                            <p>Download and experience our app today</p>
                        </div>
                        <div class="download-btn">
                            <a href="#" class="app-store">
                                <img decoding="async" src="/img/play-store.png" alt="">
                            </a>
                            <a href="#" class="app-store">
                                <img decoding="async" src="/img/google-play.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>

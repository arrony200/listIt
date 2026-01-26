
<x-guest-layout>


<section class="banner-section centred" style="background-image:url(/img/bannerbg-1.png)">
        <div class="container">
            <div class="content-box">
                <p>Enjoy and Discover </p>
                <h1>Everything You Need<br> in Listlt</h1>
                <div class="form-inner">
                    <div class="tabs-box">
                        <ul class="form-tabs tab-btns tab-buttons clearfix">
                            <li class="tab-btn active-btn" data-tab="#formtab-1">Sell</li>
                            <li class="tab-btn " data-tab="#formtab-2">Rent</li>
                        </ul>
                        <div class="tabs-content">
                            <div class="tab active-tab" id="formtab-1">
                                @include('components.property-search-form')
                            </div>
                            <div class="tab " id="formtab-2">
                                @include('components.property-search-form-rent')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

    <section class="category-style-two sec-pad ">
        <div class="container">
            <div class="sec-title">
                <h2>Choice Favourite Top Category </h2>
                <a class="theme-btn-one" href="{{route('categories')}}">See All Category</a>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        @foreach($all_categories as $category)
                        @include('components.category-item',['category' => $category])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Last Added Objects -->
    <div class="listing-section sec-pad" style="background-color: #FCF4F5">
        <div class="container">
            <div class="sec-title">
                <h2>Featured Ads</h2>
                <p><span>Total Ads: </span>18 Ads Posted</p>
            </div>
            <div class="listing-grid">
                <div class="row">
                    @foreach($latest_properties as $property)
                    @include('components.single-property-card2',['property' => $property])
                    @endforeach
                </div>
            </div>
            <div class="text-center mt-60">
                <a class="theme-btn-one" href="{{route('properties')}}">See More</a>
            </div>
        </div>
    </div>

    <section class="place-section sec-pad ">
        <div class="container">
            <div class="sec-title">
                <h2>Popular Cities </h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing<br> sed do eiusmod tempor incididunt labore</p>
            </div>
            <div class="location-masonary">
                @foreach($all_locations as $location)
                @include('components.location-item',['location' => $location])
                @endforeach
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
                </div>
            </div>
        </div>
    </div>
</section>


<section class="listit-review-area sec-pad" style="background-image: url(/img/testimonial-bg1.png)">
    <div class="container">
        <div class="sec-title centred">
            <h2>What People Say About Us</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing <br>sed do eiusmod tempor incididunt labore</p>
        </div>
        <div class="review-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
            @foreach($all_testimonials as $testimonial)
            <div class="review-box-item">
                <div class="review-box-body">
                    <p>{{$testimonial->review}}</p>
                </div>
                <div class="review-box-footer">
                    <img src="{{$testimonial->image}}"/>
                    <div>
                        <h5>{{$testimonial->name}}</h5>
                        <h6>{{$testimonial->designation}}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<section class="newsletter-section">
    <h1>Subscribe to Newsletter</h1>
    <p class="description">
        Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt labore
    </p>
    <form class="subscription-form">
        <div class="email-input-wrapper">
            <span class="email-icon"><i class="fas fa-envelope"></i></span>
            <input 
                type="email" 
                class="email-input" 
                placeholder="Enter your email"
                required
            >
        </div>
        <button type="submit" class="subscribe-btn">Subscribe</button>
    </form>
</section>

</x-guest-layout>

<div class="col-lg-4 col-md-4 col-sm-12">
    <div class="property-listing property-grid property-grid-two">
        <div class="thumbnail-section">
            <div class="top-left">
                <span class="featured">Featured</span>
            </div>
            <div class="listing-img-wrapper">
                <div class="list-img-slide">
                    <img src="{{$property->featured_image}}"/>
                </div>
            </div>
        </div>
        <div class="content-section">
            <div class="listing-detail-wrapper">
                <div class="listing-status">
                    <span class="_list_blickes status for-sell">
                        @if($property->status == 0)
                        For Rent
                        @elseif($property->status == 1)
                        For Sale
                        @endif
                    </span>
                </div>
                <div class="listing-short-detail">
                    <span class="_list_blickes category">Electronics</span>
                    <h4 class="listing-name verified"><a href="property/{{$property->id}}" class="prt-link-detail">{{$property->name}}</a></h4>
                </div>
                <div class="listing-location-status">
                    <div class="foot-location"><img src="/img/pin.svg" width="18" alt="">{{$property->location->name}}</div>
                    <span class="_list_blickes conditions open-now">Open Now</span>
                </div>
                <div class="listing-detail-footer">
                    <div class="foot-rates not-rating">
                        <span class="elio_rate">0</span>
                        <div class="_rate_stio">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <span class="reviews_text">(0 reviews)</span>
                    </div>
                    <h6 class="listing-card-info-price">{{$property->dynamic_pricing($property->price)}}</h6>
                </div>
            </div>

        </div>
    </div>
</div>

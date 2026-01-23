<div class="col-lg-6 col-md-6 col-sm-12">
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
                <div class="listing-short-detail-wrap">
                    <div class="listing-short-detail">
                        <span class="property-type">
                        @if($property->status == 0)
                        For Rent
                        @elseif($property->status == 1)
                        For Sale
                        @endif
                        </span>
                        <h4 class="listing-name verified"><a href="property/{{$property->id}}" class="prt-link-detail">{{$property->name}}</a></h4>
                    </div>
                    <div class="listing-short-detail-flex">
                        <h6 class="listing-card-info-price">{{$property->dynamic_pricing($property->price)}}</h6>
                    </div>
                    <div class="price-features-wrapper">
                        <div class="list-fx-features">
                            <div class="listing-card-info-icon">
                                <div class="inc-fleat-icon"><img src="/img/bed.svg" width="13" alt=""></div>{{$property->bedrooms}} Beds
                            </div>
                            <div class="listing-card-info-icon">
                                <div class="inc-fleat-icon"><img src="/img/bathtub.svg" width="13" alt=""></div>{{$property->bedrooms}} Bath
                            </div>
                            <div class="listing-card-info-icon">
                                <div class="inc-fleat-icon"><img src="/img/move.svg" width="13" alt=""></div>{{$property->net_sqm}} sqft
                            </div>
                        </div>
                    </div>
                    <div class="listing-detail-footer">
                        <div class="footer-first">
                            <div class="foot-location"><img src="/img/pin.svg" width="18" alt="">{{$property->location->name}}</div>
                        </div>
                        <div class="footer-flex">
                            <a href="property/{{$property->id}}" class="prt-view">View</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

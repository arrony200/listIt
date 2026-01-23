<div class="column-4 place-block">
    <div class="place-block-one">
        <div class="inner-box">
            <a href="{{route('properties')}}?location={{$location->id}}">
                <figure class="image-box">
                    <img loading="lazy" width="374" height="525" src="https://listit.smartdemowp.com/wp-content/uploads/location1.jpg" class="attachment-full size-full" alt decoding="async" />
                </figure>
            </a>
            <div class="lower-content">
                <div class="inner">
                    <h3><a href="{{route('properties')}}?location={{$location->id}}">{{ $location->name}}</a></h3>
                    <p>
                        <a href="{{route('properties')}}?location={{$location->id}}">
                            <span>2 Listings<svg width="27" height="12" viewBox="0 0 27 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.9906 0.179502C20.7512 -0.0598341 20.3632 -0.0598341 20.1238 0.179502C19.8845 0.418839 19.8845 0.80688 20.1238 1.04622L24.0378 4.96013H0.612859C0.274386 4.96013 0 5.23452 0 5.57299C0 5.91146 0.274386 6.18585 0.612859 6.18585H24.0376L20.1238 10.0996C19.8845 10.339 19.8845 10.727 20.1238 10.9664C20.3632 11.2057 20.7512 11.2057 20.9906 10.9664L25.9506 6.00629C26.0656 5.89136 26.1301 5.73547 26.1301 5.57293C26.1301 5.41039 26.0656 5.25451 25.9506 5.13958L20.9906 0.179502Z" fill="#D0D0D0" /></svg></span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

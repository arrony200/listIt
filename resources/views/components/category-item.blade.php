<div class="col-lg-2 col-md-4 col-sm-6 col-6 category-block">
    <div class="category-block-two">
        <div class="inner-box">
            <figure class="image-box">
                <a href="{{route('properties')}}?cat={{$category->id}}">
                    <img src="{{ $category->image }}"/>
                </a>
                <span>1 Listings</span>
            </figure>
            <div class="lower-content">
                <h4><a href="{{route('properties')}}?cat={{$category->id}}">{{ $category->name}}</a></h4>
            </div>
        </div>
    </div>
</div>

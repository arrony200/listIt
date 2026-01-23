<x-guest-layout>
    <section class="page-title page-breadcrumb  ">
        <div class="container">
            <div class="content-box centred">
                <div class="title">
                    <h1>All Categories</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to ListIt." href="{{route('home')}}" class="home"><span property="name">Home</span></a><meta property="position" content="1"></span></li><li>/</li><li>All Categories</li>
                </ul>
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
                    {{ $all_categories->links() }}
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>

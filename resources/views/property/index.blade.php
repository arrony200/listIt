<x-guest-layout>
    <section class="page-title page-breadcrumb">
        <div class="container">
            <div class="content-box centred">
                <div class="title">
                    <h1>Property 
                    @php
                        $types = [
                            0 => 'Land',
                            1 => 'Apartment',
                            2 => 'Villa',
                        ];
                    @endphp

                    {{ $types[request('type')] ?? 'All' }}
                    </h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to ListIt." href="{{route('home')}}" class="home"><span property="name">Home</span></a><meta property="position" content="1"></span></li><li>/</li><li>
                     Property 
                    @php
                        $types = [
                            0 => 'Land',
                            1 => 'Apartment',
                            2 => 'Villa',
                        ];
                    @endphp

                    {{ $types[request('type')] ?? 'All' }}
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="sidebar-page-container bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 property-sidebar">
                @include('components.property-search-form')
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="item-shorting-box">
                                <div class="item-shorting-box-left">
                                    <h4>Found 1-10 of 142 Results</h4>
                                </div>
                                <div class="item-shorting-box-right">
                                    <div class="shorting-by">
                                        <select id="shorty" class="form-control">
                                            <option value="" data-select2-id="2">Show All</option>
                                            <option value="1">Low Price</option>
                                            <option value="2">High Price</option>
                                            <option value="3">Most Popular</option>
                                        </select>
                                    </div>
                                    <ul class="shorting-list">
                                        <li><a href="grid-layout-with-sidebar.html"><i class="ti-layout-grid2"></i></a></li>
                                        <li><a href="list-layout-with-sidebar.html" class="active"><i class="ti-view-list"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            @foreach($latest_properties as $property)
                                @include('components.single-property-card',['property' => $property])
                            @endforeach

                    </div>
                    {{ $latest_properties->links() }}
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
<x-guest-layout>
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title">Property 
                       @if(request('type') == 0 ) 
                        Land
                       @elseif(request('type') == 1 ) 
                        Apartment
                       @elseif(request('type') == 2 ) 
                        Villa
                        @elseif(request('type') == '' ) 
                        All
                       @endif
                    </h2>
                    <span class="ipn-subtitle">Property List With Sidebar</span>
                    
                </div>
            </div>
        </div>
    </div>
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 property-sidebar">
                @include('components.property-search-form')
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-md-12">
                            <div class="item-shorting-box">
                                <div class="item-shorting clearfix">
                                    <div class="left-column pull-left"><h4 class="m-0">Found 1-10 of 142 Results</h4></div>
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
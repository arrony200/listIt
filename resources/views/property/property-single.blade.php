<x-guest-layout>
            <div class="clearfix"></div>
            <div class="featured_slick_gallery gray">
                <div class="featured_slick_gallery-slide">
                    @foreach($property->gallery as $gallery)
                    <div class="featured_slick_padd">
                        <a class="mfp-gallery" href="{{$gallery->name}}">
                            <img src="{{$gallery->name}}" class="img-fluid mx-auto" alt="Alt" />
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <section class="gray-simple rtl p-0">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-md-12">
                            <div class="property_block_wrap style-3">
                                <div class="ft-flex-thumb">
                                <img src="{{$property->featured_image}}"/>
                                </div>
                                <div class="pbw-flex">
                                <div class="prt-detail-title-desc lstng-pg-title-desc">
                                        <span class="prt-types sale">
                                        @if($property->status == 0)
                                        Rent
                                        @elseif($property->status == 1)
                                        Sale
                                        @endif
                                        </span>
                                        <h3>{{$property->name}}</h3>
                                        <span class="lstng-pg-address"><i class="lni-map-marker"></i> 778 Panama City, FL</span>
                                        <h3 class="prt-price-fix">{{$property->dynamic_pricing($property->price)}} <sub>/Monthly</sub>
                                    </h3>
                                <div class="list-fx-features">
                                <div class="listing-card-info-icon">
                                    <div class="inc-fleat-icon"><img src="/img/bed.svg" width="13" alt=""></div>{{$property->bedrooms}} Beds </div>
                                <div class="listing-card-info-icon">
                                    <div class="inc-fleat-icon"><img src="/img/bathtub.svg" width="13" alt=""></div>{{$property->bedrooms}} Bath </div>
                                <div class="listing-card-info-icon">
                                    <div class="inc-fleat-icon"><img src="/img/move.svg" width="13" alt=""></div>{{$property->net_sqm}} sqft </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="gray-simple">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="property_block_wrap style-2">
                                <div class="property_block_wrap_header">
                                    <a data-bs-toggle="collapse" data-parent="#features" data-bs-target="#clOne" aria-controls="clOne" href="javascript:void(0);" aria-expanded="true" class="collapsed">
                                        <h4 class="property_block_title">Detail &amp; Features</h4>
                                    </a>
                                </div>
                                <div id="clOne" class="panel-collapse collapse show" aria-labelledby="clOne">
                                    <div class="block-body">
                                        <ul class="deatil_features">
                                            <li><strong>Bedrooms:</strong>3</li>
                                            <li><strong>Garage:</strong>1</li>
                                            <li><strong>Status:</strong>Active</li>
                                            <li><strong>Kitchen Features:</strong>Kitchen Facilities</li>
                                            <li><strong>Elevetor:</strong>Yes</li>
                                            <li><strong> Bathrooms:</strong>2 Bath</li>
                                            <li><strong>Property Type:</strong>Apartment</li>
                                            <li><strong>Cooling:</strong>Central A/C</li>
                                            <li><strong>Exterior:</strong>FinishBrick</li>
                                            <li><strong>Fireplace:</strong>Yes</li>
                                            <li><strong>Areas:</strong>4,240 sq ft</li>
                                            <li><strong>Year:</strong>Built1982</li>
                                            <li><strong>Heating Type:</strong>Forced Air</li>
                                            <li><strong>Swimming Pool:</strong>Yes</li>
                                            <li><strong> Free WiFi:</strong>No</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="property_block_wrap style-2">
                                <div class="property_block_wrap_header">
                                    <a data-bs-toggle="collapse" data-parent="#dsrp" data-bs-target="#clTwo" aria-controls="clTwo" href="javascript:void(0);" aria-expanded="true" class="collapsed">
                                        <h4 class="property_block_title">Description</h4>
                                    </a>
                                </div>
                                <div id="clTwo" class="panel-collapse collapse show">
                                    <div class="block-body">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#8217;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#8217;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="details-sidebar">
                                <!-- Agent Detail -->
                                <div class="sides-widget">
                                    <div class="sides-widget-header">
                                        <div class="agent-photo"><img src="assets/img/user-6.jpg" alt=""></div>
                                        <div class="sides-widget-details">
                                            <h4><a href="#">Shivangi Preet</a></h4>
                                            <span><i class="lni-phone-handset"></i>(91) 123 456 7895</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="sides-widget-body simple-form">
                                        @if(Session::get('message'))
                                        <p class="mb-6 p-3 bg-green-100 text-green-700">{{Session::get('message')}}</p>
                                        @endif
                                        <form action="{{route('property-inquiry',$property->id)}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Your Name" value="{{old('name')}}" required>
                                                @error('name')
                                                <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Phone No.</label>
                                                <input type="text" name="phone" class="form-control" placeholder="Your Phone" value="{{old('phone')}}" required>
                                                @error('phone')
                                                <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Your Email" value="{{old('email')}}" required>
                                                @error('email')
                                                <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="message" placeholder="I'm interested in this property." required>{{old('message')}}</textarea>
                                                @error('message')
                                                <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <button class="btn btn-black btn-md rounded full-width">Send Message</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- Mortgage Calculator -->
                                <div class="sides-widget">
                                    <div class="sides-widget-header">
                                        <div class="sides-widget-details">
                                            <h4><a href="#">Shivangi Preet</a></h4>
                                            <span>View your Interest Rate</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="sides-widget-body simple-form">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <input type="text" class="form-control" placeholder="Sale Price">
                                                <i class="ti-money"></i>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <input type="text" class="form-control" placeholder="Down Payment">
                                                <i class="ti-money"></i>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <input type="text" class="form-control" placeholder="Loan Term (Years)">
                                                <i class="ti-calendar"></i>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <input type="text" class="form-control" placeholder="Interest Rate">
                                                <i class="fa fa-percent"></i>
                                            </div>
                                        </div>

                                        <button class="btn btn-black btn-md rounded full-width">Calculate</button>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-guest-layout>

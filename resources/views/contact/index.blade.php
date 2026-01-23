<x-guest-layout>
    <section class="page-title page-breadcrumb">
        <div class="container">
            <div class="content-box centred">
                <div class="title">
                    <h1>Contact</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to ListIt." href="{{route('home')}}" class="home"><span property="name">Home</span></a><meta property="position" content="1"></span></li><li>/</li><li>Contact</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="contact-section">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 info-column">
                    <div class="contact-info-inner">
                    <div class="sec-title">
                    <h2>Contact Info </h2>
                    </div>
                    <div class="single-box">
                    <h3>Opening hours</h3>
                    <ul class="list clearfix">
                    <li>Daily: 9.30 AM–6.00 PM</li>
                    <li>Sunday &amp; Holidays: Closed</li>
                    </ul> </div>
                    <div class="single-box">
                    <h3>Contact info</h3>
                    <ul class="list clearfix"> <li>77408 Satterfield Motorway Suite <br>469 New Antonetta, BC K3L6P6</li>
                    <li><a href="mailto:example@info.com">example@info.com</a></li>
                    <li><a href="tel:6174959400326">(617) 495-9400-326</a></li> </ul> </div>
                    <div class="single-box">
                    <h3>Social contact</h3>
                    <ul class="social-icons clearfix">
                    <li class="facebook"><a href="#"><i aria-hidden="true" class="lab la-facebook-f"></i></a></li>
                    <li class="twitter"><a href="#"><i aria-hidden="true" class="lab la-twitter"></i></a></li>
                    <li class="linkedin"><a href="#"><i aria-hidden="true" class="lab la-linkedin-in"></i></a></li>
                    <li class="instagram"><a href="#"><i aria-hidden="true" class="lab la-instagram"></i></a></li>
                    </ul>
                    </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <h2>Get in Touch</h2>
                        <form action="{{route('contact-submit')}}" method="POST">
                            @csrf
                            <div class="default-form">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                                        @error('name')
                                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{old('email')}}" required>
                                        @error('email')
                                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Phone No.</label>
                                        <input type="text" name="phone" class="form-control" value="{{old('phone')}}" required>
                                        @error('phone')
                                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <label>Subject</label>
                                        <input type="subject" name="subject" class="form-control" value="{{old('subject')}}" required>
                                        @error('subject')
                                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="message" required>{{old('message')}}</textarea>
                                        @error('message')
                                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                    <button class="theme-btn-one">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>

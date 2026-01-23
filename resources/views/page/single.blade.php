<x-guest-layout>
            <div class="clearfix"></div> 
           <h1>{{$page->name}}</h1>
            <section class="gray-simple">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="property_block_wrap style-2">
                                <div id="clTwo" class="panel-collapse collapse show">
                                    <div class="block-body">
                                        <p>{{$page->content}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-guest-layout>
<x-guest-layout>
   
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h2 class="ipt-title"> </h2>
                    <span class="ipn-subtitle"> {{$page->name}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <p> {{$page->content}}</p>
    </div>
</x-guest-layout>
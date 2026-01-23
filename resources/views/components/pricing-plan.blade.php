@if($pricing->name =='Business')
    <div class="pricing-block-one featured-active">
@else
    <div class="pricing-block-one">
@endif
    <div class="pricing-table">
        <div class="teble-header">
            <h5>{{ $pricing->name}}</h5>
            <p>{{ $pricing->description}}</p>
            <h2><sup>$</sup>{{ $pricing->price}} <span>/ yr</span></h2>
        </div>
        <div class="table-content">
            <h3>Everything in Starter</h3>
            {{-- {{ $pricing->features}} --}}
            {!! $pricing->features !!}
        </div>
        <div class="table-footer">
            <a href="https://listit.smartdemowp.com/primary-checkout-page/" class=" btn btn-default theme-btn-one">Register Now</a>
        </div>
    </div>
</div>

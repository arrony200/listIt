@if($pricing->id == 2)
    <div class="pricing-block-one featured-active">
@else
    <div class="pricing-block-one">
@endif
    <div class="pricing-table">
        <div class="teble-header">
            <h5>{{ $pricing->name}}</h5>
            <p>{{ $pricing->description}}</p>
            <h2><sup>$</sup>{{ $pricing->price}} <span>/ mo</span></h2>
        </div>
        <div class="table-content">
            <h3>Everything in Starter</h3>
            @php
                $sentences = preg_split('/(?<=[.!?])\s+/', $pricing->features);
            @endphp

            <ul>
                @foreach ($sentences as $sentence)
                    <li>{{ $sentence }}</li>
                @endforeach
            </ul>
            
        </div>
        <div class="table-footer">
            <a href="#" class=" btn btn-default theme-btn-one">Select This Plan</a>
        </div>
    </div>
</div>

<form action="{{route('properties')}}" method="GET" class="advanced-searchform">
    @csrf
    <div class="input-inner clearfix">

        <div class="form-group">
            <input name="property_name" value="{{request('property_name')}}" type="search" placeholder="Waht are you looking for?">
        </div>

        <div class="form-group">
            <select name="location">
                <option value="">Location</option>
                @foreach($locations as $location)
                <option {{request('location') == $location->id ? 'selected="selected"' : ''}} value="{{$location->id}}">{{$location->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select name="type">
                <option value="">Type</option>
                <option {{request('type') == '0' ? 'selected="selected"' : ''}} value="0">Land</option>
                <option {{request('type') == '1' ? 'selected="selected"' : ''}} value="1">Apartment</option>
                <option {{request('type') == '2' ? 'selected="selected"' : ''}} value="2">Villa</option>
            </select>
        </div>
        <div class="form-group">
            <select name="price">
                <option value="">Price</option>
                <option {{request('price') == '100000' ? 'selected="selected"' : ''}} value="100000">0 - 100000</option>
                <option {{request('price') == '200000' ? 'selected="selected"' : ''}} value="200000">100000 - 200000</option>
                <option {{request('price') == '300000' ? 'selected="selected"' : ''}} value="300000">200000 - 300000</option>
                <option {{request('price') == '400000' ? 'selected="selected"' : ''}} value="400000">300000 - 400000</option>
                <option {{request('price') == '500000' ? 'selected="selected"' : ''}} value="500000">400000 - 500000</option>
                <option {{request('price') == '500000+' ? 'selected="selected"' : ''}} value="500000+">500000+</option>
            </select>
        </div>
        <div class="form-group">
            <select id="bedrooms" name="bedrooms">
                <option value="">Bedrooms</option>
                <option {{request('bedrooms') == '1' ? 'selected="selected"' : ''}} value="1">1</option>
                <option {{request('bedrooms') == '2' ? 'selected="selected"' : ''}} value="2">2</option>
                <option {{request('bedrooms') == '3' ? 'selected="selected"' : ''}} value="3">3</option>
                <option {{request('bedrooms') == '4' ? 'selected="selected"' : ''}} value="4">4</option>
                <option {{request('bedrooms') == '5' ? 'selected="selected"' : ''}} value="5">5</option>
            </select>
        </div>
        <div class="btn-box">
            <button type="submit">Search</button>
            <input type="hidden" name="status" value="0">
        </div>
    </div>

</form>

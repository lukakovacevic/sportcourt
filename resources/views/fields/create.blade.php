<html>
    <body>
    <a href="{{route('home')}}">Back</a>
    <form role="form" action="{{ route('create_field') }}" method="POST">
        {{ csrf_field() }}
        <label>Address</label>
		<input class="form-control" name="address" value="address">
        <label>Longitude</label>
		<input class="form-control" name="longitude" value="longitude">
        <label>Latitude</label>
		<input class="form-control" name="latitude" value="latitude">
        <label>Number of courts</label>
		<input class="form-control" name="number_of_courts" value="number_of_courts">
        <div class="form-group">
        <label>Type</label>
        <select style="width: 200px" class="form-control" id="type_id" name="type_id">
            <option value="N/A">--SELECT--</option>
            @foreach($types as $type)
            <option value="{{$type->id}}">{{$type->type}}</option>
            @endforeach
        </select>
        </div>
        
        <div class="form-group">
        <label>Country</label>
        <select style="width: 200px" class="form-control" id="country_id" name="country_id">
            <option value="N/A">--SELECT--</option>
            @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>
        <label>City</label>
        <select style="width: 200px" class="form-control" id="city_id" name="city_id">
                
        </select>
        <button type="submit" class="btn btn-primary">Save</button>
		@if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
        </form>
    </body>
</html>
<script>
    var selectElement = document.getElementById('country_id');
    var citiesList = [];
    selectElement.addEventListener('change', (e) => {
        
        var id = document.getElementById('country_id').value;
        var stateUrl = "{{ url('cities/getbycountry/')}}" + `/${id}`;
        
        console.log(stateUrl);
        async function getCities(){
            try{
                var response = await fetch(stateUrl, {method:'GET'});
                var responseJson = await response.json();
                citiesList = responseJson;
                var selectCities = document.getElementById('city_id');
                console.log(citiesList);
                citiesList.forEach(element => {
                var option = document.createElement('option');
                option.value = element.id;
                option.innerHTML = element.name;
                selectCities.appendChild(option);
                });
            } catch (error) {
                console.log(error)
            }
            
        }
        getCities();
        
    })
</script>
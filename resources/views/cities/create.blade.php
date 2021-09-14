<html>
    <body>
    <a href="{{route('home')}}">Back</a>
    <form role="form" action="{{ route('create_city') }}" method="POST">
        {{ csrf_field() }}
        <label>write name</label>
		<input class="form-control" name="name" value="city name">
        
        <div class="form-group">
        <label>Country</label>
        <select style="width: 200px" class="form-control" id="country_id" name="country_id">
            <option value="N/A">--SELECT--</option>
            @foreach($countries as $country)
            <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
        </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
		@if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
        </form>
    </body>
</html>
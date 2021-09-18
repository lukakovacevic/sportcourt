<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<body>
    <div class="page-wrapper">
        <div class="header">
            <a href="{{route('home')}}" class="link-btn back-btn">Back</a>
        </div>
        <div class="page-title">Create City</div>
        <form role="form" action="{{ route('create_city') }}" method="POST" class="cities-create-form">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="form-group-items">write name</label>
                <input class="form-group-items form-control" name="name" placeholder="city name">
            </div>

            <div class="form-group">
                <label class="form-group-items">Country</label>
                <select class="form-group-items form-control" id="country_id" name="country_id">
                    <option value="N/A">--SELECT--</option>
                    @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="button-container">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="error-msg">{{$error}}</div>
            @endforeach
            @endif
        </form>
    </div>
</body>

</html>
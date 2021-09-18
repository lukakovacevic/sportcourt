<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<body>
    <div class="header">
        <a href="{{route('home')}}" class="link-btn back-btn">Back</a>
    </div>
    <div class="page-title">Add Country</div>
    <form role="form" action="{{ route('create_country') }}" method="POST" class="cities-create-form">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="form-group-items">write name</label>
            <input class="form-group-items form-control" name="name" placeholder="country name">
        </div>
        <div class="form-group">
            <label class="form-group-items">Is visible</label>
            <input type="hidden" name="visible" value="0">
            <input type="checkbox" name="visible" id="visible" value="1">
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
</body>

</html>
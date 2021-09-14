<html>
    <body>
    <a href="{{route('home')}}">Back</a>
    <form role="form" action="{{ route('create_country') }}" method="POST">
        {{ csrf_field() }}
        <label>write name</label>
		<input class="form-control" name="name" value="country name">
        <label for="">Is visible</label>
        <input type="hidden" name="visible" value="0">
		<input type="checkbox" name="visible" id="visible" value="1">
        <button type="submit" class="btn btn-primary">Save</button>
		@if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
        </form>
    </body>
</html>
<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<body>
    <div class="header">
        <a href="{{route('home')}}" class="link-btn back-btn">Back</a>
        <a href="create" class="link-btn create-btn">Create country</a>
    </div>

    <tbody>
        @foreach($countries as $country)
        <div class="item-container">
            <span class="item-name">{{ $country->name}}</span>
            <span class="item-country">{{ $country->visible}}</span>
            <form action="{{ route('delete_country', $country->id) }}" method="POST" class="delete-form">
                @csrf
                @method('delete')
                <button type="submit" class="link-btn btn-delete">Delete</button>
            </form>
        </div>
        @endforeach
    </tbody>
    <div>
</body>

</html>
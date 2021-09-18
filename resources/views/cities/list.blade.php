<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<body>
    <div class="header">
        <a href="{{route('home')}}" class="link-btn back-btn">Back</a>
        <a href="create" class="link-btn create-btn">Create city</a>
    </div>
    <tbody>
        @foreach($cities as $city)
        <div class="item-container">
            <span class="item-name">{{ $city->name}}</span>
            <span class="item-country">{{ $city->country->name}}</span>
            <form action="{{ route('delete_city', $city->id) }}" method="POST" class="delete-form">
                <button type="submit" class="link-btn btn-delete">Delete</button>
            </form>
        </div>
    </tbody>
    @endforeach
    </tbody>
</body>

</html>
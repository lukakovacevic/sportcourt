<html>

    <body>
    <a href="{{route('home')}}">Back</a>
        <a href="create">Create city</a>
        <tbody>
        @foreach($cities as $city)
            <tr>
                <td>{{ $city->name}}</td>
                <td>{{ $city->country->name}}</td>
                <td>
                <form action="{{ route('delete_city', $city->id) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-outline-danger">Delete</button>
</form>
                </td>
            </tr>
        </tbody>         
        @endforeach
        </tbody>
        <div>
        

  
    </body>
</html>
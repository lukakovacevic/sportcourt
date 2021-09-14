<html>

    <body>
        <a href="{{route('home')}}">Back</a>
        <a href="create">Create Country</a>
        <tbody>
        @foreach($countries as $country)
            <tr>
                <td>{{ $country->name}}</td>
                <td>{{ $country->visible}}</td>
                <td>
                <form action="{{ route('delete_country', $country->id) }}" method="POST">
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
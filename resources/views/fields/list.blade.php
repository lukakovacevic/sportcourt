<html>

    <body>
    <a href="{{route('home')}}">Back</a>
        <a href="create">Create Court</a>
        <tbody>
        @foreach($sport_fields as $field)
            <tr>
                <td>{{ $field->address}}</td>
                <td>{{ $field->country->name}}</td>
                <td>{{ $field->city->name}}</td>
                <td>{{ $field->type->type}}</td>
                <td>{{ $field->longitude}}</td>
                <td>{{ $field->latitude}}</td>
                <td>{{ $field->number_of_courts}}</td>
                <td>
                    
                <form action="{{ route('delete_field', $field->id) }}" method="POST">
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
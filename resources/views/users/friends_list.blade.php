<html>

    <body>
    <a href="{{route('home')}}">Back</a>
        <tbody>
        @foreach($user_friends as $user)
            <tr>
                <td>{{ $user->friend->username}}</td>
                <td>
                
                <a href="{{ route('delete_friend', [$user->friend->id]) }}" class="btn btn-xs btn-primary">Delete</a>
                </td>
            </tr>
        </tbody>         
        @endforeach
        </tbody>
        <div>
        <form role="form" action="{{ route('add_friend') }}" method="POST">
        {{ csrf_field() }}
        <label>Add friend</label>
		<input class="form-control" name="friend_username" value="">
        <button type="submit" class="btn btn-primary">Save</button>
		@if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
        </form>
  
    </body>
</html>
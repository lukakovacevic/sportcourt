<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<body>
    <div class="header">
        <a href="{{route('home')}}" class="link-btn back-btn">Back</a>
    </div>
    <div class="page-title">Add Friends</div>

    <tbody>
        @foreach($user_friends as $user)
        <tr>
            <td>{{ $user->friend->username}}</td>
            <td>
                <a href="{{ route('delete_friend', [$user->id]) }}" class="link-btn btn-delete">Delete</a>
            </td>
        </tr>
        @endforeach
        
        @foreach($to_accept as $not_accepted)
        <div>
        <tr>
                    <td>
                        <label for=""> User with username {{ $not_accepted['username']}} has sent you friend request</label>
                    </td>
                    <td>
                    <td>
                        <a href="{{ route('accept_friend', [$not_accepted['username']]) }}" class="link-btn btn-delete">Accept</a>
                    </td>
                    <td>
                        <a href="{{ route('delete_friend', [$not_accepted['to_accept_id']]) }}" class="link-btn btn-delete">Refuse</a>
                    </td>
                    </td>

                </tr>
        </div>
                
            @endforeach
    </tbody>
            
    <div>
        <form role="form" action="{{ route('add_friend') }}" method="POST" class="cities-create-form">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="form-group-items">Add friend</label>
                <input class="form-group-items form-control" name="friend_username" placeholder="Friend">
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
<html>

<body>
<a href="{{route('home')}}">Back</a>
    <label for="">address {{$field->address}}</label>
    <div>
        <tbody>
            <tr>Court Hours</tr>
            <tr>number of players</tr>
            <tr>sing in hour</tr>
            <tr>{{$now_time}}</tr>
        </tbody>
    </div>
    <ul>
        @for($i=6; $i <= 23; $i++) <li>
            <tbody>
                <tr><label>Hours {{ $i }}</label></tr>
                
                <tr><label for="">Number of players that will start in this hour {{count(App\Models\UserSchedule::where('time', $i)->whereDay('created_at', now()->day)->get())}}</label></tr>
                @foreach($user_times as $user_time)
                @if($user_time->time === $i)
                <tr>
                    <label>You have signed to play in this time</label>
                </tr>
                @endif
                @endforeach
                

            </tbody>
            </li>

            @endfor

    </ul>
    <label for="">Chose time to come to court</label>
    <form role="form" action="{{ route('store_schedule', $field->id) }}" method="POST">
        {{ csrf_field() }}
        <select style="width: 200px" class="form-control" id="time" name="time">
            @for($i=6; $i <= 23; $i++) 
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

    
</body>

</html>
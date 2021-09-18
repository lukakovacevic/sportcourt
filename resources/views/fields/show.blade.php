<html>

<body>
<a href="{{route('home')}}">Back</a>
    <label for="">address {{$field->address}}</label>
    <div>

    </div>
   <table>
       <thead>
       <tr><td>Court Hours </td>
            @foreach($types as $type)
                <td>Playing {{ $type->type}}</td>
            @endforeach
            <td>{{$now_time}}</td>
       </tr>
       </thead>
       <tbody>
       @for($i=6; $i <= 23; $i++)
            
            <tr><td>Hours {{ $i }}</td>
            @foreach($types as $type)
            <td>{{count(App\Models\UserSchedule::where('sport_field_id', $field->id)->where('time', $i)->where('type_id', $type->id)->whereDay('created_at', now()->day)->get())}}</td>
            @endforeach
            
            @foreach($user_times as $user_time)
            @if($user_time->time === $i)
            
                <td>You have signed to play in this time</td>
            </tr>
            @break
            @endif
            @endforeach
            
        
      

        @endfor
       </tbody>
   </table>
        

    
    <label for="">Chose time to come to court</label>
    <form role="form" action="{{ route('store_schedule', $field->id) }}" method="POST">
        {{ csrf_field() }}
        <select style="width: 200px" class="form-control" id="time" name="time">
            @for($i=6; $i <= 23; $i++) 
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
        <select style="width: 200px" class="form-control" name="type_id" id="type_id">
            @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->type}}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>

    
</body>

</html>
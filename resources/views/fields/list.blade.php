@extends('layouts.app')


@section('content')
<body>
    <div class="header">
        <a href="{{route('home')}}" class="link-btn back-btn">Back</a>
        <a href="create" class="link-btn create-btn">Create Court</a>
    </div>
    <tbody>
    <td>
                <tr>
                    <label for="">Address</label>
                </tr>
                <tr>
                    <label for="">Field number</label>
                </tr>
                <tr>
                    <label for="">Country</label>
                </tr>
                <tr>
                    <label for="">City</label>
                </tr>
                <tr>
                    <label for="">Field Types</label>
                </tr>
                <tr>
                    <label for="">Longitude</label>
                </tr>
                <tr>
                    <label for="">Latitude</label>
                </tr>
                <tr>
                    <label for="">Number of courts</label>
                </tr>
            </td>
    </tbody>
    
    <tbody>
        @if($sport_fields)
        @foreach($sport_fields as $field)

        <div class="court-info-container">
            <td>
                <tr>
                <span class="item-name">{{ $field->address}}</span>
                </tr>
                
                <tr>
                <span class="item-name">{{ $field->field_number}}</span>
                </tr>
    
                <tr>
                <span class="item-name">{{ $field->country->name}}</span>
                </tr>
      
                <tr>
                <span class="item-name">{{ $field->city->name}}</span>
                </tr>
    
                <tr>
                <span class="item-name">
                @foreach($field->type as $type)
                {{ $type->type}}
            @endforeach</span>
                </tr>
    
                <tr>
                <span class="item-name">{{ $field->longitude}}</span>
                </tr>
       
                <tr>
                <span class="item-name">{{ $field->latitude}}</span>
                </tr>
    
                <tr>
                <span class="item-name">{{ $field->number_of_courts}}</span>
                </tr>
                <tr>
                <form action="{{ route('delete_field', $field->id) }}" method="POST" class="delete-form">
                @csrf
                @method('delete')
                <button type="submit" class="link-btn btn-delete">Delete</button>
            </form>
                </tr>
            </td>
            
        </div>
    </tbody>
    @endforeach
    @endif
   
</body>
@endsection


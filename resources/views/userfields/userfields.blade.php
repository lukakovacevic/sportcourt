<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

<body>
    <div class="header">
        <a href="{{route('home')}}" class="link-btn back-btn">Back</a>
    </div>
    <div class="page-title">Add Favorite Field</div>
    <tbody>
        @foreach($sport_fields as $field)
        <tr>
            <td>{{ $field->field->address}}</td>
            <td>
                <a href="{{ route('show_field', [$field->field->id]) }}">Sign on court</a>
                <a href="{{ route('delete_user_field', [$field->field->id]) }}" class="btn btn-xs btn-primary">Delete</a>
            </td>
        </tr>
    </tbody>
    @endforeach
    </tbody>
    <!-- <label for="">Add favorite field</label> -->
    <form role="form" action="{{ route('add_field') }}" method="POST" class="cities-create-form">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="form-group-items">City</label>
            <select style="width: 200px" class="form-group-items form-control" id="city_id" name="city_id">
                <option value="N/A">--SELECT--</option>
                @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->id}}</option>
                @endforeach
            </select>
        </div>

        <label>Fields</label>
        <select style="width: 200px" class="form-control" id="field_id" name="field_id">
        </select>
        <label>On this court you can play</label>
        <div id="tipovi">

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
    </form>

</body>

</html>
<script>
    var selectElement = document.getElementById('city_id');
    var selectFieldElement = document.getElementById('field_id');

    var fieldsList = [];
    var typesList = [];
    selectElement.addEventListener('change', (e) => {
        
        var id = document.getElementById('city_id').value;
        var stateUrl = "{{ url('users/getfieldbycity/')}}" + `/${id}`;
        
        async function getFields(){
            try{
                var response = await fetch(stateUrl, {method:'GET'});
                var responseJson = await response.json();
                fieldsList = responseJson;
                var selectFields = document.getElementById('field_id');
                selectFields.textContent = '';
                fieldsList.forEach(element => {
                var option = document.createElement('option');
                option.value = element.id;
                option.innerHTML = element.address;
                selectFields.appendChild(option);
                });
            } catch (error) {
                console.log(error)
            }
            
        }
        getFields();
        
    })
    selectFieldElement.addEventListener('change', (e) => {
        
        var id = document.getElementById('field_id').value;
        var stateUrl = "{{ url('users/gettypebyfield/')}}" + `/${id}`;
        
        async function getTypes(){
            try{
                var response = await fetch(stateUrl, {method:'GET'});
                var responseJson = await response.json();
                typesList = responseJson;
                var types = document.getElementById('tipovi');
                types.textContent = '';
                typesList.forEach((element,index) => {
                    console.log(index);
                    var item = document.createElement('span');
                    item.value = element.id;
                    if(index !== typesList.length -1){
                        item.innerHTML = element.type + ', ';
                    } else {
                        item.innerHTML = element.type;
                    }
                    types.appendChild(item);
                });
            } catch (error) {
                console.log(error)
            }
            
        }
        getTypes();
        
    })
</script>
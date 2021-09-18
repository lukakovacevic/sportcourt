<html>
<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
</head>
<body>
    <div class="header">
        <a href="{{route('home')}}" class="link-btn back-btn">Back</a>
    </div>
    <div class="page-title">Add Court</div>
    <form role="form" action="{{ route('create_field') }}" method="POST" class="cities-create-form">
        {{ csrf_field() }}
        <div class="form-group">
            <label class="form-group-items">Name & Address</label>
            <input class="form-group-items form-control" name="address" placeholder="Address">
        </div>
        <div class="form-group">
            <label class="form-group-items">Field number</label>
            <input class="form-group-items form-control" name="field_number" placeholder="field_number">
        </div>
        <div class="form-group">
            <label class="form-group-items">Longitude</label>
            <input class="form-group-items form-control" name="longitude" placeholder="Longitude">
        </div>
        <div class="form-group">
            <label class="form-group-items">Latitude</label>
            <input class="form-group-items form-control" name="latitude" placeholder="latitude">
        </div>
        <div class="form-group">
            <label class="form-group-items">Number of courts</label>
            <input class="form-group-items form-control" name="number_of_courts" placeholder="Courts Nb.">
        </div>

        
<div class="form-group">
<label>Select</label>
<select id="types" name="types[]" multiple class="form-control" >
<option value="N/A">--SELECT--</option>
                @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->type}}</option>
                @endforeach
</select>
</div>


        <div class="form-group">
            <label class="form-group-items">Country</label>
            <select style="width: 200px" class="form-group-items form-control" id="country_id" name="country_id">
                <option value="N/A">--SELECT--</option>
                @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="form-group-items">City</label>
            <select style="width: 200px" class="form-group-items form-control" id="city_id" name="city_id">
            <option value="N/A">--SELECT--</option>
            </select>
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
<script>
    var selectElement = document.getElementById('country_id');
    var citiesList = [];
    selectElement.addEventListener('change', (e) => {
        
        var id = document.getElementById('country_id').value;
        var stateUrl = "{{ url('cities/getbycountry/')}}" + `/${id}`;
        
        console.log(stateUrl);
        async function getCities(){
            try{
                var response = await fetch(stateUrl, {method:'GET'});
                var responseJson = await response.json();
                citiesList = responseJson;
                var selectCities = document.getElementById('city_id');
                selectCities.textContent = '';
                citiesList.forEach(element => {
                var option = document.createElement('option');
                option.value = element.id;
                option.innerHTML = element.name;
                selectCities.appendChild(option);
                });
            } catch (error) {
                console.log(error)
            }
            
        }
        getCities();
        
    })
</script>
<script>
$(document).ready(function(){
$('#types').multiselect({
nonSelectedText: 'Select type',
enableFiltering: true,
enableCaseInsensitiveFiltering: true,
buttonWidth:'400px'
});
$('#types_form').on('submit', function(event){
event.preventDefault();
var form_data = $(this).serialize();
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url:"{{ url('create_field') }}",
method:"POST",
data:form_data,
success:function(data)
{
$('#types option:selected').each(function(){
$(this).prop('selected', false);
});
$('#types').multiselect('refresh');
alert(data['success']);
}
});
});
});
</script>
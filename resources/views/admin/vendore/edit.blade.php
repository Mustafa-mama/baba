@extends('layouts.admin')
@section('title', 'edit')
@section('edit_vendore')
 <div class="container">
    <div class="card-body lang">
        @include('admin.includes.alerts.errors')
        @include('admin.includes.alerts.success')
        <h1 class="form-section text-center"><i class="ft-home"></i>تعديل المتجر</h1>
  <form class="form" action="{{route('update.vendore.admin',$edit->id)}}"
   method="Post" enctype="multipart/form-data">
       @csrf
       <input name="id" value="{{$edit->id}}" type="hidden">
  

   
     
      
          
  
          <div class="row">
        <div class="col-md-6 add">
            <div class="form-group">
                <label for="projectinput1">اسم المتجر</label>
                <input type="text"  
                       class="form-control"
                       placeholder=""
                       name="name"
                       value="{{$edit->name}}"
                        autocomplete="off">
                @error("name")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6 add">
            <div class="form-group">
                <label for="projectinput2"> أختر القسم </label>
                <select name="cat_id" class="select2 form-control">
                    <optgroup label="من فضلك أختر القسم ">
                        @if($categories && $categories->count() > 0)
                            @foreach($categories as $category)
                                <option
                                    value="{{$category ->id }}" @if ($edit->cat_id == $category ->id)
                                    selected
                                        
                                    @endif>
                                   
                                    {{$category->name}}</option>
                            @endforeach
                        @endif
                    </optgroup>
                </select>
                @error('cat_id')
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>
          </div>
          </div>
      

        <div class="row">
            <div class="col-md-6 add">
                <div class="form-group">
                    <label for="projectinput1">الميل</label>
                    <input type="email"                
                           class="form-control"
                           placeholder=""
                           name="email" 
                           value="{{$edit->email}}"
                           autocomplete="off">
                    @error("email")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 add">
                <div class="form-group">
                    <label for="projectinput1">الهاتف</label>
                    <input type="text" 
                           class="form-control"
                           placeholder=" "
                           name="phone"
                           value="{{$edit->phone}}"
                            autocomplete="off">
                    @error("phone")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div> 
        </div> 
        
        <div class="row">
            <div class="col-md-6 add">
                <div class="form-group">
                    <label for="projectinput1">العنوان</label>
                    <input type="text"                
                           class="form-control"
                           placeholder=""
                           name="addres" 
                           value="{{$edit->addres}}"
                           autocomplete="off">
                    @error("addres")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 add">
                
                <div class="form-group">
                    <label for="projectinput1">كلمة المرور</label>
                    <input type="password" 
                           class="form-control"
                           placeholder=""
                           name="password" autocomplete="off">
                    @error("password")
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div> 
        </div>  
        
      {{-- <div class="row">

        <div class="col-md-6 add">
            <div class="form-group mt-1">
                <input type="checkbox"  value="1" name="active"
                       id="switcheryColor4"
                       class="switchery" data-color="success"
                       checked/>
                <label for="switcheryColor4"
                       class="card-title ml-1">الحالة </label>

                @error("active")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
     </div> --}}
    

  



<div class="form-actions">
    <button type="button" class="btn btn-warning mr-1"
            onclick="history.back();">
        <i class="ft-x"></i> تراجع
    </button>
    <button type="submit" class="btn btn-success">
        <i class="la la-check-square-o"></i> تحديث
    </button>
</div>
</form>

 </div>
    

    

    
@endsection


@section('script')

    <script>



        $("#pac-input").focusin(function() {
            $(this).val('');
        });

        $('#latitude').val('');
        $('#longitude').val('');


        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 24.740691, lng: 46.6528521 },
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: 'موقعك الحالي'
                    });
                    markers.push(marker);
                    marker.addListener('click', function() {
                        geocodeLatLng(geocoder, map, infoWindow,marker);
                    });
                    // to get current position address on load
                    google.maps.event.trigger(marker, 'click');
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                console.log('dsdsdsdsddsd');
                handleLocationError(false, infoWindow, map.getCenter());
            }

            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function(event) {
                SelectedLatLng = event.latLng;
                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log( results[0].formatted_address);
                            splitLatLng(String(event.latLng));
                            $("#pac-input").val(results[0].formatted_address);
                        }
                    }
                });
            });
            function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
                var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                $('#latitude').val(markerCurrent.position.lat());
                $('#longitude').val(markerCurrent.position.lng());

                geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#pac-input").val(results[0].formatted_address);

                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });
                SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
            }
            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }
            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }
            function clearMarkers() {
                setMapOnAll(null);
            }
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            $("#pac-input").val("أبحث هنا ");
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));


                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
        function splitLatLng(latLng){
            var newString = latLng.substring(0, latLng.length-1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng  = trainindIdArray[1];

            $("#latitude").val(lat);
            $("#longitude").val(Lng);
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=ar&region=EG
         async defer"></script>
    @stop
@if (!empty($restaurants))
    @foreach($restaurants as $restaurant)
        <div class="col-sm-4 col-xs-6 col-12 restaurant" data-id="{{ $restaurant->id }}">
            <div class="card">
                <a href="{{ route('influencer::restaurant.show', $restaurant->id) }}">
                    <div class="card-header">
                        {{ $restaurant->name }} - {{ $restaurant->id }}
                    </div>
                </a>
                <div class="card-body">
                    {{ $restaurant->description }}
                </div>
            </div>
        </div>
    @endforeach
@endif

<script>
    setTimeout(addMarkers, 2000);

    function addMarkers() {
                @foreach($restaurants as $restaurant)
                var lat = {{$restaurant->latitude}};
                var lng = {{$restaurant->longitude}};

                var markerLatlng = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));


                var mark = new google.maps.Marker({
                    map: map,
                    icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld={{ $restaurant->id }}|FE6256|000000',
                    position: markerLatlng
                });
        @endforeach
    }
</script>

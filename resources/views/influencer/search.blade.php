@extends('layouts.common')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="form-group row">
      <label for="kitchens" class="col-md-4 col-form-label text-md-right">Kitchens</label>
      <div class="col-md-6">
        @foreach ($kitchens as $kitchen)
          <input type="checkbox" name="kitchens[]" value="{{ $kitchen->slug }}" class="{{ $errors->has('kitchen') ? ' is-invalid' : '' }}">
          {{ $kitchen->label }}
        @endforeach

        @if ($errors->has('kitchen'))
          <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('kitchen') }}</strong>
          </span>
        @endif
      </div>
    </div>
      <div class="form-group row">
          <label for="kitchens" class="col-md-4 col-form-label text-md-right">Services</label>
          <div class="col-md-6">
              @foreach ($services as $service)
                  <input type="checkbox" name="services[]" value="{{ $service->slug }}" class="{{ $errors->has('service') ? ' is-invalid' : '' }}">
                  {{ $service->label }}
              @endforeach

              @if ($errors->has('service'))
                  <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('service') }}</strong>
              </span>
              @endif
          </div>
      </div>
    <div class="form-group row">
        <label for="distance" class="col-md-4 col-form-label text-md-right">Around me</label>
        <div class="col-md-6">
            <select id="distance" name="distance">
                <option value="false">Clear</option>
                <option value="1">1 km</option>
                <option value="2">2 km</option>
                <option value="3">3 km</option>
                <option value="4">4 km</option>
                <option value="5">5 km</option>
                <option value="10">10 km</option>
                <option value="15">15 km</option>
                <option value="20">20 km</option>
                <option value="2000">2000 km</option>
                <option value="8000">8000 km</option>
            </select>

            @if ($errors->has('distance'))
                <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('distance') }}</strong>
          </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="discount" class="col-md-4 col-form-label text-md-right">Minimum discount</label>
        <div class="col-md-6">
            <select id="discount" name="discount">
                <option value="false">Clear</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
                <option value="60">60</option>
                <option value="70">70</option>
                <option value="80">80</option>
                <option value="90">90</option>
                <option value="100">100</option>
            </select>

            @if ($errors->has('discount'))
                <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('discount') }}</strong>
          </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="eligible" class="col-md-4 col-form-label text-md-right">I'm eligible</label>
        <div class="col-md-6">
            <input id="eligible" type="checkbox" name="eligible">

            @if ($errors->has('eligible'))
                <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('eligible') }}</strong>
          </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="dateTime" class="col-md-4 col-form-label text-md-right">Reservation time</label>
        <div class="col-md-6">
            <input id="dateTime" type="datetime-local" name="dateTime">

            @if ($errors->has('dateTime'))
                <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('dateTime') }}</strong>
          </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-4">
        <button class="btn btn-primary">
          Search
        </button>
      </div>
    </div>

  <div class="p-t-20">
    <div class="row" id="post-data">
      @include ('influencer.restaurant.list')
    </div>
    <div class="ajax-load text-center" style="display:none">
      <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
    </div>
  </div>
</div>
@endsection

@section('js')
  <script type="text/javascript">
    var page = 1,
        stop = false,
        kitchens = [],
        services = [],
        aroundDistance,
        userLong, userLat,
        long, lat, eligible, discount, day, time, dayTime;

    // Infinite scroll trigger
    $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        page++;
        if (stop) return;
        loadMoreData(page);
      }
    });

    $('button').click(function() {
        changeFilter();
    });

    $( document ).ready(function() {
        initGeolocation();
    });

    function initGeolocation()
    {
        if( navigator.geolocation )
        {
            // Call getCurrentPosition with success and failure callbacks
            navigator.geolocation.getCurrentPosition( success, fail );
        }
        else
        {
            alert("Sorry, your browser does not support geolocation services.");
        }
    }

    function success(position)
    {
        long = userLong = position.coords.longitude;
        lat = userLat = position.coords.latitude;
    }

    function fail(error) {
        console.log(error);
    }

    // Build and send request each time the user reach the bottom of the page
    function loadMoreData(page){

        var url = '?';

        if (kitchens.length >= 1) {
            for (var i = 0; i < kitchens.length; i++) {
                if (url.slice(-1) !== '&' && url.slice(-1) !== '?') url += '&';
                url += 'kitchens[]=' + kitchens[i];
            }
        }

        if (services.length >= 1) {
            for (var y = 0; y < services.length; y++) {
                if (url.slice(-1) !== '&' && url.slice(-1) !== '?') url += '&';
                url += 'services[]=' + services[y];
            }
        }

        if (aroundDistance && aroundDistance !== 'false' && long && lat) {
            if (url.slice(-1) !== '&' && url.slice(-1) !== '?') url += '&';
            url += 'distance=' + aroundDistance;
            url += '&lat=' + lat;
            url += '&long=' +long;
        }

        if (discount && discount !== 'false') {
            if (url.slice(-1) !== '&' && url.slice(-1) !== '?') url += '&';
            url += 'discount=' + discount;
        }

        if (eligible) {
            if (url.slice(-1) !== '&' && url.slice(-1) !== '?') url += '&';
            url += 'eligible=true';
        }

        if (day && time && dayTime) {
            if (url.slice(-1) !== '&' && url.slice(-1) !== '?') url += '&';
            url += 'day=' + day;
            url += '&time=' + time;
            url += '&dayTime=' + dayTime;
        }

        url += '&page=' + page;

        console.log(url);

      $.ajax(
              {
                url: url,
                type: "get",
                beforeSend: function()
                {
                  $('.ajax-load').show();
                }
              })
              .done(function(data)
              {
                if(data.html === "" || data.html === " " || !data.html){
                    stop = true;
                  $('.ajax-load').html("No more records found");
                  return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(data.html);
              })
              .fail(function(jqXHR, ajaxOptions, thrownError)
              {
                alert('server not responding...');
              });
    }

    // Clear list and add new result based on the new filter
    function changeFilter(){
        kitchens = [];
        services = [];

        aroundDistance = $("#distance").val();

        $.each($("input[name='kitchens[]']:checked"), function() {
            kitchens.push($(this).val());
        });

        $.each($("input[name='services[]']:checked"), function() {
            services.push($(this).val());
        });

        discount = $("#discount").val();

        eligible = $("#eligible").is(':checked');

        var temp =  new Date($("#dateTime").val());

        day = temp.getDay();

        time = temp.getHours() + "-" + temp.getMinutes();

        if (temp.getHours() < 12) {
            dayTime = "morning";
        }
        else if (dayTime >= 12 && dayTime < 18){
            dayTime = "lunch";
        }
        else {
            dayTime = "dinner"
        }

        var url = '?';

        if (kitchens.length >= 1) {
            for (var i = 0; i < kitchens.length; i++) {
                if (url.slice(-1) !== '&' && url.slice(-1) !== '?') url += '&';
                url += 'kitchens[]=' + kitchens[i];
            }
        }

        if (services.length >= 1) {
            for (var y = 0; y < services.length; y++) {
                if (url.slice(-1) !== '&' && url.slice(-1) !== '?') url += '&';
                url += 'services[]=' + services[y];
            }
        }

        if (aroundDistance && aroundDistance !== 'false' && long && lat) {
            if (url.slice(-1) !== '&' && url.slice(-1) !== '?') url += '&';
            url += 'distance=' + aroundDistance;
            url += '&lat=' + lat;
            url += '&long=' +long;
        }


        if (discount && discount !== 'false') {
            if (url.slice(-1) !== '&' && url.slice(-1) !== '?') url += '&';
            url += 'discount=' + discount;
        }

        if (eligible) {
            if (url.slice(-1) !== '&' && url.slice(-1) !== '?') url += '&';
            url += 'eligible=true';
        }

        if (day && time) {
            if (url.slice(-1) !== '&' && url.slice(-1) !== '?') url += '&';
            url += 'day=' + day;
            url += '&time=' + time;
            url += '&dayTime=' + dayTime;
        }

        console.log(url);

        // Reset page param
        stop = false;
        $("#post-data").empty();
        page = 1;

        $.ajax(
            {
                url: url,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                if(data.html === "" || data.html === " " || !data.html){
                    stop = true;
                    $('.ajax-load').html("No records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('server not responding...');
            });
    }
  </script>
@endsection
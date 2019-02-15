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
        services = [];

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

    // Build and send request each time the user reach the bottom of the page
    function loadMoreData(page){

        var url = '?';

        if (kitchens.length >= 1) {
            for (var i = 0; i < kitchens.length; i++) {
                url += 'kitchens[]=' + kitchens[i];
                if (kitchens.length !== i) url += '&'
            }
        }

        if (services.length >= 1) {
            for (var y = 0; y < services.length; y++) {
                url += 'services[]=' + services[y];
                if (services.length !== i) url += '&'
            }
        }

        url += '&page=' + page;

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

        $.each($("input[name='kitchens[]']:checked"), function() {
            kitchens.push($(this).val());
        });

        $.each($("input[name='services[]']:checked"), function() {
            services.push($(this).val());
        });

        var url = '?';

        if (kitchens.length >= 1) {
            for (var i = 0; i < kitchens.length; i++) {
                url += 'kitchens[]=' + kitchens[i];
                if (kitchens.length !== i) url += '&'
            }
        }

        if (services.length >= 1) {
            for (var y = 0; y < services.length; y++) {
                url += 'services[]=' + services[y];
                if (services.length !== i) url += '&'
            }
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
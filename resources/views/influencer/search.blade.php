@extends('layouts.common')

@section('css')

@endsection

@section('content')
<div class="container">
  <form>
    @csrf
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text" class="form-control" id="inputZip">
      </div>
    </div>

  </form>
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
    var page = 1;
    $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() >= $(document).height()) {
        page++;
        loadMoreData(page);
      }
    });

    function loadMoreData(page){
      $.ajax(
              {
                url: '?page=' + page,
                type: "get",
                beforeSend: function()
                {
                  $('.ajax-load').show();
                }
              })
              .done(function(data)
              {
                if(data.html === " "){
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
  </script>
@endsection
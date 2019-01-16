@extends('layouts.common')

@section('css')

@endsection

@section('content')
<div class="getOneRestaurant hidden">
  <div class="container getOneRestaurantContainer">
    <div class="row">
      {{--getOneRestaurant == GOR--}}
      <div class="col-lg-6 col-12" style="border-right:1px solid black;">
        <div class="GORName underline">Restaurant Name</div>
        <div class="GORInformations underline">
          <div class="row">
            <div class="col-5 GORRestaurateur"><span>Restaurateur : </span>Nomdu Restaurateur</div>
            <div class="col-7 GORAddress"><span>Adresse : </span>41 allée du chateau de Ruffy, 51450, Bètheny</div>
            <div class="col-5 listStyle GORServices">
              <span>Services : </span>
              <ul>
                <li>Wifi</li>
                <li>Carte fidélité</li>
              </ul>
            </div>
            <div class="col-7 listStyle GORTypes">
              <span>Types de cuisine : </span>
              <ul>
                <li>Français</li>
                <li>Salade</li>
                <li>Sandwich</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="GORDescription underline">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          Aut doloribus libero optio, quis similique velit! Aspernatur assumenda consectetur cupiditate eum harum, ipsum nesciunt nobis praesentium, quae repudiandae saepe velit, vero.
        </div>
        <div class="GORReservation">
          <button class="btn btn-primary">Réserver pour 20%</button>
        </div>
      </div>
      <div class="col-lg-6 col-12">MENU</div>
    </div>
  </div>
</div>
<div class="container">
  <form>
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
    @if (!empty($restaurants))
      <div class="row">
        @forelse($restaurants as $restaurant)
          <div class="col-sm-4 col-xs-6 col-12 restaurant" data-id="{{ $restaurant->id }}">
            <div class="card">
              <div class="card-header">
                {{ $restaurant->name }}
              </div>
              <div class="card-body">
                {{ $restaurant->description }}
              </div>
            </div>
            
          </div>
        @empty
          <div class="col-12 card">
            <div class="card-body">
                Aucun restaurant
            </div>
          </div>
        @endforelse
      </div>
    @endif
  </div>
</div>
@endsection

@section('js')
  <script type="text/javascript">
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      });

      var url = "{{ route('guest::home') }}";

  </script>
@endsection
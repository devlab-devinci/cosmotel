@extends('layouts.common')

@section('css')

@endsection

@section('content')
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
          <div class="col-sm-4 col-xs-6 col-12">
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

@endsection
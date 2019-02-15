@if (!empty($restaurants))
    @foreach($restaurants as $restaurant)
        <div class="col-sm-4 col-xs-6 col-12 restaurant" data-id="{{ $restaurant->id }}">
            <div class="card">
                <a href="{{ route('influencer::restaurant.show', $restaurant->id) }}">
                    <div class="card-header">
                        {{ $restaurant->name }}
                    </div>
                </a>
                <div class="card-body">
                    {{ $restaurant->description }}
                </div>
                <h5>Kitchens</h5>
                <div class="card-body">
                    @foreach($restaurant->kitchens as $kitchen)
                        <p>{{ $kitchen->label }}</p>
                        <br>
                    @endforeach
                </div>
                <h5>Services</h5>
                <div class="card-body">
                    @foreach($restaurant->services as $service)
                        <p>{{ $service->label }}</p>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endif
@if (!empty($restaurants))
    @foreach($restaurants as $restaurant)
        <div class="col-sm-4 col-xs-6 col-12 restaurant" data-id="{{ $restaurant->id }}">
            <a href="{{ route('influencer::restaurant.show', $restaurant->id) }}">
                <div class="card">
                    <div class="card-header">
                        {{ $restaurant->name }}
                    </div>
                    <div class="card-body">
                        {{ $restaurant->description }}
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@endif
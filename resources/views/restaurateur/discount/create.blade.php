@extends('guest.layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header mb-3">Register your first discounts</div>
                    <form method="POST" action="{{ route('restaurateur::discount.store') }}">
                        @csrf

                        <input type="hidden" name="restaurant_id" value="{{ $restaurant_id }}">

                        <div id="discount_list">
                            <div id="discount_init">
                                <div class="form-group row">
                                    <label for="discount" class="col-md-4 col-form-label text-md-right">Discount</label>

                                    <div class="col-md-6">
                                        <input id="discount" type="number" min="1" max="100" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" name="discounts[1][discount]" required autofocus>

                                        @if ($errors->has('discount'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="discount" class="col-md-4 col-form-label text-md-right">Minimum subscribers</label>

                                    <div class="col-md-6">
                                        <input id="subscribers" type="number" step="500" class="form-control{{ $errors->has('subscribers') ? ' is-invalid' : '' }}" name="discounts[1][subscribers]" required autofocus>

                                        @if ($errors->has('subscribers'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('subscribers') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="discount" class="col-md-4 col-form-label text-md-right">Minimum stories</label>

                                    <div class="col-md-6">
                                        <input id="stories" type="number" step="1" class="form-control{{ $errors->has('stories') ? ' is-invalid' : '' }}" name="discounts[1][stories]" required autofocus>

                                        @if ($errors->has('stories'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('stories') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="discount" class="col-md-4 col-form-label text-md-right">Minimum posts</label>

                                    <div class="col-md-6">
                                        <input id="posts" type="number" step="1" class="form-control{{ $errors->has('posts') ? ' is-invalid' : '' }}" name="discounts[1][posts]" required autofocus>

                                        @if ($errors->has('posts'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('posts') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div id="moreDiscount" class="btn btn-secondary">
                                    More discount
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Publish new discount(s)
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $('#moreDiscount').click(function() {
            addDiscountInput();
        });

        var i = 2;

        function addDiscountInput() {
            var clone = $('#discount_init').clone();

            clone.find('input[name="discounts[1][discount]"]').attr('name', 'discounts[' + i + '][discount]');
            clone.find('input[name="discounts[1][discount]"]').val('');

            clone.find('input[name="discounts[1][subscribers]"]').attr('name', 'discounts[' + i + '][subscribers]');
            clone.find('input[name="discounts[1][discount]"]').val('');

            clone.find('input[name="discounts[1][stories]"]').attr('name', 'discounts[' + i + '][stories]');
            clone.find('input[name="discounts[1][stories]"]').val('');

            clone.find('input[name="discounts[1][posts]"]').attr('name', 'discounts[' + i + '][posts]');
            clone.find('input[name="discounts[1][posts]"]').val('');

            clone.appendTo('#discount_list');

            i++;
        }
    </script>
@endsection
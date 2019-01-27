var maxHeightRestaurant = 0;
var $restaurant = $('.restaurant');
var $gor = {
    name : $('.GORName'),
    description : $('.GORDescription'),
    // informations :
};
var $addProductLine = $('.addProductLine');
var $submitProducts = $('.submitProducts');

$(document).ready( function() {

    if ($restaurant.length > 0)
    {
        $.each($restaurant, function(index) {
            if ($(this).height() > maxHeightRestaurant)
            {
                maxHeightRestaurant = $(this).height();
            }
        });

        $restaurant.children().height(maxHeightRestaurant);
    }

    $addProductLine.click( function() {
        var contentToInsert = $('.productLine').html();
        var toInsert = '<div class="productLine form-row">'+contentToInsert+'</div>';
        
        $(toInsert).insertBefore($addProductLine);
    })

    $submitProducts.click( function() {
        $('.productLine').each( function(index) {
            var data = {
                'label': $(this).children('[data-propriety="label"]').children('input').val(),
                'category': $(this).children('[data-propriety="category"]').children('select').val(),
                'price': $(this).children('[data-propriety="price"]').children('input').val()
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                dataType: 'json',
                data: data,
                type: 'POST',
                error: function (jqXHR, status, errorCode) {
                    console.log(status);
                }
            }).done(function (response, status, jqXHR) {
                console.log(response);
            });

            if (index == $('.productLine').length - 1) {
                
            }
        })
        
    })

    $restaurant.click( function() {
        var urlToUse = url+"/restaurant/getOne/"+$(this).attr('data-id');
        console.log(url);
        $.ajax({
            url: urlToUse,
            type: 'GET',
            error: function (jqXHR, status, errorCode) {
                console.log(status);
            }
        }).done(function (response, status, jqXHR) {
            $gor.name.html(response.restaurant.name);
            $gor.description.html(response.restaurant.description);
            $('.getOneRestaurant').removeClass('hidden');
            // $gor.informations.restaurateur.html(response.)
        });
    });
});
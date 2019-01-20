var maxHeightRestaurant = 0;
var $restaurant = $('.restaurant');
var $gor = {
    name : $('.GORName'),
    description : $('.GORDescription'),
    // informations :
};
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

    $restaurant.click( function() {
        // var data = {'id': $(this).attr('data-id')};
        // console.log(data);
        /*$.ajax({
            url: url,
            dataType: 'json',
            data: data,
            type: 'POST',
            error: function (jqXHR, status, errorCode) {
                console.log(status);
            }
        }).done(function (response, status, jqXHR) {
            console.log(response);
        });*/

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
            // $gor.informations.restaurateur.html(response.)
        });
    });
});
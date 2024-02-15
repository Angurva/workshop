$(document).ready(function(){

    $('#sliderPrice').slider({
        range: true,
        min:0,
        max:60000,
        values:[10000,30000],
        slide:function(event,ui){
            let min = ui.values[0];
            let max = ui.values[1];

            $('#range').text(min+' - '+max);

            $.ajax({
                url: '/announces',
                method: 'post',
                data: {
                    min:min,
                    max:max
                },
                dataType:'json',
                success: function(response){
                    //let data = JSON.stringify(response);
/*
                    $('#card-vehicle').empty();
                    $('#card-vehicle').html();*/
                }

            })
        }

    });

});
$(document).ready(function(){

    $('#sliderPrice').slider({
        range: true,
        min:0,
        max:60000,
        values:[1000,50000],
        stop:function(event,ui){
            
            let min = ui.values[0];
            let max = ui.values[1];

            console.log(min);
            console.log(max);

            $('#range').text(min+' - '+max);

            $.ajax({
                url: '/announces/slider',
                method: 'POST',
                data: {
                    min:min,
                    max:max
                },
                dataType:'json'

            }) //ajax
            .done(function(response){


                    //let announce = JSON.stringify(response);
                    console.log(response);
                    $('#test').empty();
                    //$('#test').html(announce);
                    response.forEach(function(item,index,array)
                    {
                        let cardVe = "card_ve_"+index;
                        $('#test').append('<article class="card col-lg-4 m-3 p-0" id='+cardVe+'></article>');
                        $('#'+cardVe).append('<img src="../'+ item['ve_photo']+'" class="card-img-top img-fluid" alt="" >');
                        $('#'+cardVe).append('<div class="card-body"></div>');
                        $('#'+cardVe+'>.card-body').append('<h5 class="card-title">'+item['mo_name'] + ' ' + item['br_name']+'</h5>');
                        $('#'+cardVe+'>.card-body').append('<div class="card-text">Année: '+item['ve_year'] +'</div>');
                        $('#'+cardVe+'>.card-body').append('<div class="card-text">Kilométrage: '+item['ve_km'] +'</div>');
                        $('#'+cardVe+'>.card-body').append('<p class="card-text">Moteur: '+item['en_name'] +'</p>');
                        $('#'+cardVe+'>.card-body').append('<div class="card-text">Couleur: '+item['ve_color'] +'</div>');
                        $('#'+cardVe+'>.card-body').append('<p class="card-text">Nombre de portes: '+item['ve_doors'] +'</p>');
                        $('#'+cardVe+'>.card-body').append('<div class="card-text">Prix: '+item['ve_price'] +' €</div>');                      
                    }) //forEach*/

            })
            .fail(function(error){

            });
        } //slide event

    }); //slider

});// $document
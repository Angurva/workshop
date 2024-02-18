$(document).ready(function(){

    $('#sliderPrice').slider({
        range: true,
        min:0,
        max:60000,
        values:[0,60000],
        step: 1000,
        stop:function(event,ui){
            
            let min = ui.values[0];
            let max = ui.values[1];
            $('#rangePrice').text(min+' - '+max);

            $.ajax({
                url: '/announces/slider',
                method: 'POST',
                data: {
                    typeSlider:'v.ve_price',
                    min:min,
                    max:max
                },
                dataType:'json'

            }) //ajax
            .done(function(response){
                console.log(response);
                $('#announcelist').empty();
                //$('#test').html(announce);
                response.forEach(function(item,index,array)
                {
                    let cardVe = "card_ve_"+index;
                    createCard(cardVe,item);/*
                    $('#announcelist').append('<article class="card card-announces col-lg-4 m-3 p-0" id='+cardVe+'></article>');
                    $('#'+cardVe).append('<img src="../'+ item['ve_photo']+'" class="card-img-top img-fluid" alt="" >');
                    $('#'+cardVe).append('<div class="card-body"></div>');
                    $('#'+cardVe+'>.card-body').append('<h5 class="card-title">'+ item['br_name']+ ' ' +item['mo_name'] +'</h5>');
                    $('#'+cardVe+'>.card-body').append('<div class="card-text">Année: '+item['ve_year'] +'</div>');
                    $('#'+cardVe+'>.card-body').append('<div class="card-text">Kilométrage: '+item['ve_km'] +' km</div>');
                    $('#'+cardVe+'>.card-body').append('<p class="card-text">Moteur: '+item['en_name'] +'</p>');
                    $('#'+cardVe+'>.card-body').append('<div class="card-text">Couleur: '+item['ve_color'] +'</div>');
                    $('#'+cardVe+'>.card-body').append('<p class="card-text">Nombre de portes: '+item['ve_doors'] +'</p>');
                    $('#'+cardVe+'>.card-body').append('<div class="card-text">Prix: '+item['ve_price'] +' €</div>');  
                    $('#'+cardVe+'>.card-body').append('<a href="#" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on top">Details</a>');                    
                */}) //forEach*/

            })
            .fail(function(error){

            });
        } //slide event

    }); //slider
    $("#button-reset-price").on("click", () => {
        reset_slider("#sliderPrice");
      });

});// $document

$(document).ready(function(){

    $('#sliderKM').slider({
        range: true,
        min:0,
        max:300000,
        values:[0,300000],
        step: 10000,
        stop:function(event,ui){
            
            let min = ui.values[0];
            let max = ui.values[1];
            $('#rangeKm').text(min+' - '+max);

            $.ajax({
                url: '/announces/slider',
                method: 'POST',
                data: {
                    typeSlider:'v.ve_km',
                    min:min,
                    max:max
                },
                dataType:'json'

            }) //ajax
            .done(function(response){
                console.log(response);
                $('#announcelist').empty();
                //$('#test').html(announce);
                response.forEach(function(item,index,array)
                {
                    let cardVe = "card_ve_"+index;
                    createCard(cardVe,item);/*
                    $('#test').append('<article class="card card-announces col-lg-4 m-3 p-0" id='+cardVe+'></article>');
                    $('#'+cardVe).append('<img src="../'+ item['ve_photo']+'" class="card-img-top img-fluid" alt="" >');
                    $('#'+cardVe).append('<div class="card-body"></div>');
                    $('#'+cardVe+'>.card-body').append('<h5 class="card-title">'+ item['br_name']+ ' ' +item['mo_name'] +'</h5>');
                    $('#'+cardVe+'>.card-body').append('<div class="card-text">Année: '+item['ve_year'] +'</div>');
                    $('#'+cardVe+'>.card-body').append('<div class="card-text">Kilométrage: '+item['ve_km'] +' km</div>');
                    $('#'+cardVe+'>.card-body').append('<p class="card-text">Moteur: '+item['en_name'] +'</p>');
                    $('#'+cardVe+'>.card-body').append('<div class="card-text">Couleur: '+item['ve_color'] +'</div>');
                    $('#'+cardVe+'>.card-body').append('<p class="card-text">Nombre de portes: '+item['ve_doors'] +'</p>');
                    $('#'+cardVe+'>.card-body').append('<div class="card-text">Prix: '+item['ve_price'] +' €</div>');  
                    $('#'+cardVe+'>.card-body').append('<a href="#" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on top">Details</a>');                    
                */}) //forEach*/

            })
            .fail(function(error){

            });
        } //slide event

    }); //slider
    $("#button-reset-km").on("click", () => {
        reset_slider("#sliderKM");
      });

});// $document

$(document).ready(function(){

    $('#sliderYear').slider({
        range: true,
        min:2000,
        max:2024,
        values:[2000,2024],
        step: 1,
        stop:function(event,ui){
            
            let min = ui.values[0];
            let max = ui.values[1];
            $('#rangeYear').text(min+' - '+max);

            $.ajax({
                url: '/announces/slider',
                method: 'POST',
                data: {
                    typeSlider:'v.ve_year',
                    min:min,
                    max:max
                },
                dataType:'json'

            }) //ajax
            .done(function(response){
                console.log(response);
                $('#announcelist').empty();
                //$('#test').html(announce);
                response.forEach(function(item,index,array)
                {
                    let cardVe = "card_ve_"+index;
                    createCard(cardVe,item);
                    /*
                    $('#test').append('<article class="card card-announces col-lg-4 m-3 p-0" id='+cardVe+'></article>');
                    $('#'+cardVe).append('<img src="../'+ item['ve_photo']+'" class="card-img-top img-fluid" alt="" >');
                    $('#'+cardVe).append('<div class="card-body"></div>');
                    $('#'+cardVe+'>.card-body').append('<h5 class="card-title">'+ item['br_name']+ ' ' +item['mo_name'] +'</h5>');
                    $('#'+cardVe+'>.card-body').append('<div class="card-text">Année: '+item['ve_year'] +'</div>');
                    $('#'+cardVe+'>.card-body').append('<div class="card-text">Kilométrage: '+item['ve_km'] +' km</div>');
                    $('#'+cardVe+'>.card-body').append('<p class="card-text">Moteur: '+item['en_name'] +'</p>');
                    $('#'+cardVe+'>.card-body').append('<div class="card-text">Couleur: '+item['ve_color'] +'</div>');
                    $('#'+cardVe+'>.card-body').append('<p class="card-text">Nombre de portes: '+item['ve_doors'] +'</p>');
                    $('#'+cardVe+'>.card-body').append('<div class="card-text">Prix: '+item['ve_price'] +' €</div>');  
                    $('#'+cardVe+'>.card-body').append('<a href="#" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on top">Details</a>');                    
                */ }) //forEach*/

            })
            .fail(function(error){

            });
        } //slide event

    }); //slider
    $("#button-reset-year").on("click", () => {
        reset_slider("#sliderYear");
      });

});// $document

var reset_slider = function (slider_selector) {
    // Reset the sliders to their original min/max values
    $(slider_selector).each(function () {
      var options = $(this).slider("option");
  
      console.log(options);
  
      $(this).slider("values", [options.min, options.max]);
      window.location.replace("/announces");
    });
  };

let createCard = function (cardVe,item){
    $('#announcelist').append('<article class="card card-announces col-lg-4 m-3 p-0" id='+cardVe+'></article>');
    $('#'+cardVe).append('<img src="../'+ item['ve_photo']+'" class="card-img-top img-fluid" alt="" >');
    $('#'+cardVe).append('<div class="card-body"></div>');
    $('#'+cardVe+'>.card-body').append('<h5 class="card-title">'+ item['br_name']+ ' ' +item['mo_name'] +'</h5>');
    $('#'+cardVe+'>.card-body').append('<div class="card-text">Année: '+item['ve_year'] +'</div>');
    $('#'+cardVe+'>.card-body').append('<div class="card-text">Kilométrage: '+item['ve_km'] +' km</div>');
    $('#'+cardVe+'>.card-body').append('<p class="card-text">Moteur: '+item['en_name'] +'</p>');
    $('#'+cardVe+'>.card-body').append('<div class="card-text">Couleur: '+item['ve_color'] +'</div>');
    $('#'+cardVe+'>.card-body').append('<p class="card-text">Nombre de portes: '+item['ve_doors'] +'</p>');
    $('#'+cardVe+'>.card-body').append('<div class="card-text">Prix: '+item['ve_price'] +' €</div>');  
    $('#'+cardVe+'>.card-body').append('<form action="/announce-details" method="POST"></form>');
    $('#'+cardVe+'>.card-body>form').append('<input type="hidden" name="ve_id" value="'+ item['ve_id']+'">');
    $('#'+cardVe+'>.card-body>form').append('<button type="submit" class="btn btn-outline-primary"> Détails</button>');/*                    
    $('#'+cardVe+'>.card-body>form').append('<a href="#" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Tooltip on top">Details</a>');                    


    <input type="hidden" name="ve_id" value="<?php echo $announce['ve_id'] ?>"></input>*/
}

function datetimeShow()
{
    
    let daytime = new Date().toLocaleString('fr-FR', {
        weekday:'long',
        day:'numeric',
        month:'long',
        year:'numeric',
        hour:'numeric',
        minute:'numeric',
        second:'numeric',
    });

    document.getElementById('daytime').innerHTML = daytime;
    //document.write(daytime);
    setTimeout('datetimeShow()',1000);

}


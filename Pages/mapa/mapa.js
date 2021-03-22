function initMap() {
    //instanciando mapa
    const initialPosition = new google.maps.LatLng(-20.491278919074823, -43.685368522936606);

    //definido opcoes de inicio para o mapa
    const mapOp = {
        zoom: 13,
        center: initialPosition,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    //iniciando o mapa
    const mapa = new google.maps.Map(document.getElementById("mapa"), mapOp);
    
    
    var xmlhttp = new XMLHttpRequest(); //cria um objeto xmlhttp da classe XMLHttpRequest 
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) { //testa se a comunicação com o servidor está OK
            //converte o json num objeto javascript
            var myObj = JSON.parse(this.responseText);
            for(var i =0; i<myObj.length; i++){
                var mili = Date.parse(myObj[i].dataHora);
                var data = new Date(mili);
                var dataStr = data.getDate()+"/"+data.getMonth()+"/"+data.getFullYear()+"\n"+
                                data.getHours()+":"+data.getMinutes();
                console.log(dataStr);   


                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(myObj[i].latitude, myObj[i].longitude),
                    icon: "../styles/media/fireMarker.png",
                    map: mapa,
                    title : dataStr,
                    optimized: false                    
                });
            
            }
        
        }
    };
    //método open especifica o tipo de requisição com o servidor
    xmlhttp.open("GET", "LatLng.json", true);
    //envia a requisição para o servidor
    xmlhttp.send();
}


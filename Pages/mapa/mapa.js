function initMap(){
    const initialPosition = new google.maps.LatLng(-20.501952994977124, -43.67937015758853);
    const mapOp = {
        zoom: 10,
        center: initialPosition,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    const mapa = new google.maps.Map(document.getElementById("mapa"), mapOp);
}
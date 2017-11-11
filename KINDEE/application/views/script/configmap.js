
    let map ;
    let positionInit={
        lat: 13.312277, 
        lng: 100.532970
    }
    //13.312277, 100.532970 center of thailand 
    let mapInitOption={
        center : positionInit, 
        zoom : 0
    }
    
    let initMap = () => { // initiation map
        map = new google.maps.Map(document.getElementById('map'),mapInitOption)
    } // end function initMap
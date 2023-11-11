const coordinates = $('.coordinates');
const value = coordinates.text().trim();
const center = JSON.parse(value);

function init(){
    let map = new ymaps.Map('map', {
        center: center,
        zoom: 16
    });

    let placemark = new ymaps.Placemark(center,{},{

    });

    map.geoObjects.add(placemark);
}



ymaps.ready(init);

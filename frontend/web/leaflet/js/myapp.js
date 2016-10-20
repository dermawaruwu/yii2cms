var mymap = L.map('mapid').setView([3.5952, 98.6722], 12);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiZGVybWF3YXJ1d3UiLCJhIjoiY2l1ZmFhemkzMDAyNzMwbGwxcDhndmhvNCJ9.mj9dpYvfsWFRkypWQ6Ph4Q', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
        '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="http://mapbox.com">Mapbox</a>',
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiZGVybWF3YXJ1d3UiLCJhIjoiY2l1ZmFhZTJpMDAxODJ0cWw1eG45NGY2eSJ9.2i3qQugejGHeQ-VIwG-fxg'
}).addTo(mymap);

var marker = L.marker([3.5952, 98.6722]).addTo(mymap);

var circle = L.circle([3.5952, 98.7722], {
    color: "green",
    fillColor: "green",
    fillOpacity: 0.3,
    radius: 700
}).addTo(mymap);

var polygon = L.polygon([
    [3.5952, 98.6722],
    [3.5952, 98.7722],
    [3.6952, 98.8722],
    [3.6752, 98.6922],

]).addTo(mymap);

marker.bindPopup("Hello There Marker");
circle.bindPopup("Hello There circle").openPopup();
polygon.bindPopup("I am polygon");

var popup = L.popup();

function onMapClick(e){
    //alert("You clicked the map at" + e.latlng);
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap)
}

mymap.on('click', onMapClick);


var customControl =  L.Control.extend({

  options: {
    position: 'topleft'
  },

  onAdd: function (map) {
    var container = L.DomUtil.create('mapid', 'leaflet-bar leaflet-control leaflet-control-custom');

    container.style.backgroundColor = 'white';     
    container.style.backgroundImage = "url(https://lh3.googleusercontent.com/Z4a7hOBbvq13uKH2KSP45dH0RbRDEaLlGyyp1QdDY_P9NSat06S9tdQg0_jqYAbcH5m3nKebiTqmZg=s30-no)";
    container.style.backgroundSize = "30px 30px";
    container.style.width = '30px';
    container.style.height = '30px';

    container.onclick = function(){
      console.log('buttonClicked');
    }

    return container;
  }
});
mymap.addControl(new customControl());

var yellowIcon = new L.Icon({
    // iconUrl: 'themes/stdevs/assets/img/markers/marker-icon-yellow.png',
    iconUrl: "/themes/stdevs/assets/img/markers/marker-icon-orange.png",
    shadowUrl: "/themes/stdevs/assets/img/markers/marker-shadow.png",
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41],
});

L.marker([50.645401, 21.068991], { icon: yellowIcon }).addTo(map);

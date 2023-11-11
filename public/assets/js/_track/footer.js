// Initialisation de la carte
var map = L.map('map').setView([43.58337880255942, 1.4340533644976352], 14);
// Chargement des tuiles
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: '&copy; <a href="https://www.openstreetmap.org/fixthemap">OpenStreetMap</a>'
}).addTo(map);
// Marqueur
var marker = L.marker([43.58337880255942, 1.4340533644976352]).addTo(map);
// Popup du marqueur
marker.bindPopup("<b>GARAGE<br>V.PARROT</b>").openPopup();
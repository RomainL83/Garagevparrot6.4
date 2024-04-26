// Récupération de l'élément de l'onglet "Nos Véhicules d'Occasion"
const openPopinVehicule = document.getElementById('open-popin-vehicule');

// Récupération de l'élément du menu de recherche de véhicules
const vehicleSearchMenu = document.getElementById('vehicle-search-menu');

// Écouteur d'événement pour ouvrir le menu lorsqu'on clique sur l'onglet
openPopinVehicule.addEventListener('click', () => {
    // Affichage du menu au milieu de l'écran
    vehicleSearchMenu.style.display = 'block';
});

// Écouteur d'événement pour fermer le menu lorsque l'utilisateur clique en dehors de celui-ci
document.addEventListener('click', (event) => {
    if (event.target !== nosVehiculesTab && event.target !== vehicleSearchMenu) {
        vehicleSearchMenu.style.display = 'none';
    }
});

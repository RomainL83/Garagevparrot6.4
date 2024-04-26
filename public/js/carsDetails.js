// Tableau des détails des véhicules
const carsDetails = [
    {
        index: 3,
        name: "Land Rover",
        year: 2021,
        km: 98560,
        color: "orange",
        price: 51600,
        boite: 'auto',
        fuelType: 'Diesel',
        transmission: 'Automatique',
        engine: '6 cylindres',
        horsepower: 275,
        acceleration: '7,2 secondes (0-100 km/h)',
        topSpeed: '220 km/h',
        fuelEfficiency: '8.0 L/100km (ville), 6.5 L/100km (autoroute)',
        seats: 5,
        doors: 4,
        dimensions: 'Longueur: 4371 mm, Largeur: 1904 mm, Hauteur: 1645 mm',
        weight: '1780 kg',
        cargoCapacity: '650 litres',
        warranty: 'Garantie de 2 ans / 40 000 km',
        safetyFeatures: ['Airbags', 'Système de contrôle de stabilité', 'Assistance au freinage d\'urgence'],
        entertainmentSystem: 'Système audio Land Rover Touch Pro',
    },
    {
        index: 4,
        name: "BMW black series",
        year: 2022,
        km: 35230,
        color: "noir",
        price: 41600,
        boite: 'auto',
        fuelType: 'Diesel',
        transmission: 'Automatique',
        engine: '4 cylindres',
        horsepower: 204,
        acceleration: '7,8 secondes (0-100 km/h)',
        topSpeed: '210 km/h',
        fuelEfficiency: '6.5 L/100km (ville), 5.2 L/100km (autoroute)',
        seats: 4,
        doors: 2,
        dimensions: 'Longueur: 4446 mm, Largeur: 1835 mm, Hauteur: 1418 mm',
        weight: '1540 kg',
        cargoCapacity: '420 litres',
        warranty: 'Garantie de 2 ans / 50 000 km',
        safetyFeatures: ['Airbags', 'Système de contrôle de traction', 'Freins à disque antiblocage'],
        entertainmentSystem: 'Système audio Harman Kardon',
    },
    {
        index: 5,
        name: "DS5 crossback",
        year: 2018,
        km: 78013,
        color: "bleu nuit",
        price: 27490,
        boite: 'auto',
        fuelType: 'Diesel',
        transmission: 'Automatique',
        engine: '4 cylindres',
        horsepower: 180,
        acceleration: '9,2 secondes (0-100 km/h)',
        topSpeed: '190 km/h',
        fuelEfficiency: '5.6 L/100km (ville), 4.3 L/100km (autoroute)',
        seats: 5,
        doors: 5,
        dimensions: 'Longueur: 4529 mm, Largeur: 1871 mm, Hauteur: 1523 mm',
        weight: '1420 kg',
        cargoCapacity: '468 litres',
        warranty: 'Garantie de 2 ans / 40 000 km',
        safetyFeatures: ['Airbags', 'Système de freinage assisté', 'Système de surveillance de la pression des pneus'],
        entertainmentSystem: 'Système audio DS Connect Nav',
    },
    {
        index: 6,
        name: "Mercedes GLS",
        year: 2022,
        km: 1206,
        color: "bleu pervenche",
        price: 96938,
        boite: 'auto',
        fuelType: 'Hybrid',
        transmission: 'Automatique',
        engine: '6 cylindres',
        horsepower: 362,
        acceleration: '5,9 secondes (0-100 km/h)',
        topSpeed: '250 km/h',
        fuelEfficiency: '6.7 L/100km (ville), 6.1 L/100km (autoroute)',
        seats: 7,
        doors: 5,
        dimensions: 'Longueur: 5207 mm, Largeur: 1956 mm, Hauteur: 1823 mm',
        weight: '2450 kg',
        cargoCapacity: '355 litres',
        warranty: 'Garantie de 2 ans / 60 000 km',
        safetyFeatures: ['Airbags', 'Système de freinage d\'urgence actif', 'Contrôle de stabilité électronique'],
        entertainmentSystem: 'Système audio Burmester Surround Sound',
    },
    {
        index: 1,
        name: "Mercedes AMG",
        year: 2023,
        km: 12000,
        color: "noir",
        price: 102000,
        boite: 'auto',
        fuelType: 'Essence',
        transmission: 'Automatique',
        engine: 'V8',
        horsepower: 503,
        acceleration: '4,0 secondes (0-100 km/h)',
        topSpeed: '250 km/h',
        fuelEfficiency: '8.5 L/100km (ville), 6.2 L/100km (autoroute)',
        seats: 2,
        doors: 2,
        dimensions: 'Longueur: 4746 mm, Largeur: 1939 mm, Hauteur: 1284 mm',
        weight: '1760 kg',
        cargoCapacity: '300 litres',
        warranty: 'Garantie de 2 ans / 50 000 km',
        safetyFeatures: ['Airbags', 'Système de freinage d\'urgence', 'Contrôle de stabilité'],
        entertainmentSystem: 'Système audio haut de gamme Burmester',
    },
    {
        index: 2,
        name: "Audi Jeep Q3",
        year: 2023,
        km: 144000,
        color: "gris",
        price: 36990,
        boite: 'auto',
        fuelType: 'Hybride',
        transmission: 'Automatique',
        engine: '4 cylindres',
        horsepower: 230,
        acceleration: '6,5 secondes (0-100 km/h)',
        topSpeed: '220 km/h',
        fuelEfficiency: '5.2 L/100km (ville), 4.7 L/100km (autoroute)',
        seats: 5,
        doors: 5,
        dimensions: 'Longueur: 4484 mm, Largeur: 1856 mm, Hauteur: 1616 mm',
        weight: '1620 kg',
        cargoCapacity: '460 litres',
        warranty: 'Garantie de 3 ans / 60 000 km',
        safetyFeatures: ['Airbags', 'Système de freinage antiblocage', 'Contrôle de traction'],
        entertainmentSystem: 'Système audio Audi MMI',
    },
    {
        index: 7,
        name: "BMW X1",
        year: 2018,
        km: 187000,
        color: "gris métalique",
        price: 12000,
        boite: 'Manuelle',
        fuelType: 'Diesel',
        transmission: 'Manuelle',
        engine: '4 cylindres',
        horsepower: 150,
        acceleration: '9,3 secondes (0-100 km/h)',
        topSpeed: '200 km/h',
        fuelEfficiency: '5.2 L/100km (ville), 4.3 L/100km (autoroute)',
        seats: 5,
        doors: 5,
        dimensions: 'Longueur: 4439 mm, Largeur: 1821 mm, Hauteur: 1598 mm',
        weight: '1490 kg',
        cargoCapacity: '505 litres',
        warranty: 'Garantie de 1 an / 30 000 km',
        safetyFeatures: ['Airbags', 'Système de freinage antiblocage', 'Contrôle de traction dynamique'],
        entertainmentSystem: 'Système audio BMW Professional',
    },
    {
        index: 8,
        name: "volkswagen Polo",
        year: 2015,
        km: 129000,
        color: "rouge",
        price: 5938,
        boite: 'Manuelle',
        fuelType: 'Diesel',
        transmission: 'Manuelle',
        engine: '4 cylindres',
        horsepower: 90,
        acceleration: '12,3 secondes (0-100 km/h)',
        topSpeed: '170 km/h',
        fuelEfficiency: '4.5 L/100km (ville), 3.8 L/100km (autoroute)',
        seats: 5,
        doors: 5,
        dimensions: 'Longueur: 3885 mm, Largeur: 1695 mm, Hauteur: 1510 mm',
        weight: '1050 kg',
        cargoCapacity: '286 litres',
        warranty: 'Garantie de 1 an / 20 000 km',
        safetyFeatures: ['Airbags', 'Système de freinage assisté', 'Système de contrôle de la stabilité'],
        entertainmentSystem: 'Système audio volkswagen Touch 2',
    },

];
// Fonction pour afficher les détails du véhicule dans le modal
function displayCarDetails(index) {
    const modal = document.getElementById("modalCar");
    const modalCarContent = document.querySelector('.modal-car-content');
    const modalTitle = document.getElementById("modal-car-title");
    const modalCarDetails = document.getElementById("modal-car-details");

    // Récupérez l'index du véhicule qui matchera sur le numéro de la photo du véhicule
    const selectedCar = carsDetails[index].index;
    // Définissez l'image de fond de la div modal-car-content
    modalCarContent.style.backgroundImage = `url(../img/cars/${selectedCar}).png`

    // Remplace par le nom du véhicule dans le modal
    modalTitle.textContent = carsDetails[index].name;

    // Construire le contenu des détails du véhicule
    modalCarDetails.innerHTML = `
    <p>Année : ${carsDetails[index].year}</p>
    <p>Kilométrage : ${carsDetails[index].km} km</p>
    <p>Couleur : ${carsDetails[index].color}</p>
    <p>Prix : ${carsDetails[index].price}€</p>
    <p>Boîte de vitesse : ${carsDetails[index].boite}</p>
    <p>Type de carburant : ${carsDetails[index].fuelType}</p>
    <p>Transmission : ${carsDetails[index].transmission}</p>
    <p>Moteur : ${carsDetails[index].engine}</p>
    <p>Puissance : ${carsDetails[index].horsepower} chevaux</p>
    <p>Accélération : ${carsDetails[index].acceleration}</p>
    <p>Vitesse maximale : ${carsDetails[index].topSpeed}</p>
    <p>Consommation de carburant : ${carsDetails[index].fuelEfficiency}</p>
    <p>Nombre de sièges : ${carsDetails[index].seats}</p>
    <p>Nombre de portes : ${carsDetails[index].doors}</p>
    <p>Dimensions : ${carsDetails[index].dimensions}</p>
    <p>Poids : ${carsDetails[index].weight}</p>
    <p>Capacité de chargement : ${carsDetails[index].cargoCapacity}</p>
    <p>Garantie : ${carsDetails[index].warranty}</p>
    <p>Équipements de sécurité : ${carsDetails[index].safetyFeatures.join(', ')}</p>
    <p>Système de divertissement : ${carsDetails[index].entertainmentSystem}</p>
`;

    modal.style.display = "flex";

}

document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('modalCar');
    var modalContent = document.querySelector('.modal-car-content');

    modal.addEventListener('click', function(e) {
        // Vérifier si le clic est en dehors du contenu du modal
        if (!modalContent.contains(e.target)) {
            modal.style.display = 'none';
        }
    });

    const closeButton = document.querySelector(".modal-car-close");
    closeButton.addEventListener("click", () => {
        modal.style.display = "none";
    });

    const infoButtons = document.querySelectorAll(".show-details");
    infoButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
            displayCarDetails(index);
            modal.style.display = "flex";
        });
    });
});

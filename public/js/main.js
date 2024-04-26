let isScrolling = false;

function scrollTestimonials() {
    const container = document.querySelector('.testimonials-container');
    if (container && !isScrolling) {
        container.scrollLeft += 1.5;
        if (container.scrollWidth === container.scrollLeft + container.clientWidth) {
            container.scrollLeft = 0;
        }
    }
}

setInterval(scrollTestimonials, 30);

function scrollToService(serviceId) {
    const element = document.getElementById(serviceId);
    if (element) {
        isScrolling = true;
        element.scrollIntoView({ behavior: "smooth", block: "start" });
        setTimeout(() => {
            isScrolling = false;
        }, 1000);
    }
}

function toggleMenu() {
    var menu = document.querySelector('nav ul');
    if (menu) {
        menu.classList.toggle('active');
    }
}

document.addEventListener('scroll', function () {
    var filterBar = document.getElementById('filter-bar');
    var carsSection = document.getElementById('cars').offsetTop;
    var teamSection = document.getElementById('team').offsetTop;
    if (filterBar) {
        if (window.pageYOffset >= carsSection && window.pageYOffset < teamSection) {
            filterBar.classList.remove('filter-bar-hidden');
        } else {
            filterBar.classList.add('filter-bar-hidden');
        }
    }
});

function openModal() {
    console.log('open');
    var modal = document.getElementById("loginModal");
    if (modal) {
        modal.style.display = "block";
    }
}

function closeModal() {
    var modal = document.getElementById("loginModal");
    if (modal) {
        modal.style.display = "none";
    }
}

var loginLink = document.querySelector("nav a[href='#login']");
if (loginLink) {
    loginLink.addEventListener("click", openModal);
}

window.addEventListener("click", function (event) {
    var modal = document.getElementById("loginModal");
    if (event.target == modal) {
        closeModal();
    }
});

var loginForm = document.getElementById("loginForm");
if (loginForm) {
    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();
        closeModal();
        // Logique de connexion ici
    });
}

const likeButtons = document.querySelectorAll('.like-button');
likeButtons.forEach(likeBtn => {
    likeBtn.addEventListener('click', function (e) {
        e.preventDefault();
        const nbLikesElement = this.querySelector('#nb-likes');
        let nbLikes = parseInt(nbLikesElement.innerText);
        const carId = this.getAttribute('data-car-id');
        const isLiked = this.classList.contains('liked');
        const newLikesCount = isLiked ? nbLikes - 1 : nbLikes + 1;

        // Appeler la route /like pour mettre à jour le serveur
        fetch('/like/' + carId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                liked: !isLiked // Envoyer le nouvel état du like
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Mettre à jour l'interface utilisateur seulement si le serveur confirme le changement
            this.classList.toggle('liked', !isLiked);
            nbLikesElement.innerText = newLikesCount;
            console.log('Server response:', JSON.stringify(data));
        })
        .catch(error => {
            console.error("Erreur lors de la mise à jour du like :", error);
        });
    });
});

/*---------------------Header Navigation-------------------------*/

// Close the navigation menu by removing the active class
function closeMenu() {
    const navLinks = document.getElementById('navLinks'); 
    navLinks.classList.remove('active'); 
}

// Close all dropdowns by removing the show class
function closeDropdown() {
    const dropdownContents = document.querySelectorAll('.dropdown-content'); 
    dropdownContents.forEach(content => content.classList.remove('show')); 
}

// Global event listener to close menus/dropdowns when a click is detected elsewhere
document.addEventListener('click', function (event) {
    const hamburger = document.querySelector('.hamburger'); 
    const navLinks = document.getElementById('navLinks'); 
    const dropdowns = document.querySelectorAll('.dropdown'); 

    // Checks if the click is outside the navigation menu and hamburger button
    if (hamburger && navLinks) { 
        if (!navLinks.contains(event.target) && !hamburger.contains(event.target)) { 
            closeMenu(); 
            }
        }

        if (dropdowns.length > 0) { 
        let isDropdownClick = false; 
        dropdowns.forEach(dropdown => {
            if (dropdown.contains(event.target)) { 
                isDropdownClick = true; 
            }
        });

        // If no click in the dropdown, it remains closed
        if (!isDropdownClick) {
            closeDropdown();
        }
    }
});

// Opens or closes the navigation menu by toggling the active class
function toggleMenu() {
    const navLinks = document.getElementById('navLinks'); 
    navLinks.classList.toggle('active'); 
}

// Open or close the dropdown
function toggleDropdown(element, event) {
    event.preventDefault(); 
    const dropdownContent = element.nextElementSibling; 
    dropdownContent.classList.toggle('show'); 
}

/*--------------------Scroll to top Button----------------------*/

// Show or hide the scroll-to-top button
window.addEventListener("scroll", function () {
    const scrollToTopButton = document.getElementById("scroll-to-top"); 
    if (window.scrollY > 100) { 
        scrollToTopButton.style.display = "block"; 
    } else {
        scrollToTopButton.style.display = "none"; 
    }
});

/*-----------------------Bootstrap Messages---------------------*/

setTimeout(() => {
    document.querySelectorAll('.alert').forEach(alert => alert.remove()); 
}, 3000); // Deletes alerts after 3 seconds

/*---------------------Profile page tooltips--------------------*/

document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search); 

    // Managing success notifications
    if (urlParams.has('success')) { 
        const successMessage = urlParams.get('success') === 'password' 
            ? 'Mot de passe modifié avec succès !' 
            : 'Modification effectuée avec succès !';
        showNotification(successMessage); 

        // Prevent notifications from repeating if refresh
        window.history.replaceState({}, document.title, window.location.pathname); 
    }

    // Handling error notifications
    if (urlParams.has('error')) { 
        const errorType = urlParams.get('error'); 
        if (errorType === 'incorrect_password') { 
            showNotification('Mot de passe actuel incorrect.', 'error'); 
        } else if (errorType === 'password_error') {
            showNotification('Les mots de passe ne correspondent pas.', 'error'); 
        }

        window.history.replaceState({}, document.title, window.location.pathname); 
    }
});

// Displaying notifications
function showNotification(message, type = 'success') { 
    const notification = document.getElementById('notification'); 
    notification.textContent = message;

    // Styles
    notification.className = 'notification'; 
    if (type === 'error') {
        notification.classList.add('error'); 
    }
    notification.style.display = 'block'; 
    setTimeout(() => { 
        notification.style.display = 'none';
    }, 3000);
}

/*-----------------------------Footer--------------------------*/

// Pictures table
const images = [
    { src: "assets/img/sonic.jpg", alt:"Sonic"},
    { src: "assets/img/mario.jpg", alt:"Mario"},
    { src: "assets/img/luigi.png", alt:"Luigi"},
    { src: "assets/img/peach.png", alt:"Peach"},
    { src: "assets/img/fight.jpg", alt:"Street Fighter"},
    { src: "assets/img/prince.png", alt:"Prince of Persia"},
    { src: "assets/img/raider.png", alt:"Tomb Raider"},
    { src: "assets/img/CoD.png", alt:"Call of Duty"},
    { src: "assets/img/speed.png", alt:"Need for Speed"},
    { src: "assets/img/fantasy.png", alt:"Final Fantasy"},
    { src: "assets/img/doom.png", alt:"Doom"},
    { src: "assets/img/play.png", alt:"Playstation"},
    { src: "assets/img/sega.png", alt:"Out Run"},
    { src: "assets/img/xbox.jpg", alt:"xbox"},
    { src: "assets/img/boy.png", alt:"Game Boy"},
    { src: "assets/img/donkey.jpg", alt:"Donkey Kong"}
];

// Random choice of images
function getRandomImage() {
    return images[Math.floor(Math.random() * images.length)];
}

// Updating images
function updateImages() {
    const imageContainer1 = document.getElementById("random-image-1");
    const imageContainer2 = document.getElementById("random-image-2");

    const randomImage1 = getRandomImage();
    let randomImage2 = getRandomImage();

    while (randomImage2.src === randomImage1.src) {
        randomImage2 = getRandomImage();
    }
    imageContainer1.innerHTML = `<img src="${randomImage1.src}" alt="${randomImage1.alt}" loading="lazy">`;
    imageContainer2.innerHTML = `<img src="${randomImage2.src}" alt="${randomImage2.alt}" loading="lazy">`;
}

// Displays images immediately
document.addEventListener("DOMContentLoaded", () => {
    updateImages();

    // Changes images every 5 seconds
    setInterval(updateImages, 5000);});


/*---------Automatically resize text boxes textarea-------------*/

document.querySelectorAll('.comment-table textarea').forEach((textarea) => {
    textarea.style.height = textarea.scrollHeight + "px";
    textarea.addEventListener('input', (event) => {
        textarea.style.height = "auto"; 
        textarea.style.height = textarea.scrollHeight + "px"; 
    });
});

// Set up primary nav contents
const primaryNav = document.getElementById('primaryNav');

let primaryNavContents = '<div class="container-fluid">';
primaryNavContents += '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>';
primaryNavContents += '<a class="navbar-brand" href="/">Living Pok&eacute;Dex Tracker<span class="d-none d-lg-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</span></a>';
primaryNavContents += '<div class="collapse navbar-collapse" id="navbarCollapse">';
primaryNavContents += '<ul class="navbar-nav mr-auto">';
primaryNavContents += '<li class="nav-item" id="nav-home"><a class="nav-link" href="/">Home</a></li>';
primaryNavContents += '<li class="nav-item" id="nav-pokedex"><a class="nav-link" href="/pokedex/">Pok&eacute;dex</a></li>';
//primaryNavContents += '<li class="nav-item" id="nav-alts"><a class="nav-link" href="/alts/">Alt Forms Guide</a></li>';
//primaryNavContents += '<li class="nav-item" id="nav-faq"><a class="nav-link" href="/faq/">FAQ</a></li>';
//primaryNavContents += '<li class="nav-item" id="nav-progress"><a class="nav-link" href="/progress/">Progress &amp; To-dos</a></li>';
//primaryNavContents += '<li class="nav-item" id="nav-feedback"><a class="nav-link" href="/feedback/">Feedback</a></li>';
//primaryNavContents += '<li class="nav-item" id="nav-donate"><a class="nav-link" href="/donate/">Toss A Coin To Your Designer</a></li>';
primaryNavContents += '</ul></div>';
primaryNavContents += '<div class="dropdown" id="profileDropdown"><button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Toggle profile drop-down"><img src="/assets/icons/profile.svg"><span id="profileUserNavbar"></span></button>';
primaryNavContents += '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">';
primaryNavContents += '<li><a class="dropdown-item" href="./profile/">Profile</a></li>';
primaryNavContents += '<li><hr class="dropdown-divider"></li>';
primaryNavContents += '<li><a class="dropdown-item" onclick="logout()" href="#">Sign out</a></li>';
primaryNavContents += '</ul></div>';
primaryNavContents += '<a href="./signin/" id="signin-button"><button class="btn btn-primary btn-sm signin" type="button">Sign in</button></a>';
primaryNavContents += '</div>';
primaryNavContents += '</div>';

primaryNav.innerHTML = primaryNavContents;

// Set up footer contents
const footer = document.getElementById('footer');
let footerContents = '<div class="container">';
footerContents += '<p class="small text-center">Site design and layout by <a href="https://stephaniecervi.net" target="_blank">Stephanie Cervi</a>. Pok&eacute;mon images, names, forms, and other relevant information are the property of Nintendo.</p></div>';

footer.innerHTML = footerContents;

// Get the active page and set CSS class
const currentPage = document.location.pathname;

let filename = currentPage.slice(1, -1);
if (!filename) {
	filename = 'home';
}
let navID = `nav-${filename}`;

const navElement = document.getElementById(navID);
if (navElement) {
	navElement.classList.add('active');
}
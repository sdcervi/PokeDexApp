const footerDiv = document.getElementById('footer');

let cookieBanner = '<div id="cookie-banner" class="alert alert-dark text-center mb-0 row" role="alert"><div class="col-12 col-sm-10 col-lg-11 mb-2 mb-sm-0">This website uses only essential cookies for managing user authentication. No other data is collected or shared with third parties.</div><div class="col-12 col-sm-2 col-lg-1"><button type="button" class="btn btn-primary btn-sm" onclick="hideCookieBanner()">Accept</button></div></div>';

footerDiv.innerHTML += cookieBanner;

/* Javascript to show and hide cookie banner using localstorage */
/* Shows the Cookie banner */
function showCookieBanner () {
	let cookieBanner = document.getElementById('cookie-banner');
	cookieBanner.style.display = 'flex';
}

/* Hides the Cookie banner and saves the value to localstorage */
function hideCookieBanner () {
	localStorage.setItem('pokedex_isCookieAccepted', 'yes');
	let cookieBanner = document.getElementById('cookie-banner');
	cookieBanner.style.display = 'none';
}

/* Checks the localstorage and shows Cookie banner based on it. */
function initializeCookieBanner () {
	let isCookieAccepted = localStorage.getItem('pokedex_isCookieAccepted');
	if(isCookieAccepted === null) {
		localStorage.setItem("pokedex_isCookieAccepted", "no");
		showCookieBanner();
	}
	if(isCookieAccepted === "no") {
		showCookieBanner();
	}
}
	
window.onload = initializeCookieBanner();
// Configure OAuth according to new requirements as of Jun 18 2023
/* firebaseConfig = {
  apiKey: "AIzaSyAO5f-6vwfwVNoC1PupRAk_Uv4nwdc0TZg",
  authDomain: "https://pokedexapp.net/",
  databaseURL: "https://living-pokedex-tracker-5c0b4.firebaseio.com",
  projectId: "living-pokedex-tracker-5c0b4",
  appId: "1:1028261796611:web:7071759fd2c674b06c6736"
}; */

// Initialize the FirebaseUI Widget using Firebase.
const ui = new firebaseui.auth.AuthUI(firebase.auth());

ui.start('#firebaseui-auth-container', {
	signInOptions: [{
		provider: firebase.auth.EmailAuthProvider.PROVIDER_ID,
		requireDisplayName: true },
		firebase.auth.GoogleAuthProvider.PROVIDER_ID
	]
});

const uiConfig = {
	callbacks: {
		signInSuccessWithAuthResult: function(authResult, redirectUrl) {
			// User successfully signed in.
			// Return type determines whether we continue the redirect automatically
			// or whether we leave that to developer to handle.
			return true;
		},
		uiShown: function() {
			// The widget is rendered.
			// Hide the loader.
			document.getElementById('loader').style.display = 'none';
		}
	},
	// Will use popup for IDP Providers sign-in flow instead of the default, redirect.
	signInFlow: 'popup',
	signInSuccessUrl: '/pokedex/',
	signInOptions: [
		// Leave the lines as is for the providers you want to offer your users.
		firebase.auth.EmailAuthProvider.PROVIDER_ID,
		firebase.auth.GoogleAuthProvider.PROVIDER_ID
	],
	// Terms of service url.
	tosUrl: './terms-of-service.html',
	// Privacy policy url.
	privacyPolicyUrl: './privacy-policy.html'
};

// The start method will wait until the DOM is loaded.
ui.start('#firebaseui-auth-container', uiConfig);
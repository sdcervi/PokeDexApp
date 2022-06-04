const db = firebase.firestore();

// Get user data; if data does not exist, initialize
function getUserData (user) {
	const userData = db.collection('userData').doc(user.uid);
	userData.get().then((doc) => {
        if (doc.exists) {
			if (document.location.pathname == '/pokedex/index.html' || document.location.pathname == '/pokedex/' || document.location.pathname == '/profile/index.html' || document.location.pathname == '/profile/' ) {
				getProfileData (user);
			} else {
				return;
			}
		} else {
			userData.set({
				nat_normal_expand: true,
				alt_normal_expand: true,
				nat_shiny_expand: true,
				alt_shiny_expand: true
			}).then(() => {
				return;
			}).catch((error) => {
				console.error('Error writing document: ', error);
			});
		}
    }).catch((error) => {
		console.log('Error getting user data: ', error);
	});
}

// Log the user out
function logout () {
	firebase.auth().signOut()
		.then(function() {
			location.href = '/index.html';
		})
		.catch(function(error) {
			console.log ('Sign out error');
		});
}

// Check whether the user is logged in
firebase.auth().onAuthStateChanged(function(user) {
	if (user) {
		document.getElementById('signin-button').remove();
		document.getElementById('profileDropdown').style.display = 'block';
		document.getElementById('profileUserNavbar').textContent = user.displayName;
		getUserData(user);
	} else {
		document.getElementById('signin-button').firstElementChild.style.display = 'inline-block';
		document.getElementById('profileDropdown').remove();
		if (document.getElementById('signout-button')) {
			document.getElementById('signout-button').remove();
		}
		if (document.getElementById('sign-in-suggest')) {
			document.getElementById('sign-in-suggest').innerHTML = 'To save your changes, <a href="./signin.html">sign in or create an account</a>.';
		}
		if (document.getElementById('please-sign-in')) {
			document.getElementById('please-sign-in').innerHTML = 'Please <a href="./signin.html">sign in</a> to see this page.';
			document.getElementById('please-sign-in').style.marginTop = '10vh';
		}
		if (document.getElementById('signed-in')) {
			document.getElementById('signed-in').remove();
		}
	}
});

// Fetch the database's profile data for the user and display it
function getProfileData (user) {
	// Fetch the user's data
	const userData = db.collection('userData').doc(user.uid);
	
	// Check to see if user has settings for display/hide dex in the database
	userData.get().then((doc) => {
		const data = doc.data();
		if (data.dexDisplay) {
			console.log (data.dexDisplay.setNationalNormal);
			console.log (data.dexDisplay.setAltNormal);
			console.log (data.dexDisplay.setNationalShiny);
			console.log (data.dexDisplay.setAltShiny);
		} else {
			console.log ('Error getting user data: no data present');
		}
	}).catch((error) => {
		console.log('Error getting user data: ', error);
	});
}














/*
const listView = localStorage.getItem('pokedex_listView');

const natNormal = localStorage.getItem('pokedex_display_natNormal') || true;
const altNormal = localStorage.getItem('pokedex_display_altNormal') || true;
const natShiny = localStorage.getItem('pokedex_display_natShiny') || true;
const altShiny = localStorage.getItem('pokedex_display_altShiny') || true;

if (listView && listView != 'false') {
	document.getElementById('listView').checked = true;
	toggleListView()
} else {
	document.getElementById('gridView').checked = true;
	toggleGridView()
}


function toggleGridView () {
	if (natNormal && natNormal != 'false') {
		writeDex ('nat', 'normal');
	}
	if (altNormal && altNormal != 'false') {
		writeDex ('alt', 'normal');
	}
	if (natShiny && natShiny != 'false') {
		writeDex ('nat', 'shiny');
	}
	if (altShiny && altShiny != 'false') {
		writeDex ('alt', 'shiny');
	}

	document.getElementById('listView').checked = false;
	document.getElementById('gridView').checked = true;

	localStorage.setItem('pokedex_listView', false);
	console.log ('Writing grid view');
	console.log (`${natNormal}, ${altNormal}, ${natShiny}, ${altShiny}`);
}

function toggleListView () {
	if (natNormal && natNormal != 'false') {
		writeDexList ('nat', 'normal');
	}
	if (altNormal && altNormal != 'false') {
		writeDexList ('alt', 'normal');
	}
	if (natShiny && natShiny != 'false') {
		writeDexList ('nat', 'shiny');
	}
	if (altShiny && altShiny != 'false') {
		writeDexList ('alt', 'shiny');
	}

	document.getElementById('listView').checked = true;
	document.getElementById('gridView').checked = false;
	localStorage.setItem('pokedex_listView', true);
}
*/
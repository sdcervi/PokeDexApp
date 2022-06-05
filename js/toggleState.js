// Create event listeners for user clicking on anything in the webpage
// Thanks to event delegation, this bubbles up with the unique element each time
if (document.addEventListener) {
    document.addEventListener("click", handleClick, false);
} else if (document.attachEvent) {
    document.attachEvent("onclick", handleClick);
}

// Checks if all Pokemon in a card are caught
function checkComplete (pokemonID, autoCollapse) {
	const box = document.getElementById(pokemonID).parentNode.parentNode.parentNode.parentNode;
	const listPokemon = box.children[1].firstChild.children;
	let listComplete = [];
	for (pokemon of listPokemon) {
		listComplete.push(/caught/.test(pokemon.firstChild.className));
	}
	if (listComplete.every(value => value === true)) {
		box.classList.add('completed');
	} else {
		box.classList.remove('completed');
	}
	
	// If user has auto-collapse enabled
	if (autoCollapse) {
		autoCollapseComplete();
	}
} 

function changeCaughtState (pokemon) {
    let toggleState = document.getElementById(pokemon).classList;
	let endState;

    switch (toggleState.item(2)) {
        case null:
            toggleState.add("trade");
			endState = "trade";
			checkComplete (pokemon);
            break;
        case "trade":
            toggleState.remove("trade");
            toggleState.add("place");
			endState = "place";
			checkComplete (pokemon);
            break;
        case "place":
            toggleState.remove("place");
            toggleState.add("caught");
			endState = "caught";
			checkComplete (pokemon);
            break;
        case "caught":
            toggleState.remove("caught");
			endState = "";
			checkComplete (pokemon);
            break;
    }
	
	const user = firebase.auth().currentUser;
	if (user) {
		const userData = db.collection('userData').doc(user.uid);
		userData.set({
			pokemon: {
				[pokemon]: endState
			}
		}, { merge: true }).then(() => {
			checkComplete (pokemon);
		}).catch ((error) => {
			console.error ('Error updating user data: ', error);
		});
	} else {
		checkComplete (pokemon);
	}
}

function autoCollapseComplete () {
	const dex = document.getElementsByClassName('dex-box');
	for (box of dex) {
		const collapse = box.children[1];
		const cardID = document.getElementById(collapse.id);
		if (collapse.classList.contains('show') && box.classList.contains('completed')) {
			const bsCollapse = new bootstrap.Collapse(cardID, {
				show: false
			});
			collapse.parentNode.firstChild.firstChild.classList.add('turned');
		}
	}
}

function dexCollapse (toggleID) {
	const operation = toggleID.split("-")[2];
	const subset = toggleID.split("-")[3];
	const dex = document.getElementById(toggleID).parentNode.parentNode.parentNode.parentNode.children[2].firstChild.children;
	if (operation === 'expand') {
		for (box of dex) {
			const collapse = box.firstChild.children[1];
			const cardID = document.getElementById(collapse.id);
			if (!(collapse.classList.contains('show'))) {
				const bsCollapse = new bootstrap.Collapse(cardID, {
					show: true
				});
			}
			collapse.parentNode.firstChild.firstChild.classList.remove('turned');
		}
	} else if (operation === 'collapse') {
		if (subset === 'all') {
			for (box of dex) {
				const collapse = box.firstChild.children[1];
				const cardID = document.getElementById(collapse.id);
				if (collapse.classList.contains('show')) {
					const bsCollapse = new bootstrap.Collapse(cardID, {
						show: false
					});
				}
				collapse.parentNode.firstChild.firstChild.classList.add('turned');
			}
		} else if (subset === 'complete') {
			for (box of dex) {
				const collapse = box.firstChild.children[1];
				const cardID = document.getElementById(collapse.id);
				if (collapse.classList.contains('show') && box.firstChild.classList.contains('completed')) {
					const bsCollapse = new bootstrap.Collapse(cardID, {
						show: false
					});
					collapse.parentNode.firstChild.firstChild.classList.add('turned');
				}
			}
		} else {
			console.log ("Error in collapse function.");
		}
	} else {
		console.log ("Error in expand-collapse function");
	}
}

// Event handler for user clicks
function handleClick(event) {
    event = event || window.event;
    event.target = event.target || event.srcElement;

    let element = event.target;

    // Climb up the document tree from the target of the event
    while (element) {
		if (element.nodeName === "IMG" && /collapse-arrow/.test(element.className)) {
			element.classList.toggle('turned');
			break;
		} else if (element.nodeName === "H3" && /card-header/.test(element.parentNode.parentNode.className)) {
			element.parentNode.parentNode.firstChild.classList.toggle('turned');
			break;
		} else if (element.nodeName === "DIV" && /dex-entry/.test(element.className)) {
			changeCaughtState(element.id);
			break;
		} else if (element.nodeName === "LI" && /nav-item/.test(element.className)) {
			dexCollapse(element.id);
			break;
		}
		
        element = element.parentNode;
    }
}

// Gets the already-completed items from user data and checks those boxes
function writeUserDex (pokemonData, autoCollapse) {
	if (Object.keys(pokemonData).length) {
		for (const pokemon in pokemonData) {
			const pokemonDiv = document.getElementById(pokemon);
			pokemonDiv.classList.add(pokemonData[pokemon]);
			checkComplete (pokemon);
		}
		if (autoCollapse) {
			autoCollapseComplete();
		}
	} else {
		return;
	}
}

// Fetch the database's profile data for the user and display it
function getProfileData (user) {
	// Fetch the user's data
	const userData = db.collection('userData').doc(user.uid);
	
	// Check to see if user has checklist progress in the database
	userData.get().then((doc) => {
		const data = doc.data();
		if (data.pokemon) {
			writeUserDex (data.pokemon, data.autoCollapse);
		} else {
			console.log ('Error getting user data: no data present');
		}
	}).catch((error) => {
		console.log('Error getting user data: ', error);
	});
}
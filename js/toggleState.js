// Create event listeners for user clicking on anything in the webpage
// Thanks to event delegation, this bubbles up with the unique element each time
if (document.addEventListener) {
    document.addEventListener("click", handleClick, false);
} else if (document.attachEvent) {
    document.attachEvent("onclick", handleClick);
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
				if (collapse.classList.contains('show') && box.firstChild.classList.contains('complete')) {
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

// Checks if all Pokemon in a card are caught
/*function checkComplete (listBox, listSet, autoCollapse) {
	let listComplete = [];
	for (listItem of listSet) {
		listComplete.push(listItem.firstChild.checked);
	}
	if (listComplete.every(value => value === true)) {
		listBox.classList.add('completed');
	} else {
		listBox.classList.remove('completed');
	}
	
	// If user has auto-collapse enabled
	if (autoCollapse) {
		collapseCompleted();
	}
}*/ 
	
	/*const user = firebase.auth().currentUser;
	if (user) {
		const userData = db.collection('userData').doc(user.uid);
		userData.set({
			cards: {
				[listBoxID]: {
					[itemID]: item.checked
				}
			}
		}, { merge: true }).then(() => {
			const listSet = document.getElementById(`collapse${listBoxID}`).children[1].childNodes;
			checkComplete (listBox, listSet);
		}).catch ((error) => {
			console.error ('Error updating user data: ', error);
		});
	} else {
		const listSet = document.getElementById(`collapse${listBoxID}`).children[1].childNodes;
		checkComplete (listBox, listSet);
	}*/

// Clear all data within a card
/* function clearCard (cardID) {
	const card = document.getElementById(cardID);
	const checklist = card.children[1].children;
	for (listItem of checklist) {
		if (listItem.firstChild.checked) {
			listItem.firstChild.checked = false;
			toggleChecked(listItem.firstChild.id);
		}
	}
}*/

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
/* function writeChecklist (checklist, autoCollapse) {
	if (Object.keys(checklist).length) {
		for (const listID in checklist) {
			// Get the HTML element containing the list's card
			const listBox = document.getElementById(listID);
			
			// Check boxes user has already completed
			const list = checklist[listID];
			for (const item in list) {
				const itemCheckbox = document.getElementById(`${listID}-${item}`);
				const itemStatus = list[item];
				if (itemStatus) {
					itemCheckbox.checked = itemStatus;
				}
			}
			
			// Get array of all checkboxes in the list, and mark as complete if everything is checked
			const listSet = document.getElementById(`collapse${listID}`).children[1].childNodes;
			checkComplete (listBox, listSet, autoCollapse);
		}
	} else {
		return;
	}
} */

// Fetch the database's profile data for the user and display it
/*function getProfileData (user) {
	// Fetch the user's data
	const userData = db.collection('userData').doc(user.uid);
	
	// Check to see if user has checklist progress in the database
	userData.get().then((doc) => {
		const data = doc.data();
		if (data.cards) {
			writeChecklist (data.cards, data.autoCollapse);
		} else {
			console.log ('Error getting user data: no data present');
		}
	}).catch((error) => {
		console.log('Error getting user data: ', error);
	});
}*/
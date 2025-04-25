// Create event listeners for user clicking on anything in the webpage
// Thanks to event delegation, this bubbles up with the unique element each time
if (document.addEventListener) {
    document.addEventListener("click", handleClick, false);
    document.addEventListener("contextmenu", handleRightClick, false);
    document.addEventListener("long-press", handleLongPress, false);
}
let supportsContextMenu = false;

// Checks if all Pokemon in a card are caught
function checkComplete (pokemonID, autoCollapse) {
	const box = document.getElementById(pokemonID).parentNode.parentNode.parentNode.parentNode;
	const listPokemon = box.children[1].firstChild.children;
	let listComplete = [];
	for (pokemon of listPokemon) {
		listComplete.push(/caught/.test(pokemon.firstChild.className) || /lv100/.test(pokemon.firstChild.className));
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

function toggleCaughtState (pokemon, view) {
	let toggleState = document.getElementById(pokemon).classList;
	let endState;
	
	if (view === 'grid') {
		switch (toggleState.item(2)) {
			case null:
				toggleState.add("caught");
				endState = "caught";
				checkComplete (pokemon);
				break;
			case "trade":
				toggleState.remove("trade");
				toggleState.add("caught");
				endState = "caught";
				checkComplete (pokemon);
				break;
			case "place":
				toggleState.remove("place");
				toggleState.add("caught");
				endState = "caught";
				checkComplete (pokemon);
				break;
			case "lv100":
				toggleState.remove("lv100");
				toggleState.remove("caught");
				endState = "";
				checkComplete (pokemon);
				break;
			case "caught":
				toggleState.remove("caught");
				endState = "";
				checkComplete (pokemon);
				break;
		}
	} else if (view === 'list') {
		switch (toggleState.item(0)) {
			case null:
				toggleState.add("caught");
				endState = "caught";
				break;
			case "trade":
				toggleState.remove("trade");
				toggleState.add("caught");
				endState = "caught";
				break;
			case "place":
				toggleState.remove("place");
				toggleState.add("caught");
				endState = "caught";
				break;
			case "lv100":
				toggleState.remove("lv100");
				toggleState.remove("caught");
				endState = "";
				break;
			case "caught":
				toggleState.remove("caught");
				endState = "";
				break;
		}
	}

	const user = firebase.auth().currentUser;
	if (user) {
		const userData = db.collection('userData').doc(user.uid);
		userData.set({
			pokemon: {
				[pokemon]: endState
			}
		}, { merge: true }).then(() => {
			if (view === 'grid') {
				checkComplete (pokemon);
			}
		}).catch ((error) => {
			console.error ('Error updating user data: ', error);
		});
	} else {
		if (view === 'grid') {
			checkComplete (pokemon);
		}
	}
}

function setStateModalOpen (pokemon, view) {
	const sourcePokemon = document.getElementById(pokemon);
	let sourceImage;
	let sourceNumber;
	let sourceName;
	
	if (view === 'grid') {
		sourceImage = sourcePokemon.firstChild.childNodes[0].src;
		sourceNumber = sourcePokemon.firstChild.childNodes[1].innerHTML;
		sourceName = sourcePokemon.firstChild.childNodes[2].innerHTML;
	} else if (view === 'list') {
		sourceImage = sourcePokemon.firstChild.src;
		sourceNumber = sourcePokemon.parentNode.parentNode.childNodes[0].innerHTML;
		sourceName = sourcePokemon.parentNode.parentNode.childNodes[1].innerHTML;
	}
	
	document.getElementById('setStateTradeImage').src = sourceImage;
	document.getElementById('setStateTradeNumber').innerHTML = sourceNumber;
	document.getElementById('setStateTradeName').innerHTML = sourceName;
	document.getElementById('setStatePlaceImage').src = sourceImage;
	document.getElementById('setStatePlaceNumber').innerHTML = sourceNumber;
	document.getElementById('setStatePlaceName').innerHTML = sourceName;
	document.getElementById('setStateLv100Image').src = sourceImage;
	document.getElementById('setStateLv100Number').innerHTML = sourceNumber;
	document.getElementById('setStateLv100Name').innerHTML = sourceName;

	document.getElementById('setStateMenu').setAttribute('pokemonid', pokemon);
	document.getElementById('setStateMenu').setAttribute('viewtype', view);

	setDatabaseLinks(sourceName, sourceNumber);
	
	let setStateModal = new bootstrap.Modal(document.getElementById('setStateMenu'), {});
	setStateModal.show();
	
	return false;
}

function setDatabaseLinks(pokemonName, pokemonNumber)
{
	let modifiedName = pokemonName.replace(
		/(\w*) (\w*)/,
		(capture1, capture2, capture3) => { 
			if(capture3[0] == null)
			{
				return capture2;
			}
			capture2 = capture2[0].toUpperCase() + capture2.substring(1); capture3 = capture3[0].toUpperCase() + capture3.substring(1); return capture2 + "_" + capture3;
		}
	);

	let idx = modifiedName.indexOf("-");
	if(idx != -1)
	{
		modifiedName = modifiedName.substring(0, idx) + "-" + modifiedName[idx + 1].toUpperCase() + modifiedName.substring(idx + 2);
	}

	idx = pokemonName.indexOf("&nbsp;♂")
	if(idx != -1 && !modifiedName.includes("nidoran"))
		modifiedName = modifiedName.substring(0, idx);
	idx = pokemonName.indexOf("&nbsp;♀")
	if(idx != -1 && !modifiedName.includes("nidoran"))
		modifiedName = modifiedName.substring(0, idx);

	let bulbaName = modifiedName;
	let pdbName = modifiedName;
	let serebiiName = pokemonName;
	console.log(modifiedName)
	console.log(serebiiName)
	pdbName = pdbName.replace("_", "-");
	pdbName = pdbName.replace("♂", "-m");
	pdbName = pdbName.replace("♀", "-f");
	if(pokemonName == "type-null")
		bulbaName = "Type:_Null" // Bulbapedia has odd formatting for Type: Null
	serebiiName = serebiiName.replace(" ", "");
	console.log(serebiiName)
	document.getElementById('bulba-link').innerHTML = `<a target="_blank" class="btn btn-primary" rel="noopener noreferrer" href="https://bulbapedia.bulbagarden.net/wiki/${bulbaName}_(Pok%C3%A9mon)">Bulbapedia</a>`;
	document.getElementById('pokemondb-link').innerHTML = `<a target="_blank" class="btn btn-primary" rel="noopener noreferrer" href="https://pokemondb.net/pokedex/${pdbName}">PokemonDB</a>`;

	let serebiiContent = `<a target="_blank" class="btn btn-primary" rel="noopener noreferrer" href="https://serebii.net/pokedex`;
	if(pokemonNumber <= 151)
	{
		serebiiContent += `/${pokemonNumber}.shtml">Serebii</a>`;
	}
	else if(pokemonNumber <= 251)
	{
		serebiiContent += `-gs/${pokemonNumber}.shtml">Serebii</a>`;
	}
	else if(pokemonNumber <= 386)
	{
		serebiiContent += `-rs/${pokemonNumber}.shtml">Serebii</a>`;
	}
	else if(pokemonNumber <= 493)
	{
		serebiiContent += `-dp/${pokemonNumber}.shtml">Serebii</a>`;
	}
	else if(pokemonNumber <= 649)
	{
		serebiiContent += `-bw/${pokemonNumber}.shtml">Serebii</a>`;
	}
	else if(pokemonNumber <= 721)
	{
		serebiiContent += `-xy/${pokemonNumber}.shtml">Serebii</a>`;
	}
	else if(pokemonNumber <= 809)
	{
		serebiiContent += `-sm/${pokemonNumber}.shtml">Serebii</a>`;
	}
	else if(pokemonNumber <= 905)
	{
		serebiiContent += `-swsh/${serebiiName}/">Serebii</a>`;
	}
	else if(pokemonNumber <= 1025)
	{
		serebiiContent += `-sv/${serebiiName}/">Serebii</a>`;
	}
	document.getElementById('serebii-link').innerHTML = serebiiContent;
}

function setState (state) {
	const endState = state.substring(state.length - 5).toLowerCase();
	const pokemon = document.getElementById('setStateMenu').getAttribute('pokemonid');
	const view = document.getElementById('setStateMenu').getAttribute('viewtype');
	
	const pokemonDiv = document.getElementById(pokemon);
	
	// If the user clicks on the same new state as current state
	if (pokemonDiv.classList.contains("trade") && endState === "trade") {
		pokemonDiv.classList.remove("trade");
	} else if (pokemonDiv.classList.contains("place") && endState === "place") {
		pokemonDiv.classList.remove("place");
	} else if (pokemonDiv.classList.contains("lv100") && endState === "lv100") {
		pokemonDiv.classList.remove("lv100");
	} else {
		pokemonDiv.classList.remove("trade");
		pokemonDiv.classList.remove("place");
		pokemonDiv.classList.remove("lv100");
		pokemonDiv.classList.remove("caught");
		pokemonDiv.classList.add(endState);
	}
	
	const user = firebase.auth().currentUser;
	if (user) {
		const userData = db.collection('userData').doc(user.uid);
		userData.set({
			pokemon: {
				[pokemon]: endState
			}
		}, { merge: true }).then(() => {
			if (view === 'grid') {
				checkComplete (pokemon);
			}
		}).catch ((error) => {
			console.error ('Error updating user data: ', error);
		});
	} else {
		if (view === 'grid') {
			checkComplete (pokemon);
		}
	}
	
	// Close modal now that we're done with it
	document.getElementById('setStateMenuClose').click();
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
	} else if (operation === 'showhide') {
		const showHide = document.getElementById(toggleID);
		const dexDiv = document.getElementById(toggleID).parentNode.parentNode.parentNode.parentNode.children[2];
		if (showHide.firstChild.innerHTML.includes('show')) {
			dexDiv.style.display = 'block';
			showHide.firstChild.innerHTML = `<img src="../assets/icons/hide.svg" alt="">&nbsp;Hide&nbsp;`;
		} else if (showHide.firstChild.innerHTML.includes('hide')) {
			dexDiv.style.display = 'none';
			showHide.firstChild.innerHTML = `<img src="../assets/icons/show.svg" alt="">&nbsp;Show&nbsp;`;
		} else {
			console.log ("Error in show/hide function");
		}
	} else {
		console.log ("Error in expand-collapse function");
	}
}

// Event handler for user clicks
function handleClick (event) {
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
		} else if (element.nodeName === "DIV" && /dex-entry/.test(element.className) && !(/setState/.test(element.id))) {
			toggleCaughtState(element.id, 'grid');
			break;
		} else if (element.nodeName === "IMG" && /dex-entry-img/.test(element.parentNode.parentNode.className)) {
			toggleCaughtState(element.parentNode.id, 'list');
			break;
		} else if (element.nodeName === "DIV" && /dex-entry-img/.test(element.parentNode.className)) {
			toggleCaughtState(element.id, 'list');
			break;
		} else if (element.nodeName === "DIV" && /dex-entry-list/.test(element.className)) {
			toggleCaughtState(element.id);
			break;
		} else if (element.nodeName === "LI" && /nav-item/.test(element.className)) {
			dexCollapse(element.id);
			break;
		} else if (element.nodeName === "IMG" && /setState/.test(element.id)) {
			setState(element.parentNode.parentNode.id);
			break;
		} else if (element.nodeName === "DIV" && /setState/.test(element.id) && !(/setStateMenu/.test(element.id))) {
			setState(element.id);
			break;
		}
		
        element = element.parentNode;
    }
}

// Event handler for user clicks
function handleRightClick (event) {
	supportsContextMenu = true;
	
    event = event || window.event;
    event.target = event.target || event.srcElement;

    let element = event.target;
	
	// Climb up the document tree from the target of the event
	while (element) {
		if (element.nodeName === "DIV" && /dex-entry/.test(element.className) && !(/setState/.test(element.id))) {
			event.preventDefault(); // Prevents normal right-click menu from showing up
			setStateModalOpen(element.id, 'grid');
			break;
		} else if (element.nodeName === "IMG" && /dex-entry-img/.test(element.parentNode.parentNode.className) && !(/setState/.test(element.parentNode.parentNode.id))) {
			event.preventDefault(); // Prevents normal right-click menu from showing up
			setStateModalOpen(element.parentNode.id, 'list');
			break;
		} else if (element.nodeName === "DIV" && /dex-entry-list/.test(element.className) && !(/setState/.test(element.id))) {
			event.preventDefault(); // Prevents normal right-click menu from showing up
			setStateModalOpen(element.id);
			break;
		}

		element = element.parentNode;
	}
	
	return false;
}

function handleLongPress (event) {
	if (!supportsContextMenu) {
		event = event || window.event;
		event.target = event.target || event.srcElement;

		let element = event.target;

		// Climb up the document tree from the target of the event
		while (element) {
			if (element.nodeName === "DIV" && /dex-entry/.test(element.className) && !(/setState/.test(element.id))) {
				setStateModalOpen(element.id, 'grid');
				break;
			} else if (element.nodeName === "IMG" && /dex-entry-img/.test(element.parentNode.parentNode.className) && !(/setState/.test(element.parentNode.parentNode.id))) {
				setStateModalOpen(element.parentNode.id, 'list');
				break;
			} else if (element.nodeName === "DIV" && /dex-entry-list/.test(element.className) && !(/setState/.test(element.id))) {
				setStateModalOpen(element.id);
				break;
			}

			element = element.parentNode;
		}
		
	}
	
	return false;
}

// Gets the already-completed items from user data and checks those boxes
function writeUserDex (pokemonData, autoCollapse) {
	if (Object.keys(pokemonData).length) {
		if (listView == 'false' || listView == null)
		{
			for (const pokemon in pokemonData) {
				const pokemonDiv = document.getElementById(pokemon);
				if (pokemonData[pokemon] && pokemonDiv) {
					pokemonDiv.classList.add(pokemonData[pokemon]);
					checkComplete (pokemon);
				}
			}
			if (autoCollapse) {
				autoCollapseComplete();
			}
		} else {
			for (const pokemon in pokemonData) {
				if (document.getElementById(pokemon) && pokemonData[pokemon]) {
					const pokemonDiv = document.getElementById(pokemon);
					pokemonDiv.classList.add(pokemonData[pokemon]);
				}
			}
		}
	} else {
		return;
	}
}

function setDexState (nationalNormal, altNormal, nationalShiny, altShiny) {
	const dexes = [
		{	state: 	nationalNormal,
			id:		'normal-nat-dex' },
		{	state: 	altNormal,
			id:		'normal-alt-dex' },
		{	state: 	nationalShiny,
			id:		'shiny-nat-dex' },
		{	state: 	altShiny,
			id:		'shiny-alt-dex' }
	];
	for (dexIndex in dexes) {
		const dex = dexes[dexIndex];
		if (dex.state === false) {
			const dexDiv = document.getElementById(dex.id);
			const showHide = document.getElementById(dex.id.replace('dex', 'showhide'));
			dexDiv.style.display = 'none';
			showHide.firstChild.innerHTML = `<img src="../assets/icons/show.svg" alt="">&nbsp;Show&nbsp;`;
		}
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
		if (data.dexDisplay) {
			const nationalNormal = data.dexDisplay.setNationalNormal;
			const altNormal = data.dexDisplay.setAltNormal;
			const nationalShiny = data.dexDisplay.setNationalShiny;
			const altShiny = data.dexDisplay.setAltShiny;
			setDexState (nationalNormal, altNormal, nationalShiny, altShiny);
		} else {
			console.log ('Error getting user data: no data present');
		}
	}).catch((error) => {
		console.log('Error getting user data: ', error);
	});
}

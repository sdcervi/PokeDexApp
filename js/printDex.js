let totalPokemon = 0;

function writePokemon (dexID, dexType, dexColor, altType) {
	// Get the Pokemon's information
	const pokemonID = (dexID).toString().padStart(3, '0');
	let imgSpecies = dexData[dexID-1].name;
	let species = dexData[dexID-1].name;
	
	// Species name and image path corrections
	if (species == "farfetchd"){
		species = "farfetch'd";
	}
	if (species == "sirfetchd"){
		species = "sirfetch'd";
	}
	if (species == "mr-mime"){
		species = "mr. mime";
	}
	if (species == "mime-jr"){
		species = "mime jr.";
	}
	if (species == "mr-rime"){
		species = "mr. rime";
	}
	if (species == "flabebe"){
		species = "flab&eacuteb&eacute";
	}
	if (species == "nidoran-f"){
		species = "nidoran &#9792";
	}
	if (species == "nidoran-m"){
		species = "nidoran &#9794";
	}
	if (species == "alcremie"){
		imgSpecies = "alcremie-vanilla-cream-strawberry";
	}
	if (species == "zacian"){
		imgSpecies = "zacian-hero";
	}
	if (species == "zamazenta"){
		imgSpecies = "zamazenta-hero";
	}
	if (species == "urshifu"){
		imgSpecies = "urshifu";
	}
	if (species == "great-tusk"){
		species = "great tusk";
	}
	if (species == "scream-tail"){
		species = "scream tail";
	}
	if (species == "brute-bonnet"){
		species = "brute bonnet";
	}
	if (species == "flutter-mane"){
		species = "flutter mane";
	}
	if (species == "slither-wing"){
		species = "slither wing";
	}
	if (species == "sandy-shocks"){
		species = "sandy shocks";
	}
	if (species == "iron-treads"){
		species = "iron treads";
	}
	if (species == "iron-bundle"){
		species = "iron bundle";
	}
	if (species == "iron-hands"){
		species = "iron hands";
	}
	if (species == "iron-jugulis"){
		species = "iron jugulis";
	}
	if (species == "iron-moth"){
		species = "iron moth";
	}
	if (species == "iron-thorns"){
		species = "iron thorns";
	}
	if (species == "roaring-moon"){
		species = "roaring moon";
	}
	if (species == "iron-valiant"){
		species = "iron valiant";
	}
	if (species == "walking-wake"){
		species = "walking wake";
	}
	if (species == "iron-leaves"){
		species = "iron leaves";
	}
	if (species == "gouging-fire"){
		species = "gouging fire";
	}
	if (species == "raging-bolt"){
		species = "raging bolt";
	}
	if (species == "iron-boulder"){
		species = "iron boulder";
	}
	if (species == "iron-crown"){
		species = "iron crown";
	}
	
	// Generate the pokemon's card
	let pokemonContent;
	if (!altType && altType != 0) {
		pokemonContent = `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}"><div class="card-body"><img draggable="false" loading="lazy" src="/assets/pokemon/${dexColor}/${imgSpecies}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}</h4></div></div></div>`;
		totalPokemon++;
	} else if (altType === 'alolan' || altType === 'galarian' || altType === 'hisuian' || altType === 'paldean') {
		pokemonContent = `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-${altType}"><div class="card-body"><img draggable="false" loading="lazy" src="/assets/pokemon/${dexColor}/${imgSpecies}-${altType}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}</h4></div></div></div>`;
		totalPokemon++;
	} else if (altType === 'gender') {
		if (pokemonID == 215) { // For Sneasel's Hisuian gender differences
			pokemonContent = `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-male"><div class="card-body"><img draggable="false" loading="lazy" src="/assets/pokemon/${dexColor}/${imgSpecies}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}&nbsp;&male;</h4></div></div></div>`;
			totalPokemon++;
			pokemonContent += `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-female"><div class="card-body"><img draggable="false" loading="lazy" src="/assets/pokemon/${dexColor}/${imgSpecies}-f.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}&nbsp;&female;</h4></div></div></div>`;
			totalPokemon++;
			pokemonContent += `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-hisuian-male"><div class="card-body"><img draggable="false" loading="lazy" src="/assets/pokemon/${dexColor}/${imgSpecies}-hisuian.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species} Hisuian&nbsp;&male;</h4></div></div></div>`;
			totalPokemon++;
			pokemonContent += `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-hisuian-female"><div class="card-body"><img draggable="false" loading="lazy" src="/assets/pokemon/${dexColor}/${imgSpecies}-hisuian-f.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species} Hisuian&nbsp;&female;</h4></div></div></div>`;
			totalPokemon++;
		} else {
			pokemonContent = `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-male"><div class="card-body"><img draggable="false" loading="lazy" src="/assets/pokemon/${dexColor}/${imgSpecies}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}&nbsp;&male;</h4></div></div></div>`;
			totalPokemon++;
			pokemonContent += `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-female"><div class="card-body"><img draggable="false" loading="lazy" src="/assets/pokemon/${dexColor}/${imgSpecies}-f.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}&nbsp;&female;</h4></div></div></div>`;
			totalPokemon++;
		}
	} else {
		const forms = dexData[dexID-1].alts[0].forms;
		const formNames = dexData[dexID-1].alts[0]['form-names'];
		pokemonContent = `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-alt${forms[altType]}"><div class="card-body"><img draggable="false" loading="lazy" src="/assets/pokemon/${dexColor}/${imgSpecies}${forms[altType]}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}</h4><h4 class="dex-entry-form">${formNames[altType]}</h4></div></div></div>`;
		totalPokemon++;
	}
	
	return pokemonContent;
}

function writeDex (dexType, dexColor) {
	// Get the HTML div
	const dexDivID = `${dexColor}-${dexType}-dex`;
	const dexDiv = document.getElementById(dexDivID);
	let dexDivContents = `<div class="row row-cols-1 row-cols-lg-2 row-cols-xxxl-3">`;
	
	// Generate the dex's contents
	
	if (dexType == 'nat') {
		let start = 1;
		let end = 30;
		let printCounter = 0;
		let boxStart = start.toString().padStart(3, '0');
		let boxEnd = end.toString().padStart(3, '0');
		dexDivContents += `<div class="col"><div class="card dex-box" id="${dexColor}-${boxStart}-${boxEnd}">`;
		dexDivContents += `<div class="card-header">`;
		dexDivContents += `<img draggable="false" loading="lazy" src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${boxStart}" aria-expanded="true" aria-controls="collapse-${dexColor}-${boxStart}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20">`;
		dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${boxStart}" aria-expanded="true" aria-controls="collapse-${dexColor}-${boxStart}"><h3>${boxStart}&ndash;${boxEnd}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-${boxStart}">`;
		dexDivContents += `<div class="row row-cols-6">`;
		
		for (pokemon of dexData) {
			const dexID = parseFloat(pokemon.id);
			dexDivContents += writePokemon (dexID, dexType, dexColor, null);
			printCounter++;
			if ((printCounter % 30) == 0) {
				start += 30;
				end += 30;
				if (end > dexData.length) {
					end = dexData.length;
				}
				boxStart = start.toString().padStart(3, '0');
				boxEnd = end.toString().padStart(3, '0');
				dexDivContents += `</div>`;
				dexDivContents += `</div></div></div>`;
				dexDivContents += `<div class="col"><div class="card dex-box" id="${dexColor}-${boxStart}-${boxEnd}">`;
				dexDivContents += `<div class="card-header">`;
				dexDivContents += `<img draggable="false" loading="lazy" src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${boxStart}" aria-expanded="true" aria-controls="collapse-${dexColor}-${boxStart}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20">`;
				dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${boxStart}" aria-expanded="true" aria-controls="collapse-${dexColor}-${boxStart}"><h3>${boxStart}&ndash;${boxEnd}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-${boxStart}">`;
				dexDivContents += `<div class="row row-cols-6">`;
			}
		}
		
		dexDivContents += `</div>`;
		dexDivContents += `</div></div></div>`;
	} else {
		// Write regional alt forms{
		let boxCounter = 1;
		const regions = ['alolan', 'galarian', 'hisuian', 'paldean'];
		for (region of regions) {
			let printCounter = 0;
			const regionName = region.charAt(0).toUpperCase() + region.slice(1);
			dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="regional-${dexColor}-${region}-${boxCounter}">`;
			dexDivContents += `<div class="card-header">`;
			dexDivContents += `<img draggable="false" loading="lazy" src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${region}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${region}-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20">`;
			dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${region}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${region}-${boxCounter}"><h3>${regionName} Forms ${boxCounter}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-${region}-${boxCounter}">`;
			dexDivContents += `<div class="row row-cols-6">`;
			for (pokemon of dexData) {
				if (pokemon[region]) {
					const dexID = parseFloat(pokemon.id);
					dexDivContents += writePokemon (dexID, dexType, dexColor, region);
					printCounter++;
					if ((printCounter % 30) == 0) {
						boxCounter++;
						dexDivContents += `</div>`;
						dexDivContents += `</div></div></div>`;
						dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="regional-${dexColor}-${region}-${boxCounter}">`;
						dexDivContents += `<div class="card-header">`;
						dexDivContents += `<img draggable="false" loading="lazy" src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${region}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${region}-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20">`;
						dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${region}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${region}-${boxCounter}"><h3>${regionName} Forms ${boxCounter}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-${region}-${boxCounter}">`;
						dexDivContents += `<div class="row row-cols-6">`;
					}
				}
				
			}
			dexDivContents += `</div>`;
			dexDivContents += `</div></div></div>`;
		}
		
		// Write gender alt forms
		boxCounter = 1;
		let printCounter = 0;
		dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="${dexColor}-gender${boxCounter}">`;
		dexDivContents += `<div class="card-header">`;
		dexDivContents += `<img draggable="false" loading="lazy" src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-gender-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-gender-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20">`;
		dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-gender-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-gender-${boxCounter}"><h3>Gender-Specific Forms ${boxCounter}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-gender-${boxCounter}">`;
		dexDivContents += `<div class="row row-cols-6">`;
		for (pokemon of dexData) {
			if (pokemon.gender) {
				const dexID = parseFloat(pokemon.id);
				dexDivContents += writePokemon (dexID, dexType, dexColor, 'gender');
				if (dexID == 215) { // For Sneasel's Hisuian gender differences
					printCounter += 4;
				} else {
					printCounter += 2;
				}
				if ((printCounter % 30) == 0) {
					boxCounter++;
					dexDivContents += `</div>`;
					dexDivContents += `</div></div></div>`;
					dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="${dexColor}-gender${boxCounter}">`;
					dexDivContents += `<div class="card-header">`;
					dexDivContents += `<img draggable="false" loading="lazy" src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-gender-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-gender-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20">`;
					dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-gender-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-gender-${boxCounter}"><h3>Gender-Specific Forms ${boxCounter}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-gender-${boxCounter}">`;
					dexDivContents += `<div class="row row-cols-6">`;
				}
			}

		}
		dexDivContents += `</div>`;
		dexDivContents += `</div></div></div>`;
		
		// Write other alt forms
		boxCounter = 1;
		printCounter = 0;
		const speciesArray = ['201', '666', '869'];
		dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="${dexColor}-alts${boxCounter}">`;
		dexDivContents += `<div class="card-header">`;
		dexDivContents += `<img draggable="false" loading="lazy" src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-alts-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-alts-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20">`;
		dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-alts-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-alts-${boxCounter}"><h3>Alt Forms ${boxCounter}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-alts-${boxCounter}">`;
		dexDivContents += `<div class="row row-cols-6">`;
		for (pokemon of dexData) {
			if (pokemon.alts && !speciesArray.includes(pokemon.id)) {
				const dexID = parseFloat(pokemon.id);
				for (let counter = 0; counter < pokemon.alts[0].forms.length; counter++) {
					dexDivContents += writePokemon (dexID, dexType, dexColor, counter);
					printCounter++;
					if (((printCounter % 30) == 0) && dexData[dexID]) {
						boxCounter++;
						dexDivContents += `</div>`;
						dexDivContents += `</div></div></div>`;
						dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="${dexColor}-alts${boxCounter}">`;
						dexDivContents += `<div class="card-header">`;
						dexDivContents += `<img draggable="false" loading="lazy" src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-alts-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-alts-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20">`;
						dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-alts-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-alts-${boxCounter}"><h3>Alt Forms ${boxCounter}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-alts-${boxCounter}">`;
						dexDivContents += `<div class="row row-cols-6">`;
					}
				}
			}
		}
		dexDivContents += `</div>`;
		dexDivContents += `</div></div></div>`;
		
		// Write species-specific alt forms that have their own boxes
		for (species of speciesArray) {
			boxCounter = 1;
			printCounter = 0;
			const dexID = parseFloat(species);
			const pokemon = dexData[dexID-1];
			const speciesName = pokemon.name.charAt(0).toUpperCase() + pokemon.name.slice(1);
			dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="${dexColor}-${species}-${boxCounter}">`;
			dexDivContents += `<div class="card-header">`;
			dexDivContents += `<img draggable="false" loading="lazy" src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${species}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${species}-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20">`;
			if (pokemon.name === 'alcremie') {
				dexDivContents += `<div class="box-alt-info"><a href="/alts/index.html#milcery-alcremie" target="_blank">Alt forms guide</a></div>`;
			}
			dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${species}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${species}-${boxCounter}"><h3>${speciesName} Forms ${boxCounter}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-${species}-${boxCounter}">`;
			dexDivContents += `<div class="row row-cols-6">`;
			if (pokemon.name != 'alcremie') {
				for (let counter = 0; counter < pokemon.alts[0].forms.length; counter++) {
					dexDivContents += writePokemon (dexID, dexType, dexColor, counter);
					printCounter++;
					if ((printCounter % 30) == 0) {
						boxCounter++;
						dexDivContents += `</div>`;
						dexDivContents += `</div></div></div>`;
						dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="${dexColor}-${species}-${boxCounter}">`;
						dexDivContents += `<div class="card-header">`;
						dexDivContents += `<img draggable="false" loading="lazy" src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${species}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${species}-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20">`;
						dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${species}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${species}-${boxCounter}"><h3>${speciesName} Forms ${boxCounter}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-${species}-${boxCounter}">`;
						dexDivContents += `<div class="row row-cols-6">`;
					}
				}
			} else if (pokemon.name === 'alcremie' && dexColor != 'shiny') {
				const pokemonID = (dexID).toString().padStart(3, '0');
				let imgSpecies = dexData[dexID-1].name;
				let species = dexData[dexID-1].name;
				const flavors = pokemon.alts[0].flavors;
				const toppings = pokemon.alts[0].toppings;
				for (flavor of flavors) {
					const flavorName = flavor.replace('-', ' ');
					for (topping of toppings) {
						dexDivContents += `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-${flavor}-${topping}"><div class="card-body"><img draggable="false" loading="lazy" src="/assets/pokemon/${dexColor}/${imgSpecies}-${flavor}-${topping}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}</h4><h4 class="dex-entry-form">${flavorName}<br>${topping}</h4></div></div></div>`;
						printCounter++;
						if ((printCounter % 30) == 0) {
							boxCounter++;
							dexDivContents += `</div>`;
							dexDivContents += `</div></div></div>`;
							dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="${dexColor}-${species}-${boxCounter}">`;
							dexDivContents += `<div class="card-header">`;
							dexDivContents += `<img draggable="false" loading="lazy" src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${species}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${species}-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20">`;
							if (pokemon.name === 'alcremie') {
								dexDivContents += `<div class="box-alt-info"><a href="/alts/index.html#milcery-alcremie" target="_blank">Alt forms guide</a></div>`;
							}
							dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${species}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${species}-${boxCounter}"><h3>${speciesName} Forms ${boxCounter}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-${species}-${boxCounter}">`;
							dexDivContents += `<div class="row row-cols-6">`;
						}
					}
				}
			} else if (pokemon.name === 'alcremie' && dexColor === 'shiny') {
				const pokemonID = (dexID).toString().padStart(3, '0');
				let imgSpecies = dexData[dexID-1].name;
				let species = dexData[dexID-1].name;
				const toppings = pokemon.alts[0].toppings;
				for (topping of toppings) {
					dexDivContents += `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-${topping}"><div class="card-body"><img draggable="false" loading="lazy" src="/assets/pokemon/${dexColor}/${imgSpecies}-vanilla-cream-${topping}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}</h4><h4 class="dex-entry-form">${topping}</h4></div></div></div>`;
					printCounter++;
					if ((printCounter % 30) == 0) {
						dexDivContents += `</div>`;
						dexDivContents += `</div></div></div>`;
						dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="${dexColor}-${species}-${boxCounter}">`;
						dexDivContents += `<div class="card-header">`;
						dexDivContents += `<img draggable="false" loading="lazy" src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${species}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${species}-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20">`;
						dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${species}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${species}-${boxCounter}"><h3>${speciesName} Forms ${boxCounter}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-${species}-${boxCounter}">`;
						dexDivContents += `<div class="row row-cols-6">`;
					}
				}
			}
			dexDivContents += `</div>`;
			dexDivContents += `</div></div></div>`;
		}
		
	}
	
	dexDivContents += `</div>`;
	
	dexDiv.innerHTML = dexDivContents;
}

function writeListView () {
	// Get the HTML div
	const dexDivID = `normal-nat-dex`;
	const dexDiv = document.getElementById(dexDivID);
	dexDiv.classList.add('list-view-div', 'table-responsive');
	
	// Remove the other three dexes and the first dex header from the page since we won't need them
	dexDiv.parentNode.firstChild.nextElementSibling.remove();
	dexDiv.parentNode.firstChild.nextElementSibling.remove();
	const dexDivsToRemove = ['normal-alt-dex', 'shiny-nat-dex', 'shiny-alt-dex'];
	for (let counter = 0; counter < dexDivsToRemove.length; counter++) {
		document.getElementById(dexDivsToRemove[counter]).parentNode.remove();
	}
	
	// Build the table header
	let dexDivContents = `<p class="text-center small">Looking for alt forms and shinies? Those are visible by swiping to either side to scroll.</p>`;
	dexDivContents += `<table class="table table-striped table-hover list-view-table" data-bs-height="50%">`;
	dexDivContents += `<thead><tr><th scope="col">#</th><th scope="col">Name</th><th>Primary</th><th>&male; form</th><th>&female; form</th><th>Alolan</th><th>Galarian</th><th>Hisuian</th><th>Paldean</th><th>Other Alts</th></tr></thead><tbody>`;
	
	// Generate the dex's contents
	for (pokemon of dexData) {
		const dexID = parseFloat(pokemon.id);
		dexDivContents += writePokemonList (dexID);
	}
	
	dexDivContents += `</tbody></table>`;
	dexDiv.innerHTML = dexDivContents;
}

function writePokemonList (dexID) {
	// Get the Pokemon's information
	const pokemonID = (dexID).toString().padStart(3, '0');
	let imgSpecies = dexData[dexID-1].name;
	let species = dexData[dexID-1].name;
	
	// Species name and image path corrections
	if (species == "farfetchd"){
		species = "farfetch'd";
	}
	if (species == "sirfetchd"){
		species = "sirfetch'd";
	}
	if (species == "mr-mime"){
		species = "mr. mime";
	}
	if (species == "mime-jr"){
		species = "mime jr.";
	}
	if (species == "mr-rime"){
		species = "mr. rime";
	}
	if (species == "flabebe"){
		species = "flab&eacuteb&eacute";
	}
	if (species == "nidoran-f"){
		species = "nidoran &#9792";
	}
	if (species == "nidoran-m"){
		species = "nidoran &#9794";
	}
	if (species == "alcremie"){
		imgSpecies = "alcremie-vanilla-cream-strawberry";
	}
	if (species == "zacian"){
		imgSpecies = "zacian-hero";
	}
	if (species == "zamazenta"){
		imgSpecies = "zamazenta-hero";
	}
	if (species == "urshifu"){
		imgSpecies = "urshifu";
	}
	if (species == "great-tusk"){
		species = "great tusk";
	}
	if (species == "scream-tail"){
		species = "scream tail";
	}
	if (species == "brute-bonnet"){
		species = "brute bonnet";
	}
	if (species == "flutter-mane"){
		species = "flutter mane";
	}
	if (species == "slither-wing"){
		species = "slither wing";
	}
	if (species == "sandy-shocks"){
		species = "sandy shocks";
	}
	if (species == "iron-treads"){
		species = "iron treads";
	}
	if (species == "iron-bundle"){
		species = "iron bundle";
	}
	if (species == "iron-hands"){
		species = "iron hands";
	}
	if (species == "iron-jugulis"){
		species = "iron jugulis";
	}
	if (species == "iron-moth"){
		species = "iron moth";
	}
	if (species == "iron-thorns"){
		species = "iron thorns";
	}
	if (species == "roaring-moon"){
		species = "roaring moon";
	}
	if (species == "iron-valiant"){
		species = "iron valiant";
	}
	if (species == "walking-wake"){
		species = "walking wake";
	}
	if (species == "iron-leaves"){
		species = "iron leaves";
	}
	
	// Generate the pokemon's card
	let pokemonContent;
	/*if (!altType && altType != 0) {
		divId = `${dexType}-${dexColor}-${pokemonID}`
		pokemonSrc = `${imgSpecies}`
		pokeName = `${species}`
		totalPokemon++;
	} else if (altType === 'alolan' || altType === 'galarian') {
		divId = `${dexType}-${dexColor}-${pokemonID}-${altType}`
		pokemonSrc = `${imgSpecies}-${altType}`
		pokeName = `${species}`
		totalPokemon++;
	} else if (altType === 'gender') {
		divId = `${dexType}-${dexColor}-${pokemonID}-male`
		pokemonSrc = `${imgSpecies}-${altType}`
		pokeName = `${species}`
		totalPokemon++;
	} else {
		const forms = dexData[dexID-1].alts[0].forms;
		const formNames = dexData[dexID-1].alts[0]['form-names'];
		divId = `${dexType}-${dexColor}-${pokemonID}-alt${forms[altType]}`
		pokemonSrc = `${imgSpecies}${forms[altType]}`
		pokeName = `${formNames[altType]}`
		totalPokemon++;
	}*/
	pokemonContent = `<tr class="dex-entry-list"><th class="dex-entry-number" scope='row'>${pokemonID}</th><td class="dex-entry-name">${species}</td>`;
	pokemonContent += `<td class="dex-entry-img"><div id="nat-normal-${pokemonID}"><img draggable="false" loading="lazy" src="/assets/pokemon/normal/${imgSpecies}.webp" alt=""></div><div id="nat-shiny-${pokemonID}"><img draggable="false" loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}.webp" alt=""></div></td>`;
	
	// Add gender-specific forms if they exist
	if (dexData[dexID-1].gender) {
		if (pokemonID == 215) { // For Sneasel's Hisuian gender forms
			pokemonContent += `<td class="dex-entry-img"><div id="alt-normal-${pokemonID}-male"><img draggable="false" loading="lazy" src="/assets/pokemon/normal/${imgSpecies}.webp" alt=""></div><div id="alt-shiny-${pokemonID}-male"><img draggable="false" loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}.webp" alt=""></div><br><div id="alt-normal-${pokemonID}-hisuian-male"><img draggable="false" loading="lazy" src="/assets/pokemon/normal/${imgSpecies}-hisuian.webp" alt=""></div><div id="alt-shiny-${pokemonID}-hisuian-male"><img draggable="false" loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}-hisuian.webp" alt=""></div></td>`;
			pokemonContent += `<td class="dex-entry-img"><div id="alt-normal-${pokemonID}-female"><img draggable="false" loading="lazy" src="/assets/pokemon/normal/${imgSpecies}-f.webp" alt=""></div><div id="alt-shiny-${pokemonID}-female"><img draggable="false" loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}-f.webp" alt=""></div><br><div id="alt-normal-${pokemonID}-hisuian-female"><img draggable="false" loading="lazy" src="/assets/pokemon/normal/${imgSpecies}-hisuian-f.webp" alt=""></div><div id="alt-shiny-${pokemonID}-hisuian-female"><img draggable="false" loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}-hisuian-f.webp" alt=""></div></td>`;
		} else {
			pokemonContent += `<td class="dex-entry-img"><div id="alt-normal-${pokemonID}-male"><img draggable="false" loading="lazy" src="/assets/pokemon/normal/${imgSpecies}.webp" alt=""></div><div id="alt-shiny-${pokemonID}-male"><img draggable="false" loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}.webp" alt=""></div></td>`;
			pokemonContent += `<td class="dex-entry-img"><div id="alt-normal-${pokemonID}-female"><img draggable="false" loading="lazy" src="/assets/pokemon/normal/${imgSpecies}-f.webp" alt=""></div><div id="alt-shiny-${pokemonID}-female"><img draggable="false" loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}-f.webp" alt=""></div></td>`;
		}
	} else {
		pokemonContent += `<td></td><td></td>`
	}
	
	// Add Alolan forms if they exist
	if (dexData[dexID-1].alolan) {
		pokemonContent += `<td class="dex-entry-img"><div id="alt-normal-${pokemonID}-alolan"><img draggable="false" loading="lazy" src="/assets/pokemon/normal/${imgSpecies}-alolan.webp" alt=""></div><div id="alt-shiny-${pokemonID}-alolan"><img draggable="false" loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}-alolan.webp" alt=""></div></td>`;
	} else {
		pokemonContent += `<td></td>`
	}
	
	// Add Galarian forms if they exist
	if (dexData[dexID-1].galarian) {
		pokemonContent += `<td class="dex-entry-img"><div id="alt-normal-${pokemonID}-galarian"><img draggable="false" loading="lazy" src="/assets/pokemon/normal/${imgSpecies}-galarian.webp" alt=""></div><div id="alt-shiny-${pokemonID}-galarian"><img draggable="false" loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}-galarian.webp" alt=""></div></td>`;
	} else {
		pokemonContent += `<td></td>`
	}
	
	// Add Hisuian forms if they exist
	if (dexData[dexID-1].hisuian) {
		pokemonContent += `<td class="dex-entry-img"><div id="alt-normal-${pokemonID}-hisuian"><img draggable="false" loading="lazy" src="/assets/pokemon/normal/${imgSpecies}-hisuian.webp" alt=""></div><div id="alt-shiny-${pokemonID}-hisuian"><img draggable="false" loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}-hisuian.webp" alt=""></div></td>`;
	} else {
		pokemonContent += `<td></td>`
	}
	
	// Add Paldean forms if they exist
	if (dexData[dexID-1].paldean) {
		pokemonContent += `<td class="dex-entry-img"><div id="alt-normal-${pokemonID}-paldean"><img draggable="false" loading="lazy" src="/assets/pokemon/normal/${imgSpecies}-paldean.webp" alt=""></div><div id="alt-shiny-${pokemonID}-paldean"><img draggable="false" loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}-paldean.webp" alt=""></div></td>`;
	} else {
		pokemonContent += `<td></td>`
	}
	
	// Add Paldean forms if they exist
	if (dexData[dexID-1].paldean) {
		pokemonContent += `<td class="dex-entry-img"><div id="alt-normal-${pokemonID}-paldean"><img loading="lazy" src="/assets/pokemon/normal/${imgSpecies}-paldean.webp" alt=""></div><div id="alt-shiny-${pokemonID}-paldean"><img loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}-paldean.webp" alt=""></div></td>`;
	} else {
		pokemonContent += `<td></td>`
	}
	
	// Add other alt forms if they exist
	if (dexData[dexID-1].alts && dexData[dexID-1].name != "alcremie") {
		const forms = dexData[dexID-1].alts[0].forms;
		const formNames = dexData[dexID-1].alts[0]['form-names'];
		pokemonContent += `<td class="dex-entry-img">`;
		let rowCounter = 0;
		for (let counter = 0; counter < forms.length; counter++) {
			pokemonContent += `<div id="alt-normal-${pokemonID}-alt${forms[counter]}"><img draggable="false" loading="lazy" src="/assets/pokemon/normal/${imgSpecies}${forms[counter]}.webp" alt=""></div><div id="alt-shiny-${pokemonID}-alt${forms[counter]}"><img draggable="false" loading="lazy" src="/assets/pokemon/shiny/${imgSpecies}${forms[counter]}.webp" alt=""></div>`;
			rowCounter += 2;
			if ((rowCounter %6) == 0) {
				pokemonContent += `<br>`;
				rowcounter = 0;
			}
		}
		pokemonContent += `</td>`;
	} else {
		pokemonContent += `<td></td>`
	}
	
	pokemonContent += `</tr>`;
	
	return pokemonContent;
}

const listView = localStorage.getItem('pokedex_listView');

if (listView && listView != 'false') {
	document.getElementById('listView').checked = true;
	writeListView();
} else {
	document.getElementById('gridView').checked = true;
	writeGridView();
}

function writeGridView () {
	writeDex ('nat', 'normal');
	writeDex ('alt', 'normal');
	writeDex ('nat', 'shiny');
	writeDex ('alt', 'shiny');
}

function toggleGridView () {
	// Ideally this function would rewrite in place but I can't figure out how to do that and call writeUserDex in toggleState.js again
	if (listView == 'false') {
		return; // If already in Grid View, do nothing
	} else {
		document.getElementById('listView').checked = false;
		document.getElementById('gridView').checked = true;

		localStorage.setItem('pokedex_listView', 'false');
		location.reload();
	}
}

function toggleListView () {
	// Ideally this function would rewrite in place but I can't figure out how to do that and call writeUserDex in toggleState.js again
	if (listView == 'true') {
		return; // If already in List View, do nothing
	} else {
		document.getElementById('gridView').checked = false;
		document.getElementById('listView').checked = true;

		localStorage.setItem('pokedex_listView', 'true');
		location.reload();
	}
}

console.log (`Total Pokemon in living dex: ${totalPokemon}`);

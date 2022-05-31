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
	
	// Generate the pokemon's card
	let pokemonContent;
	if (!altType && altType != 0) {
		pokemonContent = `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}"><div class="card-body"><img src="/assets/pokemon/${dexColor}/${imgSpecies}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}</h4></div></div></div>`;
	} else if (altType === 'alolan' || altType === 'galarian') {
		pokemonContent = `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-${altType}"><div class="card-body"><img src="/assets/pokemon/${dexColor}/${imgSpecies}-${altType}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}</h4></div></div></div>`;
	} else if (altType === 'gender') {
		pokemonContent = `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-male"><div class="card-body"><img src="/assets/pokemon/${dexColor}/${imgSpecies}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}</h4></div></div></div>`;
		pokemonContent += `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-female"><div class="card-body"><img src="/assets/pokemon/${dexColor}/${imgSpecies}-f.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}</h4></div></div></div>`;
	} else {
		const forms = dexData[dexID-1].alts[0].forms;
		const formNames = dexData[dexID-1].alts[0]['form-names'];
		pokemonContent = `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-alt-${forms[altType]}"><div class="card-body"><img src="/assets/pokemon/${dexColor}/${imgSpecies}${forms[altType]}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}</h4><h4 class="dex-entry-form">${formNames[altType]}</h4></div></div></div>`;
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
		dexDivContents += `<div class="card-header" id="${dexColor}-${boxStart}-${boxEnd}">`;
		dexDivContents += `<img src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${boxStart}" aria-expanded="true" aria-controls="collapse-${dexColor}-${boxStart}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20"></i>`;
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
				dexDivContents += `<div class="card-header" id="${dexColor}-${boxStart}-${boxEnd}">`;
				dexDivContents += `<img src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${boxStart}" aria-expanded="true" aria-controls="collapse-${dexColor}-${boxStart}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20"></i>`;
				dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${boxStart}" aria-expanded="true" aria-controls="collapse-${dexColor}-${boxStart}"><h3>${boxStart}&ndash;${boxEnd}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-${boxStart}">`;
				dexDivContents += `<div class="row row-cols-6">`;
			}
		}
		
		dexDivContents += `</div>`;
		dexDivContents += `</div></div></div>`;
	} else {
		// Write regional alt forms{
		let boxCounter = 1;
		const regions = ['alolan', 'galarian'];
		for (region of regions) {
			let printCounter = 0;
			const regionName = region.charAt(0).toUpperCase() + region.slice(1);
			dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="regional-${dexColor}-${region}-${boxCounter}">`;
			dexDivContents += `<div class="card-header" id="regional-${dexColor}-${region}-${boxCounter}">`;
			dexDivContents += `<img src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${region}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${region}-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20"></i>`;
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
						dexDivContents += `<div class="card-header" id="regional-${dexColor}-${region}-${boxCounter}">`;
						dexDivContents += `<img src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${region}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${region}-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20"></i>`;
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
		dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="gender${boxCounter}">`;
		dexDivContents += `<div class="card-header" id="gender${boxCounter}">`;
		dexDivContents += `<img src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-gender-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-gender-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20"></i>`;
		dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-gender-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-gender-${boxCounter}"><h3>Gender-Specific Forms ${boxCounter}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-gender-${boxCounter}">`;
		dexDivContents += `<div class="row row-cols-6">`;
		for (pokemon of dexData) {
			if (pokemon.gender) {
				const dexID = parseFloat(pokemon.id);
				dexDivContents += writePokemon (dexID, dexType, dexColor, 'gender');
				printCounter += 2;
				if ((printCounter % 30) == 0) {
					boxCounter++;
					dexDivContents += `</div>`;
					dexDivContents += `</div></div></div>`;
					dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="gender${boxCounter}">`;
					dexDivContents += `<div class="card-header" id="gender${boxCounter}">`;
					dexDivContents += `<img src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-gender-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-gender-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20"></i>`;
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
		dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="alts${boxCounter}">`;
		dexDivContents += `<div class="card-header" id="alts${boxCounter}">`;
		dexDivContents += `<img src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-alts-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-alts-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20"></i>`;
		dexDivContents += `<button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-alts-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-alts-${boxCounter}"><h3>Alt Forms ${boxCounter}</h3></button></div><div class="card-body collapse show" id="collapse-${dexColor}-alts-${boxCounter}">`;
		dexDivContents += `<div class="row row-cols-6">`;
		for (pokemon of dexData) {
			if (pokemon.alts && !speciesArray.includes(pokemon.id)) {
				const dexID = parseFloat(pokemon.id);
				for (let counter = 0; counter < pokemon.alts[0].forms.length; counter++) {
					dexDivContents += writePokemon (dexID, dexType, dexColor, counter);
					printCounter++;
					if ((printCounter % 30) == 0) {
						boxCounter++;
						dexDivContents += `</div>`;
						dexDivContents += `</div></div></div>`;
						dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="alts${boxCounter}">`;
						dexDivContents += `<div class="card-header" id="alts${boxCounter}">`;
						dexDivContents += `<img src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-alts-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-alts-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20"></i>`;
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
			dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="-${dexColor}-${species}-${boxCounter}">`;
			dexDivContents += `<div class="card-header" id="-${dexColor}-${species}-${boxCounter}">`;
			dexDivContents += `<img src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${species}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${species}-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20"></i>`;
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
						dexDivContents += `<div class="card-header" id="${dexColor}-${species}-${boxCounter}">`;
						dexDivContents += `<img src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${species}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${species}-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20"></i>`;
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
						dexDivContents += `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-${flavor}-${topping}"><div class="card-body"><img src="/assets/pokemon/${dexColor}/${imgSpecies}-${flavor}-${topping}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}</h4><h4 class="dex-entry-form">${flavorName}<br>${topping}</h4></div></div></div>`;
						printCounter++;
						if ((printCounter % 30) == 0) {
							boxCounter++;
							dexDivContents += `</div>`;
							dexDivContents += `</div></div></div>`;
							dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="${dexColor}-${species}-${boxCounter}">`;
							dexDivContents += `<div class="card-header" id="${dexColor}-${species}-${boxCounter}">`;
							dexDivContents += `<img src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${species}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${species}-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20"></i>`;
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
					dexDivContents += `<div class="col dex-col"><div class="card dex-entry" id="${dexType}-${dexColor}-${pokemonID}-${topping}"><div class="card-body"><img src="/assets/pokemon/${dexColor}/${imgSpecies}-vanilla-cream-${topping}.webp" alt="" height="84" width="79"><h4 class="dex-entry-number">${pokemonID}</h4><h4 class="dex-entry-name">${species}</h4><h4 class="dex-entry-form">${topping}</h4></div></div></div>`;
					printCounter++;
					if ((printCounter % 30) == 0) {
						dexDivContents += `</div>`;
						dexDivContents += `</div></div></div>`;
						dexDivContents += `<div class="col"><div class="card dex-box" aria-labelledby="${dexColor}-${species}-${boxCounter}">`;
						dexDivContents += `<div class="card-header" id="${dexColor}-${species}-${boxCounter}">`;
						dexDivContents += `<img src="/assets/icons/chevron-up.svg" class="collapse-arrow" data-bs-toggle="collapse" data-bs-target="#collapse-${dexColor}-${species}-${boxCounter}" aria-expanded="true" aria-controls="collapse-${dexColor}-${species}-${boxCounter}" aria-label="Collapse this Pokemon box" role="button" tabindex="0" alt="Collapse this Pokemon box" title="Collapse this Pokemon box" width="20" height="20"></i>`;
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

writeDex ('nat', 'normal');
writeDex ('alt', 'normal');
writeDex ('nat', 'shiny');
writeDex ('alt', 'shiny');
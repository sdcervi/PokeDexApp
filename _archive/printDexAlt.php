<?php

//include 'dexDB.php';
include 'dexDB-alt.php';

$species_array = json_decode ($dexDB, true);
$alt_array = json_decode ($altDB, true);
$alcremie_array = json_decode ($alcremieDB, true);
$boxCaught = null; // This will end up holding a dynamic value. Calculate based on wishlist iterating over array?
$maxDexEntries = 890;

// Print Alolan forms

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="alolan-forms-' . $dextype . '">';
echo '<div class="card-header" id="alolan-forms-' . $dextype . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-alolan-forms-' . $dextype . '" aria-expanded="true" aria-controls="collapse-alolan-forms-' . $dextype . '"><h3>Alolan Forms</h3></button></div><div class="card-body collapse show" id="collapse-alolan-forms-' . $dextype . '">';

echo '<div class="row">';

$printCount = 0;
for ($dexNum = 1; $dexNum <= $maxDexEntries ; $dexNum++) {
    $dexID = (string) $dexNum;
    $dexID = str_pad($dexID, 3, '0', STR_PAD_LEFT);
    if ($species_array[$dexID][0]["alola"] == true) {
        $species = $species_array[$dexID][0]["name"];
        $img_species = $species;
        echo '<div class="card col-2 dex-entry" id="alolanDexEntry-' . $dextype. '-' . $dexID . '" onclick="changeCaughtState(\'alolanDexEntry-' . $dextype. '-' . $dexID . '\')"><div class="card-body"><div class="trade-icon" id="alolanDexEntry-trade-' . $dextype. '-' . $dexID . '" onclick="changeTradeState(\'alolanDexEntry-trade-' . $dextype. '-' . $dexID . '\')"></div><div class="place-icon" id="alolanDexEntry-place-' . $dextype. '-' . $dexID . '" onclick="changePlaceState(\'alolanDexEntry-place-' . $dextype. '-' . $dexID . '\')"></div><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $img_species . '-alolan.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4></div></div>';
        $printCount++;
        if (($printCount % 6) == 0) {
            echo '</div><div class="row">';
        }
    }
}

echo '</div>';

echo '</div></div>';

// Print Galarian forms

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="galarian-forms-' . $dextype . '">';
echo '<div class="card-header" id="galarian-forms-' . $dextype . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-galarian-forms-' . $dextype . '" aria-expanded="true" aria-controls="collapse-galarian-forms-' . $dextype . '"><h3>Galarian Forms</h3></button></div><div class="card-body collapse show" id="collapse-galarian-forms-' . $dextype . '">';

echo '<div class="row">';

$printCount = 0;
for ($dexNum = 1; $dexNum <= $maxDexEntries ; $dexNum++) {
    $dexID = (string) $dexNum;
    $dexID = str_pad($dexID, 3, '0', STR_PAD_LEFT);
    if ($species_array[$dexID][0]["galar"] == true) {
        $species = $species_array[$dexID][0]["name"];
        $img_species = $species;
        if ($species == "farfetchd"){
            $species = "farfetch'd";
        }
        $modifier = "";
        if ($species == "darmanitan"){
            $modifier = "-standard";
        }
        echo '<div class="card col-2 dex-entry" id="galarianDexEntry-' . $dextype. '-' . $dexID . '" onclick="changeCaughtState(\'galarianDexEntry-' . $dextype. '-' . $dexID . '\')"><div class="card-body"><div class="trade-icon" id="galarianDexEntry-trade-' . $dextype. '-' . $dexID . '" onclick="changeTradeState(\'galarianDexEntry-trade-' . $dextype. '-' . $dexID . '\')"></div><div class="place-icon" id="galarianDexEntry-place-' . $dextype. '-' . $dexID . '" onclick="changePlaceState(\'galarianDexEntry-place-' . $dextype. '-' . $dexID . '\')"></div><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $img_species . '-galarian' . $modifier . '.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4></div></div>';
        $printCount++;
        if (($printCount % 6) == 0) {
            echo '</div><div class="row">';
        }
    }
}

echo '</div>';

echo '</div></div>';

// Print Gender variants

$genderBoxCounter = 1;

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="gender-forms-' . $dextype . '-' . $genderBoxCounter . '">';
echo '<div class="card-header" id="gender-forms-' . $dextype . '-' . $genderBoxCounter . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-gender-forms-' . $dextype . '-' . $genderBoxCounter . '" aria-expanded="true" aria-controls="collapse-gender-forms-' . $dextype . '-' . $genderBoxCounter . '"><h3>Gender-Specific Forms ' . $genderBoxCounter . '</h3></button></div><div class="card-body collapse show" id="collapse-gender-forms-' . $dextype . '-' . $genderBoxCounter . '">';

echo '<div class="row">';

$printCount = 0;
for ($dexNum = 1; $dexNum <= $maxDexEntries ; $dexNum++) {
    $dexID = (string) $dexNum;
    $dexID = str_pad($dexID, 3, '0', STR_PAD_LEFT);
    if ($species_array[$dexID][0]["gender"] == true) {
        $species = $species_array[$dexID][0]["name"];
        $img_species = $species;
        if ($species == "meowstic" || $species == "indeedee"){
            $modifier = "emale";
        }
        echo '<div class="card col-2 dex-entry" id="maleDexEntry-' . $dextype. '-' . $dexID . '" onclick="changeCaughtState(\'maleDexEntry-' . $dextype. '-' . $dexID . '\')"><div class="card-body"><div class="trade-icon" id="maleDexEntry-trade-' . $dextype. '-' . $dexID . '" onclick="changeTradeState(\'maleDexEntry-trade-' . $dextype. '-' . $dexID . '\')"></div><div class="place-icon" id="maleDexEntry-place-' . $dextype. '-' . $dexID . '" onclick="changePlaceState(\'maleDexEntry-place-' . $dextype. '-' . $dexID . '\')"></div><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $img_species . '.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4><h4 class="dex-entry-form">Male</h4></div></div>';
        echo '<div class="card col-2 dex-entry" id="femaleDexEntry-' . $dextype. '-' . $dexID . '" onclick="changeCaughtState(\'femaleDexEntry-' . $dextype. '-' . $dexID . '\')"><div class="card-body"><div class="trade-icon" id="femaleDexEntry-trade-' . $dextype. '-' . $dexID . '" onclick="changeTradeState(\'femaleDexEntry-trade-' . $dextype. '-' . $dexID . '\')"></div><div class="place-icon" id="femaleDexEntry-place-' . $dextype. '-' . $dexID . '" onclick="changePlaceState(\'femaleDexEntry-place-' . $dextype. '-' . $dexID . '\')"></div><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $img_species . '-f' . $modifier . '.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4><h4 class="dex-entry-form">Female</h4></div></div>';
        $printCount += 2;
        if (($printCount % 6) == 0) {
            if (($printCount % 30) == 0) {
                $genderBoxCounter++;
                echo '</div></div></div>';
                echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="gender-forms-' . $dextype . '-' . $genderBoxCounter . '">';
                echo '<div class="card-header" id="gender-forms-' . $dextype . '-' . $genderBoxCounter . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-gender-forms-' . $dextype . '-' . $genderBoxCounter . '" aria-expanded="true" aria-controls="collapse-gender-forms-' . $dextype . '-' . $genderBoxCounter . '"><h3>Gender-Specific Forms ' . $genderBoxCounter . '</h3></button></div><div class="card-body collapse show" id="collapse-gender-forms-' . $dextype . '-' . $genderBoxCounter . '">';
                echo '<div class="row">';
            }
            else {
                echo '</div><div class="row">';
            }
        }
    }
}

echo '</div>';

echo '</div></div>';

// Print alt forms

$altBoxCounter = 1;

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="alt-forms-' . $dextype . '-' . $altBoxCounter . '">';
echo '<div class="card-header" id="alt-forms-' . $dextype . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-alt-forms-' . $dextype . '-' . $altBoxCounter . '" aria-expanded="true" aria-controls="collapse-alt-forms-' . $dextype . '-' . $altBoxCounter . '"><h3>Alt Forms ' . $altBoxCounter . '</h3></button></div><div class="card-body collapse show" id="collapse-alt-forms-' . $dextype . '-' . $altBoxCounter . '">';

echo '<div class="row">';

$printCount = 0;

//refactor code here
for ($dexNum = 1; $dexNum <= sizeof($alt_array); $dexNum++) {
    $dexID = (string) $dexNum;
    $dexID = str_pad($dexID, 3, '0', STR_PAD_LEFT);
    $species = $alt_array[$dexID][0]["species"];
    $id = $alt_array[$dexID][0]["id"];
    $form_array = $alt_array[$dexID][0]["forms"];
    $form_names_array = $alt_array[$dexID][0]["form-names"];
    for ($i = 0; $i < sizeof($form_array); $i++){
        $img_species = $species . $form_array[$i];
        $form_name = $form_names_array[$i];
        if ($species == "minior" && $dextype == "shiny"){
            $i = 1;
            $img_species = "minior-core";
            $form_name = "all cores";
        }
        if ($species == "flabebe"){
            $species = "flab&eacuteb&eacute";
        }
        echo '<div class="card col-2 dex-entry" id="altDexEntry-' . $dextype. '-' . $id . '-' . $img_species . '" onclick="changeCaughtState(\'altDexEntry-' . $dextype. '-' . $id . '-' . $img_species . '\')"><div class="card-body"><div class="trade-icon" id="altDexEntry-trade-' . $dextype. '-' . $id . '-' . $img_species . '" onclick="changeTradeState(\'altDexEntry-trade-' . $dextype. '-' . $id . '-' . $img_species . '\')"></div><div class="place-icon" id="altDexEntry-place-' . $dextype. '-' . $id . '-' . $img_species . '" onclick="changePlaceState(\'altDexEntry-place-' . $dextype. '-' . $id . '-' . $img_species . '\')"></div><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $img_species . '.png" alt=""><h4 class="dex-entry-number">' . $id . '</h4><h4 class="dex-entry-name">' . $species . '</h4><h4 class="dex-entry-form">' . $form_name . '</h4></div></div>';
        $printCount++;
        if (($printCount % 6) == 0) {
            if (($printCount % 30) == 0) {
                $altBoxCounter++;
                echo '</div></div></div>';
                echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="gender-forms-' . $dextype . '-' . $altBoxCounter . '">';
                echo '<div class="card-header" id="gender-forms-' . $dextype . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-gender-forms-' . $dextype . '-' . $altBoxCounter . '" aria-expanded="true" aria-controls="collapse-gender-forms-' . $dextype . '-' . $altBoxCounter . '"><h3>Alt Forms ' . $altBoxCounter . '</h3></button></div><div class="card-body collapse show" id="collapse-gender-forms-' . $dextype . '-' . $altBoxCounter . '">';
                echo '<div class="row">';
            }
            else {
                echo '</div><div class="row">';
            }
        }
        if ($species == "minior" && $dextype == "shiny"){
            break;
        }
    }
}

echo '</div>';

echo '</div></div>';

// Print Unown forms

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="Unown">';
echo '<div class="card-header" id="unown"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-unown" aria-expanded="true" aria-controls="collapse-unown"><h3>Unown Forms</h3></button></div><div class="card-body collapse show" id="collapse-unown">';

echo '<div class="row">';

for ($dexNum = 0; $dexNum < sizeof($unown_array); $dexNum++) {
    $variant = $unown_array[$dexNum];
    if ($variant == "qm"){
        $variant = "?";
    }
    if ($variant == "em"){
        $variant = "!";
    }
	echo '<div class="card col-2 dex-entry" id="unownDexEntry-' . $dextype. '-' . $dexNum . '" onclick="changeCaughtState(\'unownDexEntry-' . $dextype. '-' . $dexNum . '\')"><div class="card-body"><div class="trade-icon" id="unownDexEntry-trade-' . $dextype. '-' . $dexNum . '" onclick="changeTradeState(\'unownDexEntry-trade-' . $dextype. '-' . $dexNum . '\')"></div><div class="place-icon" id="unownDexEntry-place-' . $dextype. '-' . $dexNum . '" onclick="changePlaceState(\'unownDexEntry-place-' . $dextype. '-' . $dexNum . '\')"></div><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/unown-' . $unown_array[$dexNum] . '.png" alt=""><h4 class="dex-entry-number">201</h4><h4 class="dex-entry-name">Unown</h4><h4 class="dex-entry-form">' . $variant . '</h4></div></div>';
	if ((($dexNum + 1) % 6) == 0) {
		echo '</div><div class="row">';
	}
}
echo '</div>';

echo '</div></div>';

// Print Vivillon forms

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="Vivillon">';
echo '<div class="card-header" id="vivillon"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-vivillon" aria-expanded="true" aria-controls="collapse-vivillon"><h3>Vivillon Forms</h3></button></div><div class="card-body collapse show" id="collapse-vivillon">';

echo '<div class="row">';

for ($dexNum = 0; $dexNum < sizeof($vivillon_array); $dexNum++) {
    $variant = str_replace("-", " ", $vivillon_array[$dexNum]);
	echo '<div class="card col-2 dex-entry" id="vivillonDexEntry-' . $dextype. '-' . $dexNum . '" onclick="changeCaughtState(\'vivillonDexEntry-' . $dextype. '-' . $dexNum . '\')"><div class="card-body"><div class="trade-icon" id="vivillonDexEntry-trade-' . $dextype. '-' . $dexNum . '" onclick="changeTradeState(\'vivillonDexEntry-trade-' . $dextype. '-' . $dexNum . '\')"></div><div class="place-icon" id="vivillonDexEntry-place-' . $dextype. '-' . $dexNum . '" onclick="changePlaceState(\'vivillonDexEntry-place-' . $dextype. '-' . $dexNum . '\')"></div><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/vivillon-' . $vivillon_array[$dexNum] . '.png" alt=""><h4 class="dex-entry-number">666</h4><h4 class="dex-entry-name">Vivillon</h4><h4 class="dex-entry-form">' . $variant . '</h4></div></div>';
	if ((($dexNum + 1) % 6) == 0) {
		echo '</div><div class="row">';
	}
}
echo '</div>';

echo '</div></div>';

// Print Alcremie forms

$alcremieBoxCounter = 1;
$printCount = 0;

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="Alcremie ' . $alcremieBoxCounter . '">';
echo '<div class="card-header" id="alcremie' . $alcremieBoxCounter . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-alcremie' . $alcremieBoxCounter . '" aria-expanded="true" aria-controls="collapse-alcremie' . $alcremieBoxCounter . '"><h3>Alcremie Forms ' . $alcremieBoxCounter . '</h3></button></div><div class="card-body collapse show" id="collapse-alcremie' . $alcremieBoxCounter . '">';

echo '<div class="row">';

for ($flavorCounter = 0; $flavorCounter < sizeof($alcremie_array["flavors"]); $flavorCounter++) {
    $flavorImg = $alcremie_array["flavors"][$flavorCounter];
    $flavor = str_replace("-", " ", $alcremie_array["flavors"][$flavorCounter]);
    for ($toppingCounter = 0; $toppingCounter < sizeof($alcremie_array["toppings"]); $toppingCounter++) {
        $topping = $alcremie_array["toppings"][$toppingCounter];
        echo '<div class="card col-2 dex-entry" id="alcremieDexEntry-' . $dextype . '-' . $printCount . '" onclick="changeCaughtState(\'alcremieDexEntry-' . $dextype . '-' . $printCount . '\')"><div class="card-body"><div class="trade-icon" id="alcremieDexEntry-trade-' . $dextype. '-' . $printCount . '" onclick="changeTradeState(\'alcremieDexEntry-trade-' . $dextype. '-' . $printCount . '\')"></div><div class="place-icon" id="alcremieDexEntry-place-' . $dextype. '-' . $printCount . '" onclick="changePlaceState(\'alcremieDexEntry-place-' . $dextype. '-' . $printCount . '\')"></div><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/alcremie-' . $flavorImg . '-' . $topping . '.png" alt=""><h4 class="dex-entry-number">869</h4><h4 class="dex-entry-name">Alcremie</h4><h4 class="dex-entry-form">' . $flavor . '<br>' . $topping . '</h4></div></div>';
	
        $printCount++;
        if (($printCount % 6) == 0) {
            if (($printCount % 30) == 0) {
                $alcremieBoxCounter++;
                echo '</div></div></div>';
                echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="Alcremie ' . $alcremieBoxCounter . '">';
                echo '<div class="card-header" id="alcremie' . $alcremieBoxCounter . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-alcremie' . $alcremieBoxCounter . '" aria-expanded="true" aria-controls="collapse-alcremie' . $alcremieBoxCounter . '"><h3>Alcremie Forms ' . $alcremieBoxCounter . '</h3></button></div><div class="card-body collapse show" id="collapse-alcremie' . $alcremieBoxCounter . '">';
                echo '<div class="row">';
            }
            else {
                echo '</div><div class="row">';
            }
        }
    }
}

echo '</div>';

echo '</div></div>';

?>
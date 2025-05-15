<?php

include 'dexDB.php';

$species_array = json_decode ($dexDB, true);

$start = (30 * ($boxNum - 1)) + 1;
$boxStart = str_pad((string) $start, 3, '0', STR_PAD_LEFT);
$boxEnd = (string) ($start + 29);
$boxEnd = str_pad($boxEnd, 3, '0', STR_PAD_LEFT);
$maxDexEntries = 890;

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="' . $boxStart . '-' . $boxEnd . '">';
echo '<div class="card-header" id="' . $boxStart . '-' . $boxEnd . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse' . $boxStart . '" aria-expanded="true" aria-controls="collapse' . $boxStart . '"><h3>' . $boxStart . '&ndash;' . $boxEnd . '</h3></button></div><div class="card-body collapse show" id="collapse' . $boxStart . '">';

echo '<div class="row">';

for ($dexNum = $start; $dexNum < $start + 30; $dexNum++) {
	if ($dexNum > $maxDexEntries) {
		break;
	}
	$dexID = (string) $dexNum;
	$dexID = str_pad($dexID, 3, '0', STR_PAD_LEFT);
	$species = $species_array[$dexID][0]["name"];
	$img_species = $species;
	if ($species == "farfetchd"){
		$species = "farfetch'd";
	}
	if ($species == "sirfetchd"){
		$species = "sirfetch'd";
	}
	if ($species == "mr-rime"){
		$species = "mr. rime";
	}
	if ($species == "alcremie"){
		$img_species = "alcremie-vanilla-cream-strawberry";
	}
	echo '<div class="card col-2 dex-entry" id="dexEntry-' . $dextype. '-' . $dexID . '" onclick="changeCaughtState(\'dexEntry-' . $dextype. '-' . $dexID . '\')"><div class="card-body"><div class="trade-icon" id="dexEntry-trade-' . $dextype. '-' . $dexID . '" onclick="changeTradeState(\'dexEntry-trade-' . $dextype. '-' . $dexID . '\')"></div><div class="place-icon" id="dexEntry-place-' . $dextype. '-' . $dexID . '" onclick="changePlaceState(\'dexEntry-place-' . $dextype. '-' . $dexID . '\')"></div><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $img_species . '.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4></div></div>';
	if (($dexID % 6) == 0) {
		echo '</div><div class="row">';
	}
}
echo '</div>';

echo '</div></div>'

?>
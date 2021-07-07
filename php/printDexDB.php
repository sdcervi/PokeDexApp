<?php

$config = parse_ini_file('../config.ini');
$connection = new mysqli ($config['host'], $config['username'], $config['password'], $config['db']);
// We should definitely set up a different user so that root isn't used for this
$dexArray = $connection->query("SELECT id, name FROM dexDB");

$start = (30 * ($boxNum - 1)) + 1;
$boxStart = str_pad((string) $start, 3, '0', STR_PAD_LEFT);
$boxEnd = (string) ($start + 29);
$boxEnd = str_pad($boxEnd, 3, '0', STR_PAD_LEFT);

$boxStartNum = 1;
$boxStart = str_pad((string) $boxStartNum, 3, '0', STR_PAD_LEFT);
$boxEndNum = 30;
$boxEnd = str_pad((string) $boxEndNum, 3, '0', STR_PAD_LEFT);

$boxCounter = 1;
$printCounter = 0;

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="' . $boxStart . '-' . $boxEnd . '">';
echo '<div class="card-header" id="' . $boxStart . '-' . $boxEnd . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse' . $boxStart . '" aria-expanded="true" aria-controls="collapse' . $boxStart . '"><h3>' . $boxStart . '&ndash;' . $boxEnd . '</h3></button></div><div class="card-body collapse show" id="collapse' . $boxStart . '">';

echo '<div class="row">';

while ($row = mysqli_fetch_assoc ($dexArray)){
	$dexID = str_pad((string) $row['id'], 3, '0', STR_PAD_LEFT);
	$species = $row['name'];
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
	if ($species == "flabebe"){
		$species = "flab&eacuteb&eacute";
	}
	if ($species == "nidoran-f"){
		$species = "nidoran &#9792";
	}
	if ($species == "nidoran-m"){
		$species = "nidoran &#9794";
	}
	if ($species == "alcremie"){
		$img_species = "alcremie-vanilla-cream-strawberry";
	}
	if ($species == "zacian"){
		$img_species = "zacian-hero";
	}
	if ($species == "zamazenta"){
		$img_species = "zamazenta-hero";
	}
	if ($species == "urshifu"){
		$img_species = "urshifu-single-strike";
	}
	echo '<div class="card col-2 dex-entry" id="dexEntry-' . $dextype. '-' . $dexID . '" onclick="changeCaughtState(\'dexEntry-' . $dextype. '-' . $dexID . '\')"><div class="card-body"><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $img_species . '.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4></div></div>';
    $printCounter++;
	if (($printCounter % 6) == 0) {
        if (($printCounter % 30) == 0) {
            $boxCounter++;
            $boxStartNum += 30;
            $boxStart = str_pad((string) $boxStartNum, 3, '0', STR_PAD_LEFT);
            $boxEndNum += 30;
            $boxEnd = str_pad((string) $boxEndNum, 3, '0', STR_PAD_LEFT);
            echo '</div></div></div>';
            echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="' . $boxStart . '-' . $boxEnd . '">';
            echo '<div class="card-header" id="' . $boxStart . '-' . $boxEnd . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse' . $boxStart . '" aria-expanded="true" aria-controls="collapse' . $boxStart . '"><h3>' . $boxStart . '&ndash;' . $boxEnd . '</h3></button></div><div class="card-body collapse show" id="collapse' . $boxStart . '">';
            echo '<div class="row">';
        }
        else {
            echo '</div><div class="row">';
        }
	}
}
echo '</div>';

echo '</div></div>';

?>
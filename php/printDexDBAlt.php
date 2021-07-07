<?php

$config = parse_ini_file('../config.ini');
$connection = new mysqli ($config['host'], $config['username'], $config['password'], $config['db']);
// We should definitely set up a different user so that root isn't used for this
$dexArray = $connection->query("SELECT id, name, alola, galar, gender, alts FROM dexDB");
$unownArray = $connection->query("SELECT id, name, alts FROM dexDB WHERE name = 'unown'");
$vivillonArray = $connection->query("SELECT id, name, alts FROM dexDB WHERE name = 'vivillon'");
$alcremieArray = $connection->query("SELECT id, name, alts FROM dexDB WHERE name = 'alcremie'");

// Print Alolan forms

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="alolan-forms-' . $dextype . '">';
echo '<div class="card-header" id="alolan-forms-' . $dextype . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-alolan-forms-' . $dextype . '" aria-expanded="true" aria-controls="collapse-alolan-forms-' . $dextype . '"><h3>Alolan Forms</h3></button></div><div class="card-body collapse show" id="collapse-alolan-forms-' . $dextype . '">';

echo '<div class="row">';

$printCounter = 0;
mysqli_data_seek($dexArray, 0);

while ($row = mysqli_fetch_assoc ($dexArray)){
    if ($row['alola'] == 'False'){
        continue;
    }
	$dexID = str_pad((string) $row['id'], 3, '0', STR_PAD_LEFT);
	$species = $row['name'];
	echo '<div class="card col-2 dex-entry" id="alolanDexEntry-' . $dextype. '-' . $dexID . '" onclick="changeCaughtState(\'alolanDexEntry-' . $dextype. '-' . $dexID . '\')"><div class="card-body"><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $species . '-alolan.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4></div></div>';
    $printCounter++;
	if (($printCounter % 6) == 0) {
        echo '</div><div class="row">';
	}
}

echo '</div>';

echo '</div></div>';

// Print Galarian forms

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="galarian-forms-' . $dextype . '">';
echo '<div class="card-header" id="galarian-forms-' . $dextype . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-galarian-forms-' . $dextype . '" aria-expanded="true" aria-controls="collapse-galarian-forms-' . $dextype . '"><h3>Galarian Forms</h3></button></div><div class="card-body collapse show" id="collapse-galarian-forms-' . $dextype . '">';

echo '<div class="row">';

$printCounter = 0;
mysqli_data_seek($dexArray, 0);

while ($row = mysqli_fetch_assoc ($dexArray)){
    if ($row['galar'] == 'False'){
        continue;
    }
	$dexID = str_pad((string) $row['id'], 3, '0', STR_PAD_LEFT);
	$species = $row['name'];
    $img_species = $species;
    if ($species == "farfetchd"){
        $species = "farfetch'd";
    }
    $modifier = "";
    if ($species == "darmanitan"){
        $modifier = "-standard";
    }
	echo '<div class="card col-2 dex-entry" id="galarianDexEntry-' . $dextype. '-' . $dexID . '" onclick="changeCaughtState(\'galarianDexEntry-' . $dextype. '-' . $dexID . '\')"><div class="card-body"><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $img_species . '-galarian' . $modifier . '.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4></div></div>';
    $printCounter++;
	if (($printCounter % 6) == 0) {
        echo '</div><div class="row">';
	}
}

echo '</div>';

echo '</div></div>';

// Print Gender forms

$boxCounter = 1;

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="gender-forms-' . $dextype . '-' . $boxCounter . '">';
echo '<div class="card-header" id="gender-forms-' . $dextype . '-' . $boxCounter . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-gender-forms-' . $dextype . '-1" aria-expanded="true" aria-controls="collapse-gender-forms-' . $dextype . '-1"><h3>Gender-Specific Forms ' . $boxCounter . '</h3></button></div><div class="card-body collapse show" id="collapse-gender-forms-' . $dextype . '-1">';

echo '<div class="row">';
$printCounter = 0;
mysqli_data_seek($dexArray, 0);

while ($row = mysqli_fetch_assoc ($dexArray)){
    if ($row['gender'] == 'False'){
        continue;
    }
	$dexID = str_pad((string) $row['id'], 3, '0', STR_PAD_LEFT);
	$species = $row['name'];
    $img_species = $species;
    if ($species == "meowstic" || $species == "indeedee"){
        $modifier = "emale";
    }
	echo '<div class="card col-2 dex-entry" id="maleDexEntry-' . $dextype. '-' . $dexID . '" onclick="changeCaughtState(\'maleDexEntry-' . $dextype. '-' . $dexID . '\')"><div class="card-body"><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $img_species . '.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4><h4 class="dex-entry-form">Male</h4></div></div>';
    echo '<div class="card col-2 dex-entry" id="femaleDexEntry-' . $dextype. '-' . $dexID . '" onclick="changeCaughtState(\'femaleDexEntry-' . $dextype. '-' . $dexID . '\')"><div class="card-body"><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $img_species . '-f' . $modifier . '.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4><h4 class="dex-entry-form">Female</h4></div></div>';
    $printCounter += 2;
	if (($printCounter % 6) == 0) {
        if (($printCounter % 30) == 0) {
            $boxCounter++;
            echo '</div></div></div>';
            echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="gender-forms-' . $dextype . '-' . $boxCounter . '">';
            echo '<div class="card-header" id="gender-forms-' . $dextype . '-' . $boxCounter . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-gender-forms-' . $dextype . '-' . $boxCounter . '" aria-expanded="true" aria-controls="collapse-gender-forms-' . $dextype . '-' . $boxCounter . '"><h3>Gender-Specific Forms ' . $boxCounter . '</h3></button></div><div class="card-body collapse show" id="collapse-gender-forms-' . $dextype . '-' . $boxCounter . '">';
            echo '<div class="row">';
        }
        else {
            echo '</div><div class="row">';
        }
    }
}

echo '</div>';

echo '</div></div>';

// Print Alt forms

$boxCounter = 1;

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="alt-forms-' . $dextype . '">';
echo '<div class="card-header" id="alt-forms-' . $dextype . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-alt-forms-' . $dextype . '" aria-expanded="true" aria-controls="collapse-alt-forms-' . $dextype . '"><h3>Alt Forms ' . $boxCounter . '</h3></button></div><div class="card-body collapse show" id="collapse-alt-forms-' . $dextype . '">';

echo '<div class="row">';
$printCounter = 0;
mysqli_data_seek($dexArray, 0);

while ($row = mysqli_fetch_assoc ($dexArray)){
    if ($row['alts'] == null || $row['alts'] == '' || $row['name'] == 'unown' || $row['name'] == 'vivillon' || $row['name'] == 'alcremie'){
        continue;
    }
	$dexID = str_pad((string) $row['id'], 3, '0', STR_PAD_LEFT);
	$species = $row['name'];
    $formArray = json_decode ($row['alts'], true);
    $num_forms = sizeof($formArray[0]['forms']);
    $img_species = $species;
	if ($species == "flabebe"){
		$species = "flab&eacuteb&eacute";
	}
    for ($i=0; $i<$num_forms; $i++) {
        echo '<div class="card col-2 dex-entry" id="altDexEntry-' . $dextype. '-' . $dexID . '-' . $species . $formArray[0]['forms'][$i] . '" onclick="changeCaughtState(\'altDexEntry-' . $dextype. '-' . $dexID . '-' . $species . $formArray[0]['forms'][$i] . '\')"><div class="card-body"><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $img_species . $formArray[0]['forms'][$i] . '.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4><h4 class="dex-entry-form">' . $formArray[0]['form-names'][$i] . '</h4></div></div>';
        $printCounter ++;
        if (($printCounter % 6) == 0) {
            if (($printCounter % 30) == 0) {
                $boxCounter++;
                echo '</div></div></div>';
                echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="alt-forms-' . $dextype . '-' . $boxCounter . '">';
                echo '<div class="card-header" id="alt-forms-' . $dextype . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-alt-forms-' . $dextype . '-' . $boxCounter . '" aria-expanded="true" aria-controls="collapse-alt-forms-' . $dextype . '-' . $boxCounter . '"><h3>Alt Forms ' . $boxCounter . '</h3></button></div><div class="card-body collapse show" id="collapse-alt-forms-' . $dextype . '-' . $boxCounter . '">';
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

// Print Unown forms

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="unown-forms-' . $dextype . '">';
echo '<div class="card-header" id="unown-forms-' . $dextype . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-unown-forms-' . $dextype . '" aria-expanded="true" aria-controls="collapse-unown-forms-' . $dextype . '"><h3>Unown Forms</h3></button></div><div class="card-body collapse show" id="collapse-unown-forms-' . $dextype . '">';

echo '<div class="row">';

$printCounter = 0;

$row = mysqli_fetch_assoc ($unownArray);
$dexID = str_pad((string) $row['id'], 3, '0', STR_PAD_LEFT);
$species = $row['name'];
$formArray = json_decode ($row['alts'], true);
$num_forms = sizeof($formArray[0]['forms']);
for ($i=0; $i<$num_forms; $i++) {
    echo '<div class="card col-2 dex-entry" id="unownDexEntry-' . $dextype. '-' . $formArray[0]['form-names'][$i] . '" onclick="changeCaughtState(\'unownDexEntry-' . $dextype. '-' . $formArray[0]['form-names'][$i] . '\')"><div class="card-body"><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $species . $formArray[0]['forms'][$i] . '.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4><h4 class="dex-entry-form">' . $formArray[0]['form-names'][$i] . '</h4></div></div>';
    $printCounter ++;
    if (($printCounter % 6) == 0) {
        echo '</div><div class="row">';
    }
}

echo '</div>';

echo '</div></div>';

// Print Vivillon forms

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="vivillon-forms-' . $dextype . '">';
echo '<div class="card-header" id="vivillon-forms-' . $dextype . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-vivillon-forms-' . $dextype . '" aria-expanded="true" aria-controls="collapse-vivillon-forms-' . $dextype . '"><h3>Vivillon Forms</h3></button></div><div class="card-body collapse show" id="collapse-vivillon-forms-' . $dextype . '">';

echo '<div class="row">';

$printCounter = 0;

$row = mysqli_fetch_assoc ($vivillonArray);
$dexID = str_pad((string) $row['id'], 3, '0', STR_PAD_LEFT);
$species = $row['name'];
$formArray = json_decode ($row['alts'], true);
$num_forms = sizeof($formArray[0]['forms']);
for ($i=0; $i<$num_forms; $i++) {
    echo '<div class="card col-2 dex-entry" id="vivillonDexEntry-' . $dextype . $formArray[0]['forms'][$i] . '" onclick="changeCaughtState(\'vivillonDexEntry-' . $dextype . $formArray[0]['forms'][$i] . '\')"><div class="card-body"><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/' . $species . $formArray[0]['forms'][$i] . '.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4><h4 class="dex-entry-form">' . $formArray[0]['form-names'][$i] . '</h4></div></div>';
    $printCounter ++;
    if (($printCounter % 6) == 0) {
        echo '</div><div class="row">';
    }
}

echo '</div>';

echo '</div></div>';

// Print Alcremie forms

$boxCounter = 1;
$printCounter = 0;

$row = mysqli_fetch_assoc ($alcremieArray);$dexID = str_pad((string) $row['id'], 3, '0', STR_PAD_LEFT);
$species = $row['name'];
$formArray = json_decode ($row['alts'], true);
$num_flavors = sizeof($formArray[0]['flavors']);
$num_toppings = sizeof($formArray[0]['toppings']);

if ($dextype == 'shiny')
{
    $num_flavors = 1;
    $boxCounter = null;
}

echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="Alcremie ' . $boxCounter . '">';
echo '<div class="card-header" id="alcremie' . $boxCounter . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-alcremie' . $boxCounter . '" aria-expanded="true" aria-controls="collapse-alcremie' . $boxCounter . '"><h3>Alcremie Forms ' . $boxCounter . '</h3></button></div><div class="card-body collapse show" id="collapse-alcremie' . $boxCounter . '">';

echo '<div class="row">';

for ($flavorCounter = 0; $flavorCounter < $num_flavors; $flavorCounter++) {
    $flavorImg = $formArray[0]['flavors'][$flavorCounter];
    $flavor = str_replace("-", " ", $formArray[0]['flavors'][$flavorCounter]);
    $flavor = $flavor . '<br>';
    if ($dextype == 'shiny')
    {
        $flavor = null;
    }
    for ($toppingCounter = 0; $toppingCounter < $num_toppings; $toppingCounter++) {
        $topping = $formArray[0]['toppings'][$toppingCounter];
        echo '<div class="card col-2 dex-entry" id="alcremieDexEntry-' . $dextype . '-' . $printCount . $flavorImg . '-' . $topping . '" onclick="changeCaughtState(\'alcremieDexEntry-' . $dextype . '-' . $printCount . $flavorImg . '-' . $topping . '\')"><div class="card-body"><img src="https://img.pokemondb.net/sprites/home/' . $dextype . '/alcremie-' . $flavorImg . '-' . $topping . '.png" alt=""><h4 class="dex-entry-number">' . $dexID . '</h4><h4 class="dex-entry-name">' . $species . '</h4><h4 class="dex-entry-form">' . $flavor . $topping . '</h4></div></div>';
	
        $printCounter++;
        if (($printCounter % 6) == 0) {
            if (($printCounter % 30) == 0) {
                $boxCounter++;
                echo '</div></div></div>';
                echo '<div class="card col-12 col-lg-6 dex-box" aria-labelledby="Alcremie ' . $boxCounter . '">';
                echo '<div class="card-header" id="alcremie' . $boxCounter . '"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-alcremie' . $boxCounter . '" aria-expanded="true" aria-controls="collapse-alcremie' . $boxCounter . '"><h3>Alcremie Forms ' . $boxCounter . '</h3></button></div><div class="card-body collapse show" id="collapse-alcremie' . $boxCounter . '">';
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
<!doctype html>
<html lang="en">
	
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Stephanie Cervi">
	<title>RiverTam's Dex || Living Pok&eacute;Dex Tracker</title>

	<!-- Bootstrap core CSS -->
	<link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="/css/style.css" rel="stylesheet">

	<!-- Favicons -->
	<link rel="apple-touch-icon" href="/assets/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="/assets/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="/assets/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="icon" href="/assets/favicons/favicon.ico">
	<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#563d7c">

</head>

<body>
	
<?php include 'php/header.php' ?>

<main role="main">
    
    <section class="jumbotron text-center">
		<div class="container">
			<p class="lead text-muted">RiverTam's Living Pokedex</p>				
		</div>
	</section>
	
	<div class="container">
		
		<h2 class="dex-heading">National Dex</h2>
        
        <h3 class="show-hide">
            <button class="btn btn-link" type="button" aria-expanded="true" aria-controls="collapse-national" id="collapse-national" onclick="changeCollapseState('collapse-national', 'national-dex')">Collapse</button>
            <!--button class="btn btn-link" type="button" aria-expanded="true" aria-controls="caught-national" id="caught-national" onclick="changeDexCaughtState('national-dex')">Toggle All Caught/Uncaught</button-->
        </h3>
        
        <div class="clear"></div>

		<div class="card-deck collapse show" id="national-dex">
			
			<?php
				$dextype = 'normal';
                include 'php/printDexDB.php';
			?>
			
		</div>
        
        <div class="clear"></div>
		
		<h2 class="dex-heading">Alt Forms</h2>
        
        <h3 class="show-hide"><button class="btn btn-link" type="button" aria-expanded="true" aria-controls="collapse-alt" id="collapse-alt" onclick="changeCollapseState('collapse-alt', 'alt-dex')">Collapse</button></h3>
        
        <div class="clear"></div>

		<div class="card-deck collapse show" id="alt-dex">
			
			<?php
				$dextype = 'normal';
                include 'php/printDexDBAlt.php';
			?>
			
		</div>
		
		<h2 class="dex-heading">Shiny National Dex</h2>
        
        <h3 class="show-hide"><button class="btn btn-link" type="button" aria-expanded="true" aria-controls="collapse-shiny-national" id="collapse-shiny-national" onclick="changeCollapseState('collapse-shiny-national', 'shiny-national-dex')">Expand</button></h3>
        
        <div class="clear"></div>

		<div class="card-deck collapse" id="shiny-national-dex">
			
			<?php
				$dextype = 'shiny';
                include 'php/printDexDB.php';
			?>
			
		</div>
        
        <div class="clear"></div>
		
		<h2 class="dex-heading">Shiny Alt Forms</h2>
        
        <h3 class="show-hide"><button class="btn btn-link" type="button" aria-expanded="true" aria-controls="collapse-shiny-alt" id="collapse-shiny-alt" onclick="changeCollapseState('collapse-shiny-alt', 'shiny-alt-dex')">Expand</button></h3>
        
        <div class="clear"></div>

		<div class="card-deck collapse" id="shiny-alt-dex">
			
			<?php
				$dextype = 'shiny';
                include 'php/printDexDBAlt.php';
			?>
			
		</div>
		
	</div>
	
</main>

<?php include 'php/footer.php' ?>
    
<script>
    let caughtToggle = document.getElementsByClassName("dex-entry");
    for (i = 0; i < caughtToggle.length; i++) {
        caughtToggle[i].classList.add("caught");
    }
    let completeBoxes = [
        "collapse001",
		"collapse031",
		"collapse061",
		"collapse121",
		"collapse181",
		"collapse211",
		"collapse271",
		"collapse331",
		"collapse511",
		"collapse541",
		"collapse571",
		"collapse601",
		"collapse661",
		"collapse721",
		"collapse751",
		"collapse841",
		"collapse-gender-forms-normal-1",
		"collapse-gender-forms-normal-2",
		"collapse-gender-forms-normal-3",
		"collapse-gender-forms-normal-4",
		"collapse-gender-forms-normal-7"
    ];
    for (i = 0; i < completeBoxes.length; i++) {
        document.getElementById(completeBoxes[i]).classList.remove("show");
    }
</script>
    
<script>
    
    let tradelist = [
        "dexEntry-normal-179",
        "dexEntry-normal-257",
        "dexEntry-normal-267",
        "dexEntry-normal-346",
        "dexEntry-normal-367",
        "dexEntry-normal-368",
        "dexEntry-normal-383",
        "dexEntry-normal-385",
        "dexEntry-normal-386",
        "dexEntry-normal-409",
        "dexEntry-normal-419",
        "dexEntry-normal-429",
        "dexEntry-normal-480",
        "dexEntry-normal-481",
        "dexEntry-normal-487",
        "dexEntry-normal-489",
        "dexEntry-normal-490",
        "dexEntry-normal-492",
        "dexEntry-normal-648",
        "dexEntry-normal-691",
        "dexEntry-normal-718",
        "dexEntry-normal-719",
        "dexEntry-normal-720",
        "dexEntry-normal-802",
        "dexEntry-normal-807",
        "alolanDexEntry-normal-089",
        "femaleDexEntry-normal-405",
        "altDexEntry-normal-025-pikachu-original-cap",
        "altDexEntry-normal-025-pikachu-hoenn-cap",
        "altDexEntry-normal-025-pikachu-sinnoh-cap",
        "altDexEntry-normal-025-pikachu-unova-cap",
        "altDexEntry-normal-025-pikachu-kalos-cap",
        "altDexEntry-normal-025-pikachu-alola-cap",
        "altDexEntry-normal-025-pikachu-johto-cap",
        "altDexEntry-normal-647-keldeo-resolute",
        "altDexEntry-normal-648-meloetta-aria",
        "altDexEntry-normal-801-magearna"
    ];
    
    let movelist = [
        "dexEntry-normal-094",
        "dexEntry-normal-330",
        "dexEntry-normal-815",
        "alolanDexEntry-normal-026"
    ];

    let wishlist = [
        "dexEntry-normal-385",
        "dexEntry-normal-386",
        "dexEntry-normal-489",
        "dexEntry-normal-490",
        "dexEntry-normal-720",
        "dexEntry-normal-807",
        "dexEntry-normal-892",
        "dexEntry-normal-894",
        "dexEntry-normal-895",
        "dexEntry-normal-896",
        "dexEntry-normal-897",
        "dexEntry-normal-898",
        "galarianDexEntry-normal-080",
        "galarianDexEntry-normal-144",
        "galarianDexEntry-normal-145",
        "galarianDexEntry-normal-146",
        "galarianDexEntry-normal-199",
        "femaleDexEntry-normal-111",
        "maleDexEntry-normal-111",
        "femaleDexEntry-normal-404",
        "maleDexEntry-normal-418",
        "femaleDexEntry-normal-418",
        "maleDexEntry-normal-424",
        "femaleDexEntry-normal-424",
        "femaleDexEntry-normal-445",
        "maleDexEntry-normal-457",
        "femaleDexEntry-normal-457",
        "altDexEntry-normal-025-pikachu-world-cap",
        "altDexEntry-normal-386-deoxys-normal",
        "altDexEntry-normal-386-deoxys-attack",
        "altDexEntry-normal-386-deoxys-defense",
        "altDexEntry-normal-386-deoxys-speed",
        "altDexEntry-normal-492-shaymin-land",
        "altDexEntry-normal-492-shaymin-sky",
        "altDexEntry-normal-641-tornadus-incarnate",
        "altDexEntry-normal-641-tornadus-therian",
        "altDexEntry-normal-642-thundurus-incarnate",
        "altDexEntry-normal-642-thundurus-therian",
        "altDexEntry-normal-645-landorus-incarnate",
        "altDexEntry-normal-645-landorus-therian",
        "altDexEntry-normal-646-kyurem",
        "altDexEntry-normal-646-kyurem-black",
        "altDexEntry-normal-646-kyurem-white",
        "altDexEntry-normal-647-keldeo-ordinary",
        "altDexEntry-normal-648-meloetta-pirouette",
        "altDexEntry-normal-658-greninja",
        "altDexEntry-normal-658-greninja-ash",
        "altDexEntry-normal-670-floette-blue",
        "altDexEntry-normal-670-floette-red",
        "altDexEntry-normal-670-floette-orange",
        "altDexEntry-normal-670-floette-white",
        "altDexEntry-normal-671-florges-red",
        "altDexEntry-normal-671-florges-orange",
        "altDexEntry-normal-671-florges-white",
        "altDexEntry-normal-720-hoopa-confined",
        "altDexEntry-normal-720-hoopa-unbound",
        "altDexEntry-normal-800-necrozma",
        "altDexEntry-normal-800-necrozma-dawn-wings",
        "altDexEntry-normal-800-necrozma-dusk-mane",
        "altDexEntry-normal-892-urshifu-single-strike",
        "altDexEntry-normal-892-urshifu-rapid-strike",
        "altDexEntry-normal-893-zarude",
        "altDexEntry-normal-893-zarude-dada",
        "altDexEntry-normal-898-calyrex",
        "altDexEntry-normal-898-calyrex-ice-rider",
        "altDexEntry-normal-898-calyrex-shadow-rider",
        "unownDexEntry-normal-l",
        "unownDexEntry-normal-n",
        "unownDexEntry-normal-r",
        "unownDexEntry-normal-y",
        "unownDexEntry-normal-z",
        "vivillonDexEntry-normal-meadow",
        "vivillonDexEntry-normal-archipelago",
        "vivillonDexEntry-normal-fancy",
        "vivillonDexEntry-normal-icy-snow",
        "vivillonDexEntry-normal-jungle",
        "vivillonDexEntry-normal-marine",
        "vivillonDexEntry-normal-ocean",
        "vivillonDexEntry-normal-poke-ball",
        "vivillonDexEntry-normal-river",
        "vivillonDexEntry-normal-sandstorm",
        "vivillonDexEntry-normal-savanna",
        "vivillonDexEntry-normal-sun",
        "alcremieDexEntry-normal-caramel-swirl-strawberry",
        "alcremieDexEntry-normal-lemon-cream-berry",
        "alcremieDexEntry-normal-lemon-cream-flower",
        "alcremieDexEntry-normal-lemon-cream-love",
        "alcremieDexEntry-normal-lemon-cream-ribbon",
        "alcremieDexEntry-normal-lemon-cream-star",
        "alcremieDexEntry-normal-lemon-cream-strawberry",
        "alcremieDexEntry-normal-matcha-cream-berry",
        "alcremieDexEntry-normal-matcha-cream-flower",
        "alcremieDexEntry-normal-matcha-cream-love",
        "alcremieDexEntry-normal-matcha-cream-ribbon",
        "alcremieDexEntry-normal-matcha-cream-star",
        "alcremieDexEntry-normal-mint-cream-berry",
        "alcremieDexEntry-normal-mint-cream-clover",
        "alcremieDexEntry-normal-mint-cream-flower",
        "alcremieDexEntry-normal-mint-cream-love",
        "alcremieDexEntry-normal-mint-cream-ribbon",
        "alcremieDexEntry-normal-mint-cream-star",
        "alcremieDexEntry-normal-mint-cream-strawberry",
        "alcremieDexEntry-normal-rainbow-swirl-berry",
        "alcremieDexEntry-normal-rainbow-swirl-clover",
        "alcremieDexEntry-normal-rainbow-swirl-flower",
        "alcremieDexEntry-normal-rainbow-swirl-love",
        "alcremieDexEntry-normal-rainbow-swirl-ribbon",
        "alcremieDexEntry-normal-rainbow-swirl-star",
        "alcremieDexEntry-normal-rainbow-swirl-strawberry",
        "alcremieDexEntry-normal-ruby-cream-star",
        "alcremieDexEntry-normal-ruby-cream-strawberry",
        "alcremieDexEntry-normal-ruby-swirl-flower",
        "alcremieDexEntry-normal-ruby-swirl-love",
        "alcremieDexEntry-normal-ruby-swirl-ribbon",
        "alcremieDexEntry-normal-ruby-swirl-star",
        "alcremieDexEntry-normal-ruby-swirl-strawberry",
        "alcremieDexEntry-normal-salted-cream-berry",
        "alcremieDexEntry-normal-salted-cream-clover",
        "alcremieDexEntry-normal-salted-cream-flower",
        "alcremieDexEntry-normal-salted-cream-love",
        "alcremieDexEntry-normal-salted-cream-ribbon",
        "alcremieDexEntry-normal-salted-cream-star",
        "alcremieDexEntry-normal-salted-cream-strawberry",
    ];
    
    for (i = 0; i < wishlist.length; i++) {
        document.getElementById(wishlist[i]).classList.remove("caught");
    }
    
    for (i = 0; i < movelist.length; i++) {
        document.getElementById(movelist[i]).classList.remove("caught");
        document.getElementById(movelist[i]).classList.add("place");
    }
    
    for (i = 0; i < tradelist.length; i++) {
        document.getElementById(tradelist[i]).classList.remove("caught");
        document.getElementById(tradelist[i]).classList.add("trade");
    }
    
</script>
	
</html>

<!doctype html>
<html lang="en">
	
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Stephanie Cervi">
	<title>Living Pok&eacute;Dex Tracker</title>

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="../css/style.css" rel="stylesheet">

	<!-- Favicons -->
	<link rel="apple-touch-icon" href="../assets/favicons/apple-touch-icon.png" sizes="180x180">
	<link rel="icon" href="../assets/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
	<link rel="icon" href="../assets/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
	<link rel="icon" href="../assets/favicons/favicon.ico">
	<meta name="msapplication-config" content="../docs/4.4/assets/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#563d7c">
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166061118-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-166061118-1');
    </script>

</head>

<body>
	
<?php include '../php/header.php' ?>

<main role="main">

	<section class="jumbotron text-center">
		<div class="container">
			<p class="lead text-muted">Tailored toward Pok&eacute;mon Home users, this Dex tracker is designed to help you catalog your entire collection&mdash;regional forms, alt forms, and shinies included.</p>				
		</div>
	</section>
    
    <!-- Usage key -->
    <div class="container">
        <div class="card-deck" id="usageKey-Deck">
            <div class="card col-12 col-lg-6 dex-box" aria-labelledby="Usage key" id="usageKey">
                <div class="card-header"><h3>Usage Key</h3></div>
                <div class="card-body">
                    <div class="row">
                        <p class="col-12">Click on a pokemon sprite to toggle between these states.</p>
                        <div class="card col-2 dex-entry" id="usageKey-notCaught">
                            <div class="card-body">
                                <img src="https://img.pokemondb.net/sprites/home/normal/bulbasaur.png" alt="">
                                <h4 class="dex-entry-number">001</h4>
                                <h4 class="dex-entry-name">Bulbasaur</h4>
                                <h4 class="dex-entry-number usage-key">Not Caught</h4>
                            </div>
                        </div>
                        <div class="card col-2 dex-entry caught" id="usageKey-caught">
                            <div class="card-body">
                                <img src="https://img.pokemondb.net/sprites/home/normal/bulbasaur.png" alt="">
                                <h4 class="dex-entry-number">001</h4>
                                <h4 class="dex-entry-name">Bulbasaur</h4>
                                <h4 class="dex-entry-number usage-key">Caught</h4>
                            </div>
                        </div>
                        <div class="card col-2 dex-entry" id="usageKey-trading">
                            <div class="card-body">
                                <div class="trade-icon icon-show"></div>
                                <img src="https://img.pokemondb.net/sprites/home/normal/bulbasaur.png" alt="">
                                <h4 class="dex-entry-number">001</h4>
                                <h4 class="dex-entry-name">Bulbasaur</h4>
                                <h4 class="dex-entry-number usage-key">Trading for</h4>
                            </div>
                        </div>
                        <div class="card col-2 dex-entry" id="usageKey-place">
                            <div class="card-body">
                                <div class="place-icon icon-show"></div>
                                <img src="https://img.pokemondb.net/sprites/home/normal/bulbasaur.png" alt="">
                                <h4 class="dex-entry-number">001</h4>
                                <h4 class="dex-entry-name">Bulbasaur</h4>
                                <h4 class="dex-entry-number usage-key">Ready to place</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<!-- National dex -->
	<div class="container">
		
		<h2 class="dex-heading">National Dex</h2>
        
        <h3 class="show-hide"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#national-dex" aria-expanded="true" aria-controls="collapse-national">Show/Hide</button></h3>
        
        <div class="clear"></div>

		<div class="card-deck collapse show" id="national-dex">
			
			<?php
				$dextype = 'normal';
				$maxBoxes = 30;
				for ($i = 0; $i < $maxBoxes; $i++){
					$boxNum = $i + 1;
					include 'printDex.php';
				}
			?>
			
		</div>
        
        <div class="clear"></div>
		
		<h2 class="dex-heading">Alt forms and regional variants</h2>
        
        <h3 class="show-hide"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#alt-forms" aria-expanded="true" aria-controls="collapse-alt-forms">Show/Hide</button></h3>
        
        <div class="clear"></div>

		<div class="card-deck collapse show" id="alt-forms">
			
			<?php
				$dextype = 'normal';
				include 'printDexAlt.php';
			?>
			
		</div>
        
        <hr size="1" />
        
        <div class="clear"></div>
		
		<h2 class="dex-heading">Shiny National Dex</h2>
        
        <h3 class="show-hide"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#national-dex-shiny" aria-expanded="true" aria-controls="collapse-national-shiny">Show/Hide</button></h3>
        
        <div class="clear"></div>

		<div class="card-deck collapse" id="national-dex-shiny">
			
			<?php
				$dextype = 'shiny';
				$maxBoxes = 30;
				for ($i = 0; $i < $maxBoxes; $i++){
					$boxNum = $i + 1;
					include 'printDex.php';
				}
			?>
			
		</div>
        
        <div class="clear"></div>
		
		<h2 class="dex-heading">Shiny alt forms and regional variants</h2>
        
        <h3 class="show-hide"><button class="btn btn-link" type="button" data-toggle="collapse" data-target="#alt-forms-shiny" aria-expanded="true" aria-controls="collapse-alt-forms-shiny">Show/Hide</button></h3>
        
        <div class="clear"></div>

		<div class="card-deck collapse" id="alt-forms-shiny">
			
			<?php
				$dextype = 'shiny';
				include 'printDexAlt.php';
			?>
			
		</div>
		
	</div>
	
</main>

<?php include '../php/footer.php' ?>
    
<script>
    let caughtToggle = document.getElementsByClassName("dex-entry");
    for (i = 0; i < caughtToggle.length; i++) {
        caughtToggle[i].classList.add("caught");
    }
    document.getElementById("usageKey-notCaught").classList.remove("caught");
    document.getElementById("usageKey-trading").classList.remove("caught");
    document.getElementById("usageKey-place").classList.remove("caught");
    
    document.getElementById("nav-home").classList.add("active");
    
    function changeCaughtState (divID) {
        document.getElementById(divID).classList.toggle("caught");
    }
    
    function changeTradeState (divID) {
        document.getElementById(divID).classList.toggle("icon-show");
        event.stopPropagation();
    }
    
    function changePlaceState (divID) {
        document.getElementById(divID).classList.toggle("icon-show");
        event.stopPropagation();
    }
</script>
	
</html>

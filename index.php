<!doctype html>
<html lang="en">
	
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Stephanie Cervi">
	<title>Living Pok&eacute;Dex Tracker</title>

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
	 
<header>
    
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
        
        <a class="navbar-brand" href="/">Living Pok&eacute;Dex Tracker<span class="d-none d-lg-inline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</span></a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" id="nav-home"><a class="nav-link" href="/">Living Dex</a></li>
                <li class="nav-item" id="nav-alts"><a class="nav-link" href="/alts/">Alt Forms Guide</a></li>
                <li class="nav-item" id="nav-faq"><a class="nav-link" href="/faq/">FAQ</a></li>
                <li class="nav-item" id="nav-progress"><a class="nav-link" href="/progress/">Progress &amp; To-dos</a></li>
                <li class="nav-item" id="nav-feedback"><a class="nav-link" href="/feedback/">Feedback</a></li>
                <li class="nav-item" id="nav-donate"><a class="nav-link" href="/donate/">Toss A Coin To Your Designer</a></li>
            </ul>
        </div>
        
    </nav>
    
</header>

<main role="main">
    
    <section class="jumbotron text-center">
		<div class="container">
			<p class="lead text-muted">Tailored toward Pok&eacute;mon Home users, this Dex tracker is designed to help you catalog your entire collection&mdash;regional forms, alt forms, and shinies included.</p>				
		</div>
	</section>
    
    <?php include "php/usage-key.php" ?>
	
	<div class="container">
		
		<h2 class="dex-heading">National Dex</h2>
        
        <h3 class="show-hide">
            <button class="btn btn-link" type="button" aria-expanded="true" aria-controls="collapse-national" id="collapse-national" onclick="changeCollapseState('collapse-national', 'national-dex')">Collapse</button>
            <button class="btn btn-link" type="button" aria-expanded="true" aria-controls="caught-national" id="caught-national" onclick="changeDexCaughtState('national-dex')">Toggle All Caught/Uncaught</button>
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
    
<script type="text/javascript" src="js/toggle-state.js"></script>
    
<script>
    document.getElementById("nav-home").classList.add("active");
</script>
	
</html>

<!doctype html>
<html lang="en">
	
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Stephanie Cervi">
	<title>Progress &amp; To-dos || Living Pok&eacute;Dex Tracker</title>

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
	
	<div class="container info-page">
		
		<h1>Progress &amp; To-dos</h1>
		
		<p>I&rsquo;ve moved tracking of bugs, to-do items, and feature requests over to the <a href="https://github.com/sdcervi/PokeDexApp">Living Pok&eacute;dex Tracker&rsquo;s GitHub site</a>.</p>
		
		<p><a href="https://github.com/sdcervi/PokeDexApp/commits">Click here to view the most up-to-date changelog</a>.</p>
		
		<p>If you have a feature request, came across a bug or error, or otherwise want to reach out, you can either <a href="https://github.com/sdcervi/PokeDexApp/issues/new/choose">submit a new issue and browse existing ones there</a>, or <a href="../feedback/">send me an email about it</a>.</p>
		
		
		
		
		
        <h3>Low priority</h3>
		<ul>
            <li>Pixel block thumbnail preview of boxes with colors, or Bootstrap progress bars</li>
            <ul>
                <li>Black: caught</li>
                <li>Light gray: not caught</li>
                <li>Bright orange: trading</li>
                <li>Medium-dark blue: placing</li>
            </ul>
            <li>Add a "mark/unmark all as caught" at the box level and at the dex level</li>
            <li>Add expand/collapse icons for boxes</li>
			<li>Lazyload images</li>
			<li>Table of contents on side of screen in margin, scrolls with contents?</li>
			<li>iOS and Android apps, for phone and tablet. Look into service to port webapp to native?</li>
			<li>Dynamically updating caught count/% for each box</li>
            <li>Transparency in favicon</li>
            <li>Sticky footer</li>
			<li>Abbreviate div IDs for shorter line lengths</li>
			<li>Add Alcremie alts guide link in boxes</li>
			<li>CSS animations for expand/collapse</li>
			<li>indexOf and splice functions for database edits</li>
			<li>Factory functions</li>
			<li>Code refactor and comment for better clarity, readability, and maintainability</li>
			<li>Card display function to call instead of repeating code in each print segment</li>
			<li>forEach loops instead of for?</li>
			<li>Collapse all completed boxes</li>
		</ul>
	
	</div>
	
</main>

<?php include '../php/footer.php' ?>
    
<script>
    document.getElementById("nav-progress").classList.add("active");
</script>
	
</html>

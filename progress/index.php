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
		
		<h2>Features to add:</h2>
        <h3>High priority</h3>
		<ul>
            <li>Printer-friendly layout, or printable PDF</li>
			<li>Functional user login with ability to save, store, and recall dexes</li>
            <li>Login drop-down in navigation, with below-nav bar of user stats/logout/profile only visible after login</li>
			<li>Accessibility audit and improvements</li>
		</ul>
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
            <li>High contrast mode</li>
			<li>SSL certificate</li>
			<li>iOS and Android apps, for phone and tablet. Look into service to port webapp to native?</li>
			<li>Dynamically updating caught count/% for each box</li>
            <li>Transparency in favicon</li>
            <li>Single sign on via Google/etc</li>
            <li>Sticky footer</li>
			<li>Abbreviate div IDs for shorter line lengths</li>
			<li>Show/hide usage key</li>
			<li>New database fields for gen-specific dex numbers (i.e. Generation: 3 - DexNo: XXX. Generation 4 - DexNo: YYY)</li>
            <li>Add Pumpkaboo and Gourgeist metrics to Alts page, add link in boxes</li>
			<!--	PUMPKABOO
					Small	1’0” (0.3m)	7.7lb (3.5kg)
					Average	1’4” (0.4m)	11.0lb (5.0kg)
					Large	1’8” (0.5m)	16.5lb (7.5kg)
					Super	2’7” (0.8m)	33.1lb (15.0kg)

					GOURGEIST
					Small	2’4”	(0.7m)	20.9lb (9.5kg)
					Average	2’11” (0.9m)	27.6lb (12.5kg)
					Large	3’7” (1.1m)	30.9 lbs (14kg)
					Super	5’7” (1.7m)	86 lbs (39kg)
			-->
			<li>Add Alcremie alts guide link in boxes</li>
			<li>Sinistea and Polteageist alt forms (same sprite)</li>
			<li>Furfrou trims</li>
			<li>CSS animations for expand/collapse</li>
			<li>indexOf and splice functions for database edits</li>
			<li>Factory functions</li>
			<li>Code refactor and comment for better clarity, readability, and maintainability</li>
			<li>Card display function to call instead of repeating code in each print segment</li>
			<li>forEach loops instead of for?</li>
			<li>Semantic HTML improvements</li>
			<li>Browser QA: OS, Browser, ADA</li>
			<li>CSS variables for color palette for different themes, store in user DB entry to remember?</li>
			<li>Collapse all completed boxes</li>
		</ul>
		
		<h2>Bugs to squish</h2>
		<ul>
			<li></li>
		</ul>
		
		<h2>Changelog</h2>
		<ul>
            <li>2022-02-14</li>
            <ul>
                <li>Got git repo sync to work; now pushes from git repo to FTP automatically at 1AM daily</li>
            </ul>
            <li>2022-02-13</li>
            <ul>
                <li>Added an <a href="../alts/">Alt Forms Guide</a> to have information on complex alt forms such as Alcremie and Pumpkaboo</li>
            </ul>
            <li>2022-02-11</li>
            <ul>
                <li>Added Galarian alt forms for Slowking, Articuno, Zapdos, and Moltres</li>
				<li>Added female Rhyhorn alt form</li>
				<li>Added World Cap Pikachu alt form</li>
            </ul>
            <li>2020-11-25</li>
            <ul>
                <li>Added the rest of Generation 8's sprites to the main dex and alt dexes</li>
            </ul>
            <li>2020-11-22</li>
            <ul>
                <li>Migrated to a new hosting solution</li>
            </ul>
            <li>2020-07-15</li>
            <ul>
                <li>Added dynamically changing Expand/Collapse text for each dex set</li>
            </ul>
            <li>2020-07-13</li>
            <ul>
                <li>Moved MySQL-based index to homepage and archived old version</li>
            </ul>
            <li>2020-07-02</li>
            <ul>
                <li>Implemented a sequential toggle of trading-placing-caught states for better usability</li>
            </ul>
            <li>2020-05-28</li>
            <ul>
                <li>Ported MySQL database to a hosted solution rather than my laptop</li>
                <li>Fixed Alcremie shiny forms: only one flavor when shiny</li>
            </ul>
            <li>2020-05-20</li>
            <ul>
                <li>Fully refactored PHP script to print the dex to pull from SQL database</li>
            </ul>
            <li>2020-05-19</li>
            <ul>
                <li>Learned how to store a JSON object in a MySQL database, read, and print it for alt forms</li>
                <li>Figured out storing HTML alt codes in a way that PHP can print</li>
            </ul>
            <li>2020-05-17</li>
            <ul>
                <li>Got a rudimentary ligin/register/change passowrd/logout system to work</li>
            </ul>
            <li>2020-05-15</li>
            <ul>
                <li>Successfully got a MySQL version of the Pok&eacute;dex (National only, no alts or shinies) to render</li>
            </ul>
            <li>2020-05-11</li>
            <ul>
                <li>Set up MySQL and made it display things</li>
            </ul>
            <li>2020-05-09</li>
            <ul>
                <li>Set up CSS for trading/placing icons</li>
                <li>Added click toggle functionality for those icons</li>
            </ul>
            <li>2020-05-07</li>
            <ul>
                <li>Got caught state toggle between grayed out and full color to work</li>
            </ul>
            <li>2020-05-06</li>
            <ul>
                <li>Fixed navbar padding issue and added active page link functionality</li>
                <li>Started creating sample dex to show functionality</li>
                <li>Made navbar fixed to top of window</li>
                <li>Fixed ID conflicts so normal and shiny variants have their own unique IDs</li>
                <li>Fixed feedback form mobile experience</li>
            </ul>
            <li>2020-05-05</li>
            <ul>
                <li>Improved layout to allow slightly less tiny text, and made boxes fixed size</li>
                <li>Added a feedback/bug report/error report page</li>
                <li>Added an FAQ page</li>
            </ul>
            <li>2020-05-04</li>
            <ul>
                <li>Finished alt form dex population</li>
                <li>Fixed a few bugs in the alt form dex population</li>
            </ul>
            <li>2020-05-03</li>
            <ul>
                <li>Got the basics of the alt form dex to start displaying</li>
            </ul>
            <li>2020-05-02</li>
            <ul>
                <li>Stored booleans in database for male/female and regional forms</li>
            </ul>
			<li>2020-05-01</li>
			<ul>
				<li>Added 3-across layout for x-large screens</li>
				<li>Made a local copy of the PokeAPI database since that's what was loading slowly</li>
			</ul>
			<li>2020-04-30</li>
			<ul>
				<li>Integrated PokeAPI. Success! (with errors)</li>
				<li>Got PokeAPI values to print correctly after a crash (and burn) course in PHP</li>
			</ul>
			<li>2020-04-29</li>
			<ul>
				<li>Moved this list to a new page</li>
				<li>Fixed text sizing, sort of; it's tiny, but it works</li>
				<li>Fixed page breakpoints</li>
				<li>Removed text-underline on link hover</li>
			</ul>
			<li>2020-04-28</li>
			<ul>
				<li>Added 2-across layout for larger screens</li>
				<li>Moved Header and Footer into files to call remotely</li>
			</ul>
			<li>2020-04-26</li>
			<ul>
				<li>Created first iteration of design</li>
			</ul>
		</ul>
	
	</div>
	
</main>

<?php include '../php/footer.php' ?>
    
<script>
    document.getElementById("nav-progress").classList.add("active");
</script>
	
</html>

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
        
    ];
    for (i = 0; i < completeBoxes.length; i++) {
        document.getElementById(completeBoxes[i]).classList.remove("show");
    }
</script>
    
<script>
    
    let tradelist = [
        "dexEntry-normal-001",
        "dexEntry-normal-002",
        "dexEntry-normal-004",
        "dexEntry-normal-015",
        "dexEntry-normal-018",
        "dexEntry-normal-020",
        "dexEntry-normal-023",
        "dexEntry-normal-030",
        
        "dexEntry-normal-031",
        "dexEntry-normal-032",
        "dexEntry-normal-033",
        "dexEntry-normal-034",
        "dexEntry-normal-035",
        "dexEntry-normal-038",
        "dexEntry-normal-047",
        "dexEntry-normal-049",
        "dexEntry-normal-050",
        "dexEntry-normal-055",
        "dexEntry-normal-057",
        
        "dexEntry-normal-061",
        "dexEntry-normal-062",
        "dexEntry-normal-063",
        "dexEntry-normal-065",
        "dexEntry-normal-066",
        "dexEntry-normal-068",
        "dexEntry-normal-069",
        "dexEntry-normal-070",
        "dexEntry-normal-071",
        "dexEntry-normal-073",
        "dexEntry-normal-074",
        "dexEntry-normal-076",
        "dexEntry-normal-077",
        "dexEntry-normal-078",
        "dexEntry-normal-079",
        "dexEntry-normal-080",
        "dexEntry-normal-082",
        "dexEntry-normal-084",
        "dexEntry-normal-085",
        "dexEntry-normal-086",
        "dexEntry-normal-087",
        "dexEntry-normal-088",
        "dexEntry-normal-089",
        
        "dexEntry-normal-091",
        "dexEntry-normal-097",
        "dexEntry-normal-099",
        "dexEntry-normal-100",
        "dexEntry-normal-101",
        "dexEntry-normal-102",
        "dexEntry-normal-103",
        "dexEntry-normal-106",
        "dexEntry-normal-110",
        "dexEntry-normal-114",
        "dexEntry-normal-116",
        "dexEntry-normal-119",
        
        "dexEntry-normal-121",
        "dexEntry-normal-124",
        "dexEntry-normal-125",
        "dexEntry-normal-126",
        "dexEntry-normal-127",
        "dexEntry-normal-128",
        "dexEntry-normal-129",
        "dexEntry-normal-137",
        "dexEntry-normal-138",
        "dexEntry-normal-139",
        "dexEntry-normal-140",
        "dexEntry-normal-141",
        "dexEntry-normal-142",
        "dexEntry-normal-145",
        "dexEntry-normal-146",
        "dexEntry-normal-147",
        "dexEntry-normal-149",
        
        "dexEntry-normal-154",
        "dexEntry-normal-157",
        "dexEntry-normal-158",
        "dexEntry-normal-160",
        "dexEntry-normal-161",
        "dexEntry-normal-167",
        "dexEntry-normal-179",
        "dexEntry-normal-180",
        
        "dexEntry-normal-183",
        "dexEntry-normal-186",
        "dexEntry-normal-187",
        "dexEntry-normal-189",
        "dexEntry-normal-191",
        "dexEntry-normal-201",
        "dexEntry-normal-205",
        "dexEntry-normal-207",
        
        "dexEntry-normal-214",
        "dexEntry-normal-217",
        "dexEntry-normal-218",
        "dexEntry-normal-222",
        "dexEntry-normal-224",
        "dexEntry-normal-228",
        "dexEntry-normal-230",
        "dexEntry-normal-233",
        "dexEntry-normal-234",
        "dexEntry-normal-239",
        
        "dexEntry-normal-242",
        "dexEntry-normal-243",
        "dexEntry-normal-244",
        "dexEntry-normal-245",
        "dexEntry-normal-246",
        "dexEntry-normal-247",
        "dexEntry-normal-249",
        "dexEntry-normal-250",
        "dexEntry-normal-252",
        "dexEntry-normal-254",
        "dexEntry-normal-256",
        "dexEntry-normal-257",
        "dexEntry-normal-260",
        "dexEntry-normal-266",
        "dexEntry-normal-267",
        "dexEntry-normal-269",
        
        "dexEntry-normal-276",
        "dexEntry-normal-282",
        "dexEntry-normal-283",
        "dexEntry-normal-286",
        "dexEntry-normal-287",
        "dexEntry-normal-288",
        "dexEntry-normal-289",
        "dexEntry-normal-293",
        "dexEntry-normal-295",
        
        "dexEntry-normal-317",
        "dexEntry-normal-318",
        "dexEntry-normal-322",
        "dexEntry-normal-326",
        "dexEntry-normal-327",
        "dexEntry-normal-328",
        
        "dexEntry-normal-334",
        "dexEntry-normal-337",
        "dexEntry-normal-346",
        "dexEntry-normal-348",
        "dexEntry-normal-352",
        "dexEntry-normal-354",
        "dexEntry-normal-357",
        
        "dexEntry-normal-363",
        "dexEntry-normal-365",
        "dexEntry-normal-366",
        "dexEntry-normal-367",
        "dexEntry-normal-368",
        "dexEntry-normal-369",
        "dexEntry-normal-371",
        "dexEntry-normal-373",
        "dexEntry-normal-374",
        "dexEntry-normal-375",
        "dexEntry-normal-380",
        "dexEntry-normal-381",
        "dexEntry-normal-383",
        "dexEntry-normal-384",
        "dexEntry-normal-388",
        "dexEntry-normal-389",
        "dexEntry-normal-390",
        
        "dexEntry-normal-392",
        "dexEntry-normal-393",
        "dexEntry-normal-395",
        "dexEntry-normal-397",
        "dexEntry-normal-398",
        "dexEntry-normal-400",
        "dexEntry-normal-402",
        "dexEntry-normal-404",
        "dexEntry-normal-405",
        "dexEntry-normal-408",
        "dexEntry-normal-409",
        "dexEntry-normal-410",
        "dexEntry-normal-411",
        "dexEntry-normal-412",
        "dexEntry-normal-413",
        "dexEntry-normal-414",
        "dexEntry-normal-416",
        "dexEntry-normal-417",
        "dexEntry-normal-419",
        
        "dexEntry-normal-424",
        "dexEntry-normal-429",
        "dexEntry-normal-430",
        "dexEntry-normal-431",
        "dexEntry-normal-432",
        "dexEntry-normal-433",
        "dexEntry-normal-436",
        "dexEntry-normal-437",
        "dexEntry-normal-440",
        "dexEntry-normal-441",
        "dexEntry-normal-443",
        "dexEntry-normal-444",
        "dexEntry-normal-445",
        "dexEntry-normal-447",
        "dexEntry-normal-448",
        "dexEntry-normal-449",
        "dexEntry-normal-450",
        
        "dexEntry-normal-454",
        "dexEntry-normal-455",
        "dexEntry-normal-457",
        "dexEntry-normal-458",
        "dexEntry-normal-462",
        "dexEntry-normal-463",
        "dexEntry-normal-465",
        "dexEntry-normal-466",
        "dexEntry-normal-467",
        "dexEntry-normal-469",
        "dexEntry-normal-470",
        "dexEntry-normal-472",
        "dexEntry-normal-473",
        "dexEntry-normal-474",
        "dexEntry-normal-476",
        "dexEntry-normal-480",
        
        "dexEntry-normal-481",
        "dexEntry-normal-482",
        "dexEntry-normal-483",
        "dexEntry-normal-484",
        "dexEntry-normal-485",
        "dexEntry-normal-486",
        "dexEntry-normal-487",
        "dexEntry-normal-488",
        "dexEntry-normal-491",
        "dexEntry-normal-492",
        "dexEntry-normal-493",
        "dexEntry-normal-494",
        "dexEntry-normal-496",
        "dexEntry-normal-497",
        "dexEntry-normal-499",
        "dexEntry-normal-500",
        "dexEntry-normal-502",
        "dexEntry-normal-503",
        "dexEntry-normal-508",
        
        "dexEntry-normal-511",
        "dexEntry-normal-513",
        "dexEntry-normal-514",
        "dexEntry-normal-516",
        "dexEntry-normal-517",
        "dexEntry-normal-518",
        "dexEntry-normal-521",
        "dexEntry-normal-523",
        "dexEntry-normal-528",
        "dexEntry-normal-533",
        "dexEntry-normal-540",
        
        "dexEntry-normal-541",
        "dexEntry-normal-542",
        "dexEntry-normal-544",
        "dexEntry-normal-545",
        "dexEntry-normal-547",
        "dexEntry-normal-548",
        "dexEntry-normal-549",
        "dexEntry-normal-550",
        "dexEntry-normal-551",
        "dexEntry-normal-552",
        "dexEntry-normal-553",
        "dexEntry-normal-554",
        "dexEntry-normal-555",
        "dexEntry-normal-557",
        "dexEntry-normal-558",
        "dexEntry-normal-559",
        "dexEntry-normal-560",
        "dexEntry-normal-561",
        "dexEntry-normal-562",
        "dexEntry-normal-563",
        "dexEntry-normal-564",
        "dexEntry-normal-565",
        "dexEntry-normal-566",
        "dexEntry-normal-567",
        "dexEntry-normal-568",
        "dexEntry-normal-569",
        "dexEntry-normal-570",
        
        "dexEntry-normal-571",
        "dexEntry-normal-573",
        "dexEntry-normal-574",
        "dexEntry-normal-575",
        "dexEntry-normal-578",
        "dexEntry-normal-579",
        "dexEntry-normal-580",
        "dexEntry-normal-581",
        "dexEntry-normal-583",
        "dexEntry-normal-584",
        "dexEntry-normal-586",
        "dexEntry-normal-587",
        "dexEntry-normal-588",
        "dexEntry-normal-589",
        "dexEntry-normal-591",
        "dexEntry-normal-594",
        
        "dexEntry-normal-602",
        "dexEntry-normal-603",
        "dexEntry-normal-604",
        "dexEntry-normal-605",
        "dexEntry-normal-606",
        "dexEntry-normal-608",
        "dexEntry-normal-612",
        "dexEntry-normal-613",
        "dexEntry-normal-614",
        "dexEntry-normal-615",
        "dexEntry-normal-616",
        "dexEntry-normal-617",
        "dexEntry-normal-618",
        "dexEntry-normal-619",
        "dexEntry-normal-620",
        "dexEntry-normal-623",
        "dexEntry-normal-624",
        "dexEntry-normal-625",
        "dexEntry-normal-628",
        "dexEntry-normal-629",
        "dexEntry-normal-630",
        
        "dexEntry-normal-633",
        "dexEntry-normal-634",
        "dexEntry-normal-635",
        "dexEntry-normal-637",
        "dexEntry-normal-638",
        "dexEntry-normal-639",
        "dexEntry-normal-640",
        "dexEntry-normal-641",
        "dexEntry-normal-642",
        "dexEntry-normal-643",
        "dexEntry-normal-644",
        "dexEntry-normal-645",
        "dexEntry-normal-646",
        "dexEntry-normal-647",
        "dexEntry-normal-648",
        "dexEntry-normal-649",
        "dexEntry-normal-650",
        "dexEntry-normal-651",
        "dexEntry-normal-652",
        "dexEntry-normal-653",
        "dexEntry-normal-654",
        "dexEntry-normal-655",
        "dexEntry-normal-656",
        "dexEntry-normal-657",
        "dexEntry-normal-658",
        
        "dexEntry-normal-663",
        "dexEntry-normal-665",
        "dexEntry-normal-666",
        "dexEntry-normal-668",
        "dexEntry-normal-669",
        "dexEntry-normal-670",
        "dexEntry-normal-671",
        "dexEntry-normal-672",
        "dexEntry-normal-673",
        "dexEntry-normal-682",
        "dexEntry-normal-683",
        "dexEntry-normal-685",
        "dexEntry-normal-687",
        "dexEntry-normal-690",
        
        "dexEntry-normal-691",
        "dexEntry-normal-692",
        "dexEntry-normal-693",
        "dexEntry-normal-696",
        "dexEntry-normal-697",
        "dexEntry-normal-698",
        "dexEntry-normal-699",
        "dexEntry-normal-702",
        "dexEntry-normal-704",
        "dexEntry-normal-705",
        "dexEntry-normal-706",
        "dexEntry-normal-707",
        "dexEntry-normal-709",
        "dexEntry-normal-713",
        "dexEntry-normal-716",
        "dexEntry-normal-717",
        "dexEntry-normal-718",
        "dexEntry-normal-719",
        "dexEntry-normal-720",
        
        "dexEntry-normal-721",
        "dexEntry-normal-722",
        "dexEntry-normal-723",
        "dexEntry-normal-725",
        "dexEntry-normal-726",
        "dexEntry-normal-728",
        "dexEntry-normal-733",
        "dexEntry-normal-740",
        "dexEntry-normal-741",
        "dexEntry-normal-744",
        "dexEntry-normal-745",
        
        "dexEntry-normal-753",
        "dexEntry-normal-757",
        "dexEntry-normal-765",
        "dexEntry-normal-769",
        "dexEntry-normal-770",
        "dexEntry-normal-773",
        "dexEntry-normal-774",
        "dexEntry-normal-775",
        "dexEntry-normal-778",
        "dexEntry-normal-779",
        "dexEntry-normal-780",
        
        "dexEntry-normal-784",
        "dexEntry-normal-789",
        "dexEntry-normal-790",
        "dexEntry-normal-792",
        "dexEntry-normal-793",
        "dexEntry-normal-794",
        "dexEntry-normal-795",
        "dexEntry-normal-796",
        "dexEntry-normal-797",
        "dexEntry-normal-798",
        "dexEntry-normal-799",
        "dexEntry-normal-800",
        "dexEntry-normal-802",
        "dexEntry-normal-803",
        "dexEntry-normal-804",
        "dexEntry-normal-805",
        "dexEntry-normal-806",
        "dexEntry-normal-807",
        
        "dexEntry-normal-812",
        "dexEntry-normal-818",
        
        "dexEntry-normal-842",
        "dexEntry-normal-856",
        "dexEntry-normal-864",
        "dexEntry-normal-867",
        
        "dexEntry-normal-872",
        "dexEntry-normal-875",
        "dexEntry-normal-882",
        "dexEntry-normal-889",
        "dexEntry-normal-891",
        
        "alolanDexEntry-normal-027",
        "alolanDexEntry-normal-028",
        "alolanDexEntry-normal-037",
        "alolanDexEntry-normal-076",
        "alolanDexEntry-normal-089",
        "alolanDexEntry-normal-105",
        
        "galarianDexEntry-normal-078",
        "galarianDexEntry-normal-555",
        
        "maleDexEntry-normal-003",
        "femaleDexEntry-normal-003",
        "maleDexEntry-normal-012",
        "femaleDexEntry-normal-012",
        "maleDexEntry-normal-019",
        "femaleDexEntry-normal-019",
        "maleDexEntry-normal-020",
        "femaleDexEntry-normal-020",
        "maleDexEntry-normal-025",
        "femaleDexEntry-normal-025",
        "maleDexEntry-normal-026",
        "femaleDexEntry-normal-026",
        "maleDexEntry-normal-041",
        "femaleDexEntry-normal-041",
        "maleDexEntry-normal-042",
        "femaleDexEntry-normal-042",
        "maleDexEntry-normal-044",
        "maleDexEntry-normal-045",
        "femaleDexEntry-normal-045",
        "femaleDexEntry-normal-064",
        "maleDexEntry-normal-065",
        "femaleDexEntry-normal-065",
        "maleDexEntry-normal-084",
        "femaleDexEntry-normal-084",
        "maleDexEntry-normal-085",
        "femaleDexEntry-normal-085",
        "maleDexEntry-normal-097",
        "femaleDexEntry-normal-097",
        
        "maleDexEntry-normal-112",
        "femaleDexEntry-normal-112",
        "maleDexEntry-normal-118",
        "femaleDexEntry-normal-118",
        "maleDexEntry-normal-119",
        "femaleDexEntry-normal-119",
        "maleDexEntry-normal-123",
        "femaleDexEntry-normal-123",
        "maleDexEntry-normal-129",
        "femaleDexEntry-normal-129",
        "maleDexEntry-normal-130",
        "femaleDexEntry-normal-130",
        "maleDexEntry-normal-133",
        "maleDexEntry-normal-154",
        "femaleDexEntry-normal-154",
        "maleDexEntry-normal-166",
        "femaleDexEntry-normal-166",
        "maleDexEntry-normal-178",
        "femaleDexEntry-normal-185",
        "maleDexEntry-normal-186",
        "femaleDexEntry-normal-186",
        "maleDexEntry-normal-190",
        "femaleDexEntry-normal-190",
        "maleDexEntry-normal-194",
        "femaleDexEntry-normal-194",
        
        "maleDexEntry-normal-195",
        "maleDexEntry-normal-198",
        "femaleDexEntry-normal-202",
        "maleDexEntry-normal-203",
        "femaleDexEntry-normal-203",
        "maleDexEntry-normal-208",
        "femaleDexEntry-normal-208",
        "maleDexEntry-normal-212",
        "femaleDexEntry-normal-212",
        "maleDexEntry-normal-214",
        "femaleDexEntry-normal-214",
        "maleDexEntry-normal-215",
        "femaleDexEntry-normal-215",
        "maleDexEntry-normal-217",
        "femaleDexEntry-normal-217",
        "maleDexEntry-normal-221",
        "femaleDexEntry-normal-221",
        "maleDexEntry-normal-229",
        "femaleDexEntry-normal-229",
        "maleDexEntry-normal-232",
        "femaleDexEntry-normal-232",
        "femaleDexEntry-normal-255",
        
        "maleDexEntry-normal-256",
        "femaleDexEntry-normal-256",
        "femaleDexEntry-normal-257",
        "maleDexEntry-normal-267",
        "maleDexEntry-normal-269",
        "femaleDexEntry-normal-269",
        "maleDexEntry-normal-272",
        "femaleDexEntry-normal-272",
        "maleDexEntry-normal-274",
        "femaleDexEntry-normal-274",
        "maleDexEntry-normal-307",
        "femaleDexEntry-normal-307",
        "maleDexEntry-normal-308",
        "femaleDexEntry-normal-308",
        "maleDexEntry-normal-315",
        "maleDexEntry-normal-316",
        "maleDexEntry-normal-317",
        "femaleDexEntry-normal-317",
        "maleDexEntry-normal-322",
        "femaleDexEntry-normal-322",
        "maleDexEntry-normal-323",
        "femaleDexEntry-normal-323",
        "maleDexEntry-normal-332",
        "femaleDexEntry-normal-332",
        
        "maleDexEntry-normal-369",
        "femaleDexEntry-normal-369",
        "maleDexEntry-normal-396",
        "femaleDexEntry-normal-396",
        "maleDexEntry-normal-397",
        "femaleDexEntry-normal-397",
        "maleDexEntry-normal-398",
        "femaleDexEntry-normal-398",
        "femaleDexEntry-normal-399",
        "maleDexEntry-normal-400",
        "femaleDexEntry-normal-400",
        "maleDexEntry-normal-401",
        "femaleDexEntry-normal-401",
        "maleDexEntry-normal-402",
        "femaleDexEntry-normal-402",
        "femaleDexEntry-normal-403",
        "maleDexEntry-normal-405",
        "femaleDexEntry-normal-405",
        "femaleDexEntry-normal-415",
        "maleDexEntry-normal-417",
        "femaleDexEntry-normal-417",
        
        "maleDexEntry-normal-419",
        "femaleDexEntry-normal-419",
        "maleDexEntry-normal-443",
        "femaleDexEntry-normal-443",
        "maleDexEntry-normal-444",
        "femaleDexEntry-normal-444",
        "maleDexEntry-normal-445",
        "maleDexEntry-normal-449",
        "femaleDexEntry-normal-449",
        "maleDexEntry-normal-456",
        "femaleDexEntry-normal-456",
        "maleDexEntry-normal-459",
        "femaleDexEntry-normal-459",
        "femaleDexEntry-normal-460",
        
        "femaleDexEntry-normal-464",
        "maleDexEntry-normal-465",
        "femaleDexEntry-normal-465",
        "maleDexEntry-normal-473",
        "femaleDexEntry-normal-473",
        "maleDexEntry-normal-592",
        "femaleDexEntry-normal-592",
        "maleDexEntry-normal-668",
        "femaleDexEntry-normal-668",
        "maleDexEntry-normal-876",
        "femaleDexEntry-normal-876",
        
        "altDexEntry-normal-025-pikachu-original-cap",
        "altDexEntry-normal-025-pikachu-hoenn-cap",
        "altDexEntry-normal-025-pikachu-sinnoh-cap",
        "altDexEntry-normal-025-pikachu-unova-cap",
        "altDexEntry-normal-025-pikachu-kalos-cap",
        "altDexEntry-normal-025-pikachu-alola-cap",
        "altDexEntry-normal-025-pikachu-johto-cap",
        "altDexEntry-normal-413-wormadam-plant",
        "altDexEntry-normal-413-wormadam-sandy",
        "altDexEntry-normal-413-wormadam-trash",
        "altDexEntry-normal-422-shellos-east",
        "altDexEntry-normal-423-gastrodon-west",
        "altDexEntry-normal-423-gastrodon-east",
        "altDexEntry-normal-479-rotom",
        "altDexEntry-normal-479-rotom-frost",
        "altDexEntry-normal-550-basculin-red-striped",
        
        "altDexEntry-normal-550-basculin-blue-striped",
        "altDexEntry-normal-585-deerling-spring",
        "altDexEntry-normal-585-deerling-summer",
        "altDexEntry-normal-585-deerling-autumn",
        "altDexEntry-normal-585-deerling-winter",
        "altDexEntry-normal-586-sawsbuck-spring",
        "altDexEntry-normal-586-sawsbuck-summer",
        "altDexEntry-normal-586-sawsbuck-autumn",
        "altDexEntry-normal-586-sawsbuck-winter",
        "altDexEntry-normal-647-keldeo-resolute",
        "altDexEntry-normal-648-meloetta-aria",
        "altDexEntry-normal-669-flab&eacutebé-red",
        "altDexEntry-normal-669-flab&eacutebé-orange",
        "altDexEntry-normal-669-flab&eacutebé-yellow",
        "altDexEntry-normal-669-flab&eacutebé-blue",
        "altDexEntry-normal-669-flab&eacutebé-white",
        
        "altDexEntry-normal-670-floette-yellow",
        "altDexEntry-normal-671-florges-yellow",
        "altDexEntry-normal-671-florges-blue",
        "altDexEntry-normal-710-pumpkaboo-small",
        "altDexEntry-normal-710-pumpkaboo-large",
        "altDexEntry-normal-710-pumpkaboo-super",
        "altDexEntry-normal-711-gourgeist-super",
        "altDexEntry-normal-718-zygarde-50",
        "altDexEntry-normal-741-oricorio-baile",
        "altDexEntry-normal-741-oricorio-pau",
        "altDexEntry-normal-741-oricorio-pom-pom",
        "altDexEntry-normal-741-oricorio-sensu",
        "altDexEntry-normal-745-lycanroc-midday",
        "altDexEntry-normal-745-lycanroc-dusk",
        "altDexEntry-normal-745-lycanroc-midnight",
        "altDexEntry-normal-774-minior-red-core",
        "altDexEntry-normal-774-minior-orange-core",
        
        "altDexEntry-normal-774-minior-yellow-core",
        "altDexEntry-normal-774-minior-green-core",
        "altDexEntry-normal-774-minior-blue-core",
        "altDexEntry-normal-774-minior-indigo-core",
        "altDexEntry-normal-774-minior-violet-core",
        "altDexEntry-normal-801-magearna",
        "altDexEntry-normal-801-magearna-original",
        
        "unownDexEntry-normal-a",
        "unownDexEntry-normal-b",
        "unownDexEntry-normal-c",
        "unownDexEntry-normal-d",
        "unownDexEntry-normal-e",
        "unownDexEntry-normal-f",
        "unownDexEntry-normal-g",
        "unownDexEntry-normal-h",
        "unownDexEntry-normal-i",
        "unownDexEntry-normal-j",
        "unownDexEntry-normal-k",
        "unownDexEntry-normal-m",
        "unownDexEntry-normal-o",
        "unownDexEntry-normal-p",
        "unownDexEntry-normal-q",
        "unownDexEntry-normal-s",
        "unownDexEntry-normal-t",
        "unownDexEntry-normal-u",
        "unownDexEntry-normal-v",
        "unownDexEntry-normal-w",
        "unownDexEntry-normal-x",
        "unownDexEntry-normal-qm",
        "unownDexEntry-normal-em",
        
        "vivillonDexEntry-normal-continental",
        "vivillonDexEntry-normal-elegant",
        "vivillonDexEntry-normal-garden",
        "vivillonDexEntry-normal-high-plains",
        "vivillonDexEntry-normal-modern",
        "vivillonDexEntry-normal-monsoon",
        "vivillonDexEntry-normal-polar",
        "vivillonDexEntry-normal-tundra",
        
        "alcremieDexEntry-normal-matcha-cream-strawberry"
    ];
    
    let movelist = [
        "dexEntry-normal-094",
        "dexEntry-normal-330",
        "dexEntry-normal-815",
        "alolanDexEntry-normal-026",
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
        "femaleDexEntry-normal-404",
        "maleDexEntry-normal-418",
        "femaleDexEntry-normal-418",
        "maleDexEntry-normal-424",
        "femaleDexEntry-normal-424",
        "femaleDexEntry-normal-445",
        "maleDexEntry-normal-457",
        "femaleDexEntry-normal-457",
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
        "alcremieDexEntry-normal-vanilla-cream-ribbon",
        "alcremieDexEntry-normal-vanilla-cream-star",
        "alcremieDexEntry-normal-caramel-swirl-ribbon",
        "alcremieDexEntry-normal-caramel-swirl-star",
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
        "alcremieDexEntry-normal-ruby-cream-ribbon",
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

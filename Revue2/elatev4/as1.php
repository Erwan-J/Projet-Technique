<?php
    //    // On se connecte à MySQL
    include_once("database.php");
    // Connexion à la base de données
    $idcom = connect_DB();
    
    $inclinaison="SELECT inclinaison_panneau FROM MesurePS WHERE id_ps='1' ORDER BY ID DESC ";//selcetionner seulement la consommation
    $orientation="SELECT Orientation_panneau FROM MesurePS WHERE id_ps='1' ORDER BY ID DESC";
    $tension="SELECT V_Panneau FROM MesurePS WHERE id_ps='1' ORDER BY ID DESC";
    $courant="SELECT I_Panneau FROM MesurePS WHERE id_ps='1' ORDER BY ID DESC";
    $temps_marche="SELECT Horodatage FROM MesurePS WHERE id_ps='1' ORDER BY ID DESC";
      //////////////////////////////////////////////////////

?>  

<!DOCTYPE html>
    <html class="no-js"> 
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ISS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

 
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/style.css">

	<style>
	 .sys {
        display: inline-block;
        margin: center;
    }
	</style>



	<script src="js/modernizr-2.6.2.min.js"></script>

</head>
<body>
<header role="banner" id="fh5co-header">
		<div class="container">
			<!-- <div class="row"> -->
			<nav class="navbar navbar-default">
			<div class="navbar-header">
				<!-- Mobile Toggle Menu Button -->
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
			 <a class="navbar-brand" href="index.html">Instrumentations Salles Systèmes</a> 
			</div>
			
			</nav>
		  <!-- </div> -->
	  </div>
</header>

<section id="fh5co-work" data-section="work">
	<div class="container">
		<div class="row">
			<div class="col-md-12 section-heading text-center">
				<h2 class="to-animate">Panneau Solaire 1</h2>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 subtext to-animate" id="bloc">
	    <div>
    	    <!--Panneau-->
    	    <div class="sys">
    	        <h3>Inclinaison : <?php afficheValeur($inclinaison,$idcom)?>°</h3>
        		<svg height="170" width="280">
                    <line id="line" x1="50" y1="100" x2="200" y2="100" transform-origin="150 100" transform="rotate(<?php afficheValeur($inclinaison,$idcom)?>)" style="stroke:rgb(255,0,0); stroke-width:5" />
                    <line x1="125" y1="150" x2="150" y2="100"style="stroke:rgb(0,0,0); stroke-width:3" />
                    <line x1="175" y1="150" x2="150" y2="100"style="stroke:rgb(0,0,0); stroke-width:3" />
                    <circle cx="150" cy="100" r="3" stroke="black" stroke-width="3" fill="red" />
                    <rect x="10" y="0" width="250" height="150" style="fill:none;stroke-width:3;stroke:rgb(0,0,0)" />
                </svg>
    		</div>
    		
    		<!--boussole-->
    		 <div class="sys">
    	        <h3>Orientation : <?php afficheValeur($orientation,$idcom)?>°</h3>
        		<svg height="170" width="140" >
                    <text x="60" y="13" fill="red">N</text>
                    <circle cx="65" cy="80" r="60" stroke="black" stroke-width="5" fill="none" />
                    <polygon points="65,40 40,80 90,80 " style="fill:darkred;stroke:black;stroke-width:1" transform-origin="65 80" transform="rotate(<?php afficheValeur($orientation,$idcom)?>)" />
                    <polygon points="65,120 40,80 90,80 " style="fill:cyan;stroke:black;stroke-width:1" transform-origin="65 80" transform="rotate(<?php afficheValeur($orientation,$idcom)?>)"/>
                </svg>
            </div>
            
            <!--Multimetre-->
            
            <div class="sys">
                <svg width="500" height="500">
                    
                    <!--base-->
                    <g>
                        <rect rx="20" ry="20" width="250" height="400" stroke="black" stroke-width="2"  fill="#494949" />
                    </g>
                    
                    <!--Ecran-->
                    <g >
                        <rect id="screen" x="25" y="25" rx="20" ry="20"width="200" height="100" stroke="white" stroke-width="3"  fill="red" />
                        <text id="uni" x="150" y="100" fill="black" font-size="2em"></text>
                        <text id="val" x="50" y="100" fill="black" font-size="2em"></text>
                    </g>
                    
                    <!--bouton rotative-->
                    <g > 
                        <circle cx="125" cy="250" r="75" stroke="black" stroke-width="3" fill="none" />
                        <circle cx="125" cy="250" r="50" stroke="white" stroke-width="1" fill="black" />
                        <polygon  id="BR" points="120,325 130,325 130,200 125,175 125,220 125,175 120,200" stroke="white" stroke-width="1"  fill="black" transform-origin="125 250"  />
                    </g>
                    
                    <!--valeur-->
                    <g id="mA">
                        <rect x="20" y="214" rx="2" ry="2" width="27" height="20" stroke="black" stroke-width="1"  fill="white" />
                        <text x="20" y="230" fill="black" font-size="1em">mA</text>
                    </g>
                    <g id="A">
                        <rect x="55" y="164" rx="2" ry="2" width="25" height="20" stroke="black" stroke-width="1"  fill="white" />
                        <text x="62" y="180" fill="black" font-size="1em">A</text>
                    </g>
                    <g id="OFF">
                        <rect x="110" y="149" rx="2" ry="2" width="33" height="20" stroke="black" stroke-width="1"  fill="white" />
                        <text x="110" y="165" fill="black" font-size="1em">OFF</text>
                    </g>
                    <g id="V">
                        <rect x="175" y="164" rx="2" ry="2" width="25" height="20" stroke="black" stroke-width="1"  fill="white" />
                        <text x="182" y="180" fill="black" font-size="1em">V</text>
                    </g>
                    <g id="mV">
                    <rect x="205" y="214" rx="2" ry="2" width="27" height="20" stroke="black" stroke-width="1"  fill="white" />
                    <text x="205" y="230" fill="black" font-size="1em">mV</text>
                    </g>
                    
                    <!--port-->
                    <g>
                    <circle  cx="75" cy="370" r="10" stroke="darkred" stroke-width="5" fill="red" />
                    <circle cx="175" cy="370" r="10" stroke="black" stroke-width="5" fill="#3d3d3d" />
                    </g>
                    
<!--/////////////////////////////////////////////multimetre/////////////////////////////////////////////////////////////-->                    
                </svg>
                <svg width="500" height="500">
                    
                    <!--base-->
                    <g>
                        <rect rx="20" ry="20" width="250" height="400" stroke="black" stroke-width="2"  fill="#494949" />
                    </g>
                    
                    <!--Ecran-->
                    <g >
                        <rect id="screen" x="25" y="25" rx="20" ry="20"width="200" height="100" stroke="white" stroke-width="3"  fill="red" />
                        <text id="uni" x="150" y="100" fill="black" font-size="2em"></text>
                        <text id="val" x="50" y="100" fill="black" font-size="2em"></text>
                    </g>
                    
                    <!--bouton rotative-->
                    <g > 
                        <circle cx="125" cy="250" r="75" stroke="black" stroke-width="3" fill="none" />
                        <circle cx="125" cy="250" r="50" stroke="white" stroke-width="1" fill="black" />
                        <polygon  id="BR" points="120,325 130,325 130,200 125,175 125,220 125,175 120,200" stroke="white" stroke-width="1"  fill="black" transform-origin="125 250"  />
                    </g>
                    
                    <!--valeur-->
                    <g id="mA">
                        <rect x="20" y="214" rx="2" ry="2" width="27" height="20" stroke="black" stroke-width="1"  fill="white" />
                        <text x="20" y="230" fill="black" font-size="1em">mA</text>
                    </g>
                    <g id="A">
                        <rect x="55" y="164" rx="2" ry="2" width="25" height="20" stroke="black" stroke-width="1"  fill="white" />
                        <text x="62" y="180" fill="black" font-size="1em">A</text>
                    </g>
                    <g id="OFF">
                        <rect x="110" y="149" rx="2" ry="2" width="33" height="20" stroke="black" stroke-width="1"  fill="white" />
                        <text x="110" y="165" fill="black" font-size="1em">OFF</text>
                    </g>
                    <g id="V">
                        <rect x="175" y="164" rx="2" ry="2" width="25" height="20" stroke="black" stroke-width="1"  fill="white" />
                        <text x="182" y="180" fill="black" font-size="1em">V</text>
                    </g>
                    <g id="mV">
                    <rect x="205" y="214" rx="2" ry="2" width="27" height="20" stroke="black" stroke-width="1"  fill="white" />
                    <text x="205" y="230" fill="black" font-size="1em">mV</text>
                    </g>
                    
                    <!--port-->
                    <g>
                    <circle  cx="75" cy="370" r="10" stroke="darkred" stroke-width="5" fill="red" />
                    <circle cx="175" cy="370" r="10" stroke="black" stroke-width="5" fill="#3d3d3d" />
                    </g>
                    
                    
                </svg>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            </div>
        </div>
       </div>
				</div>
				<a   href="index.html" >
    						<img src="images/fleche.png"   width="50" height="50">
    					</a>
			</div>
		</div>				
	</div>
</section>

	


	
	
	
	
	
	
	<footer id="footer" role="contentinfo">
		<a href="#" class="gotop js-gotop"><i class="icon-arrow-up2"></i></a>
		<div class="container">
			<div class="">
				<div class="col-md-12 text-center">
					<p>Created by <a href="http://stssnsb.free.fr/" target="_blank">BTS SN Sembat</a></p>	
				</div>
			</div>
		</div>
	</footer>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	
	<!-- Counter -->
	<script src="js/jquery.countTo.js"></script>
	
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="js/main.js"></script>
	
	
	<script>
	    function Valeur(ID) {
             if(ID =="mA")
                {
                 document.getElementById("val").innerHTML = "<?php afficheValeur($courant,$idcom)?>"; 
                 document.getElementById("uni").innerHTML = ID; 
                 document.getElementById("screen").style.fill = 'aqua';
                 document.getElementById("BR").style.transform='rotate(-70deg)';
                }
             if(ID =="A")
             {
                 document.getElementById("val").innerHTML = "<?php afficheValeur($courant,$idcom)?>"/1000; 
                 document.getElementById("uni").innerHTML = ID;
                 document.getElementById("screen").style.fill = 'aqua';
                 document.getElementById("BR").style.transform='rotate(-40deg)';
             }
             if(ID =="OFF")
             {
                 document.getElementById("val").innerHTML = ""; 
                 document.getElementById("uni").innerHTML ="";
                 document.getElementById("screen").style.fill = 'red';
                 document.getElementById("BR").style.transform='rotate(0deg)';
             }
             
             if(ID =="mV")
             {
                 document.getElementById("val").innerHTML = "<?php afficheValeur($tension,$idcom)?>"; 
                 document.getElementById("uni").innerHTML = ID;
                 document.getElementById("screen").style.fill = 'aqua';
                 document.getElementById("BR").style.transform='rotate(70deg)';
             }
             
            if(ID =="V")
            {
                document.getElementById("val").innerHTML = "<?php afficheValeur($tension,$idcom)?>"/1000; 
                document.getElementById("uni").innerHTML = ID;
                document.getElementById("screen").style.fill = 'aqua';
                document.getElementById("BR").style.transform='rotate(40deg)';
            }
        };
        
 		 document.getElementById("mA").onclick = function() {Valeur("mA")};
 		 
 		 document.getElementById("A").onclick = function() {Valeur("A")};
 		 
 		 document.getElementById("OFF").onclick = function() {Valeur("OFF")};
 		 
 		 document.getElementById("V").onclick = function() {Valeur("V")};
 		 
 		 document.getElementById("mV").onclick = function() {Valeur("mV")};
 		 
 		 
 		 
 		 
 		 
 		/* let xhr = new XMLHttpRequest();
 		xhr.open('GET', '/article/xmlhttprequest/example/load')*/
 		 
 		 xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  //Under this add the following lines:
                var id = document.getElementById('courant').value; 
                xmlhttp.send("id="+id);

    </script>
	
		

	</body>
</html>










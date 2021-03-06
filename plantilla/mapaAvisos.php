<?php 
	session_start();
	if(isset($_SESSION['logeado'])){
?>
<!doctype html>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<title>Base de Datos Robles Portillo</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../js/jquery-2.1.0.js"></script>
	<script type="text/javascript" src="../js/desplegable.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<link href="../metro/min/iconFont.min.css" rel="stylesheet">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCgajOZ2z49GqITiicD84WyPmR7T0OEtSQ&sensor=SET_TO_TRUE_OR_FALSE">
    </script>
    <script type="text/javascript">
      function initialize() {
      	 var n=1;
      	 var popup;
        var mapOptions = {
          center: new google.maps.LatLng(40.2970266, -3.7493709),
          zoom:7,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);
      	var place = new Array();
      	var tipo = new Array();
		//place['aviso1'] = new google.maps.LatLng(40.2969151,-3.7491966);
		//place['aviso2'] = new google.maps.LatLng(40.3182737,-3.7315216);
		<?php for($i = 0; $i < count($_SESSION['avisos']); $i++){?>
	    	place['aviso_<?php echo $i?>'] = new google.maps.LatLng(<?php echo $_SESSION['avisos'][$i]['Coord_Longitud'] ?>,<?php echo $_SESSION['avisos'][$i]['Coord_Latitud'] ?>);
	    	tipo['<?php echo $i?>'] = "<?php echo $_SESSION['avisos'][$i]['Tipo_Trabajo']; ?>";
	 	<?php }?>
	    for(var i in place){
	    	var id = i.split("_")[1];
	    	var marker = new google.maps.Marker({
	            position: place[i]
	            , map: map
	            , title: i
	            , icon: 'http://gmaps-samples.googlecode.com/svn/trunk/markers/red/marker' + n++ + '.png'
	        });
	        /*var noticia = "<?php echo $_SESSION['avisos'][$i]['Tipo_Trabajo']; ?>";
	        alert(noticia);*/
	        google.maps.event.addListener(marker, 'click', function(){
	            if(!popup){
	                popup = new google.maps.InfoWindow();
	            }
	            var note = ''+tipo[id];
	            popup.setContent(note);
	            popup.open(map, this);
	        });
	    }
      }
    </script>
</head>
<body onload="initialize()">
	<?php include "sidebar.php"; ?>
	<div id="contenido"  style="width: 80%;height: 100%;">
		<div id="map_canvas" style="width:98%; height:98%;margin:1%;"></div>
		<input type="hidden"  id="avisos" value=""/>
	</div>
</body>
</html>

<?php
	} else {
		header("Location: ./no_logeado.php");
	}
?>
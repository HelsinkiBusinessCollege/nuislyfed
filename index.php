<?php 
ini_set('display_errors',1);
$root = "/s1300790/tehtavia/testbench/ruokalista/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ruokalista</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo $root?>css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?php echo $root?>css/layout.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">
					<img src="<?php echo $root?>images/NuislyFed_logo_small.png" alt="logo">
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo $root?>paiva/maanantai" title="0" onclick="valitse(this);">Maanantai</a></li>
					<li><a href="<?php echo $root?>paiva/tiistai" title="1" onclick="valitse(this);">Tiistai</a></li>
					<li><a href="<?php echo $root?>paiva/keskiviikko" title="2" onclick="valitse(this);">Keskiviikko</a></li>
					<li><a href="<?php echo $root?>paiva/torstai" title="3" onclick="valitse(this);">Torstai</a></li>
					<li><a href="<?php echo $root?>paiva/perjantai" title="4" onclick="valitse(this);">Perjantai</a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<!-- <iframe src="https://www.youtube.com/embed/FOuTFka6i4E?t=47&autoplay=1&loop=1" style="position:absolute; height:0px;width:0" frameborder="0" allowfullscreen></iframe> -->
				<h1 id="placeholder"></h1>
				<p id="tiedot">
				<?php 
				  $paiva = 0;


										  if (isset($_GET["paiva"]) && strtolower($_GET['paiva']) == "maanantai") {
											  $paiva = 0;

										  }  else if (isset($_GET["paiva"]) && strtolower($_GET['paiva']) == "tiistai") {
											  $paiva = 1;

										  }  else if (isset($_GET["paiva"]) && strtolower($_GET['paiva']) == "keskiviikko") {
											  $paiva = 2;

										  }  else if (isset($_GET["paiva"]) && strtolower($_GET['paiva']) == "torstai") {
											  $paiva = 3;

										  }  else if (isset($_GET["paiva"]) && strtolower($_GET['paiva']) == "perjantai") {
											  $paiva = 4;

										  }
										  
										  $paivat = ['Maanantai','Tiistai','Keskiviikko','Torstai','Perjantai','Lauantai','Sunnuntai'];



									  // Haetaan PHP:n vakiofunktiolla date nykyinen päivämäärä ja haetaan se parametrien avulla oikeassa muodossa: http://php.net/manual/en/function.date.php
									  $today = date("Y-m-d", strtotime(date('Y-m-d').' this week'));

									  
									  // TODO - Lisätään GET-parametrina saatu arvo nykyiseen päivään

									  $day = date("Y-m-d", strtotime($today ."+ ".$paiva." days"));
									  $week_day = date('w',strtotime($day."- 1 days"));
									  
									  echo "<h1>".$paivat[$week_day]."</h1>\n";

										$day = date('Y/m/d',strtotime($day));
										$url = "http://www.sodexo.fi/ruokalistat/output/daily_json/90/" . $day . "/fi";

										$ch = curl_init($url);

										curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

										// Suoritetaan curl (lisätietoa: http://php.net/manual/en/book.curl.php)
										$result = curl_exec($ch);

										curl_close($ch);

										$json_array = json_decode($result, true);
										  
										if(!$json_array['courses']){
											echo "<h3>Ravintola suljettu</h3>\n";	
										}
										else{
										  foreach($json_array['courses'] as $course){

											  echo "<div>\n";
											  echo "	<h3>".htmlentities($course['category'], ENT_COMPAT, 'UTF-8')."</h3>\n";
											  $string = $course['title_en'];
											  echo "	<p>\n";
											  echo "		".htmlentities($string, ENT_COMPAT, 'UTF-8')."\n";
											  echo "	</p>\n</div>\n";
										  }
									  }
									  ?> </p>
			</div>

			<div class="col-md-6 p">
				<h1>Mäkelän Koulu</h1>

				<p>Ma - Pe 07.30 - 15.00</p>
				<p>La - Su suljettu</p>

				<hr />

				<h2>Lounasajat</h2>

				<p>Ma - Pe 10.30 - 14.00</p>
				<p>La - Su suljettu</p>

				<p><i>Special lunch on tarjolla klo 10.30 - 13.00 2-3 kertaa viikossa</i></p>

				<hr />

				<h2>Yhteystiedot</h2>

				<table class="table table-bordered table-responsive table-hover">
					<tr>
						<th>Katuosoite</th>
						<td>Hattulantie 2</td>
					</tr>
					<tr>
						<th>Postinumero ja -toimipaikka</th>
						<td>00550 Helsinki</td>
					</tr>
					<tr>
						<th>Tel.</th>
						<td>050 401 6867</td>
					</tr>
					<tr>
						<th>Tel.</th>
						<td>050 401 7750</td>
					</tr>
					<tr>
						<th>Sähköposti</th>
						<td><a href="mailto:hbc@sodexo.fi">hbc@sodexo.fi</a></td>
					</tr>
				</table>
			</div>

			<div class="col-md-12">
				<hr />
			</div>

			<div class="col-md-12" >
				<h1>Anna palautetta</h1>

				<h4>Antamalla palautetta autatte meitä parantamaan tasoamme.</h4>

				<?php include 'config.php' ?>
				<form action="comment.php" method="post">				
				<div class="form-group" id="kommentti">
					<label for="comment">Kommentti:</label>
					<textarea class="form-control" id="comment" placeholder="kirjoita kommentti" rows="7" name="comment"></textarea>
				</div>

				<div class="form-group" id="tiedot">

					<label for="pwd" required>Nimi:</label>
					<input class="form-control" id="pwd" placeholder="Kirjoita nimesi" size="50" name="nimi">

					<label for="pwd">Sähköpostiosoite:</label>
					<input class="form-control" id="pwd" placeholder="Sähköpostisi" name="sahkoposti">

					<label for="pwd">Arvosana:</label>
					<select class="form-control" id="sel1" name="arvosana">
						<option value="1">1/5</option>
						<option value="2">2/5</option>
						<option value="3">3/5</option>
						<option value="4">4/5</option>
						<option value="5">5/5</option>
					</select>
					<br />
					<input type="submit" class="btn btn-primary" value="Lähetä">
					</form>
				</div>
			</div>
		</div>
		<div id="comments">
		<?php 
		
		$servername = "localhost:3306";
		$username = "root";
		$password = "";
		$db = "nuislyfeddb";
		
		$database = new mysqli($servername, $username, $password, $db);
		
		    $haku = $database->prepare("select * from nf_comments");
			$haku->execute();
			$tulos=$haku->get_result();
			while($rivi=$tulos->fetch_assoc()){
			print('<div class="row">');
			print('<div class="col-md-1">' .$rivi['commnumber'].'</div>'
			. '<div class="col-md-4">'. $rivi['comment'] . '</div>'
			. '<div class="col-md-3">'. $rivi['nimi'] . '</div>'
			. '<div class="col-md-3">'. $rivi['sahkoposti'] . '</div>'
			. '<div class="col-md-2">'. $rivi['arvosana'].'</div>');
			print("</div>");
			}

			$database->close();
		?>
	</div>
	
	</div>

	<footer class="panel-footer">
		<div class="container">
			<p>
				&copy; NuislyFed 2015
			</p>
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo $root?>js/bootstrap.min.js"></script>

	<script src="<?php echo $root?>js/vaihto.js"></script>
</body>
</html>

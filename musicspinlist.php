<?php include("rab_dbcon.php");$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','music spinlist',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");?><!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2">Spinlist</td></tr><tr><td>
<center><table onClick="location.reload()" align="center" class="paginationbutton"><tr><td align="center">Spin</td></tr></table><br></center>
<table class="fresh" align="center"><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY RAND() LIMIT 6");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);	$a=$counter%5;
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		echo"
<a href='musicpreview.php?t=$songID'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songTitle)>18){substr_replace($songTitle,'..',15);}else{echo $songTitle;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>18){substr_replace($songArtist,'..',15);}else{echo $songArtist;} echo "</span>"; if($songArtistFt){echo " ft <span class='hotartist'>"; if(strlen($songArtistFt)>18){substr_replace($songArtistFt,'..',15);}else{echo $songArtistFt;} echo "</span>";} echo"</td></tr></table></a>";}?>
</td></tr></table>

</td></tr></table>
  <script>function _id(el){return top.document.getElementById(el);}window.onload = function(){_id('title1').innerHTML='Spinlist on GreenboxNigeria.com';('description').content='All Nigerian Music. Browse Randomly';_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}</script></body></html>
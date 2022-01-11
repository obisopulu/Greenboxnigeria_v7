<?php include("rab_dbcon.php");$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','music',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");?><!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td>

<table class="tab1"><tr><td class="tabheader2">New</td></tr><tr><td>
<table class="fresh" align="center"><tr><td>
<table><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY songID ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);	
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		echo"
<a href='musicpreview.php?t=$songID'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songTitle)>35){echo substr_replace($songTitle,'..',35);}else{echo $songTitle;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>35){echo substr_replace($songArtist,'..',35);}else{echo $songArtist;} echo "</span>"; if($songArtistFt){echo " ft <span class='hotartist'>"; if(strlen($songArtistFt)>35){echo substr_replace($songArtistFt,'..',35);}else{echo $songArtistFt;} echo "</span>";} echo"</td></tr></table></a>";}?>
</td></tr></table>
</td></tr><tr><td colspan="5"><a href='musiclist.php?t=new'><div class="seemore">see more</div></a></td></tr></table>

</td></tr></table>
  

<table class="tab1"><tr><td class="tabheader2">Spinlist</td></tr><tr><td>
<table><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY rand() ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);	
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		echo"
<a href='musicpreview.php?t=$songID'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songTitle)>35){echo substr_replace($songTitle,'..',35);}else{echo $songTitle;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>35){echo substr_replace($songArtist,'..',35);}else{echo $songArtist;} echo "</span>"; if($songArtistFt){echo " ft <span class='hotartist'>"; if(strlen($songArtistFt)>35){echo substr_replace($songArtistFt,'..',35);}else{echo $songArtistFt;} echo "</span>";} echo"</td></tr></table></a>";}?>
</td></tr><tr><td colspan="5"><a href='musicspinlist.php'><div class="seemore">see more</div></a></td></tr></table>
</td></tr></table>
  
<table class="tab1"><tr><td class="tabheader2">Browse by..</td></tr><tr><td>
<table class="fresh" align="center"><tr><td style="padding:10px">A - Z Index</td></tr><tr><td align="center">
<table><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY songTitle ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);	
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		echo"
<a href='musicpreview.php?t=$songID'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songTitle)>35){echo substr_replace($songTitle,'..',35);}else{echo $songTitle;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>35){echo substr_replace($songArtist,'..',35);}else{echo $songArtist;} echo "</span>"; if($songArtistFt){echo " ft <span class='hotartist'>"; if(strlen($songArtistFt)>35){echo substr_replace($songArtistFt,'..',35);}else{echo $songArtistFt;} echo "</span>";} echo"</td></tr></table></a>";}?>
</td></tr></table>
</td></tr><tr><td colspan="5"><a href='musiclist.php?t=A-Z index'><div class="seemore">see more</div></a></td></tr></table>


<table class="fresh" align="center"><tr><td style="padding:10px">Album</td></tr><tr><td align="center">
<table><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songAlbum NOT IN ('single','mixetape','cover', '') ORDER BY songAlbum ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);	$sql2=mysqli_query($cxn, "SELECT * FROM songs WHERE songAlbum='$songAlbum' LIMIT 1");while($row=mysqli_fetch_assoc($sql2)){extract($row);$songAlbum=trim(htmlspecialchars_decode($songAlbum));$songArtist=trim(htmlspecialchars_decode($songArtist));echo"<a href='albumpreview.php?t=$songAlbum'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songAlbum)>35){echo substr_replace($songAlbum,'..',35);}else{echo $songAlbum;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>35){echo substr_replace($songArtist,'..',35);}else{echo $songArtist;} echo "</span></td></tr></table></a>";}}?>
</td></tr></table>
</td></tr><tr><td colspan="5"><a href='musiclist.php?t=album'><div class="seemore">see more</div></a></td></tr></table>

<table class="fresh" align="center"><tr><td style="padding:10px">Artist</td></tr><tr><td align="center">
<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songArtist FROM songs ORDER BY songArtist ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);$sql6=mysqli_query($cxn, "SELECT * FROM songs WHERE songArtist='$songArtist' LIMIT 1");while($row6=mysqli_fetch_assoc($sql6)){extract($row6);
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		echo"
<a href='musiclist.php?t=$songArtist&c=artist'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songArtist)>35){echo substr_replace($songArtist,'..',35);}else{echo $songArtist;} echo "</td></tr></table></a>";}}?>
</td></tr><tr><td colspan="5"><a href="musiccat.php?c=artist"><div class="seemore">see more</div></a></td></tr></table>

<table class="fresh" align="center"><tr><td style="padding:10px">Genre</td></tr><tr><td align="center">
<table><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songGenre FROM songs ORDER BY songGenre ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);	$sql7=mysqli_query($cxn, "SELECT * FROM songs WHERE songGenre='$songGenre' LIMIT 1");while($row7=mysqli_fetch_assoc($sql7)){extract($row7);
		$songGenre=trim(htmlspecialchars_decode($songGenre));
		echo"
<a href='musiclist.php?t=$songGenre&c=genre'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songGenre)>35){echo substr_replace($songGenre,'..',35);}else{echo $songGenre;} echo "</span></td></tr></table></a>";}}?>
</td></tr></table>
</td></tr><tr><td colspan="5"><a href='musiccat.php?c=genre'><div class="seemore">see more</div></a></td></tr></table>

<table class="fresh" align="center"><tr><td style="padding:10px">Language</td></tr><tr><td align="center">
<table><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songLanguage FROM songs ORDER BY songLanguage ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);	$sql8=mysqli_query($cxn, "SELECT * FROM songs WHERE songLanguage='$songLanguage' LIMIT 1");while($row8=mysqli_fetch_assoc($sql8)){extract($row8);
		$songLanguage=trim(htmlspecialchars_decode($songLanguage));
		echo"
<a href='musiclist.php?t=$songLanguage&c=language'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songLanguage)>35){echo substr_replace($songLanguage,'..',35);}else{echo $songLanguage;} echo "</span></td></tr></table></a>";}}?>
</td></tr></table>
</td></tr><tr><td colspan="5"><a href='musiccat.php?c=language'><div class="seemore">see more</div></a></td></tr></table>


<table class="fresh" align="center"><tr><td style="padding:10px">Producer</td></tr><tr><td align="center">
<table><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songProducer FROM songs ORDER BY songProducer ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);	$sql9=mysqli_query($cxn, "SELECT * FROM songs WHERE songProducer='$songProducer' LIMIT 1");while($row9=mysqli_fetch_assoc($sql9)){extract($row9);
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		echo"
<a href='musiclist.php?t=$songProducer&c=producer'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songProducer)>35){echo substr_replace($songProducer,'..',35);}else{echo $songProducer;} echo "</span></td></tr></table></a>";}}?>
</td></tr></table>
</td></tr><tr><td colspan="5"><a href='musiccat.php?c=producer'><div class="seemore">see more</div></a></td></tr></table>

<table class="fresh" align="center"><tr><td style="padding:10px">Rating</td></tr><tr><td align="center">
<table><tr><td align="center">
<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songRating FROM songs WHERE songRating>2 ORDER BY songRating ASC LIMIT 5");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);	 $sql5=mysqli_query($cxn, "SELECT * FROM songs WHERE songRating='$songRating' LIMIT 1");while($row5=mysqli_fetch_assoc($sql5)){extract($row5);if($counter==1){echo"
<a href='musiclist.php?t=3&c=rating'><table class='freshtable' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'><tr><td class='freshart'></td></tr>
<tr><td class='freshlabel'>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
</span></td></tr></table></a></td><td>";}elseif($counter==2){echo"
<a href='musiclist.php?t=4&c=rating'><table class='freshtable' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'><tr><td class='freshart'></td></tr>
<tr><td class='freshlabel'>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
</span></td></tr></table></a></td><td>";}elseif($counter==3){echo"
<a href='musiclist.php?t=5&c=rating'><table class='freshtable' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'><tr><td class='freshart'></td></tr>
<tr><td class='freshlabel'>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
</span></td></tr></table></a>
";}} $counter++;}?>
</td></tr></table>
</td></tr></table>

<table class="fresh" align="center"><tr><td style="padding:10px">Year</td></tr><tr><td align="center">
<table><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songYear FROM songs ORDER BY songYear ASC LIMIT 5");
while($row=mysqli_fetch_assoc($sql))
	{
				extract($row);	$sql10=mysqli_query($cxn, "SELECT * FROM songs WHERE songYear='$songYear' LIMIT 1");while($row10=mysqli_fetch_assoc($sql10)){extract($row10);
echo"
<a href='musiclist.php?t=$songYear&c=year'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>";echo htmlspecialchars_decode($songYear);echo "</span></td></tr></table></a>";}}?>
</td></tr></table>
</td></tr><tr><td colspan="5"><a href='musiccat.php?c=year'><div class="seemore">see more</div></a></td></tr></table>

</td></tr></table>

</td></tr></table>



</td><td style="width:auto"></td></tr></table><script>function _id(el){return top.document.getElementById(el);}window.onload = function(){_id('title1').innerHTML='Nigerian Music on GreenboxNigeria.com';('description').content='All Nigerian Music. Browse by New, Random, Artist, Album, Soong name, Producer, Rating and Year';_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}</script></body></html>
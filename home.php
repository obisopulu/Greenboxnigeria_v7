<?php include("rab_dbcon.php");$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','home',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");?><!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>
<div id="hot" class='flexcroll'>
<table><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY rand() LIMIT 1");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		echo"
<a href='musicpreview.php?t=$songID'><table class='hottable1' style='background:url(songsimg/$songArt) #222 top no-repeat; background-size:cover'><tr valign='bottom'>
<td width='10px' class='sponsoredcontent1'><div class='sponsoredcontent'>Sponsored</div></td>
<td class='hotlabel'>"; if(strlen($songTitle)>18){echo substr_replace($songTitle,'..',18);}else{echo $songTitle;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>18){echo substr_replace($songArtist,'..',18);}else{echo $songArtist;} echo "</span>"; if($songArtistFt){echo " ft <span class='hotartist'>"; if(strlen($songArtistFt)>18){echo substr_replace($songArtistFt,'..',18);}else{echo $songArtistFt;} echo "</span>";} echo"</td></tr></table></a></td><td>";}
$counter=1;
$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songRating='5' ORDER BY songID DESC LIMIT 15");
while($row=mysqli_fetch_assoc($sql)) 

	{extract($row);
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		echo"
<a href='musicpreview.php?t=$songID'><table class='hottable' style='background:url(songsimg/$songArt) #222 top no-repeat; background-size:cover'><tr><td class='hotlabel'>"; if(strlen($songTitle)>18){echo substr_replace($songTitle,'..',18);}else{echo $songTitle;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>18){echo substr_replace($songArtist,'..',18);}else{echo $songArtist;} echo "</span>"; if($songArtistFt){echo " ft <span class='hotartist'>"; if(strlen($songArtistFt)>18){echo substr_replace($songArtistFt,'..',18);}else{echo $songArtistFt;} echo "</span>";} echo"</td></tr></table></a>";if($counter!=15){echo"</td><td>";}$counter++;}?>
</td></tr></table>
</div>


<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;"><tr><td>

<table class="tab1"><tr><td class="tabheader">
Music
</td></tr><tr><td>

<table class="fresh" align="center"><tr><td style="padding:10px">New</td></tr><tr><td align="center">
<table><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY songID DESC LIMIT 5");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);	
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		echo"
<a href='musicpreview.php?t=$songID'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songTitle)>18){echo substr_replace($songTitle,'..',18);}else{echo $songTitle;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>18){echo substr_replace($songArtist,'..',18);}else{echo $songArtist;} echo "</span>"; if($songArtistFt){echo " ft <span class='hotartist'>"; if(strlen($songArtistFt)>18){echo substr_replace($songArtistFt,'..',18);}else{echo $songArtistFt;} echo "</span>";} echo"</td></tr></table></a>";}?>
</td></tr></table>
</td></tr><tr><td colspan="5"><a href='musiclist.php?t=new'><div class="seemore">see more</div></a></td></tr></table>

<table class="fresh" align="center"><tr><td style="padding:10px">Spinlist</td></tr><tr><td align="center">
<table><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY RAND() LIMIT 5");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);	
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songArtistFt=trim(htmlspecialchars_decode($songArtistFt));
		echo"
<a href='musicpreview.php?t=$songID'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songTitle)>18){echo substr_replace($songTitle,'..',18);}else{echo $songTitle;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>18){echo substr_replace($songArtist,'..',18);}else{echo $songArtist;} echo "</span>"; if($songArtistFt){echo " ft <span class='hotartist'>"; if(strlen($songArtistFt)>18){echo substr_replace($songArtistFt,'..',18);}else{echo $songArtistFt;} echo "</span>";} echo"</td></tr></table></a>";}?>
</td></tr></table>
</td></tr><tr><td colspan="5"><a href='musicspinlist.php'><div class="seemore">see more</div></a></td></tr></table>

<table class="fresh" align="center"><tr><td style="padding:10px">Album</td></tr><tr><td align="center">
<table><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songAlbum NOT IN ('single','mixetape','cover', '') ORDER BY songID DESC LIMIT 5");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{
		extract($row);	
		$sql2 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songAlbum='$songAlbum' LIMIT 1");
while($row2=mysqli_fetch_assoc($sql2))
	{
		extract($row2);
		$songAlbum=trim(htmlspecialchars_decode($songAlbum));
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		}echo"
<a href='albumpreview.php?t=$songAlbum'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songAlbum)>18){echo substr_replace($songAlbum,'..',18);}else{echo $songAlbum;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>18){echo substr_replace($songArtist,'..',18);}else{echo $songArtist;} echo "</span></td></tr></table></a>";}?>
</td></tr></table>
</td></tr><tr><td colspan="5"><a href='musiclist.php?t=album'><div class="seemore">see more</div></a></td></tr></table>

</td></tr></table><table class="tab2"><tr><td class="tabheader">Blog</td></tr><tr><td>

<table class="fresh" align="center"><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM blog ORDER BY blogID DESC LIMIT 3");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$blogTimestamp=trim(htmlspecialchars_decode($blogTimestamp));
		$blogName=trim(htmlspecialchars_decode($blogName));
		$blogWriteup=trim(htmlspecialchars_decode($blogWriteup));
		echo"
<a href='blogarticle.php?blogID=$blogID'><table class='blogtable'><tr valign='bottom'><td class='blogart' style='background:url(blogimg/$blogPic) #222 center no-repeat; background-size:cover;'></td><td>
<div class='blogtimestamp'>$blogTimestamp	</div><div class='blogtopic'>$blogName</div><div class='blogwriteup'>";echo substr_replace($blogWriteup,'...',70); echo"</div></td></tr></table></a>";}?>
</td></tr><tr><td colspan='5'><a href='blog.php'><div class='seemore'>see more</div></a></td></tr></table>

</td></tr></table><table class="tab1"><tr><td class="tabheader">Videos</td></tr><tr><td>

<table class="fresh" align="center"><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM videos ORDER BY videoID DESC LIMIT 3");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$videoTitle=trim(htmlspecialchars_decode($videoTitle));
		$videoArtist=trim(htmlspecialchars_decode($videoArtist));
		echo"<a href='video.php?videoID=$videoID'><table class='videotable' style='background:url(videosimg/$videoPic) #222 center no-repeat; background-size:cover'><tr><td class='videoart'></td></tr>
<tr><td class='videoname'>$videoTitle<div class='videoartist'>$videoArtist</div></td></tr></table></a>";}?>
</td><td>

</td></tr><tr><td colspan="5"><a href="videos.php"><div class="seemore">see more</div></a></td></tr></table>

</td></tr></table><table class="tab2"><tr><td class="tabheader">People</td></tr><tr><td>

<table class="fresh" align="center"><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM persons ORDER BY RAND() LIMIT 4");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);	
		$personStageName=trim(htmlspecialchars_decode($personStageName));
		$personProfession1=trim(htmlspecialchars_decode($personProfession1));
		echo"
<a href='person.php?personID=$personID'><table class='peopletable'><tr><td class='peopleart' style='background:url(personsimg/$personPic1) #222 center no-repeat; background-size:cover'></td><td class='peoplename'>$personStageName<div class='peoplelabel'>$personProfession1</div></td></tr></table></a>";}?>

</td></tr><tr><td colspan="4"><a href="people.php"><div class="seemore">see more</div></a></td></tr></table>

</td></tr></table><table class="tab1"><tr><td class="tabheader">Labels</td></tr><tr><td>

<table class="fresh" align="center"><tr><td>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM labels ORDER BY RAND() LIMIT 5");$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);	
		$labelName=trim(htmlspecialchars_decode($labelName));
		$labelOwner=trim(htmlspecialchars_decode($labelOwner));
		echo"
<a href='label.php?labelID=$labelID'><table class='freshtable' style='background:url(labelsimg/$labelPic) #222 right no-repeat; background-size:250px 250px;'><tr><td class='freshart'></td></tr>
<tr><td class='freshlabel'>$labelName<div class='freshartist'>$labelOwner</div></td></tr></table></a>";}?>

</td></tr><tr><td colspan='5'><a href="labels.php"><div class="seemore">see more</div></a></td></tr></table>

</td></tr></table>
</td></tr></table>
</body>
</html>
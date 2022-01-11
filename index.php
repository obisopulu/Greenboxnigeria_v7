<?php include("rab_dbcon.php");
$a = $_SERVER[REQUEST_URI];

if (strpos($a,'newmember') !== false) {
	$a = str_replace('http://www.gbngr.com/newmember/', 'member.php?emailconfirmation=', $a);
}
if (strpos($a,'http://www.gbngr.com/archive/track-') !== false) {
	$a = str_replace('http://www.gbngr.com/archive/track-', 'musicpreview.php?songed=', $a);
}
elseif (strpos($a,'www.gbngr.com/archive/track-') !== false) {
	$a = str_replace('www.gbngr.com/archive/track-', 'musicpreview.php?songed=', $a);
}
elseif (strpos($a,'gbngr.com/archive/track-') !== false) {
	$a = str_replace('gbngr.com/archive/track-', 'musicpreview.php?songed=', $a);
}
elseif (strpos($a,'http://www.gbngr.com/track-') !== false) {
	$a = str_replace('http://www.gbngr.com/track-', 'musicpreview.php?songed=', $a);
}
elseif (strpos($a,'www.gbngr.com/track-') !== false) {
	$a = str_replace('www.gbngr.com/track-', 'musicpreview.php?songed=', $a);
}
elseif (strpos($a,'gbngr.com/track-') !== false) {
	$a = str_replace('gbngr.com/track-', 'musicpreview.php?songed=', $a);
}
elseif (strpos($a,'http://www.gbngr.com/album-') !== false) {
	$a = str_replace('http://www.gbngr.com/album-', 'albumpreview.php?albumed=', $a);
}
elseif (strpos($a,'www.gbngr.com/album-') !== false) {
	$a = str_replace('www.gbngr.com/album-', 'albumpreview.php?albumed=', $a);
}
elseif (strpos($a,'gbngr.com/album-') !== false) {
	$a = str_replace('gbngr.com/album-', 'albumpreview.php?albumed=', $a);
}
elseif (strpos($a,'http://www.gbngr.com/archive/person-') !== false) {
	$a = str_replace('http://www.gbngr.com/archive/person-', 'person.php?personed=', $a);
}
elseif (strpos($a,'www.gbngr.com/archive/person-') !== false) {
	$a = str_replace('www.gbngr.com/archive/person-', 'person.php?personed=', $a);
}
elseif (strpos($a,'gbngr.com/archive/person-') !== false) {
	$a = str_replace('gbngr.com/archive/person-', 'person.php?personed=', $a);
}
elseif (strpos($a,'http://www.gbngr.com/person-') !== false) {
	$a = str_replace('http://www.gbngr.com/person-', 'person.php?personed=', $a);
}
elseif (strpos($a,'www.gbngr.com/person-') !== false) {
	$a = str_replace('www.gbngr.com/person-', 'person.php?personed=', $a);
}
elseif (strpos($a,'gbngr.com/person-') !== false) {
	$a = str_replace('gbngr.com/person-', 'person.php?personed=', $a);
}
elseif (strpos($a,'http://www.gbngr.com/archive/label-') !== false) {
	$a = str_replace('http://www.gbngr.com/archive/label-', 'label.php?labeled=', $a);
}
elseif (strpos($a,'www.gbngr.com/archive/label-') !== false) {
	$a = str_replace('www.gbngr.com/archive/label-', 'label.php?labeled=', $a);
}
elseif (strpos($a,'gbngr.com/archive/label-') !== false) {
	$a = str_replace('gbngr.com/archive/label-', 'label.php?labeled=', $a);
}
elseif (strpos($a,'http://www.gbngr.com/label-') !== false) {
	$a = str_replace('http://www.gbngr.com/label-', 'label.php?labeled=', $a);
}
elseif (strpos($a,'www.gbngr.com/label-') !== false) {
	$a = str_replace('www.gbngr.com/label-', 'label.php?labeled=', $a);
}
elseif (strpos($a,'gbngr.com/label-') !== false) {
	$a = str_replace('gbngr.com/label-', 'label.php?labeled=', $a);
}
elseif (strpos($a,'http://www.gbngr.com/archive/article-') !== false) {
	$a = str_replace('http://www.gbngr.com/archive/article-', '.blogarticle.php?blogged=', $a);
}
elseif (strpos($a,'www.gbngr.com/archive/article-') !== false) {
	$a = str_replace('www.gbngr.com/archive/article-', '.blogarticle.php?blogged=', $a);
}
elseif (strpos($a,'gbngr.com/archive/article-') !== false) {
	$a = str_replace('gbngr.com/archive/article-', '.blogarticle.php?blogged=', $a);
}
elseif (strpos($a,'http://www.gbngr.com/article-') !== false) {
	$a = str_replace('http://www.gbngr.com/article-', '.blogarticle.php?blogged=', $a);
}
elseif (strpos($a,'www.gbngr.com/article-') !== false) {
	$a = str_replace('www.gbngr.com/article-', '.blogarticle.php?blogged=', $a);
}
elseif (strpos($a,'gbngr.com/article-') !== false) {
	$a = str_replace('gbngr.com/article-', '.blogarticle.php?blogged=', $a);
}
elseif (strpos($a,'http://www.gbngr.com/video-') !== false) {
	$a = str_replace('http://www.gbngr.com/video-', '.video.php?videoed=', $a);
}
elseif (strpos($a,'www.gbngr.com/video-') !== false) {
	$a = str_replace('www.gbngr.com/video-', '.video.php?videoed=', $a);
}
elseif (strpos($a,'gbngr.com/video-') !== false) {
	$a = str_replace('gbngr.com/video-', '.video.php?videoed=', $a);
}
else{unset($a);}
?>
<!DOCTYPE html>
<html>
<head>
<title id='title1'>Greenbox Nigeria</title>
<meta charset="utf-8" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/vnd.microsoft.icon" />
<meta name="viewport" content="user-scalable=no,maximum-scale=1" />
<meta name="MobileOptimized" content="width" />
<meta id='description' name="description" content="Discover The Nigerian Music Industry; the songs, the people, the labels and the news" />
<meta name="HandheldFriendly" content="true" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta id='keywords' name="keywords" content="Nigerian Music,  Artist, label, song, news" />
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
</head>
<body onResize="fold()" onLoad="review()">
<?php //include_once("analyticstracking.php") ?>
<iframe style="display:none"></iframe>
<table class="splash"><tr valign="middle"><td><div class="splash1">Welcome to </div>Greenbox Nigeria</td></tr><tr><td class="splash2">Initializing...</td></tr></table>
<table class="header"><tr valign="middle"><td onClick="linker('home')" width="40%" style="padding-left:4px; text-align:center">Greenbox Nigeria
</td></tr></table>
<?php 
$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY songID DESC LIMIT 1");
while($row=mysqli_fetch_assoc($sql)) 

	{
		extract($row);	  ?>
<table><tr><td colspan="3">
<table><tr height="40px"><td align="center" width="20%"id="home" onClick="linker('home')">
Home</td><td align="center" width="40%" class="publicupload" onClick="searcher()">
<div id="search">Search</div><input class="search" onKeyUp="searcher()" id='keyword' style='width:90%; height:30px; background:#111; border:none; padding:0 10px; color:#FFF;font-family:myFirstFont;' value='' autofocus placeholder='Search..' maxlength="70"/>
</td><td align="center" width="20%" id="member" onClick="linker('member')">
Member
</td></tr></table>
</td></tr>
<tr class="header"><td onClick="linker('previewsong')" class="playerart" style="background:url(songsimg/<?php echo $songArt?>) #222 center no-repeat; background-size:cover;"><input type="hidden" id="art" value="<?php echo $songID?>">
<div style="cursor:pointer;height:100%"></div></td><td onClick="linker('previewsong')">
<div class="playertitle"><?php if(!$songArtistFt){$t=$songTitle; if(strlen($t)>29){ echo "<marquee scrollamount='4'>$songTitle</marquee>";} if(strlen($t)<29){ echo "$songTitle";}} else {
$t="$songArtistFt $songTitle ft "; if(strlen($t)>29){ echo "<marquee scrollamount='4'>$songTitle ft $songArtistFt</marquee>";} if(strlen($t)<29){ echo "$songTitle ft $songArtistFt";}}?></div>
<div class="playerartist"><?php echo $songArtist?></div><audio src='songs/<?php echo $songURL?>' loop type='audio/mp3' id="player2"></audio></td>
<td width="15%" onClick="playerplay()" id="played"><input type="hidden" id="playerplay"></td></tr></table>
	<?php }?>

<iframe class="body" src="<?php if($a){echo $a;}else{echo"home.php";}?>"></iframe>

<table class="header1"><tr>
<td class="menu" id="music">
<input type='button' value='Music' class="menunav" onClick="linker('music')"/>
</td><td class="menu" id="videos">
<input type='button' value='Videos' class="menunav" onClick="linker('videos')"/>
</td><td class="menu" id="people">
<input type='button' value='People' class="menunav" onClick="linker('people')"/>
</td><td class="menu" id="labels">
<input type='button' value='Labels' class="menunav" onClick="linker('labels')" />
</td><td class="menu" id="blog">
<input type='button' value='Blog' class="menunav" onClick="linker('blog')"/>
</td><td class="menu" id="about">
<input type='button' value='About' class="menunav" onClick="linker('about')"/>
</td>
</tr></table>

<script src="scirpt/mob_layout.js"></script>
<script src="scirpt/mob_links.js"></script>
<script>
	flew=document.getElementById("playerplay");
	play=document.getElementById("played");
	sing=document.getElementsByTagName("audio")[0];
	flew.value=0;
	play.style.background = 'url(images/play.png) center no-repeat';
	play.style.backgroundSize = 'cover'
function playerplay(){
	if(flew.value==0){
			sing.play();
			flew.value=1;
			play.style.background = 'url(images/pause.png) center no-repeat';
			play.style.backgroundSize = 'cover'
		}else{
			sing.pause();
			flew.value=0;
			play.style.background = 'url(images/play.png) center no-repeat';
			play.style.backgroundSize = 'cover'
		}
	}
</script>
<iframe id="service"></iframe>
</body>
</html>
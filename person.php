<?php include("rab_dbcon.php");extract($_GET);
$personed=str_replace('---', ' ', $personed);
$personed=str_replace('--', ' ', $personed);
$personed=str_replace('-', ' ', $personed);
 if($personed){$sql = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName='$personed' LIMIT 1");}else{
 $sql = mysqli_query ($cxn, "SELECT * FROM persons WHERE personID='$personID' LIMIT 1");}$person=str_replace('---', ' ', $person);
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}	
$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','person $personStageName',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");
if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'person' ,'$id' ,'$date_updated')") or die("result no work 10");}?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2"></td></tr><tr><td>
<?php
$personStageName=htmlspecialchars_decode($personStageName);
$personBirthName=htmlspecialchars_decode($personBirthName);
$personFanName=htmlspecialchars_decode($personFanName);
$personGenre=htmlspecialchars_decode($personGenre);
$personBirthDay=htmlspecialchars_decode($personBirthDay);
$personBirthYear=htmlspecialchars_decode($personBirthYear);
$personPlaceOfOrigin=htmlspecialchars_decode($personPlaceOfOrigin);
$personProfession1=htmlspecialchars_decode($personProfession1);
$personProfession2=htmlspecialchars_decode($personProfession2);
$personProfession3=htmlspecialchars_decode($personProfession3);
$personProfession4=htmlspecialchars_decode($personProfession4);
$personLabel=htmlspecialchars_decode($personLabel);
$personLifeStory=htmlspecialchars_decode($personLifeStory);
$personPic1=htmlspecialchars_decode($personPic1);
$personPic2=htmlspecialchars_decode($personPic2);
$personPic3=htmlspecialchars_decode($personPic3);

echo "<table align='center' style=' width:;background:url(personsimg/$personPic2) center top no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:700px; position:fixed; z-index:-2;opacity:.4'><tr><td>
</td></tr></table>
<table align='center' style=' height:400px;top:10px; left:0; right:0;width:95%;'>
<tr><td align='center'><div style='padding:10px; border-radius:50%;background:url(personsimg/$personPic2) center no-repeat;background-size:cover; width:200px; height:200px;border:thick #333 solid'></div></td></tr><tr><td>
<div style='padding:0 0 0 10px;font-size:5em'>$personStageName</div>
<div style='padding:0 0 0 10px;color:#00E676'>$personProfession1
";if($personProfession2){echo " | ".$personProfession2;}
if($personProfession3){echo " | ".$personProfession3;}
if($personProfession4){echo " | ".$personProfession4;}echo"</div>";
if($personCareerStartYear!='5000'){echo "<div style='padding:0 0 0 10px;'>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>";
$sql = mysqli_query ($cxn, "SELECT AVG(songRating) as me FROM songs WHERE songArtist='$personStageName'"); while($row=mysqli_fetch_assoc($sql)){extract($row);}
 if($me>3){echo"<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div> ";} 
 if($me>4){echo"<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>";}?>
</div><?php }echo"
<div style='padding:0 0 0 10px;'>$personLabel</div></td>
</tr></table>";
$sqls = mysqli_query($cxn, "select * from copy where copySong = 'person $personStageName'") or die('xxx2');
$shares = mysqli_num_rows($sqls);?>

<table><tr><td align="center">
<?php $x=date('Y');
if($personBirthName){echo"<div style='color:#00E676'>Birth Name:</div>$personBirthName";}
if($personBirthDay){echo"<div style='color:#00E676'>Birthday:</div>$personBirthDay";}
if($personBirthYear){echo"<div style='color:#00E676'>Age:</div>";echo $x-$personBirthYear." Years";}
if($personPlaceOfOrigin){echo"<div style='color:#00E676'>State Of Origin:</div>$personPlaceOfOrigin";}
if($personGenre){echo"<div style='color:#00E676'>Genre:</div>$personGenre";}
if($personCareerStartYear AND $personCareerStartYear!='5000'){echo"<div style='color:#00E676'>Career Lenght:</div>";echo $x-$personCareerStartYear." Years";}?>
</td></tr></table><br><br>
<div style='width:95%;'><table><tr>
<td>Share <div class="share"><?php echo $shares ?></div></td>
<td align="centr">
<div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>')"></div>
<div style="background:url(images/tt.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>&text=<?php echo $personStageName ?> on GreenboxNigeria.com&via=greenboxnigeria&hashtags=greenboxnigeria')"></div>
<div style="background:url(images/in.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>&title=<?php echo $personStageName ?> via GreenboxNigeria.com')"></div>
<div style="background:url(images/gg.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>')"></div>
<div style="background:url(images/pi.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/personsimg/<?php echo $personPic1?>&url=gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>&is_video=false&description=<?php echo substr_replace($personLifeStory,'...',55)?>')"></div>
<div style="background:url(images/tb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block"onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>&title=<?php echo $personStageName ?> on GreenboxNigeria.com&caption=<?php echo substr_replace($personLifeStory,'...',55)?>')"></div>
<div style="background:url(images/www.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onclick="copyToClipboard()"></div>

</td></tr></table></div><br><br>
<?php 
$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtist='$personStageName' OR songProducer='$personStageName' LIMIT 5");

$sql2=mysqli_query($cxn, "SELECT * FROM songs WHERE songAlbum='$songAlbum' LIMIT 1");

$sql3 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtistFt LIKE '%$personStageName%' LIMIT 5");

$sql4 = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoTitle LIKE '%$personStageName%' OR videoArtist LIKE '%$personStageName%' OR videoArtistFt LIKE '%$personStageName%' OR videoDirector LIKE '%$personStageName%' ORDER BY videoTitle ASC LIMIT 5");
if(mysqli_num_rows($sql1)>0 OR mysqli_num_rows($sql2)>0 OR mysqli_num_rows($sql3)>0 OR mysqli_num_rows($sql4)){
echo "<table style='background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;' class='tab1'><tr><td class='tabheader2'></td></tr><tr><td>";
if(mysqli_num_rows($sql1)>0){?>
<table class="fresh" align="center"><tr><td style="padding:10px">Songs</td></tr><tr><td align="center">
<table>
<?php
while($row=mysqli_fetch_assoc($sql1))
	{extract($row);echo"
<tr><td><a href='musicpreview.php?t=$songID'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>";echo htmlspecialchars_decode($songTitle);echo "<div class='freshartist'>";echo htmlspecialchars_decode($songArtist);echo "</div></td></tr></table></a></td></tr>";}
?>
</table>
</td></tr><tr><td colspan='5'><a href='musiclist.php?t=<?php echo htmlspecialchars_decode($songArtist)?>&c=artist'><div class='seemore'>see more</div></a></td></tr></table>
<?php }?>
<?php $sql = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songAlbum NOT IN ('single','mixetape','cover') AND (songArtist='$personStageName' OR songProducer='$personStageName')  ORDER BY songAlbum ASC LIMIT 5");
if(mysqli_num_rows($sq3)>0){?>
<table class='fresh' align='center'><tr><td style='padding:10px'>Albums</td></tr><tr><td align='center'>
<table>
<?php while($row=mysqli_fetch_assoc($sql)){extract($row);
while($row=mysqli_fetch_assoc($sql2)){
	extract($row);echo"
<tr><td><a href='albumpreview.php?t=$songAlbum'><table class='freshtable' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'><tr><td class='freshart'></td></tr>
<tr><td class='freshlabel1'>".htmlspecialchars_decode($songAlbum)."</td></tr></table></a></td></tr>";}}?>
</table>
</td></tr><tr><td colspan='5'><a href='musiclist.php?t=album'><div class='seemore'>see more</div></a></td></tr></table>
<?php }
if(mysqli_num_rows($sql3)>0){?>
<table class="fresh" align="center"><tr><td style="padding:10px">Featured</td></tr><tr><td align="center">
<table>
<?php 
while($row=mysqli_fetch_assoc($sql3))
	{extract($row);echo"
<tr><td><a href='musicpreview.php?t=$songID'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>";echo htmlspecialchars_decode($songTitle);echo "<div class='freshartist'>";echo htmlspecialchars_decode($songArtist);echo "</div></td></tr></table></a></td></tr>";}
?>
</table>
</td></tr><tr><td colspan="5"><a href='musiclist.php?t=<?php echo $songArtist?>&c=artistFt'><div class="seemore">see more</div></a></td></tr></table>

<?php } 
if(mysqli_num_rows($sql4)>0){4?>
  <table class="fresh" align="center"><tr><td style="padding:10px">Videos</td></tr></table>
<table class="fresh" align="center">
<?php while($row=mysqli_fetch_assoc($sql4))
	{extract($row);echo"<tr><td><a href='musicpreview.php?t=$songID'>
<table class='videotable' style='background:url(videosimg/$videoPic) #222 center no-repeat; background-size:cover'><tr><td class='videoart'></td></tr><tr><td class='videoname'>$videoTitle<div class='videoartist'>$videoArtist</div></td></tr></table></a></td></tr>";}?>
</table>

<?php }}?>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2"></td></tr><tr><td>

<br>
<table><tr><td align="center"><div class="blogwriteup;font-size:1em;"><?php echo htmlspecialchars_decode($personLifeStory)?></div><br></td></tr></table>

<table><tr><td><br>Comments</td></tr></table>
<table><tr valign="top"><td align="center">
add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  name="comment">
<br><br>
<input type="submit" value="Comment" class="commentbutton"/><input type="hidden" name="id" value="<?php echo $personID ?>"><input type="hidden" name="personID" value="<?php echo $personID ?>"></form>
</td></tr><tr><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='person' AND comment_cat_id='$personID' ORDER BY comment_id DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:95%; height:;color:#FFF;margin-top:10px;background:#222;font-size:.8em;'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px'>$comment</td></tr></table>
"; }?>

</td></tr></table>

  
</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el)[0];}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=person&person=<?php echo $personStageName ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>");
	_id("service").src = "services/stats.php?copy=person&person=<?php echo $personStageName ?>";
	_classhere('share').innerHTML++;}
window.onload = function() {
  	_id('title1').innerHTML='<?php echo $personStageName ?> on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace($personLifeStory,'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}
</script>
</body>
</html>
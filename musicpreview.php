<?php include("rab_dbcon.php");extract($_GET);
if($t==''){header("location: index.php");}
$songed=str_replace('---', ' ', $songed);
$songed=str_replace('--', ' ', $songed);
$songed=str_replace('-', ' ', $songed);
 if($songed){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songURL='$songed' LIMIT 1");}else{
$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songID='$t' LIMIT 1");}
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}
$today = date("Y-m-d"); 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','music preview $songTitle',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");
if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'music' ,'$id' ,'$date_updated')") or die("result no work 10");}
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2"><!--Label--></td></tr><tr><td align="center">

<table align="center" style=" width:;background:url(songsimg/<?php echo $songArt ?>) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:600px; position:fixed; z-index:-2"><tr><td>
</td></tr></table>
<div style="font-size:2em; text-align:center"><?php echo $songTitle ?> - <span style="color:#00E676"><?php echo $songArtist ?></span><div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<?php if($songRating>3){echo"<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div> ";} ?>
<?php if($songRating>4){echo"<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>";} ?>
</div></div>
<table align="center" style=" height:300px;width:95%">
<tr valign="middle"><td align="center"><div style="padding:10px;background:url(songsimg/<?php echo $songArt ?>) center no-repeat;background-size:cover; width:95%; height:300px; vertical-align:middle"></div></td></tr><tr><td align="center">
<table><?php if($songArtistFt) echo "<tr><td>Featured</td><td>: $songArtistFt</td></tr>" ?>
<?php if($songProducer) echo "<tr><td>Producer</td><td>: $songProducer</td></tr>" ?>
<?php if($songAlbum) echo "<tr><td>Album</td><td>: $songAlbum</td></tr>" ?>
<?php if($songGenre) echo "<tr><td>Genre</td><td>: $songGenre</td></tr>"; ?>
<?php if($songLanguage) echo "<tr><td>Language</td><td>: $songLanguage</td></tr>"; ?>
<?php echo" <tr><td>Duration</td><td>: $songLenght</td></tr>"?>
<?php if($songYear) echo "<tr><td>Year</td><td>: $songYear</td></tr>";?>
<?php echo "<tr><td>size</td><td>: ".number_format($songSize/1024/1024) ."mb</td></tr>"?></table>
<?php
$sqls = mysqli_query($cxn, "select * from copy where copySongID = '$songID' AND copySong LIKE  '%$music%'  ") or die('xxx2');
$shares = mysqli_num_rows($sqls);
?>
<table><tr><td align="center"><div class="pagination" style="padding:10px 0; margin:10px 0;width:95%; text-align:center"
onClick="play('<?php echo $songTitle; ?>','<?php echo "songs/".$songURL; ?>','<?php echo "songsimg/".$songArt; ?>','<?php echo $songArtist; ?>','<?php echo $songArtistFt; ?>','<?php echo $songProducer; ?>','<?php echo $songAlbum; ?>','<?php echo $songID; ?>','<?php echo $songYear; ?>')">Play <span class="plays"><?php echo $songPlay ?></span></div>
<div class="pagination" style="padding:10px 0; margin:10px 0;width:95%; text-align:center" onClick="download('<?php echo $songID; ?>', 'hq')">Download <span class="plays"><?php echo $songDownload ?></span><br></div>
<?php $pagetitle="Preview $songArtist - $songTitle on GreenboxNigeria.com";str_replace(' ', '-', $pagetitle);
$songdesc=substr_replace($songDescription,'..',100)
?></td></tr></table>
</td>
</tr></table><br>
<div style="width:95%;"><table><tr>
<td>Share <div class="share"><?php echo $shares ?></div></td>
<td align="centr">
<div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('facebook', 'facebook.com/sharer.php?u=gbngr.com/archive/track-<?php echo $songURL ?>')"></div>
<div style="background:url(images/tt.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('twitter', 'twitter.com/intent/tweet?url=gbngr.com/archive/track-<?php echo $songURL ?>&text=<?php echo $pagetitle ?>&via=greenboxnigeria&hashtags=greenboxnigeria'')"></div>
<div style="background:url(images/in.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('linkedin', 'linkedin.com/shareArticle?url=gbngr.com/archive/track-<?php echo $songURL ?>&title=<?php echo $pagetitle ?>')"></div>
<div style="background:url(images/gg.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('google', 'plus.google.com/share?url=gbngr.com/archive/track-<?php echo $songURL ?>')"></div>
<div style="background:url(images/pi.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('pinterest', 'pinterest.com/pin/create/bookmarklet/?media=gbngr.com/songsimg/<?php echo $songArt?>&url=gbngr.com/archive/track-<?php echo $songURL ?>&is_video=false&description=<?php echo $songdesc?>')"></div>
<div style="background:url(images/tb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('tumblr', 'tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/archive/track-<?php echo $songURL ?>&title=<?php echo $pagetitle ?>&caption=<?php echo $songdesc?>')"></div>
<div style="background:url(images/www.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onclick="copyToClipboard('gbngr.com/archive/track-<?php echo $songURL ?>')"></div>

</td></tr></table></div><br>


<table><tr><td align="center"><br><div class="blogwriteup;font-size:1em;"><?php echo $songDescription ?></div><br></td></tr></table>
<table><tr><td><br>Comments</td></tr></table>
<table><tr><td align="center">
add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  name="comment">
<br><br>
<input type="submit" value="Comment" class="commentbutton"/><input type="hidden" name="id" value="<?php echo $songID ?>"><input type="hidden" name="t" value="<?php echo $songID ?>"></form>
</td></tr><tr valign="top"><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='music' AND comment_cat_id='$songID' ORDER BY comment_id DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:95%; height:;color:#FFF;margin-top:10px;background:#222;font-size:.8em;'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px'>$comment</td></tr></table>
"; }?>

</td></tr></table>


</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _class(el){return top.document.getElementsByClassName(el)[0];}
function _classhere(el){return document.getElementsByClassName(el);}
function play(title, url, art,  artist, artistft, producer, album, id, year){
  	_id('title1').innerHTML='<?php echo $songArtist.' - '.$songTitle ?>-  streaming live via GreenboxNigeria.com';
	_id('description').content='Preview <?php echo $songTitle." By ".$songArtist ?>';
	_id('keywords').content='latest , fresh, new, Nigerian music, Nigerian songs, Nigerian tracks';
		_id('player2').src= url;
		_id('player2').autoplay = true;
		_class('playerart').style.background = 'url('+art+') center no-repeat';
		_class('playerart').style.backgroundSize = 'cover'
		if(artistft =='' ){_class('playertitle').innerHTML = title;}
		else if(title.length+artistft.length > 29 ){_class('playertitle').innerHTML ="<marquee scrollamount='4'>"+title+" Ft "+artistft+"</marquee>";}
		else{_class('playertitle').innerHTML = title+" Ft "+artistft;}
		_class('playerartist').innerHTML = artist;
		_id('art').value=id;
		_id("service").src = "services/stats.php?play="+id;
		_classhere('plays')[0].innerHTML++;
		_id("playerplay").value=1;
		_id("played").style.background = 'url(images/pause.png) center no-repeat';
		_id("played").style.backgroundSize = 'cover'}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
	_id("service").src = "services/stats.php?copy=music&musicID=<?php echo $songID ?>";
	_classhere('share')[0].innerHTML++;}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=music&musicID=<?php echo $songID ?>";
	_classhere('share')[0].innerHTML++;
	window.open(url, '_blank')}
function download(id,q) {
	_classhere('plays')[1].innerHTML++;
	_id("service").src = "services/stats.php?downID="+id+"&q="+q;}
window.onload = function() {
  	_id('title1').innerHTML='Preview of <?php echo $songArtist.' by '.$songTitle ?> on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo $songTitle." By ".$songArtist ?>';
	_id('keywords').content='latest , fresh, new, Nigerian music, Nigerian songs, Nigerian tracks';}
	
</script>
</body>
</html>
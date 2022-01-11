<?php include("rab_dbcon.php");extract($_GET);$today = date("Y-m-d");
if($t==''){header("location: index.php");}
$albumed=str_replace('---', ' ', $albumed);
$albumed=str_replace('--', ' ', $albumed);
$albumed=str_replace('-', ' ', $albumed);
if($albumed){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songAlbum='$albumed' LIMIT 1");}else{
$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songAlbum='$t' LIMIT 1");}
while($row=mysqli_fetch_assoc($sql))
	{extract($row); } 
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','album preview $songAlbum',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");
///////echo $_SERVER['HTTP_USER_AGENT'];
if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "UPDATE anonymous SET anonymousName='$commenter' WHERE anonymousIP='$userIP'") or die("result no work 10");
	
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'album' ,'$id' ,'$date_updated')") or die("result no work 10");}?>            
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2"><!--Label--></td></tr><tr><td>

<table align="center" style=" width:;background:url(songsimg/jesse_jagnationvol2_art.jpg) center no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:600px; position:fixed; z-index:-2; opacity:.5"><tr><td>
</td></tr></table>
<br>
<table align="center" style=" height:300px;top:10px; left:0; right:0;width:100%"><tr></tr>
<tr valign="top"><td width="95%" align="center"><div style="padding:10px;background:url(songsimg/jesse_jagnationvol2_art.jpg) center no-repeat;background-size:cover; width:300px; height:300px; vertical-align:middle"></div>
<div style="font-size:1.2em;text-align:center"><?php echo $songAlbum ?></div>
<div style="color:#00E676;text-align:center"><?php echo $songArtist ?></div>
<div style="text-align:center">
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>
<?php $sql = mysqli_query ($cxn, "SELECT AVG(songRating) as me FROM songs WHERE songAlbum='$t'"); while($row=mysqli_fetch_assoc($sql)){extract($row);}
 if($me>3){echo"<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div> ";} 
 if($me>4){echo"<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:15px; height:15px;display:inline-block'></div>";}?>
</div></td></tr>
<tr><td class="tabheader2"><br><br>Track List</td></tr>
<tr><td>
<table style="font-size:.8em" cellpadding="1">
<?php
$counter=1;
$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songAlbum='$t'");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
$songAlbum1=str_replace(' ', '  ', $songAlbum);$songAlbum1=str_replace(' ', '   ', $songAlbum);$songAlbum1=str_replace('-', ' ', $songAlbum);?>
<tr><td><?php echo $counter ?></td><td><?php echo $songTitle ?></td><td><?php echo $songArtistFt ?></td><td width='5%'><input type='button' class='play' title='play' 
onClick="play('<?php echo $songTitle; ?>','<?php echo "songs/".$songURL; ?>','<?php echo "songsimg/".$songArt; ?>','<?php echo $songArtist; ?>','<?php echo $songArtistFt; ?>','<?php echo $songProducer; ?>','<?php echo $songAlbum; ?>','<?php echo $songID; ?>','<?php echo $songRating; ?>','<?php echo $songYear; ?>')"></td><td width='5%'><input type='button' class='download' title='download' onClick="download('<?php echo $songID; ?>')"></td><td width='5%'><form action='musicpreview'><input type='hidden' name='t' value='<?php echo $songID ?>'><input value='' type='submit' class='options' title='preview'></form></td></tr>
<?php $counter++;}?>
</table>
<?php
$sql = mysqli_query($cxn, "select * from play where playSongID = '$songID'") or die('xxx1');
$plays = mysqli_num_rows($sql);

$sqls = mysqli_query($cxn, "select * from copy where copySong = 'album $songAlbum'") or die('xxx2');
$shares = mysqli_num_rows($sqls);
?>
</td>
</tr></table><br><br>
<div style="width:95%; margin-top:20px"><table><tr>
<td>Share <div class="share"><?php echo $shares ?></div></td>
<td>
<div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/album-<?php echo $songAlbum1 ?>')"></div>
<div style="background:url(images/tt.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/archive/album-<?php echo $songAlbum1 ?>&text=<?php echo $songAlbum." By ".$songArtist ?>-  Preview on GreenboxNigeria.com&via=greenboxnigeria&hashtags=greenboxnigeria')"></div>
<div style="background:url(images/in.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/archive/album-<?php echo $songAlbum1 ?>&title=<?php echo $songAlbum." By ".$songArtist ?>-  Preview on GreenboxNigeria.com')"></div>
<div style="background:url(images/gg.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/album-<?php echo $songAlbum1 ?>')"></div>
<div style="background:url(images/pi.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/songsimg/<?php echo $songArt?>&url=gbngr.com/archive/album-<?php echo $songAlbum1 ?>&is_video=false&description=<?php echo substr_replace(htmlspecialchars_decode($songDescription),'...',55)?>')"></div>
<div style="background:url(images/tb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/archive/album-<?php echo $songAlbum1 ?>&title=<?php echo $songAlbum." By ".$songArtist ?>-  Preview on GreenboxNigeria.com&caption=Preview of <?php echo $songAlbum." Album by ".$songArtist ?> on GreenboxNigeria.com')"></div>
<div style="background:url(images/www.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block"  onclick="copyToClipboard('gbngr.com/archive/album-<?php echo $songAlbum1 ?>')"></div>
</td></tr></table></div>

<table><tr><td>Comments</td></tr></table>
<table><tr valign="top"><td align="center">
add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  name="comment">
<br><br>
<input type="submit" value="Comment" class="commentbutton"/><input type="hidden" name="id" value="<?php echo $songAlbum ?>"><input type="hidden" name="t" value="<?php echo $songAlbum ?>"></form>
</td></tr><tr><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='album' AND comment_cat_id='$songAlbum' ORDER BY comment_id DESC");
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
function _classhere(el){return document.getElementsByClassName(el)[0];}
function play(title, url, art,  artist, artistft, producer, album, id, rating, year){
  	_id('title1').innerHTML='<?php echo $songAlbum." By ".$songArtist ?>-  streaming live via GreenboxNigeria.com';
	_id('description').content='Listen to '+title+'<?php echo " By ".$songArtist ?>';
	_id('keywords').content='latest , fresh, all Music, old School Nigerian, new Jams, Nigerian music, Nigerian songs, Nigerian tracks';
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
		_id("playerplay").value=1;
		_id("played").style.background = 'url(images/pause.png) center no-repeat';
		_id("played").style.backgroundSize = 'cover'}
function copyToClipboard(text) {
	_id("service").src = "services/stats.php?copy=album&album=<?php echo $songAlbum ?>";
    window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
	_classhere('share').innerHTML++;}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=album&album=<?php echo $songAlbum ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function download(id) {
	_id("service").src = "services/stats.php?downID="+id;}
window.onload = function() {
  	_id('title1').innerHTML='Preview <?php echo $songAlbum." By ".$songArtist ?> on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo $songAlbum." By ".$songArtist ?>';
	_id('keywords').content='latest Nigerian music, fresh Nigerian music, new Nigerian music, Nigerian music, Nigerian songs, Nigerian tracks';}
</script>
</body>
</html>
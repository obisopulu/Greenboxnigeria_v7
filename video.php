<?php include("rab_dbcon.php");extract($_GET);
$videoed=str_replace('---', ' ', $videoed);
$videoed=str_replace('--', ' ', $videoed);
$videoed=str_replace('-', ' ', $videoed);
if($videoed){$sql = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoTitle='$videoed' LIMIT 1");}else{
 $sql = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoID='$videoID' LIMIT 1");}
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}
$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','video $videoTitle',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");
if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'video' ,'$id' ,'$date_updated')") or die("result no work 10");}
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2"><!--Blog--></td></tr><tr><td>

<table><tr><td align="center">
<table><tr><td class='videoart' style='height:400px; width:100%;cursor:pointer;background:url(images/loading.png)#000 center no-repeat; background-size:cover;margin:0px 0' align="center">
<iframe width="95%" height="400px" src="<?php echo $videoSRC?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
</td></tr>
<tr><td style='font-size:2em; padding:10px 10px 0px 10px'><?php echo $videoTitle?><?php if($videoArtistFt){ echo $videoArtistFt;}?><div class='videoartist'><?php echo $videoArtist?></div></td></tr><tr><td>
<div style="padding:0 0 0 10px;">
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>
<?php if($videoRating>3){echo"<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div> ";} ?>
<?php if($videoRating>4){echo"<div style='background:url(images/star.png) left no-repeat; background-size:cover; width:20px; height:20px;display:inline-block'></div>";} ?>
</div>
</td></tr></table>
<?php if($videoDownloadSRC){?><div style='width:95%; padding:0px 10px 0px 10px;'>
<table><tr><td align="center"><div class="pagination" style="padding:10px 20px; margin:20px 0 0 0; cursor:pointer; width:40%; text-align:center" onClick="download('<?php echo $songID; ?>')">Download <span class="plays"><?php echo $videoDownload ?></span></div><br></td></tr></table><?php }?>
<br><br><table><tr>
<td>Share <div class="share"><?php $sqls = mysqli_query($cxn, "select * from copy where copySong = 'video $videoTitle'") or die('xxx2');
$shares = mysqli_num_rows($sqls); echo $shares ?></div></td>
<td align="centr">
<div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/video-<?php echo str_replace(' ', '-', $videoTitle);?>')"></div>
<div style="background:url(images/tt.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/archive/video-<?php echo str_replace(' ', '-', $videoTitle);?>&text=<?php echo $videoTitle ?> on GreenboxNigeria.com&via=greenboxnigeria&hashtags=greenboxnigeria')"></div>
<div style="background:url(images/in.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/archive/video-<?php echo str_replace(' ', '-', $videoTitle);?>&title=<?php echo $videoTitle ?> via GreenboxNigeria.com')"></div>
<div style="background:url(images/gg.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/video-<?php echo str_replace(' ', '-', $videoTitle);?>')"></div>
<div style="background:url(images/pi.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/videosimg/<?php echo $videoPic?>&url=gbngr.com/archive/video-<?php echo str_replace(' ', '-', $videoTitle);?>&is_video=true&description=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')"></div>
<div style="background:url(images/tb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/archive/video-<?php echo str_replace(' ', '-', $videoTitle);?>&title=<?php echo $videoTitle ?> on GreenboxNigeria.com&caption=<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55)?>')"></div>
<div style="background:url(images/www.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onclick="copyToClipboard()"></div>
</td></tr></table></div><br>
<table><tr><td align="center"><div class='blogwriteup' style='font-size:1em; text-align:left'><?php echo $videoDescription?></div><br></td></tr></table>
</td></tr></table>

<table><tr><td><br>Comments</td></tr></table>
<table><tr valign="top"><td align="center">
add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  name="comment">
<br><br>
<input type="submit" value="Comment" class="commentbutton"/><input type="hidden" name="id" value="<?php echo $videoID ?>"><input type="hidden" name="videoID" value="<?php echo $videoID ?>"></form>
</td></tr><tr><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='video' AND comment_cat_id='$videoID' ORDER BY comment_id DESC");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"<table style='width:95%; height:;color:#FFF;margin-top:10px;background:#222;font-size:.8em;'><tr><td style='padding:10px 0 0 10px'>$commenter</td>
<td style='padding:10px 10px 0 0; text-align:right'>$comment_timestamp</td></tr>
<tr><td colspan='2' style='padding:10px'>$comment</td></tr></table>
"; }?>

</td></tr></table>

</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el);}
function copyToClipboard() {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/video-<?php echo str_replace(' ', '-', $videoTitle);?>");
	_id("service").src = "services/stats.php?copy=video&video=<?php echo $videoTitle ?>";
	_classhere('share')[0].innerHTML++;}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=video&video=<?php echo $videoTitle ?>";
	_classhere('share')[0].innerHTML++;
	window.open(url, '_blank')}
function download() {
	_classhere('plays')[0].innerHTML++;
	_id("service").src = "services/stats.php?viddownID=<?php echo $videoID ?>";}
window.onload = function() {
  	_id('title1').innerHTML='Preview of <?php echo $videoTitle.' by '.$videoArtist ?> on GreenboxNigeria.com';
	_id('description').content='<?php echo substr_replace(htmlspecialchars_decode($videoDescription),'...',55) ?>';
	_id('keywords').content='latest Nigerian music videos, fresh Nigerian music videos, new Nigerian music videos, Nigerian music videos, Nigerian songs videos, Nigerian tracks';}
	
</script>
</body>
</html>
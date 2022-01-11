<?php include("rab_dbcon.php");extract($_GET);
$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','label',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");
if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'label' ,'$id' ,'$date_updated')") or die("result no work 10");}
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2"><!--Label--></td></tr><tr><td>
<?php if($labeled){$sql = mysqli_query ($cxn, "SELECT * FROM labels WHERE labelName='$labeled' LIMIT 1");}else{
 $sql = mysqli_query ($cxn, "SELECT * FROM labels WHERE labelID='$labelID' LIMIT 1");}
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}
		$labelName=htmlspecialchars_decode($labelName);
		$labelOwner=htmlspecialchars_decode($labelOwner);
		$labelHistory=htmlspecialchars_decode($labelHistory);
		$labelArtists=htmlspecialchars_decode($labelArtists);
		$labelProducers=htmlspecialchars_decode($labelProducers);
		$labelOthers=htmlspecialchars_decode($labelOthers);
	?>
<table align="center" style=" width:;background:url(labelsimg/<?php echo $labelPic ?>) left top no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:600px; position:fixed; z-index:-2; opacity:.4"><tr><td>
</td></tr></table>
<table><tr valign="middle" align="center"><td><div style="border:none;background:url(labelsimg/<?php echo $labelPic ?>) center no-repeat; background-size:contain;height:350px; width:80%; padding:0px 10px;cursor:pointer;filter:labelsimg/<?php echo $labelPic ?>"></div></td></tr>
<tr><td colspan="2" style="font-size:3em; text-align:center; padding:20px"><?php echo $labelName ?></td></tr>
</table>
<table><tr><td width="100%" align="center"><?php
if($labelOwner){echo"<div style='font-size:1.1em; font-weight:700;color:#00E676'>Founder</div>$labelOwner";}
if($labelFounded){echo"<div style='font-size:1.1em; font-weight:700;color:#00E676'>Founded</div>$labelFounded";}
if($labelArtists){echo"<div style='font-size:1.1em; font-weight:700;color:#00E676'>Artists</div>$labelArtists";}
if($labelProducers){echo"<div style='font-size:1.1em; font-weight:700;color:#00E676'>Producers</div>$labelProducers";}
if($labelOthers){echo"<div style='font-size:1.1em; font-weight:700;color:#00E676'>Others</div>$labelOthers";}
$sqls = mysqli_query($cxn, "select * from copy where copySong = 'label $labelName'") or die('xxx2');
$shares = mysqli_num_rows($sqls);?>
</td></tr></table>
<div style='width:95%; padding:20px 0;'><table><tr>
<td>Share <div class="share"><?php echo $shares ?></div></td>
<td align="centr">
<div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/label-<?php echo str_replace(' ', '-', $labelName );?>')"></div>
<div style="background:url(images/tt.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/archive/label-<?php echo str_replace(' ', '-', $labelName );?>&text=<?php echo $labelName ?> on GreenboxNigeria.com&via=greenboxnigeria&hashtags=greenboxnigeria')"></div>
<div style="background:url(images/in.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/archive/label-<?php echo str_replace(' ', '-', $labelName );?>&title=<?php echo $labelName ?> via GreenboxNigeria.com')"></div>
<div style="background:url(images/gg.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/label-<?php echo str_replace(' ', '-', $labelName );?>')"></div>
<div style="background:url(images/pi.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/labelsimg/<?php echo $labelPic ?>&url=gbngr.com/archive/label-<?php echo str_replace(' ', '-', $labelName );?>&is_video=false&description=<?php echo substr_replace($labelHistory,'...',55)?>')"></div>
<div style="background:url(images/tb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/archive/label-<?php echo str_replace(' ', '-', $labelName );?>&title=<?php echo $labelName ?> on GreenboxNigeria.com&caption=<?php echo substr_replace($labelHistory,'...',55)?>')"></div>
<div style="background:url(images/www.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onclick="copyToClipboard()"></div>

</td></tr></table></div>
<br><br>
<table align="center" class="fresh"><tr><td>
<br>
<table><tr><td align="center"><div style="text-indent:100px;"><?php echo $labelHistory?></div></td></tr></table>
</td></tr></table>

<table><tr><td><br>Comments</td></tr></table>
<table><tr valign="top"><td align="right">
add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  name="comment">
<br><br>
<input type="submit" value="Comment" class="commentbutton"/><input type="hidden" name="id" value="<?php echo $labelID ?>"><input type="hidden" name="labelID" value="<?php echo $labelID ?>"></form>
</td></tr><tr><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='label' AND comment_cat_id='$labelID' ORDER BY comment_id DESC");
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
	_id("service").src = "services/stats.php?copy=label&label=<?php echo $labelName ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/label-<?php echo str_replace(' ', '-', $labelName );?>");
	_id("service").src = "services/stats.php?copy=label&label=<?php echo $labelName ?>";
	_classhere('share').innerHTML++;}
window.onload = function() {
  	_id('title1').innerHTML='<?php echo $labelName ?> via GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace($labelHistory,'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}
</script>
</body>
</html>
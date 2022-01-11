<?php include("rab_dbcon.php");extract($_GET);
$blogged=str_replace('---', ' ', $blogged);
$blogged=str_replace('--', ' ', $blogged);
$blogged=str_replace('-', ' ', $blogged);
 if($blogged){$sql = mysqli_query ($cxn, "SELECT * FROM blog WHERE blogName='$blogged' LIMIT 1");}else{
	 $sql = mysqli_query ($cxn, "SELECT * FROM blog WHERE blogID='$blogID' LIMIT 1");}
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}
$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','blog article $blogName',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");
if($commenter!=NULL){
	$comment_timestamp=date("F j, Y. h:i");
	$date_updated=date("Y-m-d");
	mysqli_query($cxn, "INSERT INTO comment (comment_id, commenter, comment, comment_timestamp, comment_cat, comment_cat_id, date_updated) VALUES (NULL , '$commenter', '$comment', '$comment_timestamp' ,'blog' ,'$id' ,'$date_updated')") or die("result no work 10");}
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
<?php
echo"
<div class='blogtimestamp'>";echo htmlspecialchars_decode($blogTimestamp);echo "</div>
<table><tr><td style='font-size:2em; font-weight:100'>";echo htmlspecialchars_decode($blogName);echo "</td></tr></table>
<table align='center' style='background:url(blogimg/$blogPic) center no-repeat; background-size:cover;width:300px; height:300px;><tr valign='middle'><td></td></tr></table><br>

<table><tr><td align='center'><div class='blogwriteup'>";echo htmlspecialchars_decode($blogWriteup);echo "</div><br></td></tr></table>";

$sqls = mysqli_query($cxn, "select * from copy where copySong = 'blog $blogName'") or die('xxx2');
$shares = mysqli_num_rows($sqls);
?>
<div style='width:95%; padding:20px 0;'><table><tr>
<td>Share <div class="share"><?php echo $shares ?></div></td>
<td align="centr">
<div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/blog-<?php echo str_replace(' ', '-', $blogName );?>')"></div>
<div style="background:url(images/tt.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/archive/blog-<?php echo str_replace(' ', '-', $blogName );?>&text=<?php echo $blogName ?> on GreenboxNigeria.com&via=greenboxnigeria&hashtags=greenboxnigeria')"></div>
<div style="background:url(images/in.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/archive/blog-<?php echo str_replace(' ', '-', $blogName );?>&title=<?php echo $blogName ?> via GreenboxNigeria.com')"></div>
<div style="background:url(images/gg.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/blog-<?php echo str_replace(' ', '-', $blogName );?>')"></div>
<div style="background:url(images/pi.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/blogimg/<?php echo $blogPic?>&url=gbngr.com/archive/blog-<?php echo str_replace(' ', '-', $blogName );?>&is_video=false&description=<?php echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',55)?>')"></div>
<div style="background:url(images/tb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/archive/blog-<?php echo str_replace(' ', '-', $blogName );?>&title=<?php echo $blogName ?> on GreenboxNigeria.com&caption=<?php echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',55)?>')"></div>
<div style="background:url(images/www.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onclick="copyToClipboard()"></div>

</td></tr></table></div>
<?php if($blogSource){echo"<table><tr><td><div class='blogtype'>source:</div>lindaikeji.blogspot.com</td><td align='right'></td></tr></table>";}?><br>
<table><tr><td align="right">
<?php if($blogTag1){echo "<a href='blog.php?key=$blogTag1'><tag class='tag'>$blogTag1</tag>";}if($blogTag2){echo "<a href='blog.php?key=$blogTag2'><tag class='tag'>$blogTag2</tag>";}if($blogTag3){echo "<a href='blog.php?key=$blogTag3'><tag class='tag'>$blogTag3</tag>";}if($blogTag4){echo "<a href='blog.php?key=$blogTag4'><tag class='tag'>$blogTag4</tag>";}if($blogTag5){echo "<a href='blog.php?key=$blogTag5'><tag class='tag'>$blogTag5</tag>";}?>
</td></tr></table>
<table><tr><td><br>Comments</td></tr></table>
<table><tr valign="top">
<td align="center">
add your comment<br><form method="get">
<input type="text" placeholder="Name(Username/Handle)" maxlength="20" name="commenter" value="<?php if($anonymousName!='anonymous'){echo $anonymousName;}?>" class="commenter"/><br><br>
<input type="text" placeholder="your comment" maxlength="300" class="commenter"  name="comment">
<br><br>
<input type="submit" value="Comment" class="commentbutton"/><input type="hidden" name="id" value="<?php echo $blogID ?>"><input type="hidden" name="blogID" value="<?php echo $blogID ?>"></form>
</td></tr><tr><td style="padding:10px; width:50%;" align="center">

<?php
$sql = mysqli_query ($cxn, "SELECT * FROM comment WHERE comment_cat='blog' AND comment_cat_id='$blogID' ORDER BY comment_id DESC");
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
	_id("service").src = "services/stats.php?copy=blog&blog=<?php echo $blogName ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/blog-<?php echo str_replace(' ', '-', $blogName );?>");
	_id("service").src = "services/stats.php?copy=blog&blog=<?php echo $blogName ?>";
	_classhere('share').innerHTML++;}
window.onload = function() {
  	_id('title1').innerHTML='<?php echo $blogName ?> via GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}
</script>
</body>
</html>
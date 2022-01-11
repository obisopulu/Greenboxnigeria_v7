<?php include("rab_dbcon.php");extract($_GET);$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','blog',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");

if($key){$sqlblog1 = mysqli_query ($cxn, "SELECT * FROM blog WHERE blogTag1 ='$key' OR blogTag2 ='$key' OR blogTag3 ='$key' OR blogTag4 ='$key' OR blogTag5 ='$key'");}
else{$sqlblog1 = mysqli_query ($cxn, "SELECT * FROM blog");}
$nr = mysqli_num_rows($sqlblog1);
if (isset($_GET['pn'])){$pn = preg_replace('#[^0-9]#i', '', $_GET['pn']);} else {$pn = 1;}
$itemsPerPage = 5;
$lastPage = ceil($nr / $itemsPerPage);
if ($pn < 1){$pn = 1;} else if ($pn > $lastPage){$pn = $lastPage;} 
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span> &nbsp;';
    $centerPages .= '<a href="blog.php?pn=' . $add1 . '">'."<span class='pagination'>" . $add1 . '</span></a>';
} else if ($pn == $lastPage) {
    $centerPages .= '<a href="blog.php?pn=' . $sub1 . '">' . "<span class='pagination'>".$sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '<a href="blog.php?pn=' . $sub2 . '">' ."<span class='pagination'>". $sub2 . '</span></a>';
    $centerPages .= '<a href="blog.php?pn=' . $sub1 . '">' ."<span class='pagination'>". $sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
    $centerPages .= '<a href="blog.php?pn=' . $add1 . '">' ."<span class='pagination'>". $add1 . '</span></a>';
    $centerPages .= '<a href="blog.php?pn=' . $add2 . '">' ."<span class='pagination'>". $add2 . '</span></a>';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '<a href="blog.php?pn=' . $sub1 . '">' ."<span class='pagination'>". $sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
    $centerPages .= '<a href="blog.php?pn=' . $add1 . '">' . "<span class='pagination'>".$add1 . '</span></a>';
}
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 
if($key){$sqlblog = mysqli_query ($cxn, "SELECT * FROM blog WHERE blogTag1 ='$key' OR blogTag2 ='$key' OR blogTag3 ='$key' OR blogTag4 ='$key' OR blogTag5 ='$key' ORDER BY blogID DESC $limit");}
else{$sqlblog = mysqli_query ($cxn, "SELECT * FROM blog ORDER BY blogID DESC $limit");}
$paginationDisplay = "";
if ($lastPage != "1"){if ($pn != 1){
        $previous = $pn - 1;
        $paginationDisplay .=  "<table><tr><td>".'<a href="blog.php?pn=' . $previous . '">'."<span class='pagination'>".'&lang;</span></a> '.'</td>';} 
	else {$paginationDisplay .=  "<table><tr><td><span class='paginationnon'></span></td>";}
	$paginationDisplay .= "<td align='center'>" . $centerPages . '</td>';
    if ($pn != $lastPage) {
		echo"";
        $nextPage = $pn + 1;
        $paginationDisplay .=  "<td align='right'>".'<a href="blog.php?pn=' . $nextPage . '"><span'." class='pagination'>&rang;</span></a> ".'</td></tr></table>';} 
	else {$paginationDisplay .= "<td><span class='paginationnon'></span></td></tr></table>";}
}			
?><!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2"><!--Blog--></td></tr><tr><td>
	<table><tr valign="top"><td style="padding:20px 0">
    <?php 
	if(date("w")==4){$sql1 = mysqli_query ($cxn, "SELECT * FROM quotes ORDER BY RAND() LIMIT 1");}else{$sql1 = mysqli_query ($cxn, "SELECT * FROM quotes ORDER BY quoteID DESC LIMIT 1");}
while($row=mysqli_fetch_assoc($sql1))
	{
		extract($row);	
    echo "<table style='color:#999; font-size:2em;font-family:mysecondFont; float:left'><tr><td>'$quote' - $quoter</td></tr></table>";
	}?>
    </td></tr></table>

<?php 
$counter=1;
while($row=mysqli_fetch_assoc($sqlblog))
	{
		extract($row);	echo"<table class='fresh' align='center'><tr><td><br>
<a href='blogarticle.php?blogID=$blogID'><table class='blogtable'><tr valign='bottom'><td class='blogart' style='background:url(blogimg/$blogPic) center no-repeat; background-size:cover;'></td><td>
<div class='blogtimestamp'>";echo htmlspecialchars_decode($blogTimestamp);echo "</div><div class='blogtopic'>";echo htmlspecialchars_decode($blogName);echo "</div><div class='blogwriteup'>";echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',80); echo"</div></td></tr></table></a>
<table><tr><td><div class='blogtype'>"; if($blogSource==''){echo 'Featured';}echo"</div></td></tr></table><br></td></tr></table>";}?>

<table><tr><td align="center"><div style="width:95%; padding:20px 5px;"><?php echo $paginationDisplay;?></div></td></tr></table>

</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Nigerian Music News on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace(htmlspecialchars_decode($blogWriteup),'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}
</script>
</body>
</html>
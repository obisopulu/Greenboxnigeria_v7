<?php include("rab_dbcon.php");$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','labels',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");

$sqllabels1 = mysqli_query ($cxn, "SELECT * FROM labels");
$nr = mysqli_num_rows($sqllabels1);
if (isset($_GET['pn'])){$pn = preg_replace('#[^0-9]#i', '', $_GET['pn']);} else {$pn = 1;}
$itemsPerPage = 8;
$lastPage = ceil($nr / $itemsPerPage);
if ($pn < 1){$pn = 1;} else if ($pn > $lastPage){$pn = $lastPage;} 
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span> &nbsp;';
    $centerPages .= '<a href="labels.php?pn=' . $add1 . '">'."<span class='pagination'>" . $add1 . '</span></a>';
} else if ($pn == $lastPage) {
    $centerPages .= '<a href="labels.php?pn=' . $sub1 . '">' . "<span class='pagination'>".$sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '<a href="labels.php?pn=' . $sub2 . '">' ."<span class='pagination'>". $sub2 . '</span></a>';
    $centerPages .= '<a href="labels.php?pn=' . $sub1 . '">' ."<span class='pagination'>". $sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
    $centerPages .= '<a href="labels.php?pn=' . $add1 . '">' ."<span class='pagination'>". $add1 . '</span></a>';
    $centerPages .= '<a href="labels.php?pn=' . $add2 . '">' ."<span class='pagination'>". $add2 . '</span></a>';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '<a href="labels.php?pn=' . $sub1 . '">' ."<span class='pagination'>". $sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
    $centerPages .= '<a href="labels.php?pn=' . $add1 . '">' . "<span class='pagination'>".$add1 . '</span></a>';
}
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 
$sqllabels = mysqli_query ($cxn, "SELECT * FROM labels ORDER BY labelName $limit");
$paginationDisplay = "";
if ($lastPage != "1"){if ($pn != 1){
        $previous = $pn - 1;
        $paginationDisplay .=  "<table><tr><td>".'<a href="labels.php?pn=' . $previous . '">'."<span class='pagination'>".'&lang;</span></a> '.'</td>';} 
	else {$paginationDisplay .=  "<table><tr><td><span class='paginationnon'></span></td>";}
	$paginationDisplay .= "<td align='center'>" . $centerPages . '</td>';
    if ($pn != $lastPage) {
		echo"";
        $nextPage = $pn + 1;
        $paginationDisplay .=  "<td align='right'>".'<a href="labels.php?pn=' . $nextPage . '"><span'." class='pagination'>&rang;</span></a> ".'</td></tr></table>';} 
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
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2"><!--Labels--></td></tr><tr><td>
<table align="center" class="fresh"><tr><td>
<?php
while($row=mysqli_fetch_assoc($sqllabels))
	{extract($row);
		$labelName=htmlspecialchars_decode($labelName);
		$labelOwner=htmlspecialchars_decode($labelOwner);
		$labelHistory=htmlspecialchars_decode($labelHistory);
		$labelArtists=htmlspecialchars_decode($labelArtists);
		$labelProducers=htmlspecialchars_decode($labelProducers);
		$labelOthers=htmlspecialchars_decode($labelOthers);
echo"
<a href='label.php?labelID=$labelID'><table class='freshtable' style='background:url(labelsimg/$labelPic) #222 right no-repeat; background-size:250px 250px;'><tr><td class='freshart'></td></tr>
<tr><td class='freshlabel'>$labelName<div class='freshartist'>$labelOwner</div></td></tr></table></a>";
}?>
</td></tr></table>

<table><tr><td align="center"><div style="width:95%; padding:20px 5px;"><?php echo $paginationDisplay;?></div></td></tr></table>

</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Nigerian Music Labels on GreenboxNigeria.com';
	_id('description').content='List Of Nigerian Music Labels';
	_id('keywords').content='latest Nigerian music Labels, fresh Nigerian music labels, new Nigerian music labels, Nigerian music labels, Nigerian songs labels, Nigerian tracks';}
</script>
</body>
</html>
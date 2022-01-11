<?php include("rab_dbcon.php");$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','people',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");

$sqlpeople1 = mysqli_query ($cxn, "SELECT * FROM persons");
$nr = mysqli_num_rows($sqlpeople1);
if (isset($_GET['pn'])){$pn = preg_replace('#[^0-9]#i', '', $_GET['pn']);} else {$pn = 1;}
$itemsPerPage = 6;
$lastPage = ceil($nr / $itemsPerPage);
if ($pn < 1){$pn = 1;} else if ($pn > $lastPage){$pn = $lastPage;} 
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span> &nbsp;';
    $centerPages .= '<a href="people.php?pn=' . $add1 . '">'."<span class='pagination'>" . $add1 . '</span></a>';
} else if ($pn == $lastPage) {
    $centerPages .= '<a href="people.php?pn=' . $sub1 . '">' . "<span class='pagination'>".$sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '<a href="people.php?pn=' . $sub2 . '">' ."<span class='pagination'>". $sub2 . '</span></a>';
    $centerPages .= '<a href="people.php?pn=' . $sub1 . '">' ."<span class='pagination'>". $sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
    $centerPages .= '<a href="people.php?pn=' . $add1 . '">' ."<span class='pagination'>". $add1 . '</span></a>';
    $centerPages .= '<a href="people.php?pn=' . $add2 . '">' ."<span class='pagination'>". $add2 . '</span></a>';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '<a href="people.php?pn=' . $sub1 . '">' ."<span class='pagination'>". $sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
    $centerPages .= '<a href="people.php?pn=' . $add1 . '">' . "<span class='pagination'>".$add1 . '</span></a>';
}
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 
$sql = mysqli_query ($cxn, "SELECT * FROM persons ORDER BY personStageName $limit");
$paginationDisplay = "";
if ($lastPage != "1"){if ($pn != 1){
        $previous = $pn - 1;
        $paginationDisplay .=  "<table><tr><td>".'<a href="people.php?pn=' . $previous . '">'."<span class='pagination'>".'&lang;</span></a> '.'</td>';} 
	else {$paginationDisplay .=  "<table><tr><td><span class='paginationnon'></span></td>";}
	$paginationDisplay .= "<td align='center'>" . $centerPages . '</td>';
    if ($pn != $lastPage) {
		echo"";
        $nextPage = $pn + 1;
        $paginationDisplay .=  "<td align='right'>".'<a href="people.php?pn=' . $nextPage . '"><span'." class='pagination'>&rang;</span></a> ".'</td></tr></table>';} 
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
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2">People</td></tr><tr><td>

<table align="center" class="fresh"><tr><td>
<?php $counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);	
		$personProfession1=trim(htmlspecialchars_decode($personProfession1));
		$personStageName=trim(htmlspecialchars_decode($personStageName));
		$a=$counter%3;echo"
<a href='person.php?personID=$personID'><table class='peopletable'><tr><td class='peopleart' style='background:url(personsimg/$personPic1) #222 center no-repeat; background-size:cover'></td><td class='peoplename'>$personStageName<div class='peoplelabel'>$personProfession1</div></td></tr></table></a>";}?>
</td></tr></table>

<div style="width:95%; padding:20px 5px;"><?php echo $paginationDisplay;?></div>

</td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='The People on GreenboxNigeria.com';
	_id('description').content='List of the people who make the Nigerian Music Industry what it is';
	_id('keywords').content='latest Nigerian music People, fresh Nigerian music people, new Nigerian music people, Nigerian music people, Nigerian songs people, Nigerian tracks';}
</script>
</body>
</html>
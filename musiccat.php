<?php include("rab_dbcon.php");extract($_GET);$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','musci category',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");

if ($c=='artist'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songArtist FROM songs");}
elseif ($c=='genre'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songGenre FROM songs");}
elseif ($c=='genre'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songLanguage FROM songs");}
elseif ($c=='producer'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songProducer FROM songs");}
elseif ($c=='language'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songLanguage FROM songs");}
elseif ($c=='year'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songYear FROM songs");}
$nr = mysqli_num_rows($sql1);
if (isset($_GET['pn'])){$pn = preg_replace('#[^0-9]#i', '', $_GET['pn']);} else {$pn = 1;}
$itemsPerPage = 10;
$lastPage = ceil($nr / $itemsPerPage);
if ($pn < 1){$pn = 1;} else if ($pn > $lastPage){$pn = $lastPage;} 
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span> &nbsp;';
    $centerPages .= '<a href="musiccat.php?pn=' . $add1 . '&'."c=$c".'">'."<span class='pagination'>" . $add1 . '</span></a>';
} else if ($pn == $lastPage) {
    $centerPages .= '<a href="musiccat.php?pn=' . $sub1 . '&'."c=$c".'">' . "<span class='pagination'>".$sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '<a href="musiccat.php?pn=' . $sub2 . '&'."c=$c".'">' ."<span class='pagination'>". $sub2 . '</span></a>';
    $centerPages .= '<a href="musiccat.php?pn=' . $sub1 . '&'."c=$c".'">' ."<span class='pagination'>". $sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
    $centerPages .= '<a href="musiccat.php?pn=' . $add1 . '&'."c=$c".'">' ."<span class='pagination'>". $add1 . '</span></a>';
    $centerPages .= '<a href="musiccat.php?pn=' . $add2 . '&'."c=$c".'">' ."<span class='pagination'>". $add2 . '</span></a>';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '<a href="musiccat.php?pn=' . $sub1 . '&'."c=$c".'">' ."<span class='pagination'>". $sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
    $centerPages .= '<a href="musiccat.php?pn=' . $add1 . '&'."c=$c".'">' . "<span class='pagination'>".$add1 . '</span></a>';
}
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 
if ($c=='artist'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songArtist FROM songs ORDER BY songArtist $limit");}
elseif ($c=='genre'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songGenre FROM songs ORDER BY songGenre $limit");}
elseif ($c=='genre'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songLanguage FROM songs ORDER BY songLanguage $limit");}
elseif ($c=='producer'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songProducer FROM songs ORDER BY songProducer $limit");}
elseif ($c=='language'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songLanguage FROM songs ORDER BY songLanguage $limit");}
elseif ($c=='year'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songYear FROM songs ORDER BY songYear $limit");}
$paginationDisplay = "";
if ($lastPage != "1"){if ($pn != 1){
        $previous = $pn - 1;
        $paginationDisplay .=  "<table><tr><td>".'<a href="musiccat.php?pn=' . $previous . '&'."c=$c".'">'."<span class='pagination'>".'&lang;</span></a> '.'</td>';} 
	else {$paginationDisplay .=  "<table><tr><td><span class='paginationnon'></span></td>";}
	$paginationDisplay .= "<td align='center'>" . $centerPages . '</td>';
    if ($pn != $lastPage) {
		echo"";
        $nextPage = $pn + 1;
        $paginationDisplay .=  "<td align='right'>".'<a href="musiccat.php?pn=' . $nextPage . '&'."c=$c".'"><span'." class='pagination'>&rang;</span></a> ".'</td></tr></table>';} 
	else {$paginationDisplay .= "<td><span class='paginationnon'></span></td></tr></table>";}
}		
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
</head>
<body>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td style="text-transform:capitalize" class="tabheader2"><?php echo $t;?></td></tr><tr><td>

<?php 
$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songGenre=trim(htmlspecialchars_decode($songGenre));
		$songLanguage=trim(htmlspecialchars_decode($songLanguage));
		$songProducer=trim(htmlspecialchars_decode($songProducer));
		$a=$counter%5;
		if($c=='artist'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songArtist='$songArtist' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}
			echo"
<a href='musiclist.php?t=$songArtist&c=artist'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songArtist)>18){echo substr_replace($songArtist,'..',18);}else{echo $songArtist;} echo "</td></tr></table></a>";}
		
		elseif($c=='genre'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songGenre='$songGenre' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}
			echo"
<a href='musiclist.php?t=$songGenre&c=genre'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songGenre)>18){echo substr_replace($songGenre,'..',18);}else{echo $songGenre;} echo "</td></tr></table></a>";}				 		
		elseif($c=='language'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songLanguage='$songLanguage' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}
	echo"
<a href='musiclist.php?t=$songLanguage&c=language'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songLanguage)>18){echo substr_replace($songLanguage,'..',18);}else{echo $songLanguage;} echo "</td></tr></table></a>";}
 		
		elseif($c=='producer'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songProducer='$songProducer' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}
			echo"
<a href='musiclist.php?t=$songProducer&c=producer'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songProducer)>18){echo substr_replace($songProducer,'..',18);}else{echo $songProducer;} echo "</td></tr></table></a>";}
 		
		elseif($c=='year'){$sql2 = mysqli_query ($cxn, "SELECT songArt FROM songs WHERE songYear='$songYear' LIMIT 1");while($row2=mysqli_fetch_assoc($sql2)){extract($row2);}
			echo"
<a href='musiclist.php?t=$songYear&c=year'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songYear)>18){echo substr_replace($songYear,'..',18);}else{echo $songYear;} echo "</td></tr></table></a>";}}?>

<div style="width:95%; padding:20px 5px;"><?php echo $paginationDisplay;?></div>
</td></tr></table>
 <script>function _id(el){return top.document.getElementById(el);}window.onload = function(){_id('title1').innerHTML='Nigerian Music on GreenboxNigeria.com';('description').content='All Nigerian Music. Browse by New, Random, Artist, Album, Soong name, Producer, Rating and Year';_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}</script></body></html>
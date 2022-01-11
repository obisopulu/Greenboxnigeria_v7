<?php include("rab_dbcon.php");extract($_GET);$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','musiclist',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");

if ($t=='new'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs");}
elseif ($c=='artist'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtist='$t'");}
elseif ($c=='artistFt'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtistFt LIKE '%$t%'");}
elseif ($c=='genre'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songGenre='$t'");}
elseif ($c=='language'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songLanguage='$t'");}
elseif ($c=='producer'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songProducer='$t'");}
elseif ($c=='rating'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songRating='$t'");}
elseif ($c=='year'){$sql1 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songYear='$t'");}
elseif ($t=='album'){$sql1 = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songAlbum NOT IN ('single','mixetape','cover','')");}
else {$sql1 = mysqli_query ($cxn, "SELECT * FROM songs");}
$nr = mysqli_num_rows($sql1);
if (isset($_GET['pn'])){$pn = preg_replace('#[^0-9]#i', '', $_GET['pn']);} else {$pn = 1;}
$itemsPerPage = 20;
$lastPage = ceil($nr / $itemsPerPage);
if ($pn < 1){$pn = 1;} else if ($pn > $lastPage){$pn = $lastPage;} 
$centerPages = "";
$sub1 = $pn - 1;
$sub2 = $pn - 2;
$add1 = $pn + 1;
$add2 = $pn + 2;
if ($pn == 1) {
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span> &nbsp;';
    $centerPages .= '<a href="musiclist.php?pn=' . $add1 . '&'."t=$t&c=$c".'">'."<span class='pagination'>" . $add1 . '</span></a>';
} else if ($pn == $lastPage) {
    $centerPages .= '<a href="musiclist.php?pn=' . $sub1 . '&'."t=$t&c=$c".'">' . "<span class='pagination'>".$sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '<a href="musiclist.php?pn=' . $sub2 . '&'."t=$t&c=$c".'">' ."<span class='pagination'>". $sub2 . '</span></a>';
    $centerPages .= '<a href="musiclist.php?pn=' . $sub1 . '&'."t=$t&c=$c".'">' ."<span class='pagination'>". $sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
    $centerPages .= '<a href="musiclist.php?pn=' . $add1 . '&'."t=$t&c=$c".'">' ."<span class='pagination'>". $add1 . '</span></a>';
    $centerPages .= '<a href="musiclist.php?pn=' . $add2 . '&'."t=$t&c=$c".'">' ."<span class='pagination'>". $add2 . '</span></a>';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '<a href="musiclist.php?pn=' . $sub1 . '&'."t=$t&c=$c".'">' ."<span class='pagination'>". $sub1 . '</span></a>';
    $centerPages .= "<span class='paginationnon'>" . $pn . '</span>';
    $centerPages .= '<a href="musiclist.php?pn=' . $add1 . '&'."t=$t&c=$c".'">' . "<span class='pagination'>".$add1 . '</span></a>';
}
$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .',' .$itemsPerPage; 
if ($t=='new'){$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY songID DESC $limit");}
elseif ($c=='artist'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtist='$t' ORDER BY songArtist $limit");}
elseif ($c=='artistFt'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtistFt LIKE '%$t%' ORDER BY songArtist $limit");}
elseif ($c=='genre'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songGenre='$t' ORDER BY songGenre $limit");}
elseif ($c=='language'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songLanguage='$t' ORDER BY songLanguage $limit");}
elseif ($c=='producer'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songProducer='$t' ORDER BY songProducer $limit");}
elseif ($c=='rating'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songRating='$t' ORDER BY songTitle $limit");}
elseif ($c=='year'){$sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songYear='$t' ORDER BY songTitle $limit");}
elseif ($t=='album'){$sql = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songAlbum NOT IN ('single','mixetape','cover','') ORDER BY songAlbum $limit");}else{$sql = mysqli_query ($cxn, "SELECT * FROM songs ORDER BY songTitle $limit");}
$paginationDisplay = "";
if ($lastPage != "1"){if ($pn != 1){
        $previous = $pn - 1;
        $paginationDisplay .=  "<table><tr><td>".'<a href="musiclist.php?pn=' . $previous . '&'."t=$t&c=$c".'">'."<span class='pagination'>".'&lang;</span></a> '.'</td>';} 
	else {$paginationDisplay .=  "<table><tr><td><span class='paginationnon'></span></td>";}
	$paginationDisplay .= "<td align='center'>" . $centerPages . '</td>';
    if ($pn != $lastPage) {
		echo"";
        $nextPage = $pn + 1;
        $paginationDisplay .=  "<td align='right'>".'<a href="musiclist.php?pn=' . $nextPage . '&'."t=$t&c=$c".'"><span'." class='pagination'>&rang;</span></a> ".'</td></tr></table>';} 
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
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td style="text-transform:capitalize" class="tabheader2"><?php echo $t;?></td></tr><tr><td>

<table class="fresh" align="center"><tr><td>
<?php 
$counter=1;
while($row=mysqli_fetch_assoc($sql))
	{extract($row);	
		$songArtist=trim(htmlspecialchars_decode($songArtist));
		$songTitle=trim(htmlspecialchars_decode($songTitle));
		$songAlbum=trim(htmlspecialchars_decode($songAlbum));
		$a=$counter%5;if ($t=='album'){
			$sql2=mysqli_query($cxn, "SELECT * FROM songs WHERE songAlbum='$songAlbum' LIMIT 1");while($row=mysqli_fetch_assoc($sql2)){extract($row);
			echo"
<a href='albumpreview.php?t=$songAlbum'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songAlbum)>18){echo substr_replace($songAlbum,'..',18);}else{echo $songAlbum;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>18){echo substr_replace($songArtist,'..',18);}else{echo $songArtist;} echo "</span></td></tr></table></a>";}}
else
{echo"
<a href='musicpreview.php?t=$songID'><table class='freshtable'><tr><td class='freshart' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'></td><td class='freshlabel'>"; if(strlen($songTitle)>35){echo substr_replace($songTitle,'..',35);}else{echo $songTitle;} echo "<br><span class='hotartist'>"; if(strlen($songArtist)>35){echo substr_replace($songArtist,'..',35);}else{echo $songArtist;} echo "</span>"; if($songArtistFt){echo " ft <span class='hotartist'>"; if(strlen($songArtistFt)>35){echo substr_replace($songArtistFt,'..',35);}else{echo $songArtistFt;} echo "</span>";} echo"</td></tr></table></a>";}}?>

</td></tr></table>
<div style="width:95%; padding:20px 5px;"><?php echo $paginationDisplay;?></div>
</td></tr></table>
  
<script>function _id(el){return top.document.getElementById(el);}window.onload = function(){_id('title1').innerHTML='Nigerian Music on GreenboxNigeria.com';('description').content='All Nigerian Music. Browse by New, Random, Artist, Album, Soong name, Producer, Rating and Year';_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}</script></body></html>
<?php include("../rab_dbcon.php"); 
$today = date("Y-m-d"); 
extract($_GET);
$play=trim($play);
if ($play){
	$querys = mysqli_query($cxn, "SELECT * FROM songs WHERE songID ='$play' LIMIT 1") or die("result no work sha sha");
	extract(mysqli_fetch_assoc($querys));
	$songPlay++;
	mysqli_query($cxn, "UPDATE songs SET songPlay='$songPlay' WHERE songID ='$play' LIMIT 1") or die("result no work sha sha update");

	mysqli_query($cxn, "INSERT INTO  play ( playID, playUser, playSongID, playDate) VALUES  (NULL , '$anonymousName' , '$songID','$today')") or die("Couldn't execute play Reg.111");
	}
elseif ($copy){
	if  ($copy=='music'){
		$querys = mysqli_query($cxn, "SELECT * FROM songs WHERE songID ='$musicID'")	or die("result no work sha sha");
		extract(mysqli_fetch_assoc($querys));
			
		mysqli_query($cxn, "INSERT INTO  copy ( copyID, copyUser, copySongID, copySong, copyUserIP, copyDate) VALUES  (NULL , '$anonymousName' , '$musicID', 'music  $SongArtist - $songTitle  $songArtistFt' ,'$userIP','$today')") or die("Couldn't execute copy Reg.");
		}
	if  ($copy=='album'){
			$today = date("Ymd"); 			
			mysqli_query($cxn, "INSERT INTO  copy ( copyID, copyUser, copySongID, copySong, copyUserIP,copyDate) VALUES  (NULL , '$anonymousName' , NULL, 'album $album' ,'$userIP','$today')")or die("Couldn't execute copy Reg.11");
		}
	if  ($copy=='label'){
				
			mysqli_query($cxn, "INSERT INTO  copy ( copyID, copyUser, copySongID, copySong, copyUserIP,copyDate) VALUES  (NULL , '$anonymousName' , NULL, 'label $label' ,'$userIP','$today')")or die("Couldn't execute copy Reg.2");
		}
	if  ($copy=='blog'){
				
			mysqli_query($cxn, "INSERT INTO  copy ( copyID, copyUser, copySongID, copySong, copyUserIP,copyDate) VALUES  (NULL , '$anonymousName' , NULL, 'blog $blog' ,'$userIP','$today')")or die("Couldn't execute copy Reg.3");
		}
	if  ($copy=='person'){
				
$sql = mysqli_query($cxn, "INSERT INTO  copy ( copyID, copyUser, copySongID, copySong, copyUserIP,copyDate) VALUES  (NULL , '$anonymousName' , NULL, 'person $person' ,'$userIP','$today')")or die("Couldn't execute copy Reg.4");
		}
	if  ($copy=='video'){
				
$sql = mysqli_query($cxn, "INSERT INTO  copy ( copyID, copyUser, copySongID, copySong, copyUserIP,copyDate) VALUES  (NULL , '$anonymousName' , NULL, 'video $video' , '$userIP','$today')")or die("Couldn't execute copy Reg.5");
		}
	}
if($downID){
$querys = mysqli_query($cxn, "SELECT * FROM songs WHERE songID ='$downID'")
		or die("result no work sha shaq");
	extract(mysqli_fetch_assoc($querys));
	
			$getUser = mysqli_query($cxn, "SELECT *  from anonymous where anonymousIP='$userIP' LIMIT 1")or die("Couldn't execute insert query anonys.");
			extract(mysqli_fetch_assoc($getUser));
			$anonymousDownload++;			
			mysqli_query($cxn, "UPDATE anonymous SET anonymousDownload='$anonymousDownload' WHERE anonymousID='$anonymousID' LIMIT 1")
			or die("Couldn't execute insert query anon121145.");
			$songDownload++;
			
			mysqli_query($cxn, "UPDATE songs SET songDownload='$songDownload' WHERE songID='$downID' LIMIT 1")
			or die("Couldn't execute insert query songs");
			
			mysqli_query($cxn, "INSERT INTO  downloads ( downloadID, downloadUser, downloadSongID, downloadDate) VALUES  (NULL , '$anonymousName' , '$downID' ,'$today')")	or die("Couldn't execute insert query anon12116.");
			if($q=='hq'){}
			if($q=='lq'){}
			
			header("Content-disposition: attachment; filename=songs/$songURL");
			header("Content-type: audio/mpeg");
			readfile("songs/$songURL");
}
if($viddownID){
$querys = mysqli_query($cxn, "SELECT * FROM videos WHERE videoID ='$viddownID'")
		or die("result no work sha shaqds fds fds f ds f");
	extract(mysqli_fetch_assoc($querys));
	
			$getUser = mysqli_query($cxn, "SELECT *  from anonymous where anonymousIP='$userIP' LIMIT 1")or die("Couldn't execute insert query anonys.");
			extract(mysqli_fetch_assoc($getUser));
			mysqli_query($cxn, "UPDATE anonymous SET anonymousDownload='$anonymousDownload' WHERE anonymousID='$anonymousID' LIMIT 1")
			or die("Couldn't execute insert query anon121145.");
			$videoDownload++;
			
			mysqli_query($cxn, "UPDATE videos SET videoDownload='$videoDownload' WHERE videoID='$viddownID' LIMIT 1")
			or die("Couldn't execute insert query songs");

			header("Location: $videoDownloadSRC");
}
else{echo "xxx";}
/*
if($songArtistFt!=''){$title="$songTitle "."Ft $songArtistFt";}
if($songProducer!=''){$title="$songTitle [prod. by $songProducer] [ gbngr.com ])";}else{$title="$songTitle [ gbngr.com ]";}
$TextEncoding = 'UTF-8';
require_once('../getid3/getid3.php');
$getID3 = new getID3;
$getID3->setOption(array('encoding'=>$TextEncoding));
require_once('../getid3/write.php');
$tagwriter = new getid3_writetags;
$tagwriter->filename = '../songs/$songURL';
$tagwriter->tagformats = array('id3v2.3');
$tagwriter->overwrite_tags = true;
$tagwriter->remove_other_tags = false;
$tagwriter->tag_encoding = $TextEncoding;
$tagwriter->remove_other_tags = true;
$TagData = array('title' => array("$title"),'bitrate' => array("1209999999"),);
$tagwriter->tag_data = $TagData;
$tagwriter->WriteTags();
header("Content-disposition: attachment; filename=songs/$songURL");
header("Content-type: audio/mpeg");
readfile("songs/$songURL");
*/?>
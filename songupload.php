<?php include("rab_dbcon.php");
extract($_POST);
$title=trim(htmlspecialchars($title));
$artistft=trim(htmlspecialchars($artistft));
$producer=trim(htmlspecialchars($producer));
$genre=trim(htmlspecialchars($genre));
$language=trim(htmlspecialchars($language));
$description=trim(htmlspecialchars($description));
$today = date("Y-m-d"); 
$y=date("Y");
$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','song upload',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");

if($member=='yes'){
 $sql = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName='$memberStageName' AND personCareerStartYear='5000' LIMIT 1");
 while($row=mysqli_fetch_assoc($sql))
	{extract($row);}

if($upload=='Upload'){
	
$sql=mysqli_query ($cxn, "SELECT * FROM songs order by songID DESC  LIMIT 1");
 while($row=mysqli_fetch_assoc($sql))
	{extract($row);}
	
	require_once('getid3/getid3.php');
	$getID3 = new getID3;
	
	$FullFileName = realpath("songs/$songURL");
	set_time_limit(30);
	$ThisFileInfo = $getID3->analyze($FullFileName);
	getid3_lib::CopyTagsToComments($ThisFileInfo);
	$songlenght =htmlentities(!empty($ThisFileInfo['playtime_string']) ? $ThisFileInfo['playtime_string'] : chr(160));
	$art ="art_$personStageName_$title.png";
	$art = str_replace(' ', '-', $art);
	move_uploaded_file($_FILES["art"]["tmp_name"], "songsimg/$art");
	$size=filesize("songs/$songURL");
	mysqli_query($cxn, "UPDATE songs SET songTitle = '$title', songArtist = '$personStageName', songArtistFt = '$artistft', songAlbum = 'Single', songArt = '$art', songProducer = '$producer',  songLenght = '$songlenght', songType = 'mp3', songSize = '$size', songGenre = '$genre', songDescription = '$description', songYear = '$y', songLanguage = '$language', songRating = '0', songDownload = '0', songPlay = '0', dateUpdated = '$today' WHERE songs.songID = $songID");
$ezege ="<table style='font-size:2em'><tr><td>$title Uploaded</td></tr></table>";
$TextEncoding = 'UTF-8';
$titler=$title;
if($artistft!=''){$title="$title "."Ft $artistft";}
if($producer!=''){$title="$title [prod. by $producer] streaming live via gbngr.com";}else{$title="$title streaming live via gbngr.com";}
$getID3->setOption(array('encoding'=>$TextEncoding));
require_once('getid3/write.php');
$tagwriter = new getid3_writetags;
$tagwriter->filename = "songs/$songURL";
$tagwriter->tagformats = array('id3v2.3');
$tagwriter->overwrite_tags    = true;
$tagwriter->remove_other_tags = false;
$tagwriter->tag_encoding = $TextEncoding;
$tagwriter->remove_other_tags = true;
$TagData = array(
	'title'                  => array("$title"),
	'artist'                 => array("$personStageName"),
	'album'                  => array('Single'),
	'year'                   => array("$y"),
	'genre'                  => array("$genre"),
	'comment'                => array('Discover the Nigerian Music Industry on... Greenbox Nigeria'),
	'publisher'                => array('Greenbox Nigeria'),
	'encoded_by'                => array('soft'),
	'webpage'                => array('www.greenboxnigeria.com!'),
	'copyright'                => array("© $y Greenbox Nigeria"),
	'track'                  => array('01/01'),
	'popularimeter'          => array('email'=>'info@greenboxnigeria.com', 'rating'=>200, 'data'=>0),
	'unique_file_identifier' => array('ownerid'=>'info@greenboxnigeria.com', 'data'=>md5(time())),
);
$song="gbn".date("msi")."-$personStageName-".$titler.".mp3";
$song=str_replace(' ', '-', $song);
$tagwriter->tag_data = $TagData;
if ($tagwriter->WriteTags()) {}
rename("songs/$songURL","songs/$song");
mysqli_query($cxn, "UPDATE songs SET songURL = '$song' WHERE songs.songID = $songID");
	}
?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
<link href="style/scroll.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src="scirpt/scroll.js"></script>
<script>
function _(el){
	return document.getElementById(el);
}
function uploadFile(){
	var file = _("file").files[0];
	var formdata = new FormData();
	formdata.append("file", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "services/publicupload.php");
	ajax.send(formdata);
}
function progressHandler(event){
	var percent = (event.loaded / event.total) * 99.2;
	_("progressBar").style.width = Math.round(percent)+'%';
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 0;
	document.forms['pump'].submit();
	_("loaded_n_total").innerHTML = "Finishing up...";
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
</script>
</head>
<body>
<?php echo"<table align='center' style=' width:;background:url(personsimg/$personPic2) center top no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:600px; position:fixed; z-index:-2;opacity:.4'><tr><td>
</td></tr></table>";?>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2">Muisc Upload</td></tr><tr><td align="center">
    <?php echo $ezege;?>
    <table><tr valign="top"><td width="95%" align="center"><br>
	<form enctype="multipart/form-data" method="post" id="pump">
    <input name="title" required maxlength="50" type="text" placeholder="Song Title [ God of the earth ]" class="commenter" autofocus/><br><br>
    <input name="artistft" required maxlength="100" type="text" placeholder=" Artist(s) Featured [ Ice prine and J martins ]" class="commenter"/><br><br>
    <input name="producer" required maxlength="50" type="text" placeholder="Producer [ Sessbeat ]" class="commenter"/><br><br>
    <input name="genre" required maxlength="50" type="text" placeholder="Genre [ Afropop ]" class="commenter"/><br><br>
    <input name="language" required maxlength="100" type="text" placeholder="Language [ Hausa, Igbo, Yoruba, Pidgin, English and French ]" class="commenter"/><br><br>
	<textarea name="description" required placeholder="Song Description [ Describe your song ]" class="comment"></textarea>
    <input type="hidden" name="upload" value="Upload">
    
<br>
    <div class="file_button_container">
    <table><tr valign="middle"><td id="artstatus">Song Art</td><td><input name="art" required type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show('art')" id="songart" class="commenter"/></td></tr></table>
    </div></form>
    <h1 id="status"></h1>
  <p id="loaded_n_total"></p>
<table width="95%" style="background:rgba(0,0,0,.1)"><tr><td id="progressBar" style="background:#FFF; height:4px; width:1%"></td><td></td></tr></table>
	<form enctype="multipart/form-data" method="post">
    <div class="file_button_container">
    <table><tr valign="middle"><td id="filestatus">Song File</td><td><input accept="audio/*" required type="file" name="file" id="file" onChange="show()" class="commenter"/></td></tr></table>
    </div><br>
	<input type="button" onclick="uploadFile()" value="Upload" class="commentbutton"/>
    </form>
	</td></tr><tr><td align="center"><br>
<div style="font-size:2em;">Note</div>
<div style="font-size:1em; font-weight:100">&bull; All Fields are required.. except *Artist(s) Featured*<br>&bull; Your Song Art <b>MUST</b> be a custom art of the Song File to be uploaded.<br> &bull; The Song File <b>MUST</b> have been customed with the Song Art, Title, Artist, Artist(s) Featured, Genre and Year.</div>
<div style="font-size:2em;">Promote</div>
<div style="font-size:1em; font-weight:100">Take advantage of this platform to promote your song on our Home/Landing page, Music Player and Social Media pages to show your art to our Audience. Contact our agents;<br><br><table style="width:200px;height:0px"><tr><td>soft<br><a href="mailto:soft@greenboxnigeria.com?subject=Song%20Promotion" target="_new">soft@greenboxnigeria.com</a><br>+234 (0) 8050634922</td></tr></table><br>
    <table style="width:200px;height:0px"><tr><td>Madu<br><a href="mailto:madu@greenboxnigeria.com?subject=Song%20Promotion" target="_new">madu@greenboxnigeria.com</a><br>+234 (0) 8111813312</td></tr></table></div><br>
</td></tr></table><br>

</td></tr></table>
<script>function show(x){
	if(x=='art'){var d =document.getElementById("songart").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 25 ){d=d.substr(0, 25);d=d+'...';}if (d != null){document.getElementById("artstatus").innerHTML = document.getElementById("artstatus").innerHTML= "Song art - "+d;;}}
	else
	{var d =document.getElementById("file").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 25 ){d=d.substr(0, 25);d=d+'...';}if (d != null){document.getElementById("filestatus").innerHTML = document.getElementById("filestatus").innerHTML= "Song File - "+d;}
	}}
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Song Upload on GreenboxNigeria.com';}
</script>
</body>
</html>
<?php }else{header("Location: member.php");}?>
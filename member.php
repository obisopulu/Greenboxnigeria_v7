<?php include("rab_dbcon.php"); extract($_GET);extract($_POST);
$today = date("Y-m-d"); 
$gbn=date("msimm");
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','member',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");
if($status=='signout'){$_SESSION['member']=$member='no';}

if($emailconfirmation!=''){
$sqlEMAILCONFIRMATION=mysqli_query($cxn, "SELECT * FROM member WHERE memberConfirmation='$emailconfirmation' LIMIT 1");
if(mysqli_num_rows($sqlEMAILCONFIRMATION)>0){
while($row=mysqli_fetch_assoc($sqlEMAILCONFIRMATION))
	{extract($row);}
	
	mysqli_query($cxn, "UPDATE memberConfirmation='' WHERE memberID='$memberID' ");
	$_SESSION['member']=$member='yes'; $_SESSION['memberStageName']=$_SESSION['anonymousName']=$_SESSION['anonymous']=$_SESSION['commenter']=$memberStageName;
	session_start(); 
extract($_SESSION);}else{$login='Wrong Username or Password';}	
	}
if($new=='new'){$username=trim(htmlspecialchars($username));$password=trim(htmlspecialchars($password));
$sqlLOGIN=mysqli_query($cxn, "SELECT * FROM member WHERE memberUsername='$username' AND memberPassword='$password' LIMIT 1");
if(mysqli_num_rows($sqlLOGIN)>0){
while($row=mysqli_fetch_assoc($sqlLOGIN))
	{extract($row);}
	$_SESSION['member']=$member='yes'; $_SESSION['memberStageName']=$_SESSION['anonymousName']=$_SESSION['anonymous']=$_SESSION['commenter']=$memberStageName;
	session_start(); 
extract($_SESSION);}else{$login='Wrong Username or Password';}
	}
elseif($new=='reg'){
	
	$stagename=trim(htmlspecialchars($stagename));
	$birthname=trim(htmlspecialchars($birthname));
	$genre=trim(htmlspecialchars($genre));
	$birthday=trim(htmlspecialchars($birthday));
	$birthyear=trim(htmlspecialchars($birthyear));
	$placeoforigin=trim(htmlspecialchars($placeoforigin));
	$profession=trim(htmlspecialchars($profession));
	$label=trim(htmlspecialchars($label));
	$bio=trim(htmlspecialchars($bio));
	$pic1=trim(htmlspecialchars($pic1));
	$pic2=trim(htmlspecialchars($pic2));
	$email=trim(htmlspecialchars($email));
	$username=trim(htmlspecialchars($username));
	$password=trim(htmlspecialchars($password));
	
	$sqlMEMBER=mysqli_query($cxn, "SELECT * FROM member WHERE memberStageName='$stagename' OR memberEmail='$email' OR memberUsername='$username' ");
	
	if(mysqli_num_rows($sqlMEMBER)>0){$ezege="The Stagename or Email or Username you provide is Taken";}else{
	mysqli_query($cxn, "INSERT INTO member (memberID, memberStageName, memberEmail, memberUsername, memberPassword, memberConfirmation, dateUpdated) VALUES (NULL, '$stagename', '$email', '$username', '$password', '$gbn', '$today')") or die("Couldn't execute insert member");

$pic1 = str_replace(' ', '-', $stagename); $pic1tmp = $_FILES["pic1"]["tmp_name"];move_uploaded_file($pic1tmp, "../songs/$pic1.png");
$pic2 = str_replace(' ', '-', $stagename); $pic2tmp = $_FILES["pic2"]["tmp_name"];move_uploaded_file($pic2tmp, "../songs/$pic1.png");

	mysqli_query($cxn, "INSERT INTO persons (personID, personStageName, personBirthName, personFanName, personGenre, personBirthDay, personBirthYear, personPlaceOfOrigin, personProfession1, personProfession2, personProfession3, personProfession4, personCareerStartYear, personLabel, personLifeStory, personPic1, personPic2, personPic3, dateUpdated) VALUES (NULL, '$stagename', '$birthname', NULL, '$genre', '$birthday', '$birthyear', '$placeoforigin', '$profession', NULL, NULL, NULL, '5000', '$label', '$bio', '$pic1', '$pic2', NULL, '$today')") or die("Couldn't execute insert person");
  	$ezege="Email Confirmation<br>A confirmation email has been sent to your email.<br>To proceed to your page use the link in the email";
	
	$to = $email;
	$subject = 'Greenboxnigeria Membership email confirmation';
	
	$headers = "From: webmaster@greenboxnigeria.com\r\n";
	$headers .= "Reply-To: support@greenboxnigeria.com\r\n";
	$headers .= "CC: soft@greenboxnigeria.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message .= "<center><img src='http://www.gbngr.com/images/aboutpage.jpg' alt='logo' />";
	$message .= "<table style='border:none'>";
	$message .= "<tr style='font-size:3em; font-weight:100'><td>Welcome to Greenbox Nigeria<br><br><br></td></tr>";
	$message .= "<tr><td align='center'>Confirmation link <a style='background:#00E676; color:#FFF;padding:10px 30px;text-decoration:none' href='http://www.gbngr.com/newmember/$gbn'>Here</a><br><br><br></td></tr>";
	$message .= "<tr><td align='right' style='font-size:1em;color:#33'>for support, comments or any question(s) contact our support team <a href='mailto:support@greenboxnigeria.com?subject=Enquiry' target='_new'>support@greenboxnigeria.com</a></td></tr>";
	$message .= "<tr><td align='center' style='font-size:.7em;color:#555'>&copy; 2016 Renegade</td></tr>";
	$message .= "</table></center>";
	$message .= "</body></html>";
	
	mail($to, $subject, $message, $headers);
	}}

	
if($member=='yes'){
	$sqlLOGIN=mysqli_query($cxn, "SELECT * FROM member WHERE memberUsername='$username' LIMIT 1");
	while($row=mysqli_fetch_assoc($sqlLOGIN))
	{extract($row);}
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

<?php if($member!='yes'){ 
	$stagename=trim(htmlspecialchars_decode($stagename));
	$birthname=trim(htmlspecialchars_decode($birthname));
	$genre=trim(htmlspecialchars_decode($genre));
	$birthday=trim(htmlspecialchars_decode($birthday));
	$birthyear=trim(htmlspecialchars_decode($birthyear));
	$placeoforigin=trim(htmlspecialchars_decode($placeoforigin));
	$profession=trim(htmlspecialchars_decode($profession));
	$label=trim(htmlspecialchars_decode($label));
	$bio=trim(htmlspecialchars_decode($bio));
	$pic1=trim(htmlspecialchars_decode($pic1));
	$pic2=trim(htmlspecialchars_decode($pic2));
	$email=trim(htmlspecialchars_decode($email));
	$username=trim(htmlspecialchars_decode($username));?>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2">Member</td></tr><tr><td align="center"><?php if($ezege){echo "<br><br>".$ezege;}?><br><br>
<table cellpadding="10"><tr valign="top"><td width="50%" align="right">Sign In
        <form method="post"><?php echo $login;?>
            <input required type="text" name="username" placeholder="Username" maxlength="20" class="commenter"/><br><br>
            <input required type="password" name="password" placeholder="Password" maxlength="20" class="commenter"/><br><br>
            <input type="hidden" name="new" value="new">
            <input type="submit" value="Sign In" class="commentbutton"/>
        </form><br><br>
</td></tr><tr>
<td align="right">Sign Up
        <form method="post" enctype="multipart/form-data">
        	<input required name="birthname" value="<?php echo $birthname?>" type="text" maxlength="100" placeholder="Birth Name" class="commenter"/><br><br>
            <input required name="stagename" value="<?php echo $stagename?>" maxlength="50" placeholder="Stage Name" class="commenter"/><br><br>
            <div class="file_button_container">
    <table><tr valign="middle"><td id="artstatus">Picture One</td><td><input name="pic1" required value="<?php echo $pic1?>" type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show('art')" id="songart" class="commenter"/></td></tr></table>
    </div><br>
    		<div class="file_button_container">
    <table><tr valign="middle"><td id="filestatus">Picture Two</td><td><input name="pic2" value="<?php echo $pic2?>" required type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show()" id="file" class="commenter"/></td></tr></table>
    </div><br>
            <input required name="genre" value="<?php echo $genre?>" type="text" placeholder="Genre [ Afropop | Raggae ]" maxlength="50" class="commenter"/><br><br>
            <input required name="birthday" value="<?php echo $birthday?>" type="text" placeholder="Birth Day [ March 18 ]" maxlength="15" class="commenter"/><br><br>
            <input required name="birthyear" value="<?php echo $birthyear?>" type="number" placeholder="Birth Year [ 1986 ]" min="1950" max="2020" maxlength="4" class="commenter"/><br><br>
            <input required name="placeoforigin" value="<?php echo $placeoforigin?>" type="text" placeholder="State Of Origin [ Kogi State ]" maxlength="50" class="commenter"/><br><br>
            <input required name="profession" value="<?php echo $profession?>" type="text" placeholder="Profession [ Producer | Singer | Rapper | Instrumentalist ]" maxlength="50" class="commenter"/><br><br>
            <input required name="label" value="<?php echo $label?>" type="text" placeholder="Label/ Group [ Dope Music Group ]" maxlength="50" class="commenter"/><br><br>
            <textarea required name="bio" placeholder="Bio [ Life Story ]" class="comment"><?php echo $bio?></textarea><br><br>
            <input required name="email" value="<?php echo $email?>" type="email"placeholder="Email" maxlength="50" class="commenter"/><br><br>
            <input required type="text" value="<?php echo $username?>" name="username" placeholder="Username" maxlength="20" class="commenter"/><br><br>
            <input required type="password" name="password" placeholder="Password" maxlength="20" class="commenter"/><br><br>
            <input type="hidden" name="new" value="reg">
            <input type="submit" value="Sign Up" class="commentbutton"/>
        </form>
</td></tr></table>

</td></tr></table>

<script>function show(x){
	if(x=='art'){var d =document.getElementById("songart").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 20 ){d=d.substr(0, 20);d=d+'...';}if (d != null){document.getElementById("artstatus").innerHTML = document.getElementById("artstatus").innerHTML= "Picture One.. Loaded - "+d;;}}
	else
	{var d =document.getElementById("file").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 20 ){d=d.substr(0, 20);d=d+'...';}if (d != null){document.getElementById("filestatus").innerHTML = document.getElementById("filestatus").innerHTML= "Picture Two.. Loaded - "+d;}
	}}
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='Signin or Signup on Greenboxnigeria.com';
	_id('description').content='Become a member';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}
</script><?php }else{
	$stagename=trim(htmlspecialchars_decode($stagename));
	$birthname=trim(htmlspecialchars_decode($birthname));
	$genre=trim(htmlspecialchars_decode($genre));
	$birthday=trim(htmlspecialchars_decode($birthday));
	$birthyear=trim(htmlspecialchars_decode($birthyear));
	$placeoforigin=trim(htmlspecialchars_decode($placeoforigin));
	$profession=trim(htmlspecialchars_decode($profession));
	$label=trim(htmlspecialchars_decode($label));
	$bio=trim(htmlspecialchars_decode($bio));
	$pic1=trim(htmlspecialchars_decode($pic1));
	$pic2=trim(htmlspecialchars_decode($pic2));
	$email=trim(htmlspecialchars_decode($email));
 $sql = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName='$memberStageName' AND personCareerStartYear='5000' LIMIT 1");
while($row=mysqli_fetch_assoc($sql))
	{extract($row);}
echo "<table align='center' style=' width:;background:url(personsimg/$personPic2) center top no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:700px; position:fixed; z-index:-2;opacity:.7;'><tr><td>
</td></tr></table><br>
<table align='center' style=' height:400px;top:10px; left:0; right:0;width:95%;'><tr><td align='center'><div style='padding:10px; border-radius:50%;background:url(personsimg/$personPic2) center no-repeat;background-size:cover; width:200px; height:200px;border:thick #333 solid'></div></td></tr>
<tr><td align='center'>
<div style='padding:0 0 0 10px;font-size:3em'>$personStageName</div>
<div style='padding:0 0 0 10px;color:#00E676'>$personProfession1
";if($personProfession2){echo " | ".$personProfession2;}
if($personProfession3){echo " | ".$personProfession3;}
if($personProfession4){echo " | ".$personProfession4;}echo"</div>

<div style='padding:0 0 0 10px;'>$personLabel</div></td>
</tr></table>";
$sqls1 = mysqli_query($cxn, "select * from copy where copySong = 'person $personStageName'") or die('xxx2');
$shares = mysqli_num_rows($sqls1);
$sqls2 = mysqli_query($cxn, "select DISTINCT copyUserIP from copy where copySong = 'person $personStageName'") or die('xxx2');
$shares2 = mysqli_num_rows($sqls2);?><br>
<table><tr><td align="right"><span class="pagination" onClick="linked('songupload')">Upload Music</span><span class="pagination" onClick="linked('editprofile')">Edit Profile</span><a href="member.php?status=signout"><span class="pagination">Sign Out</span></a>
</td></tr></table><br>
<div style='width:95%; padding:20px;'><table><tr>
<td>Shares <div class="share"><?php echo $shares//."</div><div class='share'> by ".$shares2 ?></div></td>
<td align="centr">
<div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('facebook', 'http://www.facebook.com/sharer.php?u=gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>')"></div>
<div style="background:url(images/tt.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('twitter', 'https://twitter.com/intent/tweet?url=gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>&text=<?php echo $personStageName ?> on GreenboxNigeria.com&via=greenboxnigeria&hashtags=greenboxnigeria')"></div>
<div style="background:url(images/in.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('linkedin', 'http://linkedin.com/shareArticle?url=gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>&title=<?php echo $personStageName ?> via GreenboxNigeria.com')"></div>
<div style="background:url(images/gg.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('google', 'http://plus.google.com/share?url=gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>')"></div>
<div style="background:url(images/pi.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('pinterest', 'https://pinterest.com/pin/create/bookmarklet/?media=gbngr.com/personsimg/<?php echo $personPic1?>&url=gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>&is_video=false&description=<?php echo substr_replace($personLifeStory,'...',55)?>')"></div>
<div style="background:url(images/tb.png) center no-repeat;background-size:cover;width:30px;height:30px; display:inline-block" onClick="share('tumblr', 'http://www.tumblr.com/widgets/share/tool?canonicalUrl=gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>&title=<?php echo $personStageName ?> on GreenboxNigeria.com&caption=<?php echo substr_replace($personLifeStory,'...',55)?>')"></div>
<span class="pagination" onclick="copyToClipboard('gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>')">Link</span>
</td></tr></table></div>
<table><tr><td align="center">
<?php $x=date('Y');
if($personBirthName){echo"<div style='color:#00E676'>Birth Name:</div>$personBirthName";}
if($personBirthDay){echo"<div style='color:#00E676'>Birthday:</div>$personBirthDay";}
if($personBirthYear){echo"<div style='color:#00E676'>Age:</div>";echo $x-$personBirthYear." Years";}
if($personPlaceOfOrigin){echo"<div style='color:#00E676'>State Of Origin:</div>$personPlaceOfOrigin";}
if($personGenre){echo"<div style='color:#00E676'>Genre:</div>$personGenre";}?>
</td></tr></table>
<?php $sql = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtist='$personStageName' OR songProducer='$personStageName' LIMIT 5");
if(mysqli_num_rows($sql)>0){?>
<table class="fresh" align="center"><tr><td style="padding:10px">Songs</td></tr><tr><td align="center">
<table><tr>
<?php
while($row=mysqli_fetch_assoc($sql))
	{extract($row);echo"
<td><a href='musicpreview.php?t=$songID'><table class='freshtable' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'><tr><td class='freshart'></td></tr>
<tr><td class='freshlabel'>";echo htmlspecialchars_decode($songTitle);echo "<div class='freshartist'>";echo htmlspecialchars_decode($songArtist);echo "</div></td></tr></table></a></td>";}
?>
</tr></table>
</td></tr><tr><td colspan='5'><a href='musiclist.php?t=<?php echo htmlspecialchars_decode($songArtist)?>&c=artist'><div class='seemore'>see more</div></a></td></tr></table>
<?php }?>
<?php $sql = mysqli_query ($cxn, "SELECT DISTINCT songAlbum FROM songs WHERE songAlbum NOT IN ('single','mixetape','cover') AND (songArtist='$personStageName' OR songProducer='$personStageName')  ORDER BY songAlbum ASC LIMIT 5");
if(mysqli_num_rows($sql)>0){?>
<table class='fresh' align='center'><tr><td style='padding:10px'>Albums</td></tr><tr><td align='center'>
<table><tr>
<?php while($row=mysqli_fetch_assoc($sql)){extract($row);
$sql2=mysqli_query($cxn, "SELECT * FROM songs WHERE songAlbum='$songAlbum' LIMIT 1");
while($row=mysqli_fetch_assoc($sql2)){
	extract($row);echo"
<td><a href='albumpreview.php?t=$songAlbum'><table class='freshtable' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'><tr><td class='freshart'></td></tr>
<tr><td class='freshlabel1'>".htmlspecialchars_decode($songAlbum)."</td></tr></table></a></td>";}}?>
</tr></table>
</td></tr><tr><td colspan='5'><a href=''><div class='seemore'>see more</div></a></td></tr></table>
<?php }
$sql3 = mysqli_query ($cxn, "SELECT * FROM songs WHERE songArtistFt LIKE '% $personStageName %' LIMIT 5");
if(mysqli_num_rows($sql3)>0){?>
<table class="fresh" align="center"><tr><td style="padding:10px">Featured</td></tr><tr><td align="center">
<table><tr>
<?php
while($row=mysqli_fetch_assoc($sql3))
	{extract($row);echo"
<td><a href='musicpreview.php?t=$songID'><table class='freshtable' style='background:url(songsimg/$songArt) #222 center no-repeat; background-size:cover'><tr><td class='freshart'></td></tr>
<tr><td class='freshlabel'>";echo htmlspecialchars_decode($songTitle);echo "<div class='freshartist'>";echo htmlspecialchars_decode($songArtist);echo "</div></td></tr></table></a></td>";}
?>
</tr></table>
</td></tr><tr><td colspan="5"><a href='musiclist.php?t=<?php echo $songArtist?>&c=artistFt'><div class="seemore">see more</div></a></td></tr></table>
  </td></tr></table>
<?php } $sql4 = mysqli_query ($cxn, "SELECT * FROM videos WHERE videoTitle LIKE '% $personStageName %' OR videoArtist LIKE '% $personStageName %' OR videoArtistFt LIKE '% $personStageName %' OR videoDirector LIKE '% $personStageName %' ORDER BY videoTitle ASC LIMIT 4");
if(mysqli_num_rows($sql4)>0){?>
<table class="tab1"><tr><td class="tabheader2">Videos</td></tr><tr><td align="center">
<table class="fresh" align="center"><tr>
<?php while($row=mysqli_fetch_assoc($sql4))
	{extract($row);echo"<td><a href='video.php?videoID=$videoID'>
<table class='videotable' style='background:url(videosimg/$videoPic) #222 center no-repeat; background-size:cover'><tr><td class='videoart'></td></tr>
<tr><td class='videoname'>$videoTitle<div class='videoartist'>$videoArtist</div></td></tr></table></a>";}?>
</tr></table>
</td></tr></table>
<?php }?>
</td></tr></table>

<br>
<table><tr><td align="center"><div class="blogwriteup;font-size:1em;"><?php echo htmlspecialchars_decode($personLifeStory)?></div><br></td></tr></table>
<script>
function _id(el){return top.document.getElementById(el);}
function _classhere(el){return document.getElementsByClassName(el)[0];}
function share(where, url) {
	_id("service").src = "services/stats.php?copy=person&person=<?php echo $personStageName ?>";
	_classhere('share').innerHTML++;
	window.open(url, '_blank')}
function copyToClipboard(text, id) {
    window.prompt("Copy to clipboard: Ctrl+C, Enter", "gbngr.com/archive/person-<?php echo str_replace(' ', '-', $personStageName);?>");
	_id("service").src = "services/stats.php?copy=person&person=<?php echo $personStageName ?>";
	_classhere('share').innerHTML++;}
window.onload = function() {
  	_id('title1').innerHTML='<?php echo $personStageName ?> on GreenboxNigeria.com';
	_id('description').content='Preview <?php echo substr_replace($personLifeStory,'...',55); ?>';
	_id('keywords').content='latest Nigerian music news, fresh Nigerian music news, new Nigerian music news, Nigerian music news, Nigerian songs news, Nigerian tracks';}
</script><?php }?>
</td></tr></table>
<script src="scirpt/mob_links.js"></script>
</body>
</html>
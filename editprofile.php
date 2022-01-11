<?php include("rab_dbcon.php"); extract($_POST);
$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$anonymous','$userIP','edit profile',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");

if($member=='yes'){
 $sql = mysqli_query ($cxn, "SELECT * FROM persons WHERE personStageName='$memberStageName' AND personCareerStartYear='5000' LIMIT 1");
 while($row=mysqli_fetch_assoc($sql))
	{extract($row);}

if($new=='edit'){
	mysqli_query($cxn, "UPDATE persons SET personBirthName='$birthname', personStageName='$stagename', personGenre='$genre', personProfession1='$profession', personLabel='$label', personLifeStory='$bio' WHERE personID='$personID' ") or die("tell me all");
	mysqli_query($cxn, "UPDATE member SET memberStageName='$stagename' WHERE memberStageName='$personStageName' ") or die("tell me all");

if($_FILES["personPic1"]["name"]!=''){
	$art1 = "art_".str_replace(' ', '-', $personStageName)."1.png";
	move_uploaded_file($_FILES["personPic1"]["tmp_name"], "personsimg/$art1");
	mysqli_query($cxn, "UPDATE persons SET personPic1='$art1' WHERE personID='$personID' ") or die("tell me Pic1");
	}
if($_FILES["personPic2"]["name"]!=''){
	$art2 = "art_".str_replace(' ', '-', $personStageName)."2.png";
	move_uploaded_file($_FILES["personPic2"]["tmp_name"], "personsimg/$art2");
	mysqli_query($cxn, "UPDATE persons SET personPic2='$art2' WHERE personID='$personID' ") or die("tell me Pic2");
	}
	$_SESSION['memberStageName']=$stagename;
echo"<script>top.document.getElementsByTagName('iframe')[1].src='member.php' </script>";
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
<?php echo"<table align='center' style=' width:;background:url(personsimg/$personPic2) center top no-repeat; background-size:cover;-webkit-filter: blur(10px);  -moz-filter: blur(10px);  -o-filter: blur(10px);  -ms-filter: blur(10px);  filter: blur(10px); top:10px; left:0; right:0; height:600px; position:fixed; z-index:-2'><tr><td>
</td></tr></table>";?>
<table style="background:url(images/body_bg.png) right bottom repeat-x;-moz-background-size:100px 100px;background-size:100px 100px;" class="tab1"><tr><td class="tabheader2">Edit Profile</td></tr><tr><td align="center">
<br><br>
	<form method="post" enctype="multipart/form-data">
    <input autofocus required name="birthname" value="<?php echo $personBirthName?>" type="text" maxlength="100" placeholder="Birth Name" class="commenter"/><br><br>
    <input required name="stagename" value="<?php echo $personStageName?>" maxlength="50" placeholder="Stage Name" class="commenter"/><br><br>
    <div class="file_button_container">
<table><tr valign="middle"><td id="artstatus">Picture One</td><td><input name="personPic1" type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show('art')" id="songart" class="commenter"/></td></tr></table>
</div><br>
    <div class="file_button_container">
<table><tr valign="middle"><td id="filestatus">Picture Two</td><td><input name="personPic2" type="file" accept="image/jpeg, image/x-png, image/gif, image/bmp, image/gif, image/jpeg, image/png" onChange="show()" id="file" class="commenter"/></td></tr></table>
</div><br>
    <input required name="genre" value="<?php echo $personGenre?>" type="text" placeholder="Genre [Afropop, Raggae]" maxlength="50" class="commenter"/><br><br>
    <input required name="profession" value="<?php echo $personProfession1?>" type="text" placeholder="Profession [Producer, Singer And Rapper]" maxlength="50" class="commenter"/><br><br>
	<input required name="label" value="<?php echo $personLabel?>" type="text" placeholder="Label/ Group [Dope Music Group]" maxlength="50" class="commenter"/><br><br>
	<textarea required name="bio" placeholder="Life Story [Bio]" class="comment"><?php echo $personLifeStory?></textarea><br><br>
            <input type="hidden" name="new" value="edit">
    <input type="submit" value="Edit" class="commentbutton"/>
    </form>
<script>function show(x){
	if(x=='art'){var d =document.getElementById("songart").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 25 ){d=d.substr(0, 25);d=d+'...';}if (d != null){document.getElementById("artstatus").innerHTML = document.getElementById("artstatus").innerHTML= "Picture One.. Loaded - "+d;;}}
	else
	{var d =document.getElementById("file").value;	d=d.replace(/.*[\/\\]/, '');	if(d.length > 25 ){d=d.substr(0, 25);d=d+'...';}if (d != null){document.getElementById("filestatus").innerHTML = document.getElementById("filestatus").innerHTML= "Picture Two.. Loaded - "+d;}
	}}</script>
<br><br>
</td></tr></table>
<script src="scirpt/mob_links.js"></script>
</body>
</html>
<?php }else{header("Location: member.php");}?>
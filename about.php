<?php include("rab_dbcon.php");
$today = date("Y-m-d"); 
			$result = mysqli_query($cxn, "INSERT INTO  anonymous(anonymousID,anonymousName,anonymousIP,anonymousRating,anonymousDownload,anonymousFrom,anonymousPlatform,anonymousDevice,anonymousRegDate)VALUES (NULL,'$commenter','$userIP','about',NULL,'$anonymousFrom','$anonymousPlatform','$anonymousDevice','$today')") or die("Couldn't execute insert query anon.56");?>
<!DOCTYPE html><html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/mob_cascade.css" rel="stylesheet" type="text/css"/>
<link href="style/mob_day.css" rel="stylesheet" type="text/css"/>
</head>
<body onLoad="aboutbox('greenbox')">
<table><tr><td style="width:auto;">
</td><td style="width:750px">
<table><tr><td align="right"><div style="background:url(images/body_wall.png) center no-repeat;background-size:cover;width:200px;height:200px"></div></td></tr></table>
<fieldset>
    <legend>About</legend>    
    <table><tr>
    <td class="tag" width="20%" onClick="aboutbox('greenbox')">Greenbox Nigeria</td>
    <td class="tag" width="20%" onClick="aboutbox('music')">Nigerian Music</td>
    <td class="tag" width="20%" onClick="aboutbox('terms')">Terms of Service</td>
    <td class="tag" width="20%" onClick="aboutbox('advert')">Advertise</td>
    <td class="tag" width="20%" onClick="aboutbox('help')">Help</td></tr></table>
    
<br><div class='blogwriteup' id="aboutbox"></div><br>

</fieldset>
<fieldset>
    <legend>Contact</legend>    
    <table><tr><td>
    <table style="width:200px;height:0px"><tr><td>Greenbox Nigeria Official<br><a href="mailto:info@greenboxnigeria.com?subject=Enquiry" target="_new">info@greenboxnigeria.com</a><br><a href="mailto:info@greenboxnigeria.com?subject=Enquiry" target="_new">support@greenboxnigeria.com</a></td></tr></table>
    <table style="width:200px;height:0px; margin-top:20px"><tr>
    <td title="Facebook"><a target="_blank" href="https://www.facebook.com/Greenbox-Nigeria-1032329466862501/"><div style="background:url(images/fb.png) center no-repeat;background-size:cover;width:30px;height:30px"></div></a></td>
    <td title="Twitter"><a target="_blank" href="https://twitter.com/GreenboxNigeria"><div style="background:url(images/tt.png) center no-repeat;background-size:cover;width:30px;height:30px"></div></a></td>
    <td title="Google+"><a target="_blank" href="https://plus.google.com/u/0/101846096960635449425"><div style="background:url(images/gg.png) center no-repeat;background-size:cover;width:30px;height:30px"></div></a></td>
    <td title="LinkedIn"><a target="_blank" href="https://www.linkedin.com/company/greenbox-nigeria"><div style="background:url(images/in.png) center no-repeat;background-size:cover;width:30px;height:30px"></div></a></td>
    <td title="Instagram"><a target="_blank" href="https://www.instagram.com/greenboxnigeria/"><div style="background:url(images/ig.png) center no-repeat;background-size:cover;width:30px;height:30px"></div></a></td></tr></table>
    
    </td></tr><tr><td><br><br>
    <table style="width:200px;height:0px"><tr><td>soft<br><a href="mailto:soft@greenboxnigeria.com?subject=Enquiry" target="_new">soft@greenboxnigeria.com</a><br>+234 (0) 8050634922</td></tr></table>
    <table style="width:200px;height:0px"><tr><td>Madu<br><a href="mailto:madu@greenboxnigeria.com?subject=Enquiry" target="_new">madu@greenboxnigeria.com</a><br>+234 (0) 8111813312</td></tr></table>
    </td></tr></table>
    
<br>

</fieldset>
</td><td style="width:auto">
</td></tr></table>
<script src="scirpt/mob_links.js"></script>
<script>
aboutbox('greenbox');
function _id(el){return top.document.getElementById(el);}
window.onload = function() {
  	_id('title1').innerHTML='About GreenboxNigeria.com';
	_id('description').content='Learn About Nigerian Music Industry and Greenbox Nigeria';
	_id('keywords').content='About, Terms  of Service, Advert/Publicity, Help';}
</script>
</body>
</html>
<?php include("../rab_dbcon.php"); 
$fileName="greenbox.mp3";
$fileTmpLoc = $_FILES["file"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file"]["type"]; // The type of file it is
$fileSize = $_FILES["file"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file"]["error"]; // 0 for false... and 1 for true
mysqli_query($cxn, "INSERT INTO songs (songID, songTitle, songArtist, songArtistFt, songAlbum, songArt, songProducer, songBeatmaker, songLenght, songType, songSize, songURL, songGenre, songDescription, songYear, songLanguage, songRating, songDownload, songPlay, dateUpdated) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$fileName', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)") or die('ko werk');
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}
if(move_uploaded_file($fileTmpLoc, "../songs/$fileName")){
    echo "Song upload is complete";
	
} else {
    echo "move_uploaded_file function failed";
}
?>
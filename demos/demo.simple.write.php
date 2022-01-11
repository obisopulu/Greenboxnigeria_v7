<?php
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
//          also https://github.com/JamesHeinrich/getID3       //
/////////////////////////////////////////////////////////////////
//                                                             //
// /demo/demo.simple.write.php - part of getID3()              //
// Sample script showing basic syntax for writing tags         //
// See readme.txt for more details                             //
//                                                            ///
/////////////////////////////////////////////////////////////////



$TextEncoding = 'UTF-8';

require_once('../getid3/getid3.php');
// Initialize getID3 engine
$getID3 = new getID3;
$getID3->setOption(array('encoding'=>$TextEncoding));

require_once('../getid3/write.php');
// Initialize getID3 tag-writing module
$tagwriter = new getid3_writetags;
//$tagwriter->filename = '/path/to/file.mp3';
$tagwriter->filename = '../songs/Brymo_Go_Hard.mp3';

//$tagwriter->tagformats = array('id3v1', 'id3v2.3');
$tagwriter->tagformats = array('id3v2.3');

// set various options (optional)
$tagwriter->overwrite_tags    = true;  // if true will erase existing tag data and write only passed data; if false will merge passed data with existing tag data (experimental)
$tagwriter->remove_other_tags = false; // if true removes other tag formats (e.g. ID3v1, ID3v2, APE, Lyrics3, etc) that may be present in the file and only write the specified tag format(s). If false leaves any unspecified tag formats as-is.
$tagwriter->tag_encoding      = $TextEncoding;
$tagwriter->remove_other_tags = true;

// populate data array
$TagData = array(
	'title'                  => array("$title [ gbngr.com ]"),
	'artist'                 => array("$personStageName"),
	'album'                  => array('Single'),
	'year'                   => array("$y"),
	'genre'                  => array("$genre"),
	'comment'                => array('Discover the Nigerian Music Industry on... Greenbox Nigeria'),
	'publisher'                => array('Greenbox Nigeria'),
	'encoded_by'                => array('soft!'),
	'webpage'                => array('www.greenboxnigeria.com!'),
	'copyright'                => array("&copy; $y 2016"),
	'track'                  => array('01/01'),
	'popularimeter'          => array('email'=>'info@greenboxnigeria.com', 'rating'=>255, 'data'=>0),
	'unique_file_identifier' => array('ownerid'=>'info@greenboxnigeria.com', 'data'=>md5(time())),
);
$tagwriter->tag_data = $TagData;

// write tags
if ($tagwriter->WriteTags()) {
	echo 'Successfully wrote tags<br>';
	if (!empty($tagwriter->warnings)) {
		echo 'There were some warnings:<br>'.implode('<br><br>', $tagwriter->warnings);
	}
} else {
	echo 'Failed to write tags!<br>'.implode('<br><br>', $tagwriter->errors);
}

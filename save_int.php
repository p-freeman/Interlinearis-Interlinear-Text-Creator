<?php
//Save int

$source_words = $_POST['source_words'];
$target_words = $_POST['target_words'];
$path_to_int_file = $_POST['path_to_int_file'];

/*
echo "<pre>";
print_r($source_words);
echo "</pre>";
echo "<br>";
echo "<br>";
echo "<pre>";
print_r($target_words);
echo "</pre>";
*/

function saveToFile($path_to_file, $content){
$fp = fopen($path_to_file, 'w+');
if (fwrite($fp, $content) !== FALSE){
$saved = true;
} else {
$saved = false;
}
fclose($fp);
return $saved;
}

$complete_int_content = "";
for ($i=0; $i < count($source_words); $i++){
  $complete_int_content .= $source_words[$i];
  $complete_int_content .= "\t";
$complete_int_content .= $target_words[$i];
if ($i != count($source_words)-1)
{
  $complete_int_content .= "\r\n";
}
}

if (saveToFile($path_to_int_file, $complete_int_content) == true){
	echo "saving changes successful";
	} else {
	echo "saving changes not successful";
	}
	
	echo "<br><br>";
	echo '<a href="index.php">Return to the Start Page</a>';



?>
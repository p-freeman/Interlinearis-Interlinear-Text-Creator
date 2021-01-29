<?php


$path_to_int_file = $_GET['path_to_int_file'];

// read int-file into edit-form

//Skeleton

//TODO READ FILE and split into two variables
//$filename = "es.int";
$filename = $path_to_int_file;
$handle = fopen($filename, "r");
$int_file_contents = fread($handle, filesize($filename));
fclose($handle);

/*
echo "<pre>";
print_r($int_file_contents);
echo "</pre>";
*/

//split into lines THEN for esch line split into the two variables/arrays

$lines = explode("\r\n", $int_file_contents);

/*
echo "<pre>";
print_r($lines);
echo "</pre>";
*/

$number_of_lines = count($lines);
for ($i = 0; $i < $number_of_lines; $i++){
	$words_on_current_line = explode('	', $lines[$i]); // exploded by \t
	/*
	echo "printr words on current line:";
	echo "<pre>";
	print_r( $words_on_current_line);
	echo "</pre>";
	echo "source_word7";
	*/
$source_words[] = $words_on_current_line[0];
// echo "target_words7";
	$target_words[] = $words_on_current_line[1];
	
}

/*
echo "<br><br>";
echo "source_words<br>";
echo "<pre>";
print_r($source_words);
echo "</pre>";
*/

/*
echo "target_words<br>";
echo "<pre>";
print_r($target_words);
echo "</pre>";
*/

$number_of_source_words = count($source_words);

/*

<table>
    <tr>
        <th>
        </th>
        <th>
        </th>
    </tr>
    <tr>
        <td>
        </td>
        <td>
        </td>
    </tr>
</table>

*/


$output = '<html>
<head>
<title>Form to create interlinear text</title>
<link rel="stylesheet" type="text/css" href="css/start.css"/>
</head>
<body>
Make no changes and <a href="index.php">return to the Start Page</a> instead.
<br><br>
Number of source-words: '.$number_of_source_words .'
<br><br>

<form method="POST" action="save_int.php">

<table>
    <tr>
        <th>
        	Source-Text
        </th>
        <th>
        	Target-Text
        </th>
    </tr>';
  
for ($i = 0; $i < $number_of_source_words; $i++){
    
  $output .=  '<tr>
        <td>
        	<input type="text" name="source_words[]" value="'.$source_words[$i].'"></input>
        </td>
        <td>
        	<input type="text" name="target_words[]" value="'.$target_words[$i].'"></input>
        </td>
    </tr>';
}
    
$output .= '</table><br/>
<input type="hidden" name="path_to_int_file" value="'.$path_to_int_file.'"/><input type="submit" value="Save Changes"></input>
</form>
</body>
</html>';

echo $output;

?>

<?php

error_reporting(0);

// CRUD, Create, Read, Update, Delete

// example input

$project_names = array("Bonfire Heart", "Higher Ground");
$source_langs = array("en","en");
$target_langs = array("es","es");
$categories = array("Song (with Lyrics)", "Song (with Lyrics)");
$paths_to_projects = array("projects/project1/","projects/project2/");

//TODO replace example input with real-life content by actually scraping/crawling the file-tree/dirs

// ---
// Der Punkt steht für das Verzeichnis, in der auch dieses

// PHP-Programm gespeichert ist

$directory = "projects";

// echo "<ol>";

// Text, ob ein Verzeichnis angegeben wurde

if ( is_dir ( $directory ))

{

 // open the directory

 if ( $handle = opendir($directory) )

 {

 // read the directories

 while (($file = readdir($handle)) !== false)

 {

 	if ($file != "." && $file != ".." && is_dir($directory . "/" . $file) == true ){
 	$project_folders[] = $directory . "/" . $file;
 // echo "<li>Filename: ";
 // echo $file;

// echo "<ul><li>Filetype: ";

 if (is_dir($directory."/".$file)){
 //	echo "dir";
 } elseif (is_file($directory."/".$file)){
 //	echo "file";
}
// echo "</li></ul>\n";

 }
 }
 closedir($handle);

 }

}

// echo "</ol>";

// ---

/*
echo "<pre>";
print_r($project_folders);
echo"</pre>";
*/

// TODO get meta-info about projects from confg.json-files

//TODO change later on, for noe pretend s json-file exists in the project_folders


for ($i = 0; $i < count($project_folders); $i++){
	
$project_config_filename = $project_folders[$i] . "/" . "config.json.txt";

/*
echo $project_config_filename;
echo "<br>";
*/

$handle = fopen($project_config_filename, "r");
$projects_json_file_contents[] = json_decode(fread($handle, filesize($project_config_filename)), true);
fclose($handle);
}

/*
echo "<pre>";
print_r($projects_json_file_contents);
echo"</pre>";
*/

$number_of_projects = count($projects_json_file_contents);

$output = '<!DOCTYPE html>
<html lang="en">
<head>
	<title>Interlinear-Text-Creator: Start</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://getbootstrap.com/docs/4.3/assets/css/docs.min.css">
</head>
<body>';


$output .= "Numer of Projects: $number_of_projects<br>";

//Create New Project-Button
$output .= '<a href="add_project.php">Create New Project</a>';
$output .= "</br>";

//Display List-Table with RUD-Options
//columns:
// Project-name, source-language, target-language, category, action

?>

<!--
<table>
	<tr>
		<th>Project-Title</th>
		<th>Source-Lang</th>
		<th>Target-Lang</th>
		<th>Category</th>
		<th>Action</th>
	</tr>
    <tr>
        <td>Title1</td>
        <td>en</td>
        <td>es</td>
        <td>Song (with Lyrics)</td>
        <td><a href="open.php?path_to_folder=0">Open</a> <a href="edit.php?path_to_folder=0">Edit</a> <a href="delete.php?path_to_folder=0">Delete</a></td>
    </tr>
</table>
-->
	
<?php

if ($number_of_projects != null){
	
$output .= '<table>
	<tr>
		<th>Project-Name</th>
		<th>Source-Lang</th>
		<th>Target-Lang</th>
		<th>Category</th>
		<th>Action</th>
	</tr>';

for ($i = 0; $i < $number_of_projects; $i++){

  $output .=  '<tr>
        <td>'. $projects_json_file_contents[$i]['project_name'] .'</td>
        <td>'. $projects_json_file_contents[$i]['source_lang'] .'</td>
        <td>'. $projects_json_file_contents[$i]['target_lang'] .'</td>
        <td>'. $projects_json_file_contents[$i]['category'] .'</td>
        <td><a href="project_overview.php?project_name='.$projects_json_file_contents[$i]["project_name"] .'&source_lang='.$projects_json_file_contents[$i]['source_lang'].'&target_lang='.$projects_json_file_contents[$i]['target_lang'].'&category='.$projects_json_file_contents[$i]['category'] .'&path_to_folder=projects/'. $projects_json_file_contents[$i]['project_folder_name'].'/">Open Project</a> <a href="delete.php?project_name='.$projects_json_file_contents[$i]["project_name"].'&source_lang='.$projects_json_file_contents[$i]['source_lang'].'&target_lang='.$projects_json_file_contents[$i]['target_lang'].'&category='. $projects_json_file_contents[$i]['category'] .'&path_to_folder=projects/'. $projects_json_file_contents[$i]['project_folder_name'] .'/">Delete</a></td>';
}
        
$output .= '   </tr>
</table>';

}


$output .= '
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>';

echo $output;
?>
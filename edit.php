<?php
//file maybe not even hsed anymore at all
// Edit Project

$project_name = $_GET['project_name'];
$source_lang = $_GET['source_lang'];
$target_lang = $_GET['target_lang'];
$category = $_GET['category'];
$path_to_folder = $_GET['path_to_folder'];

$filename_to_open = $path_to_folder . "int_". $target_lang .".html";


switch($source_lang){
	case "es":
	    $source_language="Spanish";
	    break;
	case "en":
	    $source_language="English";
	    break;
	case "de":
	    $source_language="German";
	    break;
	default:
	    $source_language = "no source language";
	    break;
	}

switch($target_lang){
	case "es":
	    $target_language="Spanish";
	    break;
	case "en":
	    $target_language="English";
	    break;
	case "de":
	    $target_language="German";
	    break;
	default:
	    $target_language = "no target language";
	    break;
	}
	
echo 'Project-Name: '. $project_name;
echo '<br>';
echo 'Source-Language: '. $source_language;
echo '<br>';
echo 'Target-Language: '. $target_language;
echo '<br>';
echo '<a href="'. $filename_to_open .'">Edit Translation into '.$target_language.'</a>';

?>

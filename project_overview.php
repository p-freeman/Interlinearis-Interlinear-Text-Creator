<?php

// Project-Overview Page

$project_name = $_GET['project_name'];
$source_lang = $_GET['source_lang'];
$target_lang = $_GET['target_lang'];
$category = $_GET['category'];
$path_to_folder = $_GET['path_to_folder'];

$filename_to_open = $path_to_folder . "int_". $target_lang .".html";

$path_to_int_file = $path_to_folder . $target_lang .".int";

$link_to_edit_translation_into_target_lang = "edit_int.php?path_to_int_file=".$path_to_int_file;


//open html-file
//TODO instead of include REDIRECT, otherwise the css and embedded images don't work because the file which is displayed is two folders higher up
// include ($filename_to_open);

//OR this page could be used as an overview-page to this Project instead of just as a redirecting-page, THEN links could be added to the respective files

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
echo '<a href="'. $filename_to_open .'">Open Interlinear Text ('.$source_language.'-'.$target_language.')</a>';
echo '<br>';
echo '<a href="'. $link_to_edit_translation_into_target_lang .'">Edit Translation into '.$target_language.'</a>';
echo '<br>';
echo '<br>';
echo '<a href="index.php">Return to Start Page</a>';



?>

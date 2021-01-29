<?php
//Delete Project

$project_name = $_GET['project_name'];
$source_lang = $_GET['source_lang'];
$target_lang = $_GET['target_lang'];
$category = $_GET['category'];
$path_to_folder = $_GET['path_to_folder'];

$delete_destination = $_GET['delete_destination'];

//===
// Function to delete all files 
// and directories 
function deleteRecursive($str) { 
      
    // Check for files 
    if (is_file($str)) { 
          
        // If it is file then remove by 
        // using unlink function 
        return unlink($str); 
    } 
      
    // If it is a directory. 
    elseif (is_dir($str)) { 
          
        // Get the list of the files in this 
        // directory 
        $scan = glob(rtrim($str, '/').'/*'); 
          
        // Loop through the list of files 
        foreach($scan as $index=>$path) { 
              
            // Call recursive function 
            deleteRecursive($path); 
        } 
          
        // Remove the directory itself 
        return rmdir($str); 
    } 
} 
//===

if (isset($delete_destination) && $delete_destination != "" && is_dir($delete_destination)){
    if (deleteRecursive($delete_destination) == true){
        echo 'Project folder "<u><i>'. $delete_destination .'</i></u>" successfully deleted.';
    } else {
	    echo 'A problem occured when trying to delete the project folder "'. $str .'".';
	}
    echo "<br>";
    echo '<a href="index.php">Return to Start Page</a>';

} else {
echo 'Do you really want to <b>delete</b> the project "<u><i>'. $project_name .'</i></u>"?';
echo "<br>";
echo '(The whole folder "<u><i>'. $path_to_folder .'</i></u>" will be deleted.)';
echo "<br>";
echo "<br>";
echo '<a href="delete.php?delete_destination='. $path_to_folder  .'">Yes, delete the project</a>';
echo "<br>";
echo "<br>";
echo '<a href="index.php">No, return to the Start Page</a>';

}

?>
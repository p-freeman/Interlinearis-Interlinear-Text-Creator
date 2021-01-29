<?php
//this file is maybe not even needed anymore

/*

// Der Punkt steht für das Verzeichnis, in der auch dieses

// PHP-Programm gespeichert ist

$verzeichnis = "projects";

echo "<ol>";

// Text, ob ein Verzeichnis angegeben wurde

if ( is_dir ( $verzeichnis ))

{

   // öffnen des Verzeichnisses

   if ( $handle = opendir($verzeichnis) )

   {

       // einlesen der Verzeichnisses

       while (($file = readdir($handle)) !== false)

       {

            echo "<li>Dateiname: ";
 
            echo $file;

            echo "<ul><li>Dateityp: ";

            echo filetype( $file );

            echo "</li></ul>\n";

         }

         closedir($handle);

     }

}

echo "</ol>";

*/
// Der Punkt steht für das Verzeichnis, in der auch dieses

// PHP-Programm gespeichert ist

$verzeichnis = "projects";

echo "<ol>";

// Text, ob ein Verzeichnis angegeben wurde

if ( is_dir ( $verzeichnis ))

{

   // öffnen des Verzeichnisses

   if ( $handle = opendir($verzeichnis) )

   {

       // einlesen der Verzeichnisses

       while (($file = readdir($handle)) !== false)

       {

            echo "<li>Dateiname: ";
 
            echo $file;

            echo "<ul><li>Dateityp: ";

            echo filetype( $file );

            echo "</li></ul>\n";

            
            if (filetype($file) == "dir"){
            	$paths_t_projects[] = $file;
            }
         }

         closedir($handle);

     }

}

echo "</ol>";

?>
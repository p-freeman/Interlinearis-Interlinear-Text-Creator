<!--variables from form

project_name
source_language
target_language
source_original
source_split
target_split
-->

<?php

error_reporting(0);

function saveToFile($path, $filename, $content){
$fp = fopen("$path"."$filename", 'w+');
if (fwrite($fp, $content) !== FALSE){
	$saved = true;
	} else {
	$saved = false;
	}
fclose($fp);
return $saved;
}

$project_name = $_POST['project_name'];
$song_name = $_POST['song_name'];
$interpret = $_POST['interpret'];
$source_lang = $_POST['source_lang'];
$target_lang = $_POST['target_lang'];
$music_video_url = $_POST['music_video_url'];
$explanation_text_url = $_POST['explanation_text_url'];
$category = $_POST['category'];
$source_original = $_POST['source_original'];
$source_split = $_POST['source_split'];
$target_split = $_POST['target_split'];

  //create folder with name
  $project_folder_name = strtolower(str_replace(" ", "_", $_POST['project_name']));
  mkdir("./projects/$project_folder_name"); 
  
  include "phpqrcode/qrlib.php";

mkdir("projects/".$project_folder_name."/images");
QRcode::png($music_video_url, "projects/".$project_folder_name . '/images/qr_music_video_url.png');
QRcode::png($explanation_text_url, "projects/".$project_folder_name . '/images/qr_explanation_text_url.png');
  
  //save source.txt-file
  saveToFile("projects/".$project_folder_name."/", "source.txt", $source_original);
 // echo("test<br>");

//print_r($source_split);
//create and save the .int-file
//(containing one source-word and one target word per line)
$array_split_source_text = explode("\r\n", $source_split);
//print_r($source_split);
$array_split_target_text = explode("\r\n", $target_split);
$complete_int_content = "";
for ($i=0; $i < count($array_split_source_text); $i++){
//  echo "hello<br>";
  $complete_int_content .= $array_split_source_text[$i];
  $complete_int_content .= "\t";
$complete_int_content .= $array_split_target_text[$i];
if ($i != count($array_split_source_text)-1)
{
  $complete_int_content .= "\r\n";
}
  saveToFile("projects/".$project_folder_name."/", $target_lang.".int", $complete_int_content);
}


//TODO create interlinear .html-file

//split into paragraphs (end of paragraph is marked by \r\n\r\n)

/* $array_of_source_paragraphs = preg_split("/(\r\n){2,}/", $source_split);
print_r($array_of_source_paragraphs); */

//echo "this isl \$source_split:";
//echo "<pre>";
//print_r($source_split);
//echo "</pre>";

$pieces = explode("---", $source_split);
for($i=0; $i <count($pieces); $i++){
	//echo("hello3") ;
	$paragraphs[$i] = explode("\r\n", trim($pieces[$i]));
	}
	//echo "<pre>";
//print_r($paragraphs);
//echo "</pre>";

$pieces_target = explode("---", $target_split);
for($i=0; $i <count($pieces_target); $i++){
	//echo("hello4");
	$paragraphs_target[$i] = explode("\r\n", trim($pieces_target[$i]));
	}
	
	//echo "<pre>";
//print_r($paragraphs_target);
//echo "</pre>";


//For students who already know English:
//student knows english and wants to learn german (target-language = english / source-language = german)
$intro_text_1_en_de = "Music Video of \"".$song_name."\" by ". $interpret;
$intro_text_2_en_de = "How to use this Interlinear Text to learn German";

//student knows english and wants to learn spanish (target-language = english / source-language = spanish)
$intro_text_1_en_es = "Music Video of \"".$song_name."\" by ". $interpret;
$intro_text_2_en_es= "How to use this Interlinear Text to learn Spanish";

//student knows english and wants to learn french (target-language = english / source-language = french)
$intro_text_1_en_fr = "Music Video of \"".$song_name."\" by ". $interpret;
$intro_text_2_en_fr = "How to use this Interlinear Text to learn French";

//student knows english and wants to learn italian (target-language = english / source-language = italian)
$intro_text_1_en_it = "Music Video of \"".$song_name."\" by ". $interpret;
$intro_text_2_en_it = "How to use this Interlinear Text to learn Italian";

//student knows english and wants to learn persian (target-language = english / source-language = persian)
$intro_text_1_en_ps = "Music Video of \"".$song_name."\" by ". $interpret;
$intro_text_2_en_ps = "How to use this Interlinear Text to learn Persian";

//student knows english and wants to learn russian (target-language = english / source-language = russian)
$intro_text_1_en_ru = "Music Video of \"".$song_name."\" by ". $interpret;
$intro_text_2_en_ru = "How to use this Interlinear Text to learn Russian";

//student knows english and wants to learn ukrainian (target-language = english / source-language = ukrainian)
$intro_text_1_en_ua = "Music Video of \"".$song_name."\" by ". $interpret;
$intro_text_2_en_ua = "How to use this Interlinear Text to learn Ukrainian";


//For students who already know French:    
//student knows french and wants to learn german (target-language = french / source-language = german)
$intro_text_1_fr_de = "Vidéo de musique de \"".$song_name."\" de ". $interpret;
$intro_text_2_fr_de = "Comment utiliser ce texte interlinéaire pour apprendre l'allemand";

//student knows french and wants to learn english (target-language = french / source-language = english)
$intro_text_1_fr_en = "Vidéo de musique de \"".$song_name."\" de ". $interpret;
$intro_text_2_fr_en = "Comment utiliser ce texte interlinéaire pour apprendre l'anglais";

//student knows french and wants to learn spanish (target-language = french / source-language = spanish)
$intro_text_1_fr_es = "Vidéo de musique de \"".$song_name."\" de ". $interpret;
$intro_text_2_fr_es = "Comment utiliser ce texte interlinéaire pour apprendre l'espagnol";

//student knows french and wants to learn italian (target-language = french / source-language = italian)
$intro_text_1_fr_it = "Vidéo de musique de \"".$song_name."\" de ". $interpret;
$intro_text_2_fr_it = "Comment utiliser ce texte interlinéaire pour apprendre l'italien";

//student knows french and wants to learn persian (target-language = french / source-language = persian)
$intro_text_1_fr_ps = "Vidéo de musique de \"".$song_name."\" de ". $interpret;
$intro_text_2_fr_ps = "Comment utiliser ce texte interlinéaire pour apprendre le persan";
        
//student knows french and wants to learn russian (target-language = french / source-language = russian)
$intro_text_1_fr_ru = "Vidéo de musique de \"".$song_name."\" de ". $interpret;
$intro_text_2_fr_ru = "Comment utiliser ce texte interlinéaire pour apprendre le russe";

//student knows french and wants to learn ukrainian (target-language = french / source-language = ukrainian)
$intro_text_1_fr_ua = "Vidéo de musique de \"".$song_name."\" de ". $interpret;
$intro_text_2_fr_ua = "Comment utiliser ce texte interlinéaire pour apprendre l'ukrainien";


//For students who already know German:
//student knows german and wants to learn english (target-language = german / source-language = english)
$intro_text_1_de_en = "Musikvideo von \"".$song_name."\" von ". $interpret;
$intro_text_2_de_en = "Wie man diesen Interlinearen Text benutzt um Englisch zu lernen";

//student knows german and wants to learn spanish (target-language = german / source-language = spanish)
$intro_text_1_de_es = "Musikvideo von \"".$song_name."\" von ". $interpret;
$intro_text_2_de_es = "Wie man diesen Interlinearen Text benutzt um Spanisch zu lernen";

//student knows german and wants to learn french (target-language = german / source-language = french)
$intro_text_1_de_fr = "Musikvideo von \"".$song_name."\" von ". $interpret;
$intro_text_2_de_fr = "Wie man diesen Interlinearen Text benutzt um Französisch zu lernen";

//student knows german and wants to learn italian (target-language = german / source-language = italian)
$intro_text_1_de_it = "Musikvideo von \"".$song_name."\" von ". $interpret;
$intro_text_2_de_it = "Wie man diesen Interlinearen Text benutzt um Italienisch zu lernen";

//student knows german and wants to learn persian (target-language = german / source-language = persian)
$intro_text_1_de_ps = "Musikvideo von \"".$song_name."\" von ". $interpret;
$intro_text_2_de_ps = "Wie man diesen Interlinearen Text benutzt um Persisch zu lernen";

//student knows german and wants to learn russian (target-language = german / source-language = russian)
$intro_text_1_de_ru = "Musikvideo von \"".$song_name."\" von ". $interpret;
$intro_text_2_de_ru = "Wie man diesen Interlinearen Text benutzt um Russisch zu lernen";
    
//student knows german and wants to learn ukrainian (target-language = german / source-language = ukrainian)
$intro_text_1_de_ua = "Musikvideo von \"".$song_name."\" von ". $interpret;
$intro_text_2_de_ua = "Wie man diesen Interlinearen Text benutzt um Ukrainisch zu lernen";


//For students who already know Italian:
//student knows italian and wants to learn german (target-language = italian / source-language = german)
$intro_text_1_it_de = "Video musicale di \"".$song_name."\" da ". $interpret;
$intro_text_2_it_de = "Come usare questo testo interlineare per imparare il tedesco";

//student knows italian and wants to learn english (target-language = italian / source-language = english)
$intro_text_1_it_en = "Video musicale di \"".$song_name."\" da ". $interpret;
$intro_text_2_it_en = "Come usare questo testo interlineare per imparare l'inglese";

//student knows italian and wants to learn spanish (target-language = italian / source-language = spanish)
$intro_text_1_it_es = "Video musicale di \"".$song_name."\" da ". $interpret;
$intro_text_2_it_es = "Come usare questo testo interlineare per imparare lo spagnolo";

//student knows italian and wants to learn french (target-language = italian / source-language = french)
$intro_text_1_it_fr = "Video musicale di \"".$song_name."\" da ". $interpret;
$intro_text_2_it_fr = "Come usare questo testo interlineare per imparare il francese";

//student knows italian and wants to learn persian (target-language = italian / source-language = persian)
$intro_text_1_it_ps = "Video musicale di \"".$song_name."\" da ". $interpret;
$intro_text_2_it_ps = "Come usare questo testo interlineare per imparare il persiano";

//student knows italian and wants to learn russian (target-language = italian / source-language = russian)
$intro_text_1_it_ru = "Video musicale di \"".$song_name."\" da ". $interpret;
$intro_text_2_it_ru = "Come usare questo testo interlineare per imparare il russo";

//student knows italian and wants to learn ukrainian (target-language = italian / source-language = ukrainian)
$intro_text_1_it_ua = "Video musicale di \"".$song_name."\" da ". $interpret;
$intro_text_2_it_ua = "Come usare questo testo interlineare per imparare l'ucraino";
    
    
//For students who already know Spanish:
//student knows spanish and wants to learn german (target-language = spanish / source-language = german)    
$intro_text_1_es_de = "Video Musical de \"".$song_name."\" de ". $interpret;
$intro_text_2_es_de = "Cómo usar este texto inter-lineal para aprender alemán.";
    
//student knows spanish and wants to learn english (target-language = spanish / source-language = english)
$intro_text_1_es_en = "Video Musical de \"".$song_name."\" de ". $interpret;
$intro_text_2_es_en = "Cómo usar este texto inter-lineal para aprender inglés.";

//student knows spanish and wants to learn french (target-language = spanish / source-language = french)
$intro_text_1_es_fr = "Video Musical de \"".$song_name."\" de ". $interpret;
$intro_text_2_es_fr = "Cómo usar este texto inter-lineal para aprender francés.";

//student knows spanish and wants to learn italian (target-language = spanish / source-language = italian)
$intro_text_1_es_it = "Video Musical de \"".$song_name."\" de ". $interpret;
$intro_text_2_es_it = "Cómo usar este texto inter-lineal para aprender italiano.";

//student knows spanish and wants to learn persian (target-language = spanish / source-language = persian)
$intro_text_1_es_ps = "Video Musical de \"".$song_name."\" de ". $interpret;
$intro_text_2_es_ps = "Cómo usar este texto inter-lineal para aprender persa.";
    
//student knows spanish and wants to learn russian (target-language = spanish / source-language = russian)    
$intro_text_1_es_ru = "Video Musical de \"".$song_name."\" de ". $interpret;
$intro_text_2_es_ru = "Cómo usar este texto inter-lineal para aprender ruso.";
    
//student knows spanish and wants to learn ukrainian (target-language = spanish / source-language = ukrainian)
$intro_text_1_es_ua = "Video Musical de \"".$song_name."\" de ". $interpret;
$intro_text_2_es_ua = "Cómo usar este texto inter-lineal para aprender ucraniano.";
    
    
//For students who already know Persian:
//student knows persian and wants to learn german (target-language = persian / source-language = german)    
$intro_text_1_ps_de = $interpret ." "."توسط"." ". "\"".$song_name."\" موزیک ویدیو از";
$intro_text_2_ps_de = "نحوه استفاده از این متن بین خطی برای یادگیری آلمانی";

//student knows persian and wants to learn english (target-language = persian / source-language = english) 
$intro_text_1_ps_en= $interpret ." "."توسط"." ". "\"".$song_name."\" موزیک ویدیو از";
$intro_text_2_ps_en = "چگونه از این متن بین خطی برای یادگیری زبان انگلیسی استفاده کنیم";

//student knows persian and wants to learn spanish (target-language = persian / source-language = spanish) 
$intro_text_1_ps_es = $interpret ." "."توسط"." ". "\"".$song_name."\" موزیک ویدیو از";
$intro_text_2_ps_es = "نحوه استفاده از این متن بین خطی برای یادگیری اسپانیایی";

//student knows persian and wants to learn french (target-language = persian / source-language = french)
$intro_text_1_ps_fr = $interpret ." "."توسط"." ". "\"".$song_name."\" موزیک ویدیو از";
$intro_text_2_ps_fr = "نحوه استفاده از این متن بین خطی برای یادگیری زبان فرانسه";
    
//student knows persian and wants to learn italian (target-language = persian / source-language = italian)
$intro_text_1_ps_it = $interpret ." "."توسط"." ". "\"".$song_name."\" موزیک ویدیو از";
$intro_text_2_ps_it = "نحوه استفاده از این متن بین خطی برای یادگیری ایتالیایی";

//student knows persian and wants to learn russian (target-language = persian / source-language = russian)
$intro_text_1_ps_ru = $interpret ." "."توسط"." ". "\"".$song_name."\" موزیک ویدیو از";
$intro_text_2_ps_ru = "نحوه استفاده از این متن بین خطی برای یادگیری روسی";
    
//student knows persian and wants to learn ukrainian (target-language = persian / source-language = ukrainian)
$intro_text_1_ps_ua = $interpret ." "."توسط"." ". "\"".$song_name."\" موزیک ویدیو از";
$intro_text_2_ps_ua = "نحوه استفاده از این متن بین خطی برای یادگیری زبان اوکراینی";
    

//For students who already know Russian:
//student knows russian and wants to learn german (target-language = russian / source-language = german)
$intro_text_1_ru_de = "музыкальное видео \"".$song_name."\" от ". $interpret;
$intro_text_2_ru_de = "Как использовать этот подстрочный текст для изучения немецкого языка";

//student knows russian and wants to learn english (target-language = russian / source-language = english)
$intro_text_1_ru_en = "музыкальное видео \"".$song_name."\" от ". $interpret;
$intro_text_2_ru_en = "Как использовать этот подстрочный текст для изучения английского языка";

//student knows russian and wants to learn spanish (target-language = russian / source-language = spanish)
$intro_text_1_ru_es = "музыкальное видео \"".$song_name."\" от ". $interpret;
$intro_text_2_ru_es = "Как использовать этот подстрочный текст для изучения испанского языка";

//student knows russian and wants to learn french (target-language = russian / source-language = french)
$intro_text_1_ru_fr = "музыкальное видео \"".$song_name."\" от ". $interpret;
$intro_text_2_ru_fr = "Как использовать этот подстрочный текст для изучения французского языка";
    
//student knows russian and wants to learn italian (target-language = russian / source-language = italian)
$intro_text_1_ru_it = "музыкальное видео \"".$song_name."\" от ". $interpret;
$intro_text_2_ru_it = "Как использовать этот подстрочный текст для изучения итальянского языка";

//student knows russian and wants to learn persian (target-language = russian / source-language = persian)
$intro_text_1_ru_ps = "музыкальное видео \"".$song_name."\" от ". $interpret;
$intro_text_2_ru_ps = "Как использовать этот подстрочный текст для изучения персидского языка";

//student knows russian and wants to learn ukrainian (target-language = russian / source-language = ukrainian)
$intro_text_1_ru_ua = "музыкальное видео \"".$song_name."\" от ". $interpret;
$intro_text_2_ru_ua = "Как использовать этот подстрочный текст для изучения украинского языка";

    
//For students who already know Ukrainian:
//student knows ukrainian and wants to learn german (target-language = ukrainian / source-language = german)
$intro_text_1_ua_de = "музичне відео від \"".$song_name."\" від ". $interpret;
$intro_text_2_ua_de = "Як використовувати цей міжрядковий текст для вивчення німецької мови.";

//student knows ukrainian and wants to learn english (target-language = ukrainian / source-language = english)
$intro_text_1_ua_en = "музичне відео від \"".$song_name."\" від ". $interpret;
$intro_text_2_ua_en = "Як використовувати цей міжрядковий текст для вивчення англійської мови.";

//student knows ukrainian and wants to learn spanish (target-language = ukrainian / source-language = spanish)
$intro_text_1_ua_es = "музичне відео від \"".$song_name."\" від ". $interpret;
$intro_text_2_ua_es = "Як використовувати цей міжрядковий текст для вивчення іспанської мови";

//student knows ukrainian and wants to learn french (target-language = ukrainian / source-language = french)
$intro_text_1_ua_fr = "музичне відео від \"".$song_name."\" від ". $interpret;
$intro_text_2_ua_fr = "Як використовувати цей міжрядковий текст для вивчення французької мови";

//student knows ukrainian and wants to learn italian (target-language = ukrainian / source-language = italian)
$intro_text_1_ua_it = "музичне відео від \"".$song_name."\" від ". $interpret;
$intro_text_2_ua_it = "Як використовувати цей міжрядковий текст для вивчення італійської мови";
    
//student knows ukrainian and wants to learn persian (target-language = ukrainian / source-language = persian)
$intro_text_1_ua_ps = "музичне відео від \"".$song_name."\" від ". $interpret;
$intro_text_2_ua_ps = "Як використовувати цей міжрядковий текст для вивчення перської мови";

//student knows ukrainian and wants to learn russian (target-language = ukrainian / source-language = russian)
$intro_text_1_ua_ru = "музичне відео від \"".$song_name."\" від ". $interpret;
$intro_text_2_ua_ru = "Як використовувати цей міжрядковий текст для вивчення російської мови";

    
switch($target_lang){
    case "de": //German = Target Language (for speakers of German)
	switch ($source_lang){
	     case "en":
	        $intro_text_1 = $intro_text_1_de_en;
            $intro_text_2 = $intro_text_2_de_en;
	     break;
	     case "es":
	        $intro_text_1 = $intro_text_1_de_es;
            $intro_text_2 = $intro_text_2_de_es;
	     break;
         case "fr":
	        $intro_text_1 = $intro_text_1_de_fr;
            $intro_text_2 = $intro_text_2_de_fr;
	     break;
         case "it":
	        $intro_text_1 = $intro_text_1_de_it;
            $intro_text_2 = $intro_text_2_de_it;
	     break;
         case "ps":
	        $intro_text_1 = $intro_text_1_de_ps;
            $intro_text_2 = $intro_text_2_de_ps;
	     break;
         case "ru":
	        $intro_text_1 = $intro_text_1_de_ru;
            $intro_text_2 = $intro_text_2_de_ru;
	     break;
         case "ua":
	        $intro_text_1 = $intro_text_1_de_ua;
            $intro_text_2 = $intro_text_2_de_ua;
	     break;
		}
	break;
	case "en": //English = Target Language (for speakers of English)
	  switch ($source_lang){
	     case "de":
	        $intro_text_1 = $intro_text_1_en_de;
            $intro_text_2 = $intro_text_2_en_de;
	     break;
	     case "es":
	        $intro_text_1 = $intro_text_1_en_es;
            $intro_text_2 = $intro_text_2_en_es;
	     break;
         case "fr":
	        $intro_text_1 = $intro_text_1_en_fr;
            $intro_text_2 = $intro_text_2_en_fr;
	     break;
         case "it":
	        $intro_text_1 = $intro_text_1_en_it;
            $intro_text_2 = $intro_text_2_en_it;
	     break;
         case "ps":
	        $intro_text_1 = $intro_text_1_en_ps;
            $intro_text_2 = $intro_text_2_en_ps;
	     break;
         case "ru":
	        $intro_text_1 = $intro_text_1_en_ru;
            $intro_text_2 = $intro_text_2_en_ru;
	     break;
         case "ua":
	        $intro_text_1 = $intro_text_1_en_ua;
            $intro_text_2 = $intro_text_2_en_ua;
	     break;
		}
	break;
	case "es": //Spanish = Target Language (for speakers of Spanish)
	  switch ($source_lang){
	     case "de":
	        $intro_text_1 = $intro_text_1_es_de;
            $intro_text_2 = $intro_text_2_es_de;
	     break;
	     case "en":
	        $intro_text_1 = $intro_text_1_es_en;
            $intro_text_2 = $intro_text_2_es_en;
	     break;
         case "fr":
	        $intro_text_1 = $intro_text_1_es_fr;
            $intro_text_2 = $intro_text_2_es_fr;
	     break;
         case "it":
	        $intro_text_1 = $intro_text_1_es_it;
            $intro_text_2 = $intro_text_2_es_it;
	     break;
         case "ps":
	        $intro_text_1 = $intro_text_1_es_ps;
            $intro_text_2 = $intro_text_2_es_ps;
	     break;
         case "ru":
	        $intro_text_1 = $intro_text_1_es_ru;
            $intro_text_2 = $intro_text_2_es_ru;
	     break;
         case "ua":
	        $intro_text_1 = $intro_text_1_es_ua;
            $intro_text_2 = $intro_text_2_es_ua;
	     break;
		}
	break;
    case "fr": //French = Target Language (for speakers of French)
	  switch ($source_lang){
	     case "de":
	        $intro_text_1 = $intro_text_1_fr_de;
            $intro_text_2 = $intro_text_2_fr_de;
	     break;
	     case "en":
	        $intro_text_1 = $intro_text_1_fr_en;
            $intro_text_2 = $intro_text_2_fr_en;
	     break;
         case "es":
	        $intro_text_1 = $intro_text_1_fr_es;
            $intro_text_2 = $intro_text_2_fr_es;
	     break;
         case "it":
	        $intro_text_1 = $intro_text_1_fr_it;
            $intro_text_2 = $intro_text_2_fr_it;
	     break;
         case "ps":
	        $intro_text_1 = $intro_text_1_fr_ps;
            $intro_text_2 = $intro_text_2_fr_ps;
	     break;
         case "ru":
	        $intro_text_1 = $intro_text_1_fr_ru;
            $intro_text_2 = $intro_text_2_fr_ru;
	     break;
         case "ua":
	        $intro_text_1 = $intro_text_1_fr_ua;
            $intro_text_2 = $intro_text_2_fr_ua;
	     break;
		}
	break;
    case "it": //Italian = Target Language (for speakers of Italian)
	  switch ($source_lang){
	     case "de":
	        $intro_text_1 = $intro_text_1_it_de;
            $intro_text_2 = $intro_text_2_it_de;
	     break;
	     case "en":
	        $intro_text_1 = $intro_text_1_it_en;
            $intro_text_2 = $intro_text_2_it_en;
	     break;
         case "es":
	        $intro_text_1 = $intro_text_1_it_es;
            $intro_text_2 = $intro_text_2_it_es;
	     break;
         case "fr":
	        $intro_text_1 = $intro_text_1_it_fr;
            $intro_text_2 = $intro_text_2_it_fr;
	     break;
         case "ps":
	        $intro_text_1 = $intro_text_1_it_ps;
            $intro_text_2 = $intro_text_2_it_ps;
	     break;
         case "ru":
	        $intro_text_1 = $intro_text_1_it_ru;
            $intro_text_2 = $intro_text_2_it_ru;
	     break;
         case "ua":
	        $intro_text_1 = $intro_text_1_it_ua;
            $intro_text_2 = $intro_text_2_it_ua;
	     break;
		}
	break;
    case "ps": //Persian = Target Language (for speakers of Persian)
	switch ($source_lang){
         case "de":
	        $intro_text_1 = $intro_text_1_ps_de;
            $intro_text_2 = $intro_text_2_ps_de;
	     break;
	     case "en":
	        $intro_text_1 = $intro_text_1_ps_en;
            $intro_text_2 = $intro_text_2_ps_en;
	     break;
	     case "es":
	        $intro_text_1 = $intro_text_1_ps_es;
            $intro_text_2 = $intro_text_2_ps_es;
	     break;
         case "fr":
	        $intro_text_1 = $intro_text_1_ps_fr;
            $intro_text_2 = $intro_text_2_ps_fr;
	     break;
         case "it":
	        $intro_text_1 = $intro_text_1_ps_it;
            $intro_text_2 = $intro_text_2_ps_it;
	     break;
         case "ru":
	        $intro_text_1 = $intro_text_1_ps_ru;
            $intro_text_2 = $intro_text_2_ps_ru;
	     break;
         case "ua":
	        $intro_text_1 = $intro_text_1_ps_ua;
            $intro_text_2 = $intro_text_2_ps_ua;
	     break;
		}
	break;
    case "ru": //Russian = Target Language (for speakers of Russian)
	switch ($source_lang){
         case "de":
	        $intro_text_1 = $intro_text_1_ru_de;
            $intro_text_2 = $intro_text_2_ru_de;
	     break; 
	     case "en":
	        $intro_text_1 = $intro_text_1_ru_en;
            $intro_text_2 = $intro_text_2_ru_en;
	     break;
         case "es":
	        $intro_text_1 = $intro_text_1_ru_es;
            $intro_text_2 = $intro_text_2_ru_es;
	     break;
         case "fr":
	        $intro_text_1 = $intro_text_1_ru_fr;
            $intro_text_2 = $intro_text_2_ru_fr;
	     break;
         case "it":
	        $intro_text_1 = $intro_text_1_ru_it;
            $intro_text_2 = $intro_text_2_ru_it;
	     break;
         case "ps":
	        $intro_text_1 = $intro_text_1_ru_ps;
            $intro_text_2 = $intro_text_2_ru_ps;
	     break;
         case "ua":
	        $intro_text_1 = $intro_text_1_ru_ua;
            $intro_text_2 = $intro_text_2_ru_ua;
	     break;
		}
	break;
    case "ua": //Ukrainian = Target Language (for speakers of Ukrainian)
	switch ($source_lang){
         case "de":
	        $intro_text_1 = $intro_text_1_ua_de;
            $intro_text_2 = $intro_text_2_ua_de;
	     break;
	     case "en":
	        $intro_text_1 = $intro_text_1_ua_en;
            $intro_text_2 = $intro_text_2_ua_en;
	     break;
         case "es":
	        $intro_text_1 = $intro_text_1_ua_es;
            $intro_text_2 = $intro_text_2_ua_es;
	     break;
         case "fr":
	        $intro_text_1 = $intro_text_1_ua_fr;
            $intro_text_2 = $intro_text_2_ua_fr;
	     break;
         case "it":
	        $intro_text_1 = $intro_text_1_ua_it;
            $intro_text_2 = $intro_text_2_ua_it;
	     break;
         case "ps":
	        $intro_text_1 = $intro_text_1_ua_ps;
            $intro_text_2 = $intro_text_2_ua_ps;
	     break;
         case "ru":
	        $intro_text_1 = $intro_text_1_ua_ru;
            $intro_text_2 = $intro_text_2_ua_ru;
	     break;
		}
	break;
}




$complete_html_content = "";

$complete_html_content .= '<html>
<head>
<title>'.$project_name.'</title>
<link rel="stylesheet" type="text/css" href="./css/main_text.css"/>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
</head>
<body>
  <div class="page_title">
  	<h1>
  	'.$interpret.': '.$song_name.'
      </h1>
  </div>
  <div class="intro">
  	<table>
			<tr>
				<td class="left">
					<div class="title">
			<b><u>'.$intro_text_1.'</u></b>
            </div>
			<div class="url">
			'.$music_video_url.'
			</div>
			<div class="qr_code">
				<img src="images/qr_music_video_url.png" height="100px" width="100px"/>
			</div>
		</div>
				</td>
				<td>
				<div class="title">
			<b><u>'.$intro_text_2.'</u></b>
			</div>
			<div class="url">
			'.$explanation_text_url.'
			</div>
			<div class="qr_code">
				<img src="images/qr_explanation_text_url.png" height="100px" width="100px"/>
			</div>
				</td>
			</tr>
			</table>
<hr>
  </div>
	
  <div class="content">';


/*  for ($j=0; $j<count($array_of_source_paragraphs); $j++){
    if (substr($array_of_source_paragraphs[$j], -6) == "[/img]"){
   $array_of_source_paragraphs_data[$j]["type"]="img";
      $array_of_source_paragraphs_data[$j]["text"]=substr($array_of_source_paragraphs[$j],0,strlen($array_of_source_paragraphs[$j])-6);
    } elseif (substr($array_of_source_paragraphs[$j], -5) == "[/h1]"){
      $array_of_source_paragraphs_data[$j]["type"]="h1";
      $array_of_source_paragraphs_data[$j]["text"]=substr($array_of_source_paragraphs[$j],0,strlen($array_of_source_paragraphs[$j])-5);
    } elseif (substr($array_of_source_paragraphs[$j], -5) == "[/h2]"){
      $array_of_source_paragraphs_data[$j]["type"]="h2";
      $array_of_source_paragraphs_data[$j]["text"]=substr($array_of_source_paragraphs[$j],0,strlen($array_of_source_paragraphs[$j])-5);
    } elseif (substr($array_of_source_paragraphs[$j], -5) == "[/h3]"){
      $array_of_source_paragraphs_data[$j]["type"]="h3";
      $array_of_source_paragraphs_data[$j]["text"]=substr($array_of_source_paragraphs[$j],0,strlen($array_of_source_paragraphs[$j])-5);
    } elseif (substr($array_of_source_paragraphs[$j], -4) == "[/p]"){
      $array_of_source_paragraphs_data[$j]["type"]="p";
      $array_of_source_paragraphs_data[$j]["text"]=substr($array_of_source_paragraphs[$j],0,strlen($array_of_source_paragraphs[$j])-4);
    }
  }
  
  print_r($array_of_source_paragraphs_data); */
  /*
  echo "---";
  echo "<pre>";
  print_r($paragraphs[0]);
  echo "</pre>";
  echo "---";
  echo "<br>";
  echo "count \$paragraphs(0): " . count($paragraphs[0]);
  echo "<br>";
  echo "count \$paragraphs: " . count($paragraphs);
  echo "<br>";
  
  */
  
  for ($j = 0; $j < count($paragraphs); $j++){
  	switch ($paragraphs[$j][0]){
  	   case "=h1=":
          // echo "this is here";
           $complete_html_content .= "<div class=\"title\">";
          
           for ($k = 1; $k < count($paragraphs[$j]); $k++){
           	$complete_html_content .= "<div class=\"word_segment\">";
           	$complete_html_content .= "<div class=\"source\">".$paragraphs[$j][$k]."</div>";
               $complete_html_content .= "<div class=\"target\">".$paragraphs_target[$j][$k]."</div>";
               $complete_html_content .= "</div>";
           }
            $complete_html_content .= "</div>";
            break;
            
         case "=h2=":
            $complete_html_content .= "<div class=\"subtitle_level_1\">";
          
           for ($k = 1; $k < count ($paragraphs[$j]); $k++){
           	$complete_html_content .= "<div class=\"word_segment\">";
           	$complete_html_content .= "<div class=\"source\">".$paragraphs[$j][$k]."</div>";
               $complete_html_content .= "<div class=\"target\">".$paragraphs_target[$j][$k]."</div>";
               $complete_html_content .= "</div>";
           }
            $complete_html_content .= "</div>";
            break;
            
         case "=h3=":
           $complete_html_content .= "<div class=\"subtitle_level_2\">";
          
           for ($k = 1; $k < count ($paragraphs[$j]); $k++){
           	$complete_html_content .= "<div class=\"word_segment\">";
           	$complete_html_content .= "<div class=\"source\">".$paragraphs[$j][$k][0]."</div>";
               $complete_html_content .= "<div class=\"target\">".$paragraphs_target[$j][$k][0]."</div>";
               $complete_html_content .= "</div>";
           }
            $complete_html_content .= "</div>";
            break;
            
          case "=p=":
           $complete_html_content .= "<div class=\"paragraph\">";
          
           for ($k = 1; $k < count ($paragraphs[$j]); $k++){
           	$complete_html_content .= "<div class=\"word_segment\">";
           	$complete_html_content .= "<div class=\"source\">".$paragraphs[$j][$k]."</div>";
               $complete_html_content .= "<div class=\"target\">".$paragraphs_target[$j][$k]."</div>";
               $complete_html_content .= "</div>";
           }
            $complete_html_content .= "</div>";
            break;
            
         case "=br=":
            $complete_html_content .= "</br>";
            break;
            
          case "=brbr=":
            $complete_html_content .= "</br></br>";
            break;
            
          default:
          //echo "here is the default";
          //echo "<br>";
      }
      //echo "does it go here?";
      //echo "<br>";
  }
  
  $complete_html_content .= "</div></body></html>";
  
  /*
  $complete_html_content .= '
<div class="title">
  <div class="word_segment">
    <div class="source_word"></div>
    <div class="target_word"></div>
  </div>
</div>
<div class="text">
  <div class="word_segment">
    <div class="source_word"></div>
    <div class="target_word"></div>
  </div>';
  
$complete_html_content .= '</div>
</div>
</body>
</html>';
*/


saveToFile("projects/".$project_folder_name."/", "int_". $target_lang.".html", $complete_html_content);

mkdir("projects/".$project_folder_name."/css");

copy("./css/main_text.css", "projects/".$project_folder_name. "/css/main_text.css");

//echo $complete_html_content;
//echo "<pre>";
//print_r($complete_html_content);
//echo "</pre>";

// Save config.json.txt file

$config = ["project_folder_name"  => $project_folder_name, "project_name" => $project_name , "song_name" => $song_name, "interpret" => $interpret, "source_lang" => $source_lang, "target_lang" => $target_lang, "music_video_url" => $music_video_url, "explanation_text_url" => $explanation_text_url, "category" => $category];

$json = json_encode($config);

if (saveToFile("projects/" . $project_folder_name . "/" , "config.json.txt", $json) == true){
	//echo "saving config.json.txt successful";
	} else {
	//echo "saving config.json.txt not successful";
	}

//echo "<br><br>";
	

// Display button to go to newly-created HTML-file

echo '<a href="projects/'. $project_folder_name. '/int_'. $target_lang .'.html">Open Newly created HTML-file</a>';
echo "<br>";
echo "<br>";
echo '<a href="index.php">Return to Start Page</a>';

?>

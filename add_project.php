<html>
<head>
<title>Form to create interlinear text</title>
<link rel="stylesheet" type="text/css" href="css/start.css"/>
<script src='js/jquery-3.5.1.slim.min.js'></script>
<script lang="javascript">
  function split(){
    var sourceOriginal = $( "#source_original" ).val();
    $( "#source_split" ).val(sourceOriginal.replace(/[ ]+/g, "\n"));
  }
  
  
// str.replace(/(?:\r\n|\r|\n)/g, '<br>');

</script>
</head>
<body>

<form method="POST" action="save_new_text.php">
Project-Name:<br/> <input type="text" name="project_name"/><br/>
Song-Name:<br/> <input type="text" name="song_name"/><br/>
Interpret:<br/> <input type="text" name="interpret"/><br/>
Source-Language (Short-Form):<br/> 
  <select name="source_lang">
               <option value = "en">English</option>
               <option value = "fr">French</option>
               <option value = "de">German</option>
               <option value = "it">Italian</option>
               <option value = "ps">Persian</option>
               <option value = "ru">Russian</option>
               <option value = "es">Spanish</option>
               <option value = "tr">Turkish</option>
               <option value = "ua">Ukrainian</option>
             </select><br>
Target-Language (Short-Form):<br/>
 <select name="target_lang">
               <option value = "en">English</option>
               <option value = "fr">French</option>
               <option value = "de">German</option>
               <option value = "it">Italian</option>
               <option value = "ps">Persian</option>
               <option value = "ru">Russian</option>
               <option value = "es">Spanish</option>
               <option value = "tk">Turkish</option>
               <option value = "ua">Ukrainian</option>
             </select><br>
URL to Music Video:<br/> <input type="text" name="music_video_url"/><br/>
URL to explanation how to use this Interlinear Text:<br/> <input type="text" name="explanation_text_url"/><br/>
Category:<br/>
             <select name="category">
               <option value = "Song (with Lyrics)">Song (with Lyrics)</option>
               <option value = "Sermon or Presentation (with Transcript)">Sermon or Presentation (with Transcript)</option>
               <option value = "Text (with Audio Recording)">Text (with Audio Recording)</option>
             </select><br>
Source-Text (original):<br/>
<textarea cols="" rows="" name="source_original" id="source_original"></textarea><br/>
Source-Text (split into lines):<br/>
<textarea cols="" rows="" name="source_split" id="source_split"></textarea><br/>
Target-Text (split into lines):<br/>
<textarea cols="" rows="" name="target_split" id="target_split"></textarea><br>
<input type="submit" value="Submit Form"/>
</form>
<br/><br/>
<button value="" onclick="split();">Split Source into Lines</button><br/>

</body>
</html>

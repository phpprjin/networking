<?php
   //Storing the previous encoding in case you have some other piece 
   //of code sensitive to encoding and counting on the default value.      
   $previous_encoding = mb_internal_encoding();

   //Set the encoding to UTF-8, so when reading files it ignores the BOM       
   mb_internal_encoding('UTF-8');

   //Process the CSS files...

   //Finally, return to the previous encoding
   mb_internal_encoding($previous_encoding);
?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
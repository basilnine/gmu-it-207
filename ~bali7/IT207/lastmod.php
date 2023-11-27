<?php 
/* Sets timezone to EST and provides last modified */
date_default_timezone_set("America/New_York");
echo "Last Modified: " . date("H:i F d Y",getlastmod()) . " EST"; 
?>

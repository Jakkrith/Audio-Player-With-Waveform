index.php = index.html + main.js

1. Open index.html then Save as index.php
2. At the begining of index.php insert these command
<//?php
$sound = $_GET['sound'];
if($sound=="") {$sound = "track1.mp3"; } 
//?>
3. Removing this line <script src="main.js"></script> from index.php then copy all the content from main.js and paste it instead.
4. Edit the javascript ->  audioTrack.load("audio/track1.mp3"); to audioTrack.load("audio/<//?=$sound; //?>");  
5. Save as index.php

Now you can play any audio without edit main.js every times.

Usage: https://yourdomain.com/audio-player/?sound=titanic.mp3

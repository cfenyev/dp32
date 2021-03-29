<?php for ($i=0;$i<1000;$i++) {

$a=$_SERVER['HTTP_X_SCHEME']."://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"])."/200/";
echo " #".(1000-$i).": ".$a." ".@file_get_contents($a)."<br>";
flush();

usleep(100000);

}?>

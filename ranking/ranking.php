<?
$link = mysql_connect("localhost", "fanatic_web", "webfanatic1234");
mysql_select_db("fanatic_prode");
mysql_query("SET NAMES 'utf8'");
mysql_query('SET CHARACTER SET utf8'); 

$result = mysql_query("select nombre, puntos from usuario where (esAdmin is null or esAdmin = 0) and puntos > 0 order by puntos DESC limit 0,10", $link);
$ranking = array();
while ($row = mysql_fetch_array($result)) {
	$i++;
	$ranking [$i]["name"] = $row[0];
	$ranking [$i]["points"] = $row[1];
}

mysql_close($link);

$sp_x = 1020;
$sp_y = 285;   
$name_x = 640;
$name_y = 285;
$vert_sp = 44;

//Background
$fondo_img = imagecreatefromjpeg("ranking-fondo.jpg");

//Final Image
$file = "ranking-prode.jpg";
		
//Profile pics
if (sizeof($ranking) > 0) {
	foreach ($ranking as $pos => $data) {
		
		$foo = imagettfbbox ( 24 , 0 , "res/arial.ttf" , $data['name'] );
		$tdisp = ($foo[2] * 1) / 2;
		if (strlen($data['points']) == 2)
			$sp_x = 1037;
		else
			$sp_x = 1020;                
		imagettftext($fondo_img, 24, 0, $name_x - $tdisp, $name_y, hexdec("FFFFFF"), "res/arial.ttf", $data['name']);
		imagettftext($fondo_img, 24, 0, $sp_x, $sp_y, hexdec("FFFFFF"), "res/arial.ttf", $data['points']);
		$sp_y += $vert_sp;
		$name_y += $vert_sp;
	}
}
imagejpeg($fondo_img, $file, 90);
imagedestroy($fondo_img);      
		

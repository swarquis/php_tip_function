<?php
error_reporting(E_ALL^E_WARNING^E_NOTICE);
function drawPlate($width, $height){
	$im = imagecreatetruecolor($width, $height);
	return $im;
}

function drawColor($im, $red, $green, $blue, $alpha = 0){
	return imagecolorallocate($im, $red, $green, $alpha);
}

function drawBackground($im, $red, $green, $blue, $alpha = 0,$width, $height){
	$color = drawColor($im, $red, $green, $blue, $alpha = 0);
	imagefilledrectangle($im, 0, 0, $width, $height, $color);
}

/**
 * [generateCode description]
 * 注释说明
 * @param  [int]  $len  [description]
 * @param  integer $type [type of code generated, 1 for english character, 2 for numerical, 3 for chinese, 4 for mixed]
 * @return [string]        [code generated]
 */
function generateCode($len = 4,$type = 1){
	$type1 = array_merge(range('a','z'),range('A','Z'));
	$type1 = join('',$type1);
	$type2 = array_merge(range('0','9'));
	$type2 = join('',$type2);
	$type3 = "安不上去外婆加快搜我拉票搜气温那还是看起来租完来自怕精神全面拔剑神曲诶我安装卡时间段";
	$type4 = $type1.$type2.$type3;
	for($i = 0; $i < $len; $i++){
		switch ($type){
			case 1:
				$str .= substr($type1, mt_rand(0,strlen($type1)-1), 1);
				break;
			case 2:
				$str .= substr($type2, mt_rand(0,strlen($type2)-1), 1);
				break;
			case 3:
				$str .= mb_substr($type3, mt_rand(0,mb_strlen($type3)-1), 1, "utf-8");
				break;
			case 4:
				$str .= mb_substr($type4, mt_rand(0,mb_strlen($type4)-1), 1, "utf-8");
				break;
		}
	}
	return $str;
}

function getfont($fontdir = 'C:\\xampp\\htdocs\\datastrcture\\fontfile'){
	$arr = [];
	if(file_exists($fontdir) && is_dir($fontdir)){
		$handler = opendir($fontdir);
		while(($font = readdir($handler)) !== false){
			if($font !== '.' && $font !== '..'){
				$arr[] = $fontdir.'\\'.$font;
				$arr[] = $font;
			}
			
		}
		return $arr;
	}
	return false;
}

/**
 * [drawCode description]
 * 注释说明
 * @param  [type] $im       [description]
 * @param  [type] $fontsize [description]
 * @param  [type] $angle    [description]
 * @param  [type] $x        [description]
 * @param  [type] $y        [description]
 * @param  [type] $color    [description]
 * @param  [type] $text     [description]
 * @return [type]           [description]
 */
function  getCode($width, $height, $string,$linenum = 2,$pixel = 100){

	$len = mb_strlen($string,"utf-8");
	$im = imagecreatetruecolor($width, $height) or die("failed to initialize image");
	$platecolor = imagecolorallocate($im, 255, 255, 255);
	
	//imagefill($im, 0, 0, $platecolor);
	imagefilledrectangle($im, 0, 0, $width, $height, $platecolor);

	$font = getfont();
	disturbingline($im,$width,$height,$randcolor,$linenum);
	pixel($im,$width,$height,$randcolor,$pixel);
	for($i = 0; $i < $len; $i++){
		$randcolor = drawColor($im, mt_rand(0,100), mt_rand(30,100), mt_rand(10,100), $alpha = 0);
		//$randcolor = drawColor($im, 255, 255, 255, $alpha = 0);
		imagettftext($im, $fontsize=mt_rand(15,20), $angle=mt_rand(1,10), (($i*($width/$len))+15), 40, $randcolor, $font[mt_rand(0,count($font)-1)], $string[$i]);
	}
	header('Content-Type:image/png');
	imagepng($im);
	imagedestroy($im);
}
//设置干扰线
function disturbingline($im,$width,$height,$color,$num){
	for($i = 0; $i < $num; $i++){
		imageline($im, mt_rand(0,$width/2), mt_rand(0,$height/2), mt_rand($width/2,$width), mt_rand($height/2,$height), $color);
	}
	
}
//设置干扰像素
function pixel($im,$width,$height,$color,$num){
	for($i = 0; $i < $num; $i++){
		imagesetpixel($im, mt_rand(0,$width), mt_rand(0,$height), $color);
	}
	
}

$strcode = generateCode();
getCode(300, 50, $strcode);
//test();
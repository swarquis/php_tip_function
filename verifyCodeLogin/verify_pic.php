<?php
header("content-type:text/html;charset=utf-8");

class VerifyPic{
    private $width;
    private $height;
    private $length;//验证码长度
    private $strtype;//验证码类型：1数字2字母3中文4字母数字混合
    
    public function __construct($width,$height,$length,$strType){
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
        $this->strType = $strType;
        
    }
    
    public function createStr(){
       switch ($this->strType){
           case 1:
            for($i=0;$i<$this->length;$i++){
                $str = join('',range(0,9));
                $str1 .= substr(str_shuffle($str),mt_rand(0,strlen($str)-1),1);
            }
            break;
            
           case 2:
               for($i=0;$i<$this->length;$i++){
                   $str = join('',array_merge(range('a','z'),range('A','Z')));
                   $str1 .= substr(str_shuffle($str),mt_rand(0,strlen($str)-1),1);
               }
               break;
               
           case 3:
               $str = "睡,觉,去,也,我,去,培,训,那,边,付,清,合,同,跑,死,去,了,我,么,人,不,太,看,自,己,想,安,静,温,暖,拉,屎";
               
               $arr = explode(',',$str);
               $str1 = join('',$arr);
               
               break;
               
           case 4:
               for($i=0;$i<$this->length;$i++){
                   $str = join('',array_merge(range('a','z'),range('A','Z'),range(0,9)));
                   $str1 .= substr(str_shuffle($str),mt_rand(0,strlen($str)-1),1);
               }
               break;
           default:
               echo "无效操作";
               exit;
       } 
       return $str1;
    }
    
    public function createVerifyCode($pixel=200,$line=5){


        $image = imagecreatetruecolor($this->width,$this->height);
        $white = imagecolorallocate($image,255,255,255);
        imagefilledrectangle($image,0,0,$this->width,$this->height,$white);
        $fontfiles = ["fonts/MSYH.TTF"];
        //$fontfiles = ["fonts/ARIAL.TTF","fonts/IMPACT.TTF","fonts/PLANTC.TTF"];
        for($i=0;$i<$this->length;$i++){
            $fontsize = mt_rand(10,20);
            $angle = mt_rand(-20,20);
            $x = (imagefontwidth($fontsize)+($this->width)/10)*($i+1);
            $y = ($this->height-imagefontheight($fontsize))/2+$fontsize;
            $randColor = imagecolorallocate($image,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
            $font = array_rand(array_flip($fontfiles),1);
            $char = mb_substr($this->createStr(),mt_rand(0,mb_strlen($this->createStr(),"utf-8")-1),1,"utf-8");
            $temp .= $char;
            imagettftext($image,$fontsize,$angle,$x,$y,$randColor,$font,$char);
        }
        session_start();

        $_SESSION['verifyCode'] = $temp;
        for($i=0;$i<$pixel;$i++){
            $randColor = imagecolorallocate($image,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
            imagesetpixel($image,mt_rand(0,$this->width),mt_rand(0,$this->height),$randColor);
        }
        for($i=0;$i<$line;$i++){
            $randColor = imagecolorallocate($image,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
            imageline($image,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$randColor);
        }
        
        
        header("content-type:image/png");
        imagepng($image);
        
        imagedestroy($image);
        
    }
    
    
}
<?php

namespace App\Services;

class ImageSizeService
{
    //图片类型
    protected $type;
    //实际宽度
    protected $width;
    //实际高度
    protected $height;
    //改变后的宽度
    protected $resize_width;
    //改变后的高度
    protected $resize_height;
    //是否裁图, 默认为1进行裁切 以最大尺寸优先进行缩放后再进行裁切。当为0时等比例缩放
    protected $cut;
    //源图象
    protected $srcimg;
    //目标图象地址
    public $dstimg;
    //临时创建的图象
    protected $im;

    public function process($img, $wid, $hei, $cut = 1, $dst_img)  //源图像 | 宽 | 高 | 是否裁切 | 目标地址
    {
        $this->srcimg = $img;
        $this->resize_width = $wid;
        $this->resize_height = $hei;
        $this->cut = $cut;
        //图片的类型
        $this->type = substr(strrchr($this->srcimg, "."), 1);
        //初始化图象
        $this->init_img();
        //目标图象地址
        $this->dst_img($dst_img);
        //--
        $this->width = imagesx($this->im);
        $this->height = imagesy($this->im);
        //生成图象
        $this->newimg();
        ImageDestroy($this->im);
    }

    //欢迎来访未来往事<https://www.fity.cn>
    private function newimg()
    {
        //改变后的图象的比例
        $resize_ratio = ($this->resize_width) / ($this->resize_height);
        //实际图象的比例
        $ratio = ($this->width) / ($this->height);

        if (($this->cut) == "1") //裁图
        {
            if ($ratio >= $resize_ratio) //高度优先
            {
                $newimg = imagecreatetruecolor($this->resize_width, $this->resize_height);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width, $this->resize_height, (($this->height) * $resize_ratio), $this->height);
                $this->quality_deal($newimg);
            }
            if ($ratio < $resize_ratio) //宽度优先
            {
                $newimg = imagecreatetruecolor($this->resize_width, $this->resize_height);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width, $this->resize_height, $this->width, (($this->width) / $resize_ratio));
                $this->quality_deal($newimg);
            }
        } else //不裁图
        {
            if ($ratio >= $resize_ratio) {
                $newimg = imagecreatetruecolor($this->resize_width, ($this->resize_width) / $ratio);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width, ($this->resize_width) / $ratio, $this->width, $this->height);
                $this->quality_deal($newimg);
            }
            if ($ratio < $resize_ratio) {
                $newimg = imagecreatetruecolor(($this->resize_height) * $ratio, $this->resize_height);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, ($this->resize_height) * $ratio, $this->resize_height, $this->width, $this->height);
                $this->quality_deal($newimg);
            }
        }

    }

    //初始化图象      欢迎来访未来往事<https://www.fity.cn>
    private function init_img()
    {
        if ($this->type == "jpg") {
            $this->im = imagecreatefromjpeg($this->srcimg);
        }
        if ($this->type == "gif") {
            $this->im = imagecreatefromgif($this->srcimg);
        }
        if ($this->type == "png") {
            $this->im = imagecreatefrompng($this->srcimg);
        }
    }

    //图象目标地址
    private function dst_img($dst_img)
    {
        $full_length = strlen($this->srcimg);
        $type_length = strlen($this->type);
        $name_length = $full_length - $type_length;
        //$name         = substr($this->srcimg,0,$name_length-1);
        //$this->dstimg = $name."_new.".$this->type;
        $this->dstimg = $dst_img;

    }

    //缩略图质量处理 By:未来往事<https://www.fity.cn  rinald@www.fity.cn>
    private function quality_deal($newimg)
    {

        $ext_type = strtolower($this->type);

        if ($ext_type === 'jpg' || $ext_type === 'jpeg') {
            ImageJpeg($newimg, $this->dstimg, 100); //图片质量100-0
        } elseif ($ext_type === 'png') {
            imagepng($newimg, $this->dstimg, 0); //图片质量0-9
        } elseif ($ext_type === 'gif') {
            imagegif($newimg, $this->dstimg);
        } else {
            ImageJpeg($newimg, $this->dstimg);
        }

    }

}

//使用方法
//$resizeimage = new ImageSizeService();
//$resizeimage->process('./p1.jpg', '224', '126', '1', './p1_224x126.jpg');

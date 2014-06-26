<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Мухтар
 * Date: 25.12.13
 * Time: 21:50
 * To change this template use File | Settings | File Templates.
 */

class EimageManager extends CApplicationComponent
{
    protected $image;
    protected $width;
    protected $height;

    protected $newWidth;
    protected $newHeight;

    public function resize($width = false,$height = false)
    {
        if ($width!==false) $this->newWidth = $width;
        if ($height!==false) $this->newHeight = $height;
        return $this;
    }


    public function load()
    {
        
    }

}
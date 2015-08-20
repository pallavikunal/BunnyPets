<?php

/*
  |@author: Alankar More
  |
  |16 October 2014
  |--------------------------------------------------------------------------
  | Helper for file operations such as renaming,writting,uploding etc.
  |--------------------------------------------------------------------------
  | Each helper function will provide some basic functionalities.
  |
 */

namespace App\Libraries\Helpers;

class FileHelper
{

    /**
     *
     * Setting new file name
     *
     * @var string
     */
    protected $_fileName;

    /**
     * Uploaded file instance
     *
     * @var Object uploaded file
     */
    protected $_file;

    /**
     * Setting instance of uploaded file
     *
     */
    public function __construct($fileInstance = null)
    {
        $this->_file = $fileInstance;
    }

    /**
     * uploading file to destination
     *
     * @return boolean
     * throw exception Exception
     */
    public function upload($uploadPath)
    {
        try {
            return $this->_file->move(public_path('uploads/' . $uploadPath), $this->getFileName());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Set user defined file name
     *
     * @var string $filename
     */
    public function setFileName($filename)
    {
        $this->_fileName = $filename . "." . $this->_getFileExtension();
    }

    /**
     * Get file name. if it has been changed
     *
     * @return string
     */
    public function getFileName()
    {
        return ($this->_fileName) ? $this->_fileName : $this->_file->getClientOriginalName();
    }

    /**
     * Get file extension for uploaded file
     *
     * @return string
     */
    protected function _getFileExtension()
    {
        return $this->_file->getClientOriginalExtension();
    }

    /**
     * removing file
     *
     * @return boolean
     */
    public function removeFile($fileName)
    {
        $file = public_path($fileName);
        (file_exists($file)) ? unlink($file) : false;
    }
    
    /**
     * 
     * @param string $filename Name of original file
     * @param string $filepath Path of original file
     * @param integer $newwidth
     * @param integer $newheight
     * @param string $path New saving path
     * @param string $anotherName Optional name for the file
     * @return image
     */
    function resizeImage($filename,$filepath,$newwidth,$newheight,$path,$anotherName = null)
    {
        $filePath = public_path($filepath);
        $path = public_path($path);
        list($width, $height) = getimagesize($filePath.$filename);
        /*if ($width > $height && $newheight < $height) {
            $newheight = $height / ($width / $newwidth);
        } else if ($width < $height && $newwidth < $width) {
            $newwidth = $width / ($height / $newheight);
        } else {
            $newwidth = $width;
            $newheight = $height;
        }*/
        
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        $extensions =  array('bmp','jpeg','jpg','png','gif');
        $fileExtension = strtolower(pathinfo($filePath.$filename,PATHINFO_EXTENSION));
        if (in_array($fileExtension,$extensions)) {
           if ($fileExtension == 'jpeg' || $fileExtension == 'jpg') {
               $source = imagecreatefromjpeg($filePath.$filename);
           } else {
               $function = "imagecreatefrom".$fileExtension;
               $source = $function($filePath.$filename);
           }
        }
        
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        
        if (!empty($anotherName))
              $filename = $anotherName;
        
        if ($fileExtension == 'jpeg' || $fileExtension == 'jpg') {
            $image = imagejpeg($thumb, $path.$filename);
        } elseif ($fileExtension == 'png') {
            $image = imagepng($thumb, $path.$filename);
        } elseif ($fileExtension == 'gif') {
            $image = imagegif($thumb, $path.$filename);
        } elseif ($fileExtension == 'bmp') {
            $image = image2wbmp($thumb, $path.$filename);
        }
        
        return $image;
    }
}

<?php
########################################################
# Script Info
# ===========
# File: ImageEditor.php
# Created: 05/06/03
# Modified: 16/05/04
# Author: Ash Young (ash@evoluted.net)
# Website: http://evoluted.net/php/image-editor.htm
# Requirements: PHP with the GD Library
#
# Description
# ===========
# This class allows you to edit an image easily and
# quickly via php.
#
# If you have any functions that you like to see 
# implemented in this script then please just send
# an email to ash@evoluted.net
#
# Limitations
# ===========
# - GIF Editing: this script will only edit gif files
#     your GD library allows this.
#
# Image Editing Functions
# =======================
# resize(int width, int height)
#    resizes the image to proportions specified.
#
# crop(int x, int y, int width, int height)
#    crops the image starting at (x, y) into a rectangle
#    width wide and height high.
#
# addText(String str, int x, int y, Array color)
#    adds the string str to the image at position (x, y)
#    using the colour given in the Array color which
#    represents colour in RGB mode.
#
# addLine(int x1, int y1, int x2, int y2, Array color)
#    adds the line starting at (x1,y1) ending at (x2,y2)
#    using the colour given in the Array color which
#    represents colour in RGB mode.
#
# setSize(int size)
#    sets the size of the font to be used with addText()
#
# setFont(String font) 
#    sets the font for use with the addText function. This
#    should be an absolute path to a true type font
#
# shadowText(String str, int x, int y, Array color1, Array color2, int shadowoffset)
#    creates show text, using the font specified by set font.
#    adds the string str to the image at position (x, y)
#    using the colour given in the Array color which
#    represents colour in RGB mode.
#
# Useage
# ======
# First you are required to include this file into your 
# php script and then to create a new instance of the 
# class, giving it the path and the filename of the 
# image that you wish to edit. Like so:
#
# include("ImageEditor.php");
# $imageEditor = new ImageEditor("filename.jpg", "directoryfileisin/");
#
# After you have done this you will be able to edit the 
# image easily and quickly. You do this by calling a 
# function to act upon the image. See below for function
# definitions and descriptions see above. An example 
# would be:
#
# $imageEditor->resize(400, 300);
#
# This would resize our imported image to 400 pixels by
# 300 pixels. To then export the edited image there are
# two choices, out put to file and to display as an image.
# If you are displaying as an image however it is assumed
# that this file will be viewed as an image rather than
# as a webpage. The first line below saves to file, the
# second displays the image.
#
# $imageEditor->outputFile("filenametosaveto.jpg", "directorytosavein/");
#
# $imageEditor->outputImage();
########################################################

class ImageEditor {
  var $x;
  var $y;
  var $type;
  var $img;  
  var $font;
  var $error;
  var $size;

  ########################################################
  # CONSTRUCTOR
  ########################################################
  function ImageEditor($filename, $path, $col=NULL) 
  {
    $this->font = false;
    $this->error = false;
    $this->size = 25;
    if(is_numeric($filename) && is_numeric($path))
    ## IF NO IMAGE SPECIFIED CREATE BLANK IMAGE
    {
      $this->x = $filename;
      $this->y = $path;
      $this->type = "jpg";
      $this->img = imagecreatetruecolor($this->x, $this->y);
      if(is_array($col)) 
      ## SET BACKGROUND COLOUR OF IMAGE
      {
        $colour = ImageColorAllocate($this->img, $col[0], $col[1], $col[2]);
        ImageFill($this->img, 0, 0, $colour);
      }
    }
    else
    ## IMAGE SPECIFIED SO LOAD THIS IMAGE
    {
      ## FIRST SEE IF WE CAN FIND IMAGE

      if(file_exists($path . $filename))
      {
        $file = $path . $filename;
      }
      else if (file_exists($path . "/" . $filename))
      {
        $file = $path . "/" . $filename;
      }
      else
      {
        $this->errorImage("File Could Not Be Loaded");
      }
      
      if(!($this->error)) 
      {
        ## LOAD OUR IMAGE WITH CORRECT FUNCTION
        $this->type = strtolower(end(explode('.', $filename)));
        if ($this->type == 'jpg' || $this->type == 'jpeg') 
        {
          $this->img = @imagecreatefromjpeg($file);
        } 
        else if ($this->type == 'png') 
        {
          $this->img = @imagecreatefrompng($file);
        } 
        else if ($this->type == 'gif') 
        {
          $this->img = @imagecreatefrompng($file);
        }
        ## SET OUR IMAGE VARIABLES
        $this->x = imagesx($this->img);
        $this->y = imagesy($this->img);
      }
    }
  }

  ########################################################
  # RESIZE IMAGE GIVEN X AND Y
  ########################################################
  function resize($width, $height) 
  {
    if(!$this->error) 
    {
      $tmpimage = imagecreatetruecolor($width, $height);
      imagecopyresampled($tmpimage, $this->img, 0, 0, 0, 0,
                           $width, $height, $this->x, $this->y);
      imagedestroy($this->img);
      $this->img = $tmpimage;
      $this->y = $height;
      $this->x = $width;
    }
  }
  
  ########################################################
  # CROPS THE IMAGE, GIVE A START CO-ORDINATE AND
  # LENGTH AND HEIGHT ATTRIBUTES
  ########################################################
  function crop($x, $y, $width, $height) 
  {
    if(!$this->error) 
    {
      $tmpimage = imagecreatetruecolor($width, $height);
      imagecopyresampled($tmpimage, $this->img, 0, 0, $x, $y,
                           $width, $height, $width, $height);
      imagedestroy($this->img);
      $this->img = $tmpimage;
      $this->y = $height;
      $this->x = $width;
    }
  }
  
  ########################################################
  # ADDS TEXT TO AN IMAGE, TAKES THE STRING, A STARTING
  # POINT, PLUS A COLOR DEFINITION AS AN ARRAY IN RGB MODE
  ########################################################
  function addText($str, $x, $y, $col)
  {
    if(!$this->error) 
    {
      if($this->font) {
        $colour = ImageColorAllocate($this->img, $col[0], $col[1], $col[2]);
        if(!imagettftext($this->img, $this->size, 0, $x, $y, $colour, $this->font, $str)) {
          $this->font = false;
          $this->errorImage("Error Drawing Text");
        }
      }
      else {
        $colour = ImageColorAllocate($this->img, $col[0], $col[1], $col[2]);
        Imagestring($this->img, 5, $x, $y, $str, $colour);
      }
    }
  }
  
  function shadowText($str, $x, $y, $col1, $col2, $offset=2) {
   $this->addText($str, $x, $y, $col1);
   $this->addText($str, $x-$offset, $y-$offset, $col2);   
  
  }
  
  ########################################################
  # ADDS A LINE TO AN IMAGE, TAKES A STARTING AND AN END
  # POINT, PLUS A COLOR DEFINITION AS AN ARRAY IN RGB MODE
  ########################################################
  function addLine($x1, $y1, $x2, $y2, $col) 
  {
    if(!$this->error) 
    {
      $colour = ImageColorAllocate($this->img, $col[0], $col[1], $col[2]);
      ImageLine($this->img, $x1, $y1, $x2, $y2, $colour);
    }
  }

  ########################################################
  # RETURN OUR EDITED FILE AS AN IMAGE
  ########################################################
  function outputImage() 
  {
    if ($this->type == 'jpg' || $this->type == 'jpeg') 
    {
      header("Content-type: image/jpeg");
      imagejpeg($this->img);
    } 
    else if ($this->type == 'png') 
    {
      header("Content-type: image/png");
      imagepng($this->img);
    } 
    else if ($this->type == 'gif') 
    {
      header("Content-type: image/png");
      imagegif($this->img);
    }
  }

  ########################################################
  # CREATE OUR EDITED FILE ON THE SERVER
  ########################################################
  function outputFile($filename, $path) 
  {
    if ($this->type == 'jpg' || $this->type == 'jpeg') 
    {
      imagejpeg($this->img, ($path . $filename));
    } 
    else if ($this->type == 'png') 
    {
      imagepng($this->img, ($path . $filename));
    } 
    else if ($this->type == 'gif') 
    {
      imagegif($this->img, ($path . $filename));
    }
  }


  ########################################################
  # SET OUTPUT TYPE IN ORDER TO SAVE IN DIFFERENT
  # TYPE THAN WE LOADED
  ########################################################
  function setImageType($type)
  {
    $this->type = $type;
  }
  
  ########################################################
  # ADDS TEXT TO AN IMAGE, TAKES THE STRING, A STARTING
  # POINT, PLUS A COLOR DEFINITION AS AN ARRAY IN RGB MODE
  ########################################################
  function setFont($font) {
    $this->font = $font;
  }

  ########################################################
  # SETS THE FONT SIZE
  ########################################################
  function setSize($size) {
    $this->size = $size;
  }
  
  ########################################################
  # GET VARIABLE FUNCTIONS
  ########################################################
  function getWidth()                {return $this->x;}
  function getHeight()               {return $this->y;} 
  function getImageType()            {return $this->type;}

  ########################################################
  # CREATES AN ERROR IMAGE SO A PROPER OBJECT IS RETURNED
  ########################################################
  function errorImage($str) 
  {
    $this->error = false;
    $this->x = 235;
    $this->y = 50;
    $this->type = "jpg";
    $this->img = imagecreatetruecolor($this->x, $this->y);
    $this->addText("AN ERROR OCCURED:", 10, 5, array(250,70,0));
    $this->addText($str, 10, 30, array(255,255,255));
    $this->error = true;
  }
} 
?>

<?php

require_once('PEAR.php');

class Spreadsheet_Excel_Writer_BIFFwriter extends PEAR
{
    var $_BIFF_version = 0x0500;

    var $_byte_order;

    var $_data;

    var $_datasize;

    var $_limit;
 
    function Spreadsheet_Excel_Writer_BIFFwriter()
    {
        $this->_byte_order = '';
        $this->_data       = '';
        $this->_datasize   = 0;
        $this->_limit      = 2080;   
        $this->_setByteOrder();
    }

    function _setByteOrder()
    {
        $teststr = pack("d", 1.2345);
        $number  = pack("C8", 0x8D, 0x97, 0x6E, 0x12, 0x83, 0xC0, 0xF3, 0x3F);
        if ($number == $teststr) {
            $byte_order = 0;   
        }
        elseif ($number == strrev($teststr)){
            $byte_order = 1;    
        }
        else {
           
            return $this->raiseError("Formato de ponto flutuante requerido ".
                                     "não apoiado nesta plataforma.");
        }
        $this->_byte_order = $byte_order;
    }

    function _prepend($data)
    {
        if (strlen($data) > $this->_limit) {
            $data = $this->_addContinue($data);
        }
        $this->_data      = $data.$this->_data;
        $this->_datasize += strlen($data);
    }

    function _append($data)
    {
        if (strlen($data) > $this->_limit) {
            $data = $this->_addContinue($data);
        }
        $this->_data      = $this->_data.$data;
        $this->_datasize += strlen($data);
    }

    function _storeBof($type)
    {
        $record  = 0x0809;       

        if ($this->_BIFF_version == 0x0500) {
            $length  = 0x0008;
            $unknown = '';
            $build   = 0x096C;
            $year    = 0x07C9;
        }
        elseif ($this->_BIFF_version == 0x0600) {
            $length  = 0x0010;
            $unknown = pack("VV", 0x00000041, 0x00000006); 
            $build   = 0x0DBB;
            $year    = 0x07CC;
        }
        $version = $this->_BIFF_version;
   
        $header  = pack("vv",   $record, $length);
        $data    = pack("vvvv", $version, $type, $build, $year);
        $this->_prepend($header.$data.$unknown);
    }

    function _storeEof() 
    {
        $record    = 0x000A;   
        $length    = 0x0000;   
        $header    = pack("vv", $record, $length);
        $this->_append($header);
    }

    function _addContinue($data)
    {
        $limit      = $this->_limit;
        $record     = 0x003C;        
 
        $tmp = substr($data, 0, 2).pack("v", $limit-4).substr($data, 4, $limit - 4);
        
        $header = pack("vv", $record, $limit); 
 
        for($i = $limit; $i < strlen($data) - $limit; $i += $limit)
        {
            $tmp .= $header;
            $tmp .= substr($data, $i, $limit);
        }
 
        $header  = pack("vv", $record, strlen($data) - $i);
        $tmp    .= $header;
        $tmp    .= substr($data,$i,strlen($data) - $i);
 
        return $tmp;
    }
}
?>

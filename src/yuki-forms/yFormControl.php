<?php

/*
 * This file is part of the yuki package.
 * Copyright (c) 2011 olamedia <olamedia@gmail.com>
 *
 * This source code is release under the MIT License.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * yFormControl
 *
 * @package yuki
 * @subpackage forms
 * @author olamedia
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 */
class yFormControl{
    /**
     * Prefix of the input name
     * null:        name="name"
     * "prefix":    name="prefix_name"
     * @var string Default null
     */
    protected $_prefix = null;
    /**
     * Name of the input, required
     * "name":      name="name"
     * @var string Default null
     */
    protected $_name = null;
    /**
     * Unique id for using multiple inputs with the same name
     * null:        name="name"
     * 4587:        name="name[4587]"
     * @var string Default null
     */
    protected $_key = null;
    protected $_value = null;
    /**
     * Sets name prefix.
     * @param string $prefix 
     * @return yFormControl
     */
    public function setPrefix($prefix){
        $this->_prefix = $prefix;
        return $this;
    }
    /**
     * Gets name prefix
     * @return string
     */
    public function getPrefix(){
        return $this->_prefix;
    }
    /**
     * Sets input name.
     * @param string $name
     * @return yFormControl
     */
    public function setName($name){
        $this->_name = $name;
        return $this;
    }
    /**
     * Gets input name.
     * @return string
     */
    public function getName(){
        return $this->_name;
    }
    public function setKey($key){
        $this->_key = $key;
    }
    public function getKey(){
        return $this->_key;
    }
    public function setValue($value){
        $this->_value = $value;
    }
    public function getValue(){
        return $this->_value;
    }
    public function getFullName(){
        return ($this->_prefix === null?'':$this->_prefix.'_').$this->_name;
    }
    public function getHtmlName(){
        return $this->getFullName().
        ($this->_key === null?'':'['.$this->_key.']');
    }
    public function processPost(){
        if (isset($_POST[$this->_name])){
            if ($this->_key === null){
                $this->_value = $_POST[$this->_name];
            }else{
                $this->_value = $_POST[$this->_name][$this->_key];
            }
        }
    }
    public function getHtml(){
        return '<input type="text" name="'.
        $this->_name.
        '" value="'.
        htmlspecialchars($this->_value).
        '" />';
    }
    public function __toString(){
        return $this->getHtml();
    }
}


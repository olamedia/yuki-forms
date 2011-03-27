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

require_once(dirname(__FILE__).'/../../yuki-html/src/yuki-html.php');
require_once(dirname(__FILE__).'/../src/yuki-forms.php');

class simpleForm extends yFormControlSet{
    protected $_label = 'New Message';
    protected $_layout = 'fieldset';
    protected $_blockContainer = 'ol';
    protected $_requiredTitle = 'обязательно к заполнению';
    protected $_controls = array(
        'title'=>array(
            'label'=>'Тема',
            'class'=>'yTextInput',
            'name'=>'subject',
            'help'=>'Постарайтесь кратко и максимально полно изложить тему сообщения.',
            'required'=>true
        ),
        'text'=>array(
            'label'=>'Message',
            'class'=>'yTextInput',
            'name'=>'message',
        ),
    );
}

$form = new simpleForm();
$_POST['subject'] = 'subj';
$_POST['message'] = 'msg';
foreach ($form as $key => $result){
    var_dump($result);
}
$css = '
    label{
        display: block;
        font-weight: bold;
    }
    form-input:focus{
        background: #fcc;
    }
    em.input-help{
        display: block;
    }
    .input-required abbr{
        color: #f00;
    }
    ';

file_put_contents(dirname(__FILE__).'/simpleForm.html', '<style type="text/css">'.$css.'</style>'.strval($form));
echo $form;
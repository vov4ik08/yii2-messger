<?php
/**
 * Created by PhpStorm.
 * User: vov4ik08
 * Date: 11.02.14
 * Time: 11:08
 */

namespace Apollo;


use yii\base\Component;
use yii\base\View;
use yii\base\Widget;
use yii\web\Controller;

class Messager extends Widget
{

    public $type;
    public $text;
    public $link;

    public function init()
    {
        $view = $this->getView();
        MessagerAsset::register($view);
        $js = null;
        switch ($this->type) {
            case 'ErrorMessage':
                $js = "jQuery.stickr({note:'$this->text',className:'classic error',sticked:true,position:{right:0,bottom:0}});";
                break;
            case 'SuccessMessage':
                $js = "jQuery.stickr({note:'$this->text',className:'next',position:{right:0,bottom:0},time:3000,speed:300});";
                break;
            case 'ErrorLink':
                $js = "
                function ErrorLink()
				{
				 jQuery(document).ready(function(){

				 jQuery.stickr({note:'$this->text.',className:'classic error',sticked:true,position:{right:0,bottom:0}});
				});

				}

                ";
                echo "<a href='#' onclick='noauth();return false;'>" . $this->link . "</a>";
                break;

        }
        if (!empty($js)) {
            $view->registerJs($js);
        }


    }


}
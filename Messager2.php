<?php 
class Messager2 extends CApplicationComponent
{
	public $enableJS = true;
	public $coreCss = true;
	protected $_assetsUrl;
	
	public function init()
	{
		if (Yii::getPathOfAlias('messager') === false)
		{
			Yii::setPathOfAlias('messager', realpath(dirname(__FILE__).'/'));
		}
		if ($this->enableJS !== false)
			$this->registerCoreScripts();
		if ($this->coreCss !== false)
			$this->registerYiiCss();
		parent::init();
	}
	public function registerCoreScripts()
	{
		$position = CClientScript::POS_HEAD;
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerScriptFile($this->getAssetsUrl().'/jquery.stickr.js', $position);
	}
	
	public function registerYiiCss()
	{
		Yii::app()->clientScript->registerCssFile($this->getAssetsUrl().'/style.css');
		
	}
	
	
	protected function getAssetsUrl()
	{
		if (isset($this->_assetsUrl))
			return $this->_assetsUrl;
		else
		{
			$assetsPath = Yii::getPathOfAlias('messager.assets');
			$assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, YII_DEBUG);
			return $this->_assetsUrl = $assetsUrl;
		}
	}
	
	
	public function ErrorLink($key,$text)
	{

		
		$position = CClientScript::POS_HEAD;
		Yii::app()->clientScript->registerScript('ErrorLink',
				"
				function noauth()
				{
				 jQuery(document).ready(function(){
				 
				 jQuery.stickr({note:'$text.',className:'classic error',sticked:true,position:{right:0,bottom:0}});
				});
				
				}
				",$position
				
				);
		
		echo "<a href='#' onclick='noauth();return false;'>".$key."</a>
						";
	}
	
	public function ErrorMessage($text)
	{

	return "jQuery.stickr({note:'$text',className:'classic error',sticked:true,position:{right:0,bottom:0}});";
	}
	
	public function SuccessMessage($text)
	{
		return "jQuery.stickr({note:'$text',className:'next',position:{right:0,bottom:0},time:3000,speed:300});";
	}
}






?>
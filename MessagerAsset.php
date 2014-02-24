<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace Apollo;

use yii\web\AssetBundle;

/**
 * This declares the asset files required by Gii.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MessagerAsset extends AssetBundle
{
	/**
	 * @inheritdoc
	 */
    public $sourcePath = '@vendor/apollo/yii2-messager/assets';



    public $css = [
		'style.css',
	];
	/**
	 * @inheritdoc
	 */
	public $js = [

		'jquery.stickr.js',
	];
	/**
	 * @inheritdoc
	 */
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];
}

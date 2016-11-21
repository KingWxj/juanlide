<?php
/**
 * Created by PhpStorm.
 * User: ProLo
 * Date: 2016/10/30
 * Time: 13:06
 */
namespace backend\controllers;

use backend\models\Spider;

class SpiderController extends BaseController{
//	禁用csrf
	public $enableCsrfValidation=false;
//	爬虫首页
	public function actionIndex() {
		return $this->render("index");
	}
//	执行爬虫
	public function actionRunSpiderUrl() {
		set_time_limit(0);
		$spider=new Spider();
		$url='http://tiku.21cnjy.com/';
		$spider->base_url=$url;
		$first=$spider->getContent($url);
		p($spider->getListPage($first));
	}
	public function actionRunSpiderExam() {
		$spider=new Spider();
		$spider->url='http://tiku.21cnjy.com/';
		$num=$spider->getExamPage();
		echo '新获取到了'.$num.'条Url';
	}
}
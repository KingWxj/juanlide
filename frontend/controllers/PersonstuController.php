<?php
namespace frontend\controllers;

class PersonstuController extends \yii\web\Controller {
	
	public function actionIndex() {
		return $this->render('index');
	}
}

<?php
namespace backend\models;


use yii\base\Model;

class SystemInfo extends Model {
	public static function getSystemInfo() {
		$result=shell_exec('wmic memorychip');
		return $result;
	}
}
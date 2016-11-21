<?php
namespace common\models;


class SendMail {
	
	public static function sendMail($to,$subject,$data) {
		$mail= \Yii::$app->mailer->compose();
		$mail->setTo($to);
		$mail->setSubject($subject);
		//$mail->setTextBody('zheshisha ');   //发布纯文字文本
		$mail->setHtmlBody($data);    //发布可以带html标签的文本
		if($mail->send())
			return true;
		else
			return false;
	}
}
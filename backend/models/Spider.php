<?php
namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%spider}}".
 *
 * @property integer $id
 * @property string $url
 * @property string $title
 * @property string $grade
 * @property string $subject
 * @property string $content
 */
class Spider extends \yii\db\ActiveRecord {
	
	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return '{{%spider}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['content'], 'string'],
			[['url', 'title', 'grade', 'subject'], 'string', 'max' => 255],
		];
	}
	
	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id'      => 'ID',
			'url'     => 'Url',
			'title'   => 'Title',
			'grade'   => 'Grade',
			'subject' => 'Subject',
			'content' => 'Content',
		];
	}
	
	public $base_url;
	
	public function startCurl($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 10000);
		$content = curl_exec($ch);
		curl_close($ch);
		return $content;
	}

//	传入url，返回爬取的网页数据
	public function getContent($url) {
		$content = $this->startCurl($url);
//		计次，网址尝试的次数
		$i = 0;
		while (!$content) {
			$content = $this->startCurl($url);
			$i++;
			if ($i >= 5) {
				break;
			}
		}
		return $content;
	}
	
	public function getListPage($content) {
		preg_match_all("/a href=[\'\"]{1}([^\>\"\']+(mod=paper)[^\>\"\']+?g=\d+?)[\"\']{1}/i", $content, $subject);
		$lists = array();
		foreach ($subject[1] as $sub) {
			$sub = str_replace('&amp;', '&', $sub);
			$link = $this->base_url . $sub;
			$list_page = $this->getContent($link);
			preg_match("/\<title\>(.+)\<\/title\>/i", $list_page, $title);
			$title[1] = isset($title[1]) ? $title[1] : '失败';
			preg_match_all("/href=[\"\'](paper\/[^\"\']+?\.html)/i", $list_page, $lists[$title[1]]);
			break;
		}
		$res = [];
		foreach ($lists as $key => $list) {
			foreach ($list[1] as $k => $v) {
				$this->getExamPage($this->base_url . $v);
//				$res[] = $this->url . $v;
			}
		}
//		return $res;
	}
	
	public function getExamPage($exam_url) {
//		$check = Spider::find()->where(['url' => $exam_url])->count();
//		if (!$check) {
		$exam_page = $this->getContent($exam_url);
		preg_match("/<div class=\"shijuan_detail\" id=\"detail\">([.\s\S]+)<\/div>[\s]<div class=\"cl\">/i", $exam_page, $one_exam);
		$exam = new Spider();
		$exam->url = $exam_url;
		$exam->content = $one_exam[1];
		$exam->save();
//		}
	}
	
}

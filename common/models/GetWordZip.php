<?php
namespace common\models;

class GetWordZip {

//	要写入到word文档里面的html数据
	public $data;
	
	// 获取所有的src路径
	public function getImgSrc() {
		preg_match_all("/src=([\"|'])(\/?)([^\"'>]+\.(png|jpg|jpeg|gif|bmp))/i", $this->data, $src);
		return $src[3];
	}
	
	// 替换所有的src路径到根目录
	public function setImgSrc($src_name) {
		$new_data = $this->data;
//		foreach ($src_name as $key => $value) {
//			$new_data = str_replace($value['src'], $value['name'], $new_data);
//		}
		return $new_data;
	}
	
	// 创建word文档到脚本所在目录
	public function createWordFile($data) {
		$word_name = 'jld' . time() . '.doc';
		$fp = fopen($word_name, "wb");
		$template = '<html xmlns:o="urn:schemas-microsoft-com:office:office"
						xmlns:w="urn:schemas-microsoft-com:office:word"
						xmlns="http://www.w3.org/TR/REC-html40">
				        %s
				        </html>';
		$data = sprintf($template, $data);
		fwrite($fp, $data);
		fclose($fp);
		return $word_name;
	}
	
	// 执行创建word文档，然后添加所有关联的图片到压缩包，输出下载
	public function createZip($data, $all_src) {
		$word_name = $this->createWordFile($data);
		$filename = 'jld' . time() . '.zip';
		ob_end_clean();
		$zip = new \ZipArchive();
		if ($zip->open($filename, \ZipArchive::CREATE) === TRUE) {
			//添加文件，可以循环
			foreach ($all_src as $key => $value) {
				$attachfile = $value['src'];
				$attachfile = iconv("UTF-8", "GBK", $attachfile); //转码，打包中文文档
				$zip->addFile($attachfile, basename($attachfile)); //把文件放入zip
			}
			// 添加word文档
			$attachfile = $word_name;
			$attachfile = iconv("UTF-8", "GBK", $attachfile); //转码，打包中文文档
			$zip->addFile($attachfile, basename($attachfile));
			// 结束添加
			$zip->close();
			
		}
		header('Content-Description: File Transfer');
		header("content-type:application/x-zip-compressed");
//		header('Content-Disposition: attachment; filename=' . basename($filename));
		header('Content-Disposition: attachment; filename=试卷导出.zip');
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($filename));
		// ob_clean();   //清空但不关闭输出缓存
		// flush();
		@readfile($filename);
		@unlink($filename);//删除打包的临时zip文件。文件会在用户下载完成后被删除
		@unlink($word_name);
	}
	
	public function getDownZip($data) {
		$this->data = $data;
		$all_src = $this->getImgSrc();
		$result = array();
		foreach ($all_src as $key => $value) {
			$name = explode('/', $value);
			$index = count($name) - 1;
			$result[] = array(
				'name' => $name[$index],
				'src'  => $value,
			);
		}
		$new_data = $this->setImgSrc($result);
		$this->createZip($new_data, $result);
	}
	
}
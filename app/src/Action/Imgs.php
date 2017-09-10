<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\ORM\DataService;
use App\Settings\Settings;
use App\Action\Auth;

final class Imgs extends DataService {

	private $view;
	private $logger;
	private $path;
	private $user;
	private $userdata;

	public function __construct(Twig $view, LoggerInterface $logger) {
		parent::__construct($view, $logger);
		$this->view = $view;
		$this->logger = $logger;
		$this->path = Settings::IMGS_PATH;
		$this->user = new Auth($this->view, $this->logger);
		$this->userdata = $this->user->info();
		// check needed folder
		$this->create_dir_if_need($this->path);
	}

	public function __invoke(Request $request, Response $response, $args) {
		
	}

	public function Save(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
		$file = $request->getUploadedFiles();

		if ($file && $file['file']) {

			$type = strtolower(substr(strrchr($file['file']->getClientFilename(), "."), 1));

			$uid = uniqid();
			$filename = $uid . "." . $type;
			$filepath = $this->path . $filename;

			if (move_uploaded_file($file['file']->file, $filepath)) {

				$this->imageResize($filepath, $this->path . $uid . "_1920." . $type, 1920, null, 0);
				$this->imageResize($filepath, $this->path . $uid . "_1200." . $type, 1200, null, 0);
				$this->imageResize($filepath, $this->path . $uid . "_1000." . $type, 1000, null, 0);
				$this->imageResize($filepath, $this->path . $uid . "_768." . $type, 768, null, 0);
				$this->imageResize($filepath, $this->path . $uid . "_600." . $type, 600, null, 0);
				$this->imageResize($filepath, $this->path . $uid . "_480." . $type, 480, null, 0);

				// add new img to list
				$this->__addImgToList($uid . "." . $type);

				//$result = array("file" => $this->path . $uid . "_480." . $type, "filepath" => $filepath, "type" => $type, "tmp" => $file['file']->file);
				$result = array("file" => $uid . "." . $type, "filepath" => $filepath, "type" => $type, "tmp" => $file['file']->file);
				return $response->withJson($result);
			}
		}
		return $response->withStatus(400);
	}

	public function Drop(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
		$params = $request->getParsedBody();
		$answer = Array();
		if ($params["list"]) {
			$arr = json_decode($params["list"], true);
			foreach ($arr as $value) {
				$filedata = explode(".", $value);
				$answer[$value] = unlink($this->path . $filedata[0] . "." . $filedata[1]);
				unlink($this->path . $filedata[0] . "_1920." . $filedata[1]);
				unlink($this->path . $filedata[0] . "_1200." . $filedata[1]);
				unlink($this->path . $filedata[0] . "_1000." . $filedata[1]);
				unlink($this->path . $filedata[0] . "_768." . $filedata[1]);
				unlink($this->path . $filedata[0] . "_600." . $filedata[1]);
				unlink($this->path . $filedata[0] . "_480." . $filedata[1]);

				// delete img from list
				$this->__deleteImgFromList($value);
			}
			return $response->withJson($answer);
		}
		return $response->withStatus(400);
	}

	public function GetList(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
		$data = $this->getImgsData();
		$result = array();
		if (isset($args["user_id"])) {
			foreach ($data as $key => $value) {
				if ($value["user"] === $args["user_id"]) {
					$result[$key] = $value;
				}
			}
		} else {
			$result = $data;
		}
		if ($args["local"]) {
			return $result;
		} else {
			return $response->withJson($result);
		}
	}

	public function __createPhotosArr(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {

		$data = json_decode(file_get_contents(__DIR__ . "/json/main.json"), true);

		$arr = array();

		$files = $this->scan_dir();

		foreach ($files as $value) {
			$filedata = explode(".", $value);
			$arr[$filedata[0]] = array(
			    "type" => $filedata[1],
			    "url" => $value,
			    "title" => "",
			    "txt" => ""
			);
		}

		$data["photos"] = $arr;

		if (file_put_contents(__DIR__ . "/json/main.json", json_encode($data))) {
			return $data["photos"];
		} else {
			return false;
		}
	}

	private function __addImgToList($url) {
		$data = $this->getImgsData();
		$filedata = explode(".", $url);
		$data[$filedata[0]] = array(
		    "type" => $filedata[1],
		    "url" => $url,
		    "user" => $this->userdata ? $this->userdata["id"] : "",
		    "create_dt" => time()
		);
		$this->saveImgsData($data);
	}

	private function __deleteImgFromList($url) {
		$data = $this->getImgsData();
		$filedata = explode(".", $url);
		if (isset($data[$filedata[0]])) {
			unset($data[$filedata[0]]);
		}
		$this->saveImgsData($data);
	}

	public function scan_dir() {
		$ignored = array('.', '..', '.svn', '.htaccess');

		$files = array();
		foreach (scandir($this->path) as $file) {
			if (in_array($file, $ignored)) {
				continue;
			}
			if (!preg_match("/_/i", $file)) {
				$files[$file] = filemtime($this->path . $file);
			}
		}

		arsort($files);
		return array_keys($files);
	}

	public function Get(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
		$req = $request->getQueryParams();

		$path_parts = pathinfo($this->path . $req['img']);

		$curr_filename = $this->path . $path_parts['filename'] . "." . $path_parts['extension'];
		$size = getimagesize($curr_filename);
		header("Content-type: {$size['mime']}");
		echo file_get_contents($curr_filename);
		exit;
	}

	public function GetUrl(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
		$req = $request->getQueryParams();

		$path_parts = pathinfo($this->path . $req['img']);

		$cw = '_1920';
		switch (true) {
			case (int) $req['w'] >= 1920:
				$cw = '_1920';
				break;
			case (int) $req['w'] < 1920 && (int) $req['w'] >= 1200:
				$cw = '_1200';
				break;
			case (int) $req['w'] < 1200 && (int) $req['w'] >= 1000:
				$cw = '_1000';
				break;
			case (int) $req['w'] < 1000 && (int) $req['w'] >= 768:
				$cw = '_768';
				break;
			case (int) $req['w'] < 768 && (int) $req['w'] >= 600:
				$cw = '_600';
				break;
			case (int) $req['w'] < 600 && (int) $req['w'] >= 480:
				$cw = '_480';
				break;
			default:
				$cw = '_480';
				break;
		}

		$curr_filename = $this->path . $path_parts['filename'] . $cw . "." . $path_parts['extension'];
		print(json_encode(array("result" => 200, "content" => $curr_filename)));
		exit;

		//return $response->write($curr_img)->withHeader("Content-Type", "image/png")->withHeader("Content-length", strlen($curr_img));
	}

	private function imageResize($src, $dst, $width, $height, $crop = 0) {

		if (!list($w, $h) = getimagesize($src)) {
			return "Unsupported picture type!";
		}

		if (!$width) {
			$width = $w;
		}
		if (!$height) {
			$height = $h;
		}

		$type = strtolower(substr(strrchr($src, "."), 1));

		if ($type == 'jpeg') {
			$type = 'jpg';
		}

		switch ($type) {
			case 'bmp': $img = imagecreatefromwbmp($src);
				break;
			case 'gif': $img = imagecreatefromgif($src);
				break;
			case 'jpg': $img = imagecreatefromjpeg($src);
				break;
			case 'png': $img = imagecreatefrompng($src);
				break;
			default : return "Unsupported picture type!";
		}

		// resize
		if ($crop) {
			if ($w < $width or $h < $height) {
				return "Picture is too small!";
			}
			$ratio = max($width / $w, $height / $h);
			$h = $height / $ratio;
			$x = ($w - $width / $ratio) / 2;
			$w = $width / $ratio;
		} else {
			if ($w < $width and $h < $height) {
				return "Picture is too small!";
			}
			$ratio = min($width / $w, $height / $h);
			$width = $w * $ratio;
			$height = $h * $ratio;
			$x = 0;
		}

		$new = imagecreatetruecolor($width, $height);

		// preserve transparency
		if ($type == "gif" or $type == "png") {
			imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
			imagealphablending($new, false);
			imagesavealpha($new, true);
		}

		imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);

		switch ($type) {
			case 'bmp': imagewbmp($new, $dst);
				break;
			case 'gif': imagegif($new, $dst);
				break;
			case 'jpg': imagejpeg($new, $dst);
				break;
			case 'png': imagepng($new, $dst);
				break;
		}
		return true;
	}

	public function SaveMainData(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
		$params = $request->getParsedBody();

		$data = json_decode(file_get_contents(__DIR__ . "/json/main.json"), true);

		$data["contacts"]["email"] = $params["contacts_email"];
		$data["contacts"]["whatsApp"] = $params["contacts_whatsApp"];
		$data["contacts"]["instagram"] = $params["contacts_instagram"];

		$data["links"]["instagram"] = $params["links_instagram"];
		$data["links"]["twitter"] = $params["links_twitter"];
		$data["links"]["youtube"] = $params["links_youtube"];

		if (file_put_contents(__DIR__ . "/json/main.json", json_encode($data))) {
			print(json_encode(array("result" => 200, "content" => "success")));
		} else {
			print(json_encode(array("result" => 400, "content" => $data)));
		}
	}

	public function SaveVideoData(\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
		$params = $request->getParsedBody();

		$data = json_decode(file_get_contents(__DIR__ . "/json/main.json"), true);

		$data["video"][] = $params["video_link"];

		if (file_put_contents(__DIR__ . "/json/main.json", json_encode($data))) {
			print(json_encode(array("result" => 200, "content" => $params["video_link"])));
		} else {
			print(json_encode(array("result" => 400, "content" => $data)));
		}
	}

	public function PhotoInfo(Request $request, Response $response, $args) {
		$data = json_decode(file_get_contents(__DIR__ . "/json/main.json"), true);

		$result = null;
		if (isset($data["photos"]) && isset($data["photos"][$args["curr_id"]])) {
			$result = $data["photos"][$args["curr_id"]];
			if (isset($data["main_photo"]) && $data["main_photo"] == $args["curr_id"]) {
				$result["is_main"] = true;
			}
		}

		return $response->withJson(array("result" => 200, "content" => $result));
	}

	public function PhotoUpdate(Request $request, Response $response, $args) {
		$params = $request->getParsedBody();
		$data = json_decode(file_get_contents(__DIR__ . "/json/main.json"), true);

		$result = null;
		if (isset($data["photos"]) && isset($data["photos"][$params["curr_id"]])) {
			$result = $data["photos"][$params["curr_id"]];

			$data["photos"][$params["curr_id"]]["title"] = $params["title"];
			$data["photos"][$params["curr_id"]]["txt"] = $params["txt"];
			$data["photos"][$params["curr_id"]]["dt_upd"] = time();
		}

		if (isset($params["main"]) && $params["main"]) {
			$data["main_photo"] = $params["curr_id"];
		}

		if (file_put_contents(__DIR__ . "/json/main.json", json_encode($data))) {
			return $response->withJson(array("result" => 200, "content" => "success"));
		} else {
			return $response->withJson(array("result" => 400, "content" => $data));
		}
	}

	//----------------------------------------------------------------------
	// IMGs views
	//----------------------------------------------------------------------

	public function FormView(Request $request, Response $response, $args) {
		$data = $this->GetList($request, $response, array(
		    "user_id" => $this->userdata["id"],
		    "local" => true
		));
		
		print_r($data);
		exit;

		$this->view->render($response, 'admin/imgs/form.twig', array(
		    "imgs" => $data
		));
		return $response;
	}

}

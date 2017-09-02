<?php

namespace App\ORM;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Settings\Settings;

class BaseDataService {

	private $view;
	private $logger;

	public function __construct(Twig $view, LoggerInterface $logger) {
		$this->view = $view;
		$this->logger = $logger;
	}

	/**
	 * 
	 * @param string $name datafile name - const from Settings
	 * @return array empty array
	 * @throws Exception
	 */
	protected function __createDatafile($name) {
		if (!$name) {
			throw new Exception('create datafile: name is empty');
		}
		$filename = Settings::dataPath() . $name . ".json";
		file_put_contents($filename, json_encode(array()));
		return array();
	}

	protected function __saveDatafile($name, $data) {
		if (!$name) {
			throw new Exception('create datafile: name is empty');
		}
		$filename = Settings::dataPath() . $name . ".json";
		return file_put_contents($filename, json_encode($data));
	}

	protected function __getData($datafile, $id = 0) {
		if (!$datafile) {
			throw new Exception('get data: datafile name is empty');
		}
		// check if dir not exists
		if (!file_exists(Settings::dataPath())) {
			mkdir(Settings::dataPath(), 0777, true);
		}

		$filename = Settings::dataPath() . $datafile . ".json";
		// check if file not exists
		if (!file_exists($filename)) {
			return $this->__createDatafile($datafile);
		}
		$data = json_decode(file_get_contents($filename), true);
		if ($id) {
			return $data[$id] ? $data[$id] : array();
		} else {
			return $data;
		}
	}

}

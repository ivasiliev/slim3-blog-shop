<?php

namespace App\Blog\ORM;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Settings\Settings;

class DataService {

        private $view;
        private $logger;
        private $path;

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
        private function __createDatafile($name) {
                if (!$name) {
                        throw new Exception('create datafile: name is empty');
                }
                $filename = Settings::dataPath() . $name . ".json";
                file_put_contents($filename, json_encode(array()));
                return array();
        }
        
        private function __saveDatafile($name, $data) {
                if (!$name) {
                        throw new Exception('create datafile: name is empty');
                }
                $filename = Settings::dataPath() . $name . ".json";
                return file_put_contents($filename, json_encode($data));
        }

        private function __getData($datafile, $id = 0) {
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

        /**
         * @return array full main data array
         */
        public function getMainData() {
                return $this->__getData(Settings::MAIN, 0);
        }

        /**
         * @return array - if isset $id - current elem array. else - all elems array
         * @param integer $id - id elem in datafile
         */
        public function getRecordData($id = 0) {
                return $this->__getData(Settings::RECORDS, $id);
        }

        /**
         * @return array - if isset $id - current elem array. else - all elems array
         * @param integer $id - id elem in datafile
         */
        public function getCommentData($id = 0) {
                return $this->__getData(Settings::COMMENTS, $id);
        }

        /**
         * @return array - if isset $id - current elem array. else - all elems array
         * @param integer $id - id elem in datafile
         */
        public function getAuthorData($id = 0) {
                return $this->__getData(Settings::AUTHORS, $id);
        }

        /**
         * @return array - if isset $id - current elem array. else - all elems array
         * @param integer $id - id elem in datafile
         */
        public function getCategoryData($id = 0) {
                return $this->__getData(Settings::CATEGORY, $id);
        }
        
        public function saveCategoryData($data) {
                return $this->__saveDatafile(Settings::CATEGORY, $data);
        }

}

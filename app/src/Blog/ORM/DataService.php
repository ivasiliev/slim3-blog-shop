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
        private function __createDatafile(string $name) {
                if (!$name) {
                        throw new Exception('create datafile: name is empty');
                }
                $filename = Settings::dataPath() . $name . ".json";
                file_put_contents($filename, json_encode(array()));
                return array();
        }

        private function __getData($datafile, $id = 0) {
                if (!$datafile) {
                        throw new Exception('get data: datafile name is empty');
                }
                // check if file not exists
                if (!file_exists($datafile)) {
                        return $this->__createDatafile($datafile);
                }
                $data = json_decode(file_get_contents(Settings::dataPath() . $datafile), true);
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

}

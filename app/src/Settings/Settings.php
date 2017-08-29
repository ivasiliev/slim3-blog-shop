<?php

namespace App\Settings;

final class Settings {
        
        const MAIN = "main";
        const RECORDS = "records";
        const AUTHORS = "authors";
        const COMMENTS = "comments";
        const CATEGORY = "category";

        protected function __construct() {
        }

        /**
         * @return string path to data files
         */
        public static function dataPath() {
                return __DIR__ . "/../Data/";
        }

}


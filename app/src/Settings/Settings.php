<?php

namespace App\Settings;

final class Settings {
        
        const MAIN = "main";
        const POSTS = "posts";
        const AUTHORS = "authors";
        const COMMENTS = "comments";
        const CATEGORY = "category";
        const USERS = "users";

        protected function __construct() {
        }

        /**
         * @return string path to data files
         */
        public static function dataPath() {
                return __DIR__ . "/../Data/";
        }
	
        public static function adminBaseData() {
                return array(
		    "login"=>"admin",
		    "pass"=>"Qwer123",
		    "forse_access"=>true,
		    "access"=>array(
			"blog"=>array(
			    "view"=>1,
			    "edit"=>1,
			    "drop"=>1,
			    "create"=>1,
			    "self_full"=>1
			),
			"shop"=>1,
			"users"=>1
		    )
		);
        }

}


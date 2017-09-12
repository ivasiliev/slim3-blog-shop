<?php

namespace App\Settings;

final class Settings {

	// ---------------------------------------------------------------------
	// datafile name consts
	//----------------------------------------------------------------------
	const MAIN = "main";
	const POSTS = "posts";
	const AUTHORS = "authors";
	const COMMENTS = "comments";
	const CATEGORY = "category";
	const USERS = "users";
	const USERSESSIONS = "user_sessions";
	const IMGSLIST = "imgslist";
	// ---------------------------------------------------------------------
	// session cookie settings
	// ---------------------------------------------------------------------
	const SESSIONCOOKIE = '_evtfs';
	const SESSION_COOKIE_LIFETIME = 86400;
	//----------------------------------------------------------------------
	// IMGs files path
	//----------------------------------------------------------------------
	const IMGS_PATH = __DIR__ . "/../../../public/userimgs/";
	const IMGS_USERPATH = "/userimgs/";
	//----------------------------------------------------------------------
	// Posts files path
	//----------------------------------------------------------------------
	const POSTS_PATH = __DIR__ . "/../../../public/posts/";
	const POSTS_USERPATH = "/posts/";

	public function __construct() {
		
	}

	/**
	 * @return string path to data files
	 */
	public static function dataPath() {
		return __DIR__ . "/../Data/";
	}

	public static function MainAdminTemplate() {
		$arr = self::AdminDataTemplate();
		$arr["login"] = "admin";
		$arr["pass"] = "";
		return $arr;
	}

	public static function UserDataTemplate() {
		$arr = self::UserBaseData();
		$arr["access"]["blog"] = self::BlogAccessUser();
		$arr["access"]["shop"] = self::ShopAccessUser();
		$arr["access"]["admin"] = self::AdministrateAccessUser();
		return $arr;
	}

	public static function AdminDataTemplate() {
		$arr = self::UserBaseData();
		$arr["access"]["blog"] = self::BlogAccessAuthor();
		$arr["access"]["shop"] = self::ShopAccessAdmin();
		$arr["access"]["admin"] = self::AdministrateAccessAdmin();
		return $arr;
	}

	public static function UserBaseData($id, $email, $pass, $name) {
		return array(
		    "id" => $id,
		    "login" => $email,
		    "pass" => $pass,
		    "settings" => array(
			"email" => $email,
			"name" => $name,
			"descr" => "",
			"bg_img" => "",
			"photo" => ""
		    ),
		    "access" => array(
			"account" => 1,
			"settings" => 1,
			"comments" => 1,
			"favorites" => 1,
			"ratings" => 1
		    )
		);
	}

	// ---------------------------------------------------------------------
	// blog access
	// ---------------------------------------------------------------------
	public static function BlogAccessUser() {
		return array(
		    "access" => 0,
		    "view" => 0,
		    "create" => 0,
		    "edit" => 0,
		    "drop" => 0
		);
	}

	public static function BlogAccessAuthor() {
		return array(
		    "access" => 1,
		    "view" => 1,
		    "create" => 1,
		    "edit" => 1,
		    "drop" => 1
		);
	}

	// ---------------------------------------------------------------------
	// shop access
	// ---------------------------------------------------------------------
	public static function ShopAccessUser() {
		return array(
		    "access" => 1
		);
	}

	public static function ShopAccessAdmin() {
		return array(
		    "access" => 1
		);
	}

	// ---------------------------------------------------------------------
	// administrate access
	// ---------------------------------------------------------------------
	public static function AdministrateAccessUser() {
		return array(
		    "blog" => 0,
		    "shop" => 0,
		    "users" => 0
		);
	}

	public static function AdministrateAccessAdmin() {
		return array(
		    "blog" => 1,
		    "shop" => 1,
		    "users" => 1
		);
	}

}

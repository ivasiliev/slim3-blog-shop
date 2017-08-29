<?php

namespace App\Blog\ORM;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class DataService {

    private $view;
    private $logger;
    private $path;

    protected function __construct(Twig $view, LoggerInterface $logger) {
	$this->view = $view;
	$this->logger = $logger;
    }
    
    /**
     * return all blog records data
     */
    protected function getList(){
            
    }
    
    /**
     * @param integer $id - id blog record
     * @return array - current blod record data by ID
     */
    protected function getRecordData($id){
            
    }
    
    /**
     * @return array - comments by ID current blod record
     * @param integer $id - id blog record
     */
    protected function getCommentList($id){
            
    }
    
    /**
     * @return array - current blod record data by ID
     * @param integer $id - id blog record
     */
    protected function getCommentData($id){
            
    }
}
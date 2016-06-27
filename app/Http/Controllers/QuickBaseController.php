<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use QuickBase\QuickBase;

use App\Http\Requests;

class QuickBaseController
{

    public $qb;

    public function __construct()
    {
        try {
            $this->qb = new QuickBase(array(
                'realm' => 'salvatoremitrano',
                'appToken' => 'bdzp2egcktmjpnbtdudhkchx3bff'
            ));

            $this->qb->api('API_Authenticate', array(
                'username' => 'mitranosalvatore@gmail.com',
                'password' => '1q2w3e4r'
            ));

        }catch(\QuickBase\QuickBaseError $err){
            echo '('.$err->getCode().') '.$err->getMessage().'. '.$err->getDetails();
        }
    }


    public function getDatabases(){
        try {
            $result = $this ->qb->api('API_GrantedDBs');
            return $result;
        }catch(\QuickBase\QuickBaseError $err){
            echo '('.$err->getCode().') '.$err->getMessage().'. '.$err->getDetails();
        }
    }

    public function createDatabase($dbName, $dbDescription){
        try {
            $result = $this ->qb->api('API_CreateDatabase', array(
                'dbname' => $dbName,
                'dbdesc' => $dbDescription
            ));
            return $result;
        }catch(\QuickBase\QuickBaseError $err){
            echo '('.$err->getCode().') '.$err->getMessage().'. '.$err->getDetails();
        }
    }

    public function deleteDatabase($dbID){
        try {
            $result = $this ->qb->api('API_DeleteDatabase', array(
                'dbid' => $dbID
            ));
            return $result;
        }catch(\QuickBase\QuickBaseError $err){
            echo '('.$err->getCode().') '.$err->getMessage().'. '.$err->getDetails();
        }
    }

    public function getDatabaseInfo($dbID){
        try {
            $result = $this ->qb->api('API_GetSchema', array(
                'dbid' => $dbID
            ));
            return $result;
        }catch(\QuickBase\QuickBaseError $err){
            echo '('.$err->getCode().') '.$err->getMessage().'. '.$err->getDetails();
        }
    }
}

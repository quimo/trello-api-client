<?php

namespace TrelloApiClient;

class Trello {
    
    private static $http_client;
    private static $boards;

    public static function Init() {

        //ambiente
        $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        //client http
        self::$http_client = new \GuzzleHttp\Client(
            array(
                'base_uri' => 'https://api.trello.com/1/'
            )
        );

    }

    public static function getClient() {
        return self::$http_client;
    }


    public static function getAuthPars() {
        return 'key=' . getenv('TRELLO_APIKEY') . '&token=' . getenv('TRELLO_TOKEN');
    }

    public static function getBoards() {
        self::$boards = Board::getAll(self::getClient(), self::getAuthPars());
    }

}
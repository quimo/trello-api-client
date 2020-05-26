<?php

namespace TrelloApiClient;

class Board {

    private const BOARD_ENDPOINTS = array(
        'getAll' => array(
            'endpoint' => 'members/me/boards',
            'verb' => 'GET',
        ),
    );

    private function getVerb($method) {
        return self::BOARD_ENDPOINTS[$method]['verb'];
    }
    private function getUrl($method) {
        return self::BOARD_ENDPOINTS[$method]['endpoint'];
    }

    public static function getAll($client, $auth) {
        try {
            $response = $client->request(self::getVerb(__FUNCTION__), self::getUrl(__FUNCTION__) . '?' . $auth);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        if ($response->getStatusCode() == 200) {
            $board_data = json_decode($response->getBody(), true);
            var_dump($board_data);
        }
    }

}
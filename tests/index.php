<?php

require __DIR__ . '/../vendor/autoload.php';

use TrelloApiClient\Trello;

Trello::init();
Trello::getBoards();

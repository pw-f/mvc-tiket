<?php

if (!session_id()) {
    session_start();
}

require_once '../app/_init.php';

$app = new App();

// dd($app);
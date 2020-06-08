<?php

include_once ('connection.php');

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        header('Content-Type: application/json');
        $sql = "SELECT c.id ,c.user_name as user, s.name as 'song',c.timp,text from comments c join songs s on song_id = s.id order by timp";
        if($result = mysqli_query($db, $sql)) {
          echo json_encode(mysqli_fetch_all($result));
        } else {
          echo json_encode("failed");
        }

    break;

    default:
        http_response_code(400);
    break;

}

<?php
header('Content-Type: application/json', true, 404);
echo json_encode(array('success' => false,
    'message' => $message));
exit();
<?php
// Изключваме показването на грешки директно в изхода, за да не развалим JSON-а
error_reporting(0); 
ini_set('display_errors', 0);

session_start();
if (!isset($_SESSION['loged']) || !$_SESSION['loged']) {
    header('Content-Type: application/json');
    echo json_encode(['error' => ['message' => 'Нямате достъп.']]);
    exit;
}

// Път до папката за снимки (от гледна точка на този PHP файл)
$uploadDir = '../assets/img/editor_uploads/'; 

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (isset($_FILES['upload'])) {
    $file = $_FILES['upload'];
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = time() . '_' . uniqid() . '.' . $extension;
    $uploadPath = $uploadDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        // ВАЖНО: Пътят, който връщаме, трябва да е ПЪЛЕН URL за браузъра
        // Ако сте на localhost/SunnyDays, пътят трябва да е така:
        $url = '/assets/img/editor_uploads/' . $fileName;
        
        header('Content-Type: application/json');
        echo json_encode([
            'url' => $url
        ]);
        exit;
    }
}

header('Content-Type: application/json');
echo json_encode(['error' => ['message' => 'Грешка при качването.']]);
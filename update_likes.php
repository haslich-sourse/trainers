<?php
header('Content-Type: application/json');

try {
    $pdo = new PDO("mysql:host=localhost;dbname=your_database", "your_username", "your_password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];

    // Обновляем количество лайков в базе данных
    $stmt = $pdo->prepare("UPDATE likes SET count = count + 1 WHERE id = :id");
    $stmt->execute(['id' => $id]);

    // Получаем обновленное количество лайков
    $stmt = $pdo->prepare("SELECT count FROM likes WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $likes = $stmt->fetchColumn();

    echo json_encode(['likes' => $likes]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}

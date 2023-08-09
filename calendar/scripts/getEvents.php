<?php


$date = $_GET['date'];
$events = null;
try {
    // Connect to the database and retrieve events for the specified date
    $conn = new PDO("mysql:host=localhost;dbname=lpaosf", "root", "");
    $stmt = $conn->prepare("SELECT name, date, description, heure FROM events WHERE date = :date");
    $stmt->bindParam(':date', $date);
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
}

// Return the events in JSON format
header('Content-Type: application/json');
echo json_encode($events);
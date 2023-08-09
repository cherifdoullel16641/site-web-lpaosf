<?php


$events = null;
try {
    // Connect to the database and retrieve events for the specified date
    $conn = new PDO("mysql:host=localhost;dbname=lpaosf", "root", "");
    $stmt = $conn->prepare("SELECT name, date, description, heure FROM events ORDER BY -date");
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

   
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

 // Return the events in JSON format
 header('Content-Type: application/json');
 echo json_encode($events);
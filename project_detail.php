<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Detail</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>

<?php
require_once('connect.php');

$projectId = $_GET['id'];
$query = 'SELECT p.title, p.description, GROUP_CONCAT(m.image_filename) AS images 
          FROM projects p 
          LEFT JOIN media m ON p.id = m.project_id 
          WHERE p.id = :projectId';
$stmt = $connection->prepare($query);
$stmt->bindParam(':projectId', $projectId, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$images = explode(",", $row['images']);
$stmt = null;
?>

<h1><?php echo $row['title']; ?></h1>
<p><?php echo $row['description']; ?></p>

<section class="project-gallery">
    <?php 
    foreach($images as $image) {
        echo '<img class="portfolio-image" src="images/'.$image.'" alt="Project Image">';
    }
    ?>
</section>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<?php
require_once('connect.php');
$stmt = $connection->prepare('SELECT * FROM projects ORDER BY title ASC');
$stmt->execute();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Page</title>
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>

<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<section class="project-con">
            <h3>' . $row['title'] . '</h3>
            <a href="project_detail.php?id=' . $row['id'] . '">
                <img class="thumbnail" src="images/' . $row['image_url'] . '" alt="Project Thumbnail">
            </a>
            <p>' . $row['description'] . '</p>
          </section>';
}
$stmt = null;
?>

</body>
</html>
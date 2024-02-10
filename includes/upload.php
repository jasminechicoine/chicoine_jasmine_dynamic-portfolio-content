<?php
$target_directory = '../images/';
$target_file = $target_directory . 'img' . time();
$imageFileType = strtolower(pathinfo($_FILES['uploaded']['name'], PATHINFO_EXTENSION));
$target_file .= '.' . $imageFileType;

if (move_uploaded_file($_FILES['uploaded']['tmp_name'], $target_file)) {
    echo 'The file ' . $target_file . ' has been uploaded.';
} else {
    echo 'Sorry, there was an error uploading your file.';
}
?>
<?php
if (isset($_FILES['image'])) {
    $file_error = $_FILES['image']['error'];
    if ($file_error === UPLOAD_ERR_OK) {
        // File is uploaded successfully, proceed to move the file
        $upload_dir = 'uploads/';
        $image_name = basename($_FILES['image']['name']);
        $target_file = $upload_dir . $image_name;
        
        // Check if the file is an image
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($image_file_type, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                echo "Image uploaded successfully!";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Only image files are allowed (jpg, jpeg, png, gif).";
        }
    } else {
        echo "Error occurred: " . $file_error;
    }
} else {
    echo "No file uploaded or an error occurred.";
}
?>


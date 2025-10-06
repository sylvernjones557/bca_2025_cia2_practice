<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
</head>
<body>

<h2>UPLOAD IMAGE</h2>

<!-- =====================
     Form to upload image
     ===================== -->
<form action="" method="post" enctype="multipart/form-data">
    <!-- File input for image -->
    <input type="file" name="file_name" accept="image/*" required>
    <!-- Submit button -->
    <input type="submit" value="Upload">
</form>

<?php
// Check if a file has been uploaded
if(isset($_FILES['file_name'])){
    
    // Temporary file path of uploaded image
    $fileTmp = $_FILES['file_name']['tmp_name'];

    // Get the file type (like image/jpeg, image/png)
    $fileType = $_FILES['file_name']['type'];

    // Read the file contents and convert to base64
    $imgData = base64_encode(file_get_contents($fileTmp));

    // Display the uploaded image directly on the webpage
    echo "<h3>Uploaded Image:</h3>";
    echo "<img src='data:$fileType;base64,$imgData' style='max-width:300px; max-height:300px;'>";
}
?>

</body>
</html>

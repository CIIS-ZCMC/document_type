<?php 

 
// Get the incoming image data
$image = $_POST["image"];

// Remove image/jpeg from left side of image data
// and get the remaining part
$image = explode(";", $image)[1];
 
// Remove base64 from left side of image data
// and get the remaining part
$image = explode(",", $image)[1];
 
// Replace all spaces with plus sign (helpful for larger images)
$image = str_replace(" ", "+", $image);
 
// Convert back from base64
$image = base64_decode($image);


define('UPLOAD_DIR', 'images/completeid');  
$img = $_POST['image'];  
$img = str_replace('data:image/png;base64,', '', $img);  
$img = str_replace(' ', '+', $img);  
$data = base64_decode($img);  
$file = UPLOAD_DIR.uniqid() . '.png';  
file_put_contents($file, $data);  
 
// Save the image as filename.jpeg
// $large_image_path = 'images/birth';

// file_put_contents($large_image_path, $image);
 
// Sending response back to client

$name=$_POST['name'];
$link = mysqli_connect("localhost", "root", "","inventorydb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 





// Attempt insert query execution

mysqli_query($link, "UPDATE client_cards SET identification='$file' where id='$name'");

 
// Close connection
mysqli_close($link);
echo $file;


?>
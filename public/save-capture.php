
<?php 


// Get the incoming image data

    


$image = $_POST["image"];
$image = explode(";", $image)[1];
 
// Remove base64 from left side of image data
// and get the remaining part
$image = explode(",", $image)[1];
 
// Replace all spaces with plus sign (helpful for larger images)
$image = str_replace(" ", "+", $image);
 
// Convert back from base64
$image = base64_decode($image);
$file = '';
if(!empty($image))
{
    define('UPLOAD_DIR', 'completeid');  
    $img = $_POST['image']; 
    $img = str_replace('data:image/png;base64,', '', $img);  
    $img = str_replace(' ', '+', $img);  
    $data = base64_decode($img);  
    $name=$_POST['name'];
    $cardtype=$_POST['cardtype'];
    $file .= UPLOAD_DIR . $cardtype .$name. '.png';  
   

    // if(file_exists(public_path($file))){
       
    //   }else{
        file_put_contents($file, $data);  

      
      // }

    $link = mysqli_connect("localhost", "root", "","inventorydb");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    mysqli_query($link, "UPDATE client_cards SET identification='$file' where id='$name'");
    mysqli_close($link);


    
   
   

   

}
  
                     

                     
                   
    




                    
    



?>
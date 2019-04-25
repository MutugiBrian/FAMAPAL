<?php 
if(isset($_FILES["image"]["type"]))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["image"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"] == "image/jpg") || ($_FILES["image"]["type"] == "image/jpeg")
) && ($_FILES["image"]["size"] < 100000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["image"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("upload/" . $_FILES["image"]["name"])) {
echo $_FILES["image"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
}
else
{
$sourcePath = $_FILES['image']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "uploads/profileimages/".$_FILES['image']['name']; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
echo "<br/><b>File Name:</b> " . $_FILES["image"]["name"] . "<br>";
echo "<b>Type:</b> " . $_FILES["image"]["type"] . "<br>";
echo "<b>Size:</b> " . ($_FILES["image"]["size"] / 1024) . " kB<br>";
echo "<b>Temp file:</b> " . $_FILES["image"]["tmp_name"] . "<br>";
}
}
}
else
{
echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}
}else{
echo "no image";
}
?>
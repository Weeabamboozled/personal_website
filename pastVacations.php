<?php
        require "header.php";
?>
<h1>New Port, Rhode Island | 7/18/2019</h1>
    <br><img src="Newport7_18_2019.jpeg" alt="Newport7_18_2019">
<h1>Rhode Island, California | 7/7/2020</h1>
    <br><img src="Tahoe7_7_2020.jpg" alt="Tahoe7_7_2020">

    <?php
    require "header.php";
    include_once 'databaseHandler.inc.php';
    require "upload.php"
?>

<form action="" method="post" enctype="multipart/form-data">
    Select Image Files to Upload:
    <input type="file" name="files[]" multiple >
    <input type="submit" name="submit" value="UPLOAD">
</form>

<?php
// Get images from the database
$query = $conn->query("SELECT * FROM images ORDER BY id DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?> 


  	</body>
</html>
<?php
require './back/classes/db_connection.php';
require 'back/classes/CategoryDao.php';
$dao=new CategoryDao();

session_start();
// $cat_name = $_SESSION['cat_name'];

if (isset($_GET['delete'])) {
    $idc = $_GET['delete'];
    
    $cat=$dao->selectById($idc);
    $dao->delete($cat);
    header('Location: categories.php');
}

// -----------------------Modifier Categorie----------------------------------

if (isset($_POST['update'])) {
    $img = $_FILES['imageToUpload']['name'];
    $name = $_POST['catName'];
    $catDescription = $_POST['catDescription'];
    $cat_img_tmp = $_FILES['imageToUpload']['tmp_name'];
    $cat_image_folder = 'assets/img/' . $img;
    $c=new Category($_POST['update'],$name,$catDescription,$cat_img_tmp);
    $dao->update($c);
    header('location: categories.php');
    // $request = "UPDATE category
    //             SET name = '$name',
    //             description = '$catDescription',
    //             image = '$img'
    //             WHERE name like '%$cat_name%'";
    
    // $stmt = mysqli_query($conn, $request);
    // move_uploaded_file($cat_img_tmp, $cat_image_folder);
    // if ($stmt) {
        
    //     header('location: categories.php');
    // } else {
    //     die("Échec de la connexion : " . mysqli_error($conn));
    // }
}




  ?>
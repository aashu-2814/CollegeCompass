<?php


$msg="";

if (isset($_POST['upload'])) {
    $target="images/".basename($_FILES['image']['name']);

    $db=mysqli_connect("localhost","root","","collegecompass");

    $image=$_FILES['image']['name'];
    $text=$_POST['text'];

    $sql="INSERT INTO images (image,text) VALUES('$image','$text')";
    mysqli_query($db,$sql);

    if(move_uploaded_file($_FILES['image']['name'],$target))
    {
        $msg="Image uploaded successfully";

    }
    else{
        $msg="There was a problem ";
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width , initial-scale=1.0 ">
        <title>Know Your College </title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@500;900&family=Noto+Sans:wght@100;200;400;600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,800;1,300;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    </head>
    <body>

        
        <section class="sub-header">
            <nav>
                
                
        <a href="index.html"><img src="images/logo.png" alt="logo" class="logo"></a>
        <div class="club">       
        <h1>Clubs</h1>
        </div>
                <div class="navlinks" id="Navlinks">
                    <i class="fa fa-times" onclick="hideMenu()"></i>
                    <ul>
                        <li><a href="index.html">HOME</a></li>
                        <li><a href=" ">MAP</a></li>
                        <li><a href="clubs.php">CLUBS</a></li>
                        <li><a href=" ">ACADEMICS</a></li>
                       
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
            </nav>
            
        </section>

        <section class="">
       

    </body>
</html>
<!-- ------Footer
<section class="footer">
    <h4>About Us </h4>
    <p>info</p>
<div class="icons">
    <i class="fa fa-facebook"></i>
    <i class="fa fa-twitter"></i>
    <i class="fa fa-instagram"></i>
    <i class="fa fa-linkedin"></i>
    
</div>    
</section> -->


               

            </div>

        </div>
    </div>
   </div>

   <!DOCTYPE html>
<html>
    <head>
        
        <link rel="stylesheet" type="text/css" href="style1.css">

    </head>
    <body>
        <div id="content" class="content">
            <?php
             $db=mysqli_connect("localhost","root","","collegecompass");
              $sql="SELECT * FROM images";
              $result=mysqli_query($db , $sql);
              while ($row= mysqli_fetch_array($result))
              {
                echo "<div id=img_div>";
                echo "<img src='images/".$row['image']."'>";
                echo"<p>".$row['text']."</p>";
                echo"</div>";
              }
            ?>
            <form method="post" action="clubs.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                    <input type="file" name="image">

                </div>
                <div>
                    <textarea name="text" cols="40" rows="4" placeholder="say something about this image..">

                    </textarea>

                </div>
                <div>
                    <input type="submit" name="upload" value="Upload image">

                </div>
            </form>
        </div>
    </body>
</html>
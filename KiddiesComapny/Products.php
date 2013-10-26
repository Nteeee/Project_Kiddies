<?php
session_start();
include 'classes/MainController.php';
$ctrl= new MainController();
;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kiddies Company</title>
<meta name="keywords" content="Professional Template, HTML, CSS, free website template" />
<meta name="description" content="Professional Template, HTML, CSS, free website template provided by freecsstemplates.in" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header_wrapper"> <!-- end of header -->
</div>  <!-- end of header wrapper -->
<!-- end of banner wrapper -->
<div id="menu_wrapper">
    <div id="menu">
        <ul>
            <li><a href="index.php"><span></span>Login</a></li>
            <li><a href="register.php"><span></span>Register</a></li>
            <li><a href="Products.php" class="current"><span></span>Products</a></li>
             <li><a href="contacts.php"><span></span>Contact Us</a></li>
            <li><a href="about.php"><span></span>About us</a></li>

        </ul>
    </div> <!-- end of menu -->
</div> <!-- end of menu wrapper -->

<div id="content_wrapper">
<div id="content">

    <div id="content_left">
        <div class="content_left_section">
            <?php
                include 'includes/searchProducts.html';
                if($_POST['submit']=='Search')
                    {
                        $msg=$ctrl->SearchProducts($_POST['name'], $_POST['category']);
                    }
            ?>
            </div>

            <div class="margin_bottom_30"></div>


            <div class="margin_bottom_20"></div>
            <div class="rc_btn_02">
                <?php
                    echo $msg;
                ?>
            </div>
        <div class="cleaner"></div>

        </div>   <!-- end of news section -->

        <div class="margin_bottom_20 border_bottom"></div>
        <div class="margin_bottom_20"></div>

        <div class="cleaner_h30">
            <?php
                //include 'includes/Add_to_cart.html';
                if($_POST['submit']=="Add To Cart")
                {
                    echo "getting to this point";
                }
            ?>
        </div>
    </div> <!-- end of content left -->

    <div id="content_right">

        <div class="margin_bottom_40 border_bottom"></div>
        <div class="margin_bottom_40"></div>

        <div class="content_right_section">
            <div class="cleaner">
            </div>
        </div>
        <div class="cleaner_h20"></div>
    </div> <!-- end of content right -->

<div class="cleaner">&nbsp;</div>

</div> <!-- end of content -->
</div> <!-- end of content wrapper -->

<div id="footer_wrapper">
    <div id="footer">
        Copyrights : Ncumisa Booi and Nthabiseng Mononyane <a href="booshhof@gmail">Kiddies Company</a>
    </div><!-- end of footer -->
</div><!-- end of footer wrapper -->
</body>
</html>
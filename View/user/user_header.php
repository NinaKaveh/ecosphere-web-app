<!DOCTYPE html>
<?php session_start();
if(!empty($_SESSION['name'])) {?>
<header>
    <div id="header">
        <img id="ecosphere_logo" src="../img/logo-paysage.png" alt="logo" width="195"/>
        <img id="isep_logo" src="../img/logo-isep.png" alt="logo" width="60"/>

        <div id="banner">
            <nav class="navbar">
                <a href="user_homepage.php">Home</a>
                <a href="user_profile.php">Profile</a>
                <a href="all_articles.php">All articles</a>
                <a href="../covid.php">COVID-19</a>
                <span>Hello <?php echo $_SESSION['name'];?></span><button class="//button" onclick="window.location.href='logout.php'">Logout</button>
            </nav>

        </div>


    </div>
</header>
<?php
} else {
    header('Location: https://ecosphere.cf/');
    exit();
}?>
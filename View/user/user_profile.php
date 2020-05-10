<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../js/include_header_footer.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/global.css"/>
    <title>Profile</title>
</head>

<body>
<header>
    <?php require_once ("user_header.php"); ?>
</header>

<main>
    <section id="articles">
        <h1>Hi <?php $all_name = explode(' ',$_SESSION['name']); $first_name = $all_name[0];echo $first_name;?>,</h1>
        <h2>Top 3 <?php echo $first_name;?>'s article :</h2>
        <div class="grid-article">
            <section class="article_row">
                "WIP"
            </section>
        </div>
        <br><br><br>
    </section>

    <section id="user_points">
        <fieldset class="points">
            <legend>Your profile :</legend>
            <label>Name : <?php echo $_SESSION['name']; ?></label><br><br>
            <label>Points : <?php echo $_SESSION['xp']; ?></label><br><br>
            <label>Your biography : <?php echo $_SESSION['bio']?></label><br><br>
                    <?php
                        try {
                            include("../../Model/connect.php");
                        } catch (Exception $e) {
                            die('Erreur : ' . $e->getMessage());
                        }
                        $token_req = $bdd->prepare("SELECT password FROM user WHERE id LIKE :id");
                        $token_req->bindParam(":id",$_SESSION['id']);
                        $token_req->execute();
                    ?>
            <label>Your API's id : <?php echo $_SESSION['id'] ?></label><br><br>
            <label>You secret token :</label> <input readonly style="width: 25%;color: white;" class="secret_token" value="<?php echo substr($token_req->fetchColumn(0),11,60)?>">
        </fieldset>
    </section>
</main>

<footer>
    <div id="userFooter">
        <script>addUserFooter();</script>
    </div>
</footer>
</body>
</html>

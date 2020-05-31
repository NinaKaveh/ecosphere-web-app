<!DOCTYPE html>
<html lang="en">
<head>
    <title>New article</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/global.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../js/include_header_footer.js"></script>
</head>
<body>
<header>
    <?php require_once ("user_header.php"); ?>
</header>

<?php
try {
    include("../../Model/connect.php");
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


if (isset($_POST['newArticleForm'])) {

    $title = htmlspecialchars(strtolower($_POST['title']));
    $content = htmlspecialchars(strtolower($_POST['content']));

    if (!empty($_SESSION['id']) AND !empty($_POST['title']) AND !empty($_POST['content'])) {

        $id = htmlspecialchars($_SESSION['id']);

        $insertArticle = $bdd->prepare("INSERT INTO article(title, content, date, id_user) VALUES(:title, :content, NOW(), :id)");
        $insertArticle->bindParam(":title", $title);
        $insertArticle->bindParam(":content", $content);
        $insertArticle->bindParam(":id", $id);
        $insertArticle->execute();

        $errorColor = "green";

        $error = "Your article has been published !";

        $title = "";
        $content = "";
        $date = "";
        $id = "";
        header('Location: all_articles.php');


    } else {
        $error = "All the fields must be completed ! (Your session may be expired)";
        $errorColor = "red";
    }

}


?>

<form method="POST" action="" id="newArticleForm" class="form-container-newA">
    <?php
        if (isset($error)) {
            echo '<font color=' . $errorColor . '>' . $error . "</font>";
        }
    ?>
    <label for="title"><h1>Title</h1></label>
    <input id="title" type="text" placeholder="Enter the Title of your article" name="title" required
           value="<?php if (isset($title)) {
               echo $title;
           } ?>">
    <label for="content"><h1>Content</h1></label>
    <textarea form="newArticleForm" id="content" type="text" placeholder="Enter the content of your article" name="content" required
           value="<?php if (isset($content)) {
               echo $content;
           } ?>"></textarea>
    <br>
    <button type="submit" name="newArticleForm" class="btn" >Publish</button>
</form>

<footer>
    <div id="footer">
        <div id="banner">
            <nav class="footerNav">
                <a href="../../index.php">Home |</a>
                <a href="../about.php">Us |</a>
                <a href="../help.php">Help |</a>
                <a href="../term_of_use.php">Term of use</a>
            </nav>
            <span class="footerNav">Copyright &copy; 2020</span>
        </div>
    </div>
</footer>
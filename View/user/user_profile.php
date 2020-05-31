<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your profile</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../js/include_header_footer.js"></script>
    <script type="text/javascript" src="../js/open_forms.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/global.css"/>
    <title>Profile</title>
</head>

<body>
<header>
    <?php require_once ("user_header.php"); ?>
</header>

<main id="main">
    <section id="articles">
        <h1>Hi <?php $all_name = explode(' ',$_SESSION['name']); $first_name = $all_name[0];echo $first_name;?>,</h1>
        <h2>Top 3 <?php echo $first_name;?>'s article :</h2>
        <div onclick="closeArticle()" class="article-popup-closer"></div>
        <div class="grid-article">
            <?php
            try {
                include("../../Model/connect.php");
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }

            $data_top3 = $bdd->prepare("SELECT article.id,article.title,article.content,article.date,user.name,COUNT(DISTINCT like_article.id_user) AS like_number FROM like_article INNER JOIN article ON article.id = like_article.id_article INNER JOIN user ON user.id = like_article.id_user WHERE user.id LIKE :user_id GROUP BY like_article.id_article ORDER BY like_number DESC LIMIT 3");
            $data_top3->bindParam(":user_id",$_SESSION['id']);
            $data_top3->execute();
            while ($article_top3 = $data_top3->fetch()) {
                if(strlen($article_top3['content']) > 128) {$contentPreview_top3 = substr($article_top3['content'],0,128) . "...";}
                else $contentPreview_top3 = $article_top3['content'];

                $like_req_top3 = $bdd->prepare("SELECT * FROM like_article WHERE id_article LIKE :id_article");
                $like_req_top3->bindParam(":id_article",$article_top3['id']);
                $like_req_top3->execute();
                $like_top3 = $like_req_top3->rowCount();

                echo '<section id="top3" class="article_row">

            <h4 style="text-align: center">' . $article_top3['title'] . '</h4>

            <p class="preview_article">' . $contentPreview_top3 . '</p>

            <p class="footer_article"><button type="button" onclick="openArticle(\'article-' . $article_top3['id'] . '\');">Continue reading...</button>
            <span> <a class="dislike_article" href="like_article.php?article=' . $article_top3['id'] . '&like=-1">-</a> ' . $like_top3 . ' <a class="like_article" href="like_article.php?article=' . $article_top3['id'] . '&like=1">+</a> </span>
            </p>
            
            <p class="author_article">
                Author : ' . $article_top3['name'] . '
                <span>Date : ' . date("d/m/Y", strtotime($article_top3['date'])) . '</span>
            </p>

        </section>';
                echo '<div class="article-popup" id="article-' . $article_top3['id'] . '">
                    <h1>' . $article_top3['title'] . '</h1>
                    <p>' . $article_top3['content'] . '</p>
                    <p class="author_article">
                        Author : ' . $article_top3['name'] . '
                        <span>Date : ' . date("d/m/Y", strtotime($article_top3['date'])) . '</span>
                    </p>
                    <button type="button" class="btn cancel" onclick="closeArticle();">Close</button>
            </div>';
            }

            ?>
        </div>
        <br><br><br>
    </section>

    <section style="text-align: center" id="user_points">
        <fieldset class="points">
            <legend style="margin: 0 auto;">Your profile :</legend><br><br>
            <label>Name : <?php echo $_SESSION['name']; ?></label><br><br>
            <label>Points : <?php
                try {
                    include("../../Model/connect.php");
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                $xp = 0;

                $like_req = $bdd->prepare("SELECT COUNT(like_article.id_user) FROM like_article INNER JOIN article ON like_article.id_article = article.id WHERE article.id_user LIKE :id_user");
                $like_req->bindParam(":id_user",$_SESSION['id']);
                $like_req->execute();
                $nb_like = $like_req->fetchColumn();

                $article_req = $bdd->prepare("SELECT COUNT(*) FROM article WHERE article.id_user LIKE :id_user");
                $article_req->bindParam(":id_user",$_SESSION['id']);
                $article_req->execute();
                $nb_article = $article_req->fetchColumn();

                $xp = $nb_like*10 + $nb_article*40;

                $token_req = $bdd->prepare("SELECT password FROM user WHERE id LIKE :id");
                $token_req->bindParam(":id",$_SESSION['id']);
                $token_req->execute();

                echo $xp; ?></label><br><br>
            <label>Your biography : </label>
            <form method="POST" action="edit_bio.php" id="update_bio">
                <textarea form="update_bio" id="bio" type="text" placeholder="<?php if (!empty($_SESSION['bio'])) { echo $_SESSION['bio'];} else { echo "Enter the content of your biography";} ?>" name="bio" required
                          value="<?php if (!empty($_SESSION['bio'])) echo $_SESSION['bio'];?>"></textarea>
                <br>
                <button type="submit" name="update_bio" class="btn" >Edit bio</button>
            </form><br>
            <label>Your API's id : <?php echo $_SESSION['id'] ?></label><br><br>
            <label>You secret token :</label> <input readonly style="width: 25%;color: white;" class="secret_token" value="<?php echo substr($token_req->fetchColumn(0),11,60)?>">
        </fieldset>
    </section>
</main>

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
</body>
</html>

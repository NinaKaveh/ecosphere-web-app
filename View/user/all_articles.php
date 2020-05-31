<!DOCTYPE html>
<html lang="en">
<head>
    <title>List of articles</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/global.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../js/include_header_footer.js"></script>
    <script type="text/javascript" src="../js/open_forms.js"></script>
</head>
<body>
<header>
    <?php require_once ("user_header.php"); ?>
</header>

<main id="main">
    <br>

    <button class="newArticle" onclick="window.location.href='new-article.php'"> <img style="margin-bottom: -5px" src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Black_pencil.svg" width="25px"> New article</button>
    <br>
    <h3 class="title-allArticle">Top 3 most liked articles</h3>
    <div class="grid-article">
        <?php
        try {
            include("../../Model/connect.php");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $data_top3 = $bdd->query("SELECT article.id,article.title,article.content,article.date,user.name,COUNT(DISTINCT like_article.id_user) AS like_number FROM like_article INNER JOIN article ON article.id = like_article.id_article INNER JOIN user ON user.id = like_article.id_user GROUP BY like_article.id_article ORDER BY like_number DESC LIMIT 3");
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

    <h3 class="title-allArticle">Most recent articles</h3>
    <div onclick="closeArticle()" class="article-popup-closer"></div>

    <div class ="grid-article">
        <?php

        $data = $bdd->query("SELECT article.id,article.title,article.content,article.date,user.name FROM article INNER JOIN user ON article.id_user = user.id ORDER BY article.id DESC");
        while ($article = $data->fetch()) {
            if(strlen($article['content']) > 128) {$contentPreview = substr($article['content'],0,128) . "...";}
            else $contentPreview = $article['content'];

            $like_req = $bdd->prepare("SELECT * FROM like_article WHERE id_article LIKE :id_article");
            $like_req->bindParam(":id_article",$article['id']);
            $like_req->execute();
            $like = $like_req->rowCount();

            echo '<section id="' . $article['id'] . '" class="article_row">

            <h4 style="text-align: center">' . $article['title'] . '</h4>

            <p class="preview_article">' . $contentPreview . '</p>

            <p class="footer_article"><button type="button" onclick="openArticle(\'article-' . $article['id'] . '\');">Continue reading...</button>
            <span> <a class="dislike_article" href="like_article.php?article=' . $article['id'] . '&like=-1">-</a> ' . $like . ' <a class="like_article" href="like_article.php?article=' . $article['id'] . '&like=1">+</a> </span>
            </p>
            
            <p class="author_article">
                Author : ' . $article['name'] . '
                <span>Date : ' . date("d/m/Y", strtotime($article['date'])) . '</span>
            </p>

        </section>';
            echo '<div class="article-popup" id="article-' . $article['id'] . '">
                    <h1>' . $article['title'] . '</h1>
                    <p>' . $article['content'] . '</p>
                    <p class="author_article">
                        Author : ' . $article['name'] . '
                        <span>Date : ' . date("d/m/Y", strtotime($article['date'])) . '</span>
                    </p>
                    <button type="button" class="btn cancel" onclick="closeArticle();">Close</button>
            </div>';
        }

        ?>
    </div>

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

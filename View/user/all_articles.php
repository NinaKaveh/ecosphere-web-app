<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/global.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../js/include_header_footer.js"></script>
    <script type="text/javascript" src="../js/open_forms.js"></script>
</head>
<body>
<header>
    <div id="userHeader">
        <script>addUserHeader();</script>
    </div>
</header>

<main id="main">
    <br>

    <button class="newArticle" onclick="window.location.href='new-article.php'"> <img style="margin-bottom: -5px" src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Black_pencil.svg" width="25px"> New article</button>
    <br>
    <h3 class="title-allArticle">Top 3 most liked articles</h3>
    <div class="grid-article">
        <section class="article_row">
            "WIP"
        </section>

        <section class="article_row">
            "WIP"
        </section>

        <section class="article_row">
            "WIP"
        </section>
    </div>

    <h3 class="title-allArticle">Most recent articles</h3>
    <div onclick="closeArticle()" class="article-popup-closer"></div>

    <div class ="grid-article">
        <?php
        try {
            include("../../Model/connect.php");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $data = $bdd->query("SELECT article.id,article.title,article.content,article.date,user.name FROM article INNER JOIN user ON article.id_user = user.id ORDER BY article.id DESC");
        while ($article = $data->fetch()) {
            if(strlen($article['content']) > 128) {$contentPreview = substr($article['content'],0,128) . "...";}
            else $contentPreview = $article['content'];

            echo '<section id="' . $article['id'] . '" class="article_row">

            <h4 style="text-align: center">' . $article['title'] . '</h4>

            <p class="preview_article">' . $contentPreview . '</p>

            <button type="button" onclick="openArticle(\'article-' . $article['id'] . '\');">Continue reading...</button>

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
    <div id="userFooter">
        <script>addUserFooter();</script>
    </div>
</footer>


</body>
</html>

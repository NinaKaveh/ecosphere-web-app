<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../js/include_header_footer.js"></script>
    <script type="text/javascript" src="../js/open_forms.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/global.css"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
    <title>Home Page</title>
</head>

<body>
<header>
    <?php require_once ("user_header.php"); ?>
</header>

<main id="main">

<h1>Hi <?php $first_name = explode(' ',$_SESSION['name']); echo $first_name[0];?>,</h1>
    <section id="articles">
        <h3>These are the 3 lastest articles,</h3>

        <div onclick="closeArticle()" class="article-popup-closer"></div>
        <div class="grid-article">

        <?php
        try {
            include("../../Model/connect.php");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $data_top3 = $bdd->prepare("SELECT article.id,article.title,article.content,article.date,user.name FROM article INNER JOIN user ON article.id_user = user.id ORDER BY article.id DESC LIMIT 3");
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
    </section>

        </fieldset>
    </section>

    <div class="panel">
        <h3>You will find bellow the latest data from the SARS-COV-2 pandemic in 5 of the worst affected countries.</h3>
        <p>All these data are collected from the API
            <a href="https://coronavirus-19-api.herokuapp.com/countries/." class="redirection">(click here to see)</a>.
            This website collected all the data from every country.</p>
        <table id="latest_covid_data" class="table table-bordered table-striped table-hover table-responsive"></table>
        <p> If you want to see the evolution in some countries <a class="redirection" href="../covid.php"> click
                here</a></p>
    </div>
    <script type="text/javascript" src="../js/fetch_covid_data.js"></script>

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

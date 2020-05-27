<?php session_start();
try { include("../../Model/connect.php"); } catch (Exception $e) { die('Erreur : ' . $e->getMessage()); }

    if (isset($_GET['article']) AND isset($_GET['like']) AND isset($_SESSION['id'])) {
        $article = htmlspecialchars($_GET['article']);
        $like = htmlspecialchars($_GET['like']);
        $id_user = htmlspecialchars($_SESSION['id']);

        if (!empty($article) AND !empty($like)) {
            $like_req = $bdd->prepare("SELECT * FROM like_article WHERE id_article LIKE :id_article AND id_user LIKE :id_user ");
            $like_req->bindParam(":id_article", $article);
            $like_req->bindParam(":id_user", $id_user);
            $like_req->execute();
            $is_like = $like_req->rowCount();
            if ($is_like == 0 AND $like == 1) {
                $insert_like = $bdd->prepare("INSERT INTO like_article(id_user, id_article) VALUES(:id_user, :id_article)");
                $insert_like->bindParam(":id_user", $id_user);
                $insert_like->bindParam(":id_article", $article);
                $insert_like->execute();
            } else if ($is_like == 1 AND $like == -1) {
                $delete_like = $bdd->prepare("DELETE FROM like_article WHERE id_article LIKE :id_article AND id_user LIKE :id_user ");
                $delete_like->bindParam(":id_user", $id_user);
                $delete_like->bindParam(":id_article", $article);
                $delete_like->execute();
            }
        }
    }
    header('Location: http://ecosphere.fr/View/user/all_articles.php#' . $article);





<?php
    try { include("connect.php"); } catch (Exception $e) { die('Erreur : ' . $e->getMessage()); }

    if (isset($_GET['type']) AND isset($_GET['token'])) {
        $type = htmlspecialchars($_GET['type']);
        $token = htmlspecialchars($_GET['token']);

        if(!empty($token) and strlen($token) == 49) {
            $token = "%".$token."%";

            $token_req = $bdd->prepare("SELECT password FROM user WHERE password LIKE :token_m");
            $token_req->bindParam(":token_m",$token);
            $token_req->execute();
            $token_check = $token_req->rowCount();

            if($token_check != 0 ) {
                header("Content-Type: application/json; charset=UTF-8");
                if($type == "article" AND empty($_GET['id'])) {
                    $article=array();
                    $articles_api["article"]=array();
                    $data = $bdd->query("SELECT article.id,article.title,article.content,article.date,user.name FROM article INNER JOIN user ON article.id_user = user.id ORDER BY article.id DESC");
                    while ($article_data = $data->fetch()) {
                        $idArticle = $article_data['id'];
                        $title = $article_data['title'];
                        $content = $article_data['content'];
                        $date = date("d/m/Y", strtotime($article_data['date']));
                        $author = $article_data['name'];
                        $nbWords = str_word_count($article_data['content']);

                        $article=array(
                            "id" => $idArticle,
                            "title" => $title,
                            "content" => $content,
                            "date" => $date,
                            "author" => $author,
                            "words" => $nbWords
                        );

                        array_push($articles_api["article"], $article);
                    }
                    http_response_code(200);
                    echo json_encode($articles_api);

                }
                elseif ($type == "article" AND !empty($_GET['id'])) {
                    $id_api = htmlspecialchars($_GET['id']);

                    $article=array();

                    $data = $bdd->prepare("SELECT article.id,article.title,article.content,article.date,user.name FROM article INNER JOIN user ON article.id_user = user.id WHERE article.id LIKE :id_article");
                    $data->bindParam(":id_article",$id_api);
                    $data->execute();

                    while ($article_data = $data->fetch()) {
                        $idArticle = $article_data['id'];
                        $title = $article_data['title'];
                        $content = $article_data['content'];
                        $date = date("d/m/Y", strtotime($article_data['date']));
                        $author = $article_data['name'];
                        $nbWords = str_word_count($article_data['content']);

                        $article=array(
                            "id" => $idArticle,
                            "title" => $title,
                            "content" => $content,
                            "date" => $date,
                            "author" => $author,
                            "words" => $nbWords
                        );

                    }
                    http_response_code(200);
                    echo json_encode($article);
                }
                elseif ($type == "user" AND empty($_GET['id'])) {
                    $user=array();
                    $users_api["user"]=array();
                    $data = $bdd->query("SELECT user.id,user.name,user.bio,user.xp FROM user");
                    while ($user_data = $data->fetch()) {
                        $id_user = $user_data['id'];
                        $name = $user_data['name'];
                        $bio = $user_data['bio'];
                        $xp = $user_data['xp'];
                        $nbWords = 0;

                        $data2 = $bdd->prepare("SELECT article.content FROM article INNER JOIN user ON article.id_user = user.id WHERE user.id LIKE :id_user");
                        $data2->bindParam(":id_user",$id_user);
                        $data2->execute();
                        while ($articleRow = $data2->fetch()) {
                            $nbWords = $nbWords + str_word_count($articleRow['content']);
                        }


                        $nbArticles = $data2->rowCount();

                        $user=array(
                            "id_api" => $id_user,
                            "name" => $name,
                            "bio" => $bio,
                            "xp" => $xp,
                            "nb_article" => $nbArticles,
                            "words" => $nbWords
                        );

                        array_push($users_api["user"], $user);
                    }
                    http_response_code(200);
                    echo json_encode($users_api);

                }
                elseif ($type == "user" AND !empty($_GET['id'])) {
                    $id_api = htmlspecialchars($_GET['id']);

                    $user=array();

                    $data = $bdd->prepare("SELECT user.id,user.name,user.bio,user.xp FROM user WHERE user.id LIKE :id_user");
                    $data->bindParam(":id_user",$id_api);
                    $data->execute();
                    while ($user_data = $data->fetch()) {
                        $id_user = $user_data['id'];
                        $name = $user_data['name'];
                        $bio = $user_data['bio'];
                        $xp = $user_data['xp'];
                        $nbWords = 0;

                        $data2 = $bdd->prepare("SELECT article.content FROM article INNER JOIN user ON article.id_user = user.id WHERE user.id LIKE :id_user");
                        $data2->bindParam(":id_user",$id_user);
                        $data2->execute();
                        while ($articleRow = $data2->fetch()) {
                            $nbWords = $nbWords + str_word_count($articleRow['content']);
                        }


                        $nbArticles = $data2->rowCount();

                        $user=array(
                            "id_api" => $id_user,
                            "name" => $name,
                            "bio" => $bio,
                            "xp" => $xp,
                            "nb_article" => $nbArticles,
                            "words" => $nbWords
                        );

                    }
                    http_response_code(200);
                    echo json_encode($user);

                } else { echo '<b style="color:red;">Please verify your parameters...</b>';}

            } else { echo '<b style="color:red;">Access denied.</b>';}

        } else { echo '<b style="color:red;">Invalid token</b>';}

    } else { echo '<b style="color:red;">You need at least to specify the type and your token.</b>';}


?>
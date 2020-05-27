<?php session_start();
try { include("../../Model/connect.php"); } catch (Exception $e) { die('Erreur : ' . $e->getMessage()); }
if (isset($_POST['update_bio'])) {

    if (isset($_POST['bio']) AND isset($_SESSION['id'])) {
        $bio = htmlspecialchars($_POST['bio']);
        $id_user = htmlspecialchars($_SESSION['id']);

        if (!empty($bio) AND !empty($id_user)) {
            $insert_bio = $bdd->prepare("UPDATE user SET bio = :bio WHERE id LIKE :id_user");
            $insert_bio->bindParam(":bio", $bio);
            $insert_bio->bindParam(":id_user", $id_user);
            $insert_bio->execute();
            if($insert_bio->execute()) $_SESSION['bio'] = $bio;
        }
    }
}
header('Location: http://ecosphere.fr/View/user/user_profile.php');





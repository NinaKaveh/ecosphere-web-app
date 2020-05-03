<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="View/css/global.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="View/js/include_header_footer.js"></script>
    <script type="text/javascript" src="View/js/open_forms.js"></script>
</head>
<body>
<header>
    <div id="globalHeader">
        <script>addGlobalHeader();</script>
    </div>
</header>

<main>
    <section id="welcome">
        <h1>Welcome on our website!</h1>
        <h3>Meet Ecosphere</h3>
        <p>Ecosphere is a participative platform with which students and employees of ISEP, a digital engineering
            school, will be able to follow environmental news and hence play a role, at their own level, in a context of
            ecological transition.</p>
        <p>Join us by using the buttons right bellow!</p>
    </section>
    <section id="forms">
        <!-- Open a pop up on click -->
        <table>
            <tr>
                <td>Want to sign up?</td>
                <td>
                    <button class="button" onclick="openLoginForm()">Login</button>
                    <div class="form-popup" id="loginForm">
                        <form action="/Controller/login.php" class="form-container">
                            <h1>Login</h1>
                            <?php
                            if (isset($erreur)) {
                                echo "<span color='red'>" .$erreur. "</span>";}
                            ?>
                            <label for="email"><b>Email</b></label>
                            <input type="email" placeholder="Enter Email" name="email" required>
                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required>
                            <button type="submit" class="btn">Login</button>
                            <button name="login" type="button" class="btn cancel" onclick="closeLoginForm()">Close</button>
                        </form>
                    </div>
                </td>
            </tr>

            <tr>
                <?php require("Controller/register-check.php"); ?>
                <td>Want to register?</td>

                <td>
                    <button class="button" onclick="openRegisterForm()">Register</button>
                    <div class="form-popup" id="registerForm">
                        <form method="POST" action="" class="form-container">
                            <?php
                            if(isset($erreur)) {
                                echo '<font color='.$erreurColor.'>'.$erreur."</font>";
                            }
                            ?>
                            <h1>Register</h1>
                            <label for="lname"><b>Name</b></label>
                            <input type="text" placeholder="Enter Lastname" name="name" required
                                   value="<?php if (isset($name)) {
                                       echo $name;
                                   } ?>">
                            <label for="mail"><b>mail</b></label>
                            <input type="text" placeholder="Enter Email" name="mail" required
                                   value="<?php if (isset($mail)) {
                                       echo $mail;
                                   } ?>">
                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email again" name="email" required
                                   value="<?php if (isset($email)) {
                                       echo $email;
                                   } ?>">
                            <label for="pass"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="pass" required
                                   value="<?php if (isset($pass)) {
                                       echo $pass;
                                   } ?>">
                            <label for="password"><b>Confirm password</b></label>
                            <input type="password" placeholder="Enter Password again" name="password" required
                                   value="<?php if (isset($password)) {
                                       echo $password;
                                   } ?>">
                            <button type="submit" name="registerForm" class="btn">Register</button>
                            <button type="button" class="btn cancel" onclick="closeRegisterForm()">Close</button>
                        </form>
                    </div>

                </td>
                <?php if(isset($erreur)) {echo '<script type="text/javascript">', 'openRegisterForm();', '</script>';}?>
            </tr>
        </table>
    </section>
</main>

<footer>
    <div id="globalFooter">
        <script>addGlobalFooter();</script>
    </div>
</footer>
</body>
</html>

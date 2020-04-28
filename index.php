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
                <td>Want to register?</td>
                <td>
                    <button class="button" onclick="openRegisterForm()">Register</button>
                    <div class="form-popup" id="registerForm">
                        <form class="form-container">
                            <?php require("Controller/register.php"); ?>
                            <h1>Register</h1>
                            <label for="lname"><b>Name</b></label>
                            <input type="text" placeholder="Enter Lastname" name="name" required
                                   value="<?php if (isset($name)) {
                                       echo $name;
                                   } ?>">
                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="email" required
                                   value="<?php if (isset($email)) {
                                       echo $email;
                                   } ?>">
                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required
                                   value="<?php if (isset($psw)) {
                                       echo $psw;
                                   } ?>">
                            <label for="psw2"><b>Confirm password</b></label>
                            <input type="password" placeholder="Enter Password again" name="psw2" required
                                   value="<?php if (isset($psw2)) {
                                       echo $psw2;
                                   } ?>">
                            <button type="submit" class="btn">Register</button>
                            <button type="button" class="btn cancel" onclick="closeRegisterForm()">Close</button>
                        </form>
                    </div>

                </td>
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

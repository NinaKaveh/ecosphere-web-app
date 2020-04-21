<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/global.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="js/include_header_footer.js"></script>
    <script type="text/javascript" src="js/open_forms.js"></script>
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
                        <form action="/action_page.php" class="form-container">
                            <h1>Login</h1>
                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="email" required>
                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required>
                            <button type="submit" class="btn">Login</button>
                            <button type="button" class="btn cancel" onclick="closeLoginForm()">Close</button>
                        </form>
                    </div>
                </td>
            </tr>

            <tr>
                <td>Want to register?</td>
                <td>
                    <button class="button" onclick="openRegisterForm()">Register</button>
                    <div class="form-popup" id="registerForm">
                        <form action="/action_page.php" class="form-container">
                            <h1>Register</h1>
                            <label for="lname"><b>Lastname</b></label>
                            <input type="text" placeholder="Enter Lastname" name="lname" required>
                            <label for="fname"><b>Firstname</b></label>
                            <input type="text" placeholder="Enter Firstname" name="fname" required>
                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="email" required>
                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required>
                            <label for="psw2"><b>Confirm password</b></label>
                            <input type="password" placeholder="Enter Password again" name="psw2" required>
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

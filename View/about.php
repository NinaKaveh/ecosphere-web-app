<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/global.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="js/include_header_footer.js"></script>
</head>
<body>
<?php session_start();
if(!empty($_SESSION['name'])) {
    ?>
    <header>
        <div id="header">
            <img id="ecosphere_logo" src="img/logo-paysage.png" alt="logo" width="195"/>
            <img id="isep_logo" src="img/logo-isep.png" alt="logo" width="60"/>

            <div id="banner">
                <nav class="navbar">
                    <a href="user/user_homepage.php">Home</a>
                    <a href="user/user_profile.php">Profile</a>
                    <a href="user/all_articles.php">All articles</a>
                    <a href="covid.php">COVID-19</a>
                    <span>Hello <?php echo $_SESSION['name'];?></span><button class="//button" onclick="window.location.href='user/logout.php'">Logout</button>
                </nav>

            </div>


        </div>
    </header>
<?php } else { ?>
    <header>
        <div id="globalHeader">
            <script>addGlobalHeader();</script>
        </div>
    </header>
<?php } ?>

<main class="panel">
    <h1>Ecosphere</h1>
    <hr/>
    <blockquote>
        <p>
            This is the participative platform, Ecosphere, with which students and employees of ISEP, a digital
            engineering school, will be able to follow environmental news and hence play a role, at their own level, in
            a context of ecological transition.<br>
            This platform can be accessed only by registered members. So, you need to be a user of the website to be
            able to read/publish articles, and participate to the XP system.<br>
            The aim is to allow people to take an interest in the ecology by reading articles for free and thus,
            perhaps, to long for publishing articles on this blog to stand for their point of view on the environment.
            This website is therefore a way to stand up for these convictions as well as to share with as many people as
            possible the beauties of this world that are in danger today.<br>
            The aim is that the platform will be entertaining, by letting members contribute to the flow of information
            themselves, while challenging its members with a system of user XP for each relevant publication or
            like to one of their articles.
        </p>
    </blockquote>

    <h3>The history of the team</h3>
    <blockquote>
        <p>
            Our group 'The Witcher' has its origins in a common attachment to ecology. This subject is important to us
            and we would like to develop a concrete and innovative project illustrating this topic.
            We are a team of three ISEP students. This platform is a challenge for us, allowing us to show our skills in
            design, development and deployment of web applications.
        </p>
    </blockquote>

    <h3>The team</h3>
    <blockquote>
        <p>
            Each person has two educational backgrounds allowing the team to carry out this project at the same time by
            advancing with each one's knowledge.<br>
            Although some are more at ease with programming, each one tries at his own level to make the project viable
            and deliver a website with high expectations.
        </p>
    </blockquote>
</main>


<footer>
    <div id="globalFooter">
        <script>addGlobalFooter();</script>
    </div>
</footer>


</body>
</html>

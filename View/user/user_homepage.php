<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../js/include_header_footer.js"></script>
    <title>Home Page</title>
</head>
<body>
<header>
    <div id="userHeader">
        <script>addUserHeader();</script>
    </div>
</header>

<main>
    <section id="articles">
        <h1>Hi <?php echo "username";?></h1>
        <h3>Latest articles</h3>
        <br><br><br>
    </section>

    <section id="user_points">
        <fieldset class="points">
            <legend>Sum up:</legend>
            <label>Name : <?php echo "username"; ?></label><br><br>
            <label>Points : <?php echo "xxxxx"; ?></label><br><br>
            <label for="search">Enter a name:</label>
            <input type="text" id="search" name="search_user"><br><br>
        </fieldset>
    </section>
</main>

<footer>
    <div id="userFooter">
        <script>addUserFooter();</script>
    </div>
</footer>
</body>
</html>

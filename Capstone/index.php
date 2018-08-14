<!DOCTYPE HTML>
<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <form action="#" method="POST">
            <input type="text" name="email"><br />
            <input type="password" name="password"><br />
            <select id="security_question" name="security_question">                      
                <option value="">--Security Question--</option>
                <option value="dog_name">What's Your Dogs Name</option>
                <option value="cat_name">What's your Cats Name</option>
                <option value="friend_name">What's your Friends Name</option>
            </select><br />
            <input type="text" name="security_answer"><br />
            <input type="submit" name="submit" value="signing">
        </form>
        <br />

        <form action="#" method="POST">
            <input type="text" name="email"><br />
            <input type="password" name="password"><br />
            <input type="submit" name="submit" value="logging">
        </form>
        <br />

        <form action="#" method="POST">
            <input type="text" name="email"><br />
            <select id="security_question" name="security_question">                      
                <option value="">--Security Question--</option>
                <option value="dog_name">What's Your Dogs Name</option>
                <option value="cat_name">What's your Cats Name</option>
                <option value="friend_name">What's your Friends Name</option>
            </select><br />
            <input type="text" name="security_answer"><br />
            <input type="submit" name="submit" value="recover">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == 'signing') {
                include 'signup.php';
                signup();
            } else if ($_POST['submit'] == 'logging') {
                include 'accountcheck.php';
                logging();
            } else if ($_POST['submit'] == 'recover') {
                include 'accountrecovery.php';
                recovery();
            } else if ($_POST['submit'] == 'reset') {
                include 'accountrecovery.php';
                password_reset();
            }
        }
        ?>

    </body>

</html>
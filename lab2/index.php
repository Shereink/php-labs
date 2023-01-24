
<?php
//Configration Files
require_once 'config.php';
?>

<?php
//Check for Submit AND validate
$errors = array();
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $name = $_POST['name'];
    $message = $_POST['message'];
    $email = $_POST['email'];
    if (!(strlen($_POST['name']) < $Max_Name_Length)) {
        $errors[] = "Name Error !";
        echo "Name Error !";
        $name = "Name Error !";
    } else {
        echo "name is : $name <br>";
    }
    if (!(strlen($_POST['message']) < $Max_Message_Length)) {
        $errors[] = "message Error !";
        echo "message Error !";
        $message = "message Error !";
    } else {
        echo "message is : $message<br>";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
        echo "Invalid email format";
        $email = "Invalid email format";
    } else {
        echo "email is : $email<br>";
    }
    if (empty($errors)) {
        $filelog = fopen("log.txt", "a");
        $save_string = date("F d Y h:i:s A", time()) . "," . $_SERVER['REMOTE_ADDR'] . "," . $email . "," . $name;
        fwrite($filelog, $save_string . PHP_EOL);
        echo "<h2>$Msg</h2>";
        fclose($filelog);
        exit();
    }
}
?>

<html>

    <head>
        <title> contact form </title>

    </head>

    <body>
        <h3> Contact Form </h3>
        <div id="after_submit">

        </div>
        <form id="contact_form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">

            <div class="row">
                <label class="required" for="name">Your name:</label><br />
                <input id="name" class="input" name="name" type="text" value="<?php if (isset($name)) echo $name; ?>" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="email">Your email:</label><br />
                <input id="email" class="input" name="email" type="text" value="<?php if (isset($email)) echo $email; ?>" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message" rows="7" cols="30" value=""><?php if (isset($message)) echo $message; ?></textarea><br />

            </div>

            <input id="submit" name="submit" type="submit" value="Send email" />
            <input id="clear" name="clear" type="reset" value="Reset" />

        </form>
    </body>

</html>
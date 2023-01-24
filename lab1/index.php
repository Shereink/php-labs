<?php
$errors = array();
$default_name = isset($_POST["name"]) ? $_POST["name"] : "";
$default_email = isset($_POST["email"]) ? $_POST["email"] : "";
$default_message = isset($_POST["message"]) ? $_POST["message"] : "";

if (isset($_POST["submit"])) {
    require_once("config.php");
    if (!isset($_POST["email"]) || empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        $errors[] = "Email is not valid";


    if (!isset($_POST["name"]) || empty($_POST["name"]) || strlen($_POST["name"]) > $max_name_length)
        $errors[] = "Name is not valid";

    if (!isset($_POST["message"]) || empty($_POST["message"]) || strlen($_POST["message"]) > $max_message_length)
        $errors[] = "Message is not valid";

    if (empty($errors)) {
        echo "<H3>".$thank_you_message. "</H3><p>";
     
        echo "<b>Name: </b>" . $_POST["name"] . "<br/>";
        echo "<b>Email: </b>" . $_POST["email"] . "<br/>";
        echo "<b>Message: </b>" . $_POST["message"] . "</p><br/>";
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
            <?php
            foreach ($errors as $error) {
                echo "<p >** $error</p>";
            }
            ?>

        </div>
        <form id="contact_form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">

            <div class="row">
                <label class="required" for="name">Your name:</label><br />
                <input id="name" class="input" name="name" type="text" value="<?php echo $default_name; ?>" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="email">Your email:</label><br />
                <input id="email" class="input" name="email" type="text" value="<?php echo $default_email; ?>" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message" rows="7" cols="30"><?php echo $default_message; ?></textarea><br />

            </div>

            <input id="submit" name="submit" type="submit" value="Send email" />
            <input id="clear" name="clear" type="reset" value="clear form" />

        </form>
    </body>

</html>
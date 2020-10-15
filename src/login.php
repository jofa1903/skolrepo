<?php
session_start();
/* Title of the page */
$page_title = "Startsida - Gästbook";
/* Include header */
include("includes/header3.php");
?>
<?php
/* Checks if user has put in right values in required fields */
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "user" && $password == "password") {
        $_SESSION['username'] = $username;
        header("Location: admin.php");
    } else {
        $message = "Felaktigt användarnamn/lösenord";
    }
}
?>
<!-- Section begins -->
<section class="sectioning">
    <section id="section_login">
        <!-- PHP begins -->
        <?php
        if (isset($_GET['message'])) {
            echo $_GET['message'] . "<br>";
        }
        /* Alert for wrong username and password */
        if (isset($message)) {
            echo "<span class='alert'>Fel användarnamn/lösenord!</span><br>";
        }
        ?>
        <!-- / PHP ends --><br>
        <!-- User form to login -->
        <form id="login_form" method="post" action="login.php" accept-charset="UTF-8">
            <fieldset>
                <legend>Logga in</legend>
                <br>
                <input type="hidden" name="submitted" id="submitted" value="1">
                <label for="username">Användarnamn:</label>
                <input type="text" name="username" id="username" maxlength="50">
                <hr>
                <label for="password">Lösenord:</label>
                <input type="password" name="password" id="password" maxlength="50">
                <hr>
                <br><br>
                <input type="submit" name="login" id="login_button" value="Logga in">
            </fieldset>
        </form>
    </section>
</section>
<!-- Include footer -->
<?php
include("includes/footer.php");
?>
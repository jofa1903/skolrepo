<?php
session_start();
/* Title of the page */
$page_title = "Admin";
/* Check if user is aldready signed in */
if (!isset($_SESSION['username'])) {
    header("Location: login.php?message=" . "<br><span style='color:red'>You have to sign in!</span>");
}
/* Include header */
include("includes/header2.php");
include("classes/posted.class.php");
?>

<!-- Section begins -->
<section class="sectioning">
    <section id="section_admin">
        <article id="left">
            <h2>Administration</h2>
            <h4 id="adm">Du är nu inloggad</h4>
            
<!-- Log out button -->
<form id="logout" method="post" action="logout.php" accept-charset="UTF-8">
    <input type='hidden' name='submitted' id='submitted' value='1' />
    <input type='submit' name='logout' id="logout_btn" value='Logga ut' />
</form><br/><br/>
    </section>
    <hr>
    <section id="upd">
        <div id="updateDiv"></div>
    </section>
    <h2>Kurser</h2>
    <div id="courses">
        <!-- Courses from DB -->
    </div>

    <section id="courses"><br/><br/><br/>
        <h2>Lägg till kurs:</h2>
        <form>
            <label id="acode" for="code">Kurskod:</label><br/>
            <input type="text" name="code" id="code">
            <br>
            <label for="name">Kursnamn:</label><br/>
            <input type="text" name="name" id="name">
            <br>
            <label id="prog" for="progression">Progression:</label><br/>
            <input type="text" name="progression" id="progression">
            <br>
            <label id="syllabus" for="coursesyllabus">Kursplan:</label> <br/>
            <textarea name="coursesyllabus" id="coursesyllabus"></textarea>

            <br>
            <input type="button" value="Lägg till" id="addCourse">
        </form>
    </section> <br/><br/><br/>
    <hr>
    <section id="updWork">
        <div id="updateDivWork"></div>
    </section>

    <h2>Jobb</h2>
    <div id="work">
</div>

<section id="courses"><br/>
        <h2>Lägg till jobb:</h2>
        <form>
            <label id="acompany" for="company">Company:</label><br/>
            <input type="text" name="company" id="company">
            <br>
            <label for="title">Title:</label><br/>
            <input type="text" name="title" id="title">
            <br>
            <label id="alength" for="progression">Length:</label><br/>
            <input type="text" name="length" id="length">
            <br>
            <br>
            <input type="button" value="Lägg till" id="addWork">
        </form>
    </section> <br/><br/><br/>

    <hr>
    <section id="updWebpages">
        <div id="updateWebpageDiv"></div>
    </section>

<h2>Webbsidor</h2>
    <div id="webpages">
</div>

<section id="courses"><br/>
        <h2>Lägg till webbsida:</h2>
        <form>
            <label id="aweb_title" for="web_title">Webtitle:</label><br/>
            <input type="text" name="web_title" id="web_title">
            <br>
            <label for="url">Url:</label><br/>
            <input type="text" name="url" id="url">
            <br>
            <label id="adescription" for="description">description:</label><br/>
            <input type="text" name="description" id="description">
            <br>
            <br>
            <input type="button" value="Lägg till" id="addWebpages">
        </form>
    </section> <br/><br/><br/>


    <!-- JavaScript -->
    <script src="js/main.js"></script>
    <script src="js/main2.js"></script>
    <script src="js/main3.js"></script>

    <!-- Include footer -->
    <?php
    include("includes/footer.php");
    ?>
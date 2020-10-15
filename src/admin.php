<?php
session_start();
/* Title of the page */
$page_title = "Admin";
/* Check if user is aldready signed in */
if (!isset($_SESSION['username'])) {
    header("Location: login.php?message=" . "<br><span style='color:red'>You have to sign in!</span>");
}
/* Include header */
include("classes/posted.class.php");
?>
<!-- Log out button -->
<form id="logout" method="post" action="logout.php" accept-charset="UTF-8">
    <input type='hidden' name='submitted' id='submitted' value='1' />
    <input type='submit' name='logout' id="logout_btn" value='Log out' />
</form>
<!-- Section begins -->
<section class="sectioning">
    <section id="section_admin">
        <article id="left">
            <h2>Administration</h2>
            <h4 id="adm">Welcome. You are logged in.</h4>
            <br>
    </section>
    <section id="upd">
        <div id="updateDiv"></div>
    </section>
    <h2>Courses</h2>
    <div id="courses">
        <!-- Courses from DB -->
    </div>
    <section id="courses">
        <h2>Add course</h2>
        <form>
            <label id="code" for="code">Course code:</label>
            <input type="text" name="code" id="code">
            <br>
            <label for="c_name">Course name</label>
            <input type="text" name="name" id="name">
            <br>
            <label id="prog" for="progression">Progression:</label>
            <input type="text" name="progression" id="progression">
            <br>
            <label id="syllabus" for="coursesyllabus">Syllabus:</label>
            <textarea name="coursesyllabus" id="coursesyllabus"></textarea>

            <br>
            <input type="submit" value="Add course" id="addCourse">
        </form>
    </section>

    <!-- JavaScript -->
    <script src="js/main.js"></script>
    <!-- Include footer -->
    <?php

    include("includes/footer.php");
    ?>
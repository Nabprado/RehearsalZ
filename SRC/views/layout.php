<?php
// require functions
require realpath('SRC/functions/functions.php');

// require classes
require_once realpath('SRC/models/ClassCaller.php');

//require header
require realpath("SRC/views/templates/header.php");
?>


        <main class="main">

            <?php
            // router
            require realpath("SRC/config/routing.php");
            require getRoute();
            ?>

        </main>


        <!-- footer -->
        <?php require_once realpath('SRC/views/templates/footer.php') ?>
                
        <!-- Main javascript -->
        <script src="PUBLIC/js/main.js" type="module"></script>

    </body>

</html>
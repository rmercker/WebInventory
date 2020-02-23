<?php
    
    require '../login/LoginSecurity.php';

    session_start();

    if (!isset($_SESSION['token']) || !validUserLoggedIn($_SESSION['token'])) {
        session_unset();
        session_destroy();
        $_SESSION = array();
        header("Location: ../login/Login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="MainPage.css?ver=4.3">
    <title>Inventory_System</title>

    <!-- latest jQuery direct from google's CDN -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>

</head>

<body>
    <div id="nav-container">

        <div id="nav-placeholder"></div>

        <div id="search-bar">
            <div id="search-bar-positioning"> search parameters are optional.
           
            <form id="sales-search-bar-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                not doing anythings... yet.
            </form>

            </div>
        </div>
    </div>

    <div id="internal-display">

        <div id="scrollable-items"></div>

        <div id="item-display">
            <div id ="item-container"></div>

            <div id="item-options">
                <button id="update-detail-button">Update Details</button>
                <button id="create-sale-button">Create Sale</button>

                <div class="form-holder" id="update-forms">
                    
                </div>
            </div>
        </div>

    </div>




    <template id="scrollable-item-template">
            <div class="item">
                <div class="item-top">
                    <img class="image" src=# alt="Here lays an image!">
                    <div class="item-details"></div>
                </div>
                
                <div class="item-bottom">
                
                </div>
            </div>
    </template>

    <template id="main-item-template">
            <div class="item" id ="">
                <div class="item-top">
                    <img class="image" src=# alt="Here lays an image!">
                    <div class="item-details"></div>  
                </div>
                
                <div class="item-bottom">
                
                </div>
            </div>
    </template>


    <script> 
        $("#nav-placeholder").load("NavBar.html?ver=1.0");
    </script>

    <script type="module" src="DataControl.js"></script>
    <script type="module" src="ButtonControls.js?0.8"></script>
</body>
</html>
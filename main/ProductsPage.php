<?php
    
    require '../login/LoginSecurity.php';

    session_start();

    if (!isset($_SESSION['token']) || !validUserLoggedIn($_SESSION['token'])) {
        session_unset();
        session_destroy();
        $_SESSION = array();
        //header("Location: ../login/Login.php");
        //exit();
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

            <form id="resource-search-bar-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                name:
                <input type="text" name="name">
                amount available:
                <input type="number" name="amount">
                pricing of item:
                <input type="number" name="price" step="0.01" min="0">
                format for price search:
                <select name="price-format">
                    <option value="close to">close to</option>
                    <option value="min value">min value</option>
                    <option value="max value">max value</option>
                </select>
                quality
                <input type='text' name='quality'>
                supplier
                <input type='text' name='supplier'>
                <input type="button" name="submit" value="submit">
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
                    <form id="product-update-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        name:
                        <input type="text" name="name"> <br>
                        amount available:
                        <input type="number" name="unit" step="1" min="0"> <br>
                        pricing of item:
                        <input type="number" name="price" step="0.01" min="0"> <br>
                        labor for item:
                        <input type="number" name="labor" step="0.01" min="0"> <br>
                        whole sale of item:
                        <input type="number" name="wholeSale" step="0.01" min="0"> <br>
                        retail of item:
                        <input type="number" name="retial" step="0.01" min="0"> <br> <br>
                        description of item: <br>
                        <textarea name="description" rows="10" cols="30"></textarea> <br>
                        <input type="button" name="submit" value="submit">
                    </form>
                </div>
                <div class="form-holder" id="create-sale-forms">
                    <form id="product-create-sale" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">Product Sale Here</form>
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
<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include_once 'classes/class.product.php';
include_once 'classes/class.receive.php';
include_once 'classes/class.release.php';
include_once 'classes/class.inventory.php';
include 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
$product = new Product();
$receive = new Receive();
$release = new Release();
$inventory = new Inventory();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sneakerhead's Inventory System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div id="main-nav">
    <nav>
      <h2>Sneakerhead's Inventory System</h2>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=receive">Deliveries</a></li>
        <li><a href="index.php?page=release">Sales</a></li>
        <li><a href="index.php?page=inventory">Inventory</a></li>
        <li><a href="index.php?page=settings">Set</a></li>
        <li class="move-right"><a href="logout.php">Log Out</a></li>
        <li class="move-right"><?php //echo $user->get_user_lastname($user_id).', '.$user->get_user_firstname($user_id);?>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</li> 
      </ul>
    </nav>
</div>

    <div id="container">
      <div id="wrapper">
        <div id="content">
          <?php
            switch($page){
              case 'settings':
                require_once 'settings-module/index.php';
                break; 
              case 'inventory':
                require_once 'inventory-module/index.php';
                break; 
              case 'receive':
                require_once 'receive-module/index.php';
                break; 
              case 'release':
                require_once 'release-module/index.php';
                break; 
              default:
                require_once 'main.php';
                break; 
            }
          ?>
        </div>
      </div>
    </div>

  </body>
</html>
<div id="third-sub">
            | <a href="index.php?page=settings&subpage=products">List of Products</a> |
            <a href="index.php?page=settings&subpage=products&action=create">Set New Product</a> |
            <a href="index.php?page=settings&subpage=products&action=types">Product Categories</a> |
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'products-module/create-product.php';
                break; 
                case 'modify':
                    require_once 'products-module/modify-product.php';
                break; 
                case 'profile':
                    require_once 'products-module/view-product.php';
                break;
                case 'types':
                    require_once 'products-module/list-product-types.php';
                break;
                default:
                    require_once 'products-module/main.php';
                break; 
            }
    ?>
  </div>
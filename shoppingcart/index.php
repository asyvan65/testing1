<?php
session_start();

// Include functions and connect to the db
include 'functions.php';

$pdo = pdo_connect_mysql();

if($pdo){
    //Test connection
    // echo "Connected successfully.";
} else {
    "Failed to connect to DB";
}

// Page is set to home.php
$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';

// Include and show the requested page
include $page . '.php';

//quick block for repeating page
if(($page != 'product') && ($page != 'cart') && ($page != 'products') && ($page != 'placeorder')){
?>

<?=template_header('Home')?>

<div class="featured">
    <h2>Test Products</h2>
    <p>List of test products for example.</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">&dollar;<?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<?php 
}
?>
<?=template_footer()?>
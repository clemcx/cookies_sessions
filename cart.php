<?php
session_start();
require 'inc/head.php';
require 'inc/data/products.php';

if(empty($_SESSION['loginname']))
{
    header('Location: login.php');
    exit();
}
if(isset($_GET["add_to_cart"]))
{
    $addToCart=$_GET["add_to_cart"];
    if(isset($_COOKIE[$addToCart]))
    {
        setcookie($addToCart, $_COOKIE[$addToCart] + 1, time() + 365*24*3600, null, null, false, true);
    }
    else
    {
        setcookie($addToCart,1, time() + 365*24*3600, null, null, false, true);
    }
}
if(isset($_GET["unadd_to_cart"]))
{
    $addToCart=$_GET["unadd_to_cart"];
    if(isset($_COOKIE[$addToCart])&&$_COOKIE[$addToCart]>0)
    {
        setcookie($addToCart, $_COOKIE[$addToCart] - 1, time() + 365*24*3600, null, null, false, true);
    }
}
?>
    <section class="cookies container-fluid">
        <div class="row">
            <?php foreach ($catalog as $id => $cookie) { ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure class="thumbnail text-center">
                        <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                        <figcaption class="caption">
                            <h3><?= $cookie['name']; ?></h3>
                            <p><?= $cookie['description']; ?></p>

                            <?= isset($_COOKIE[$id]) ? '<p class="h4">'.$_COOKIE[$id].'</p> ': '<p class="h4">0</p>';
                            ?>
                        </figcaption>
                    </figure>
                </div>
            <?php } ?>
        </div>
    </section>
<?php require 'inc/foot.php'; ?>
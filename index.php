<?php
session_start();

    if(!empty($_GET['add_to_cart']))
    {
        $add_to_cart = $_GET['add_to_cart'];
        if(isset($_COOKIE[$add_to_cart]))
        {
            setcookie($add_to_cart, $_COOKIE[$add_to_cart] + 1, time() + 365*24*3600, null, null, false, true);
        }
        else
        {
            setcookie($add_to_cart, 1, time() + 365*24*3600, null, null, false, true);
        }
    }

?>

<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>

    <section class="cookies container-fluid">
        <div class="row">
            <?php foreach ($catalog as $id => $cookie) { ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure class="thumbnail text-center">
                        <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                        <figcaption class="caption">
                            <h3><?= $cookie['name']; ?></h3>
                            <p><?= $cookie['description']; ?></p>
                            <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                            </a>
                        </figcaption>
                    </figure>
                </div>
            <?php } ?>
        </div>
    </section>
<?php require 'inc/foot.php'; ?>
<?php ipView('frontend.component.header') ?>



<div class="banner">
    <img src="http://localhost/php1_ass_ph29220/public/imgs/banner.png" alt="banner" />
</div>



<div class="product">
    <h2 class="product_title">Our Products</h2>
    <div class="container">
        <div class="row">
            <?php foreach ($lists as $index => $item) : ?>
            <div class="col-12 col-md-6 col-lg-3">
                <a href="home/detail?id=<?php echo $item['id'] ?>">
                    <div class="product_card">
                        <img class="product_image" src="<?php echo $item['productImage'] ?>" alt="product" />
                        <h3 class="product_name"> <?php echo $item['productName'] ?> </h3>
                        <p class="product_desc"><?php echo $item['productDesc'] ?></p>
                        <p class="product_price">$<?php echo $item['productPrice'] ?></p>
                    </div>
                </a>
            </div>

            <?php endforeach ?>

        </div>
    </div>

    <button class="product-viewMore">Show More</button>
</div>

<!-- tricks -->
<div class="tricks">
    <h2 class="tricks_title">Tips & Tricks</h2>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="tricks_card">
                    <img class="tricks_image" src="http://localhost/php1_ass_ph29220/public/uploads/trick1.png"
                        alt="" />
                    <h3 class="tricks_name">How to create a living room to love</h3>
                    <p class="tricks_desc">20 jan 2020</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="tricks_card">
                    <img class="tricks_image" src="http://localhost/php1_ass_ph29220/public/uploads/trick2.png"
                        alt="" />
                    <h3 class="tricks_name">How to create a living room to love</h3>
                    <p class="tricks_desc">20 jan 2020</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="tricks_card">
                    <img class="tricks_image" src="http://localhost/php1_ass_ph29220/public/uploads/trick3.png"
                        alt="" />
                    <h3 class="tricks_name">How to create a living room to love</h3>
                    <p class="tricks_desc">20 jan 2020</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ipView('frontend.component.footer') ?>

<script>

</script>
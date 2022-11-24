<?php ipView('frontend.component.header') ?>

<div class="banner">
    <img src="http://localhost/php1_ass_ph29220/public/imgs/banner.png" alt="banner" />
</div>



<div class="category_wrapper">

    <ul class="category_sideBar">
        <li class="category_item-title">Danh mục</li>
        <?php foreach ($listsCategory as $key => $value) : ?>
        <a href="http://localhost/php1_ass_ph29220/home/category?dm=<?php echo $value['id'] ?>">
            <li class="category_item-option"><?php echo $value['categoryName'] ?></li>
        </a>

        <?php endforeach ?>

    </ul>

    <div class="category_content">
        <div class="category_search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search...">
        </div>
        <div class="category_lists">
            <?php foreach ($listsPrd as $key => $value) : ?>
            <div class="category_card">
                <img class="product_image" src="<?php echo $value['productImage'] ?>" alt="">
                <h3 class="product_name"><?php echo $value['productName'] ?></h3>
                <p class="product_desc"><?php echo $value['productDesc'] ?></p>
                <p class="product_price"><?php echo $value['productPrice'] ?></p>
            </div>
            <?php endforeach ?>

        </div>
    </div>
</div>



<?php ipView('frontend.component.footer') ?>
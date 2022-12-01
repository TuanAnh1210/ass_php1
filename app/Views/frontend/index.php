<?php ipView('frontend.component.header') ?>

<div class="banner">
    <img src="http://localhost/php1_ass_ph29220/public/imgs/banner.png" alt="banner" />
</div>

<div class="product">
    <h2 class="product_title">Our Products</h2>
    <div class="container">
        <div class="row prdRenderHome">

        </div>
    </div>

    <div class="prudct-btn-wrapper">
        <button class="product-viewMore">Show More</button>
        <button class="product-viewMore hide-away">Hide Away</button>
    </div>
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

<script>
const data = <?= json_encode($lists) ?>

data.forEach(element => {
    for (let i in element) {
        if (!isNaN(Number(i))) {
            delete element[i];
        }
    }
});

let count = 0;

function renderPrd(count) {
    let target = count + 4

    const dataRender = data.slice(0, target)
    document.querySelector('.prdRenderHome').innerHTML = dataRender.map(ele => `
            <div class="col-12 col-md-6 col-lg-3">
                <a href="home/detail?id=${ele.id}">
                    <div class="product_card">
                       <div class="product_image-wrapper"> <img class="product_image" src="${ele.productImage}" alt="product" /></div>
                        <h3 class="product_name">${ele.productName}</h3>
                        <p class="product_desc">${ele.productDesc}</p>
                        <p class="product_price">$${ele.productPrice}</p>
                    </div>
                </a>
            </div>
    `).join("")
}

document.body.onload = () => {
    renderPrd(count)
}

// handle view more
const productViewMore = document.querySelector('.product-viewMore')
const hideAway = document.querySelector('.hide-away')
productViewMore.onclick = () => {
    count += 4;
    hideAway.style.display = 'block'
    renderPrd(count)
}

hideAway.onclick = () => {
    count = 0;
    hideAway.style.display = 'none'
    renderPrd(count)
}
</script>

<?php ipView('frontend.component.footer') ?>
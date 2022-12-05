<?php ipView('frontend.component.header') ?>

<div data-aos-duration="2000" data-aos="zoom-out" class="banner owl-carousel owl-theme">
    <img src="http://localhost/php1_ass_ph29220/public/imgs/banner.png" alt="banner" />
    <img style="height: 592px;"
        src="https://homehome.vn/wp-content/uploads/6-mau-hinh-anh-noi-that-nha-dep-theo-phong-cach-hien-dai.jpg"
        alt="banner" />
    <img style="height: 592px;"
        src="https://lavenderstudio.com.vn/wp-content/uploads/2017/11/chup-hinh-nha-cua-dep-8.jpg" alt="banner" />
</div>



<div class="category_wrapper">

    <ul data-aos="fade-right" data-aos-duration="2000" class="category_sideBar">
        <li class="category_item-title">Danh mục</li>
        <?php foreach ($listsCategory as $key => $value) : ?>
        <li class="category_item-option"><?php echo $value['categoryName'] ?></li>
        <?php endforeach ?>

    </ul>

    <div data-aos="fade-left" data-aos-duration="2000" class="category_content">
        <div class="category_search-wrapper">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input id="ipt_search" type="text" placeholder="Search...">
        </div>
        <div class="category_lists">


        </div>
    </div>
</div>

<script>
const dataCategory = <?= json_encode($listsPrd) ?>

dataCategory.forEach(element => {
    for (let i in element) {
        if (!isNaN(Number(i))) {
            delete element[i];
        }
    }
});

function renderCate(category, nodeEle) {
    if (category == 'Danh muc 1') {
        const listRender = dataCategory.filter(item => item.categoryId == 1)
        document.querySelector('.category_item-option.active') ? document.querySelector('.category_item-option.active')
            .classList.remove('active') : console.log(1)
        nodeEle.classList.add('active')
        document.querySelector('.category_lists').innerHTML = listRender.map(item => `
        <a href="http://localhost/php1_ass_ph29220/home/detail?id=${item.id}">
                <div class="category_card">
                    <div class="product_image-wrapper"><img class="product_image" src="${item.productImage}" alt=""></div>
                    <h3 class="product_name">${item.productName}</h3>
                    <p class="product_desc">${item.productDesc}</p>
                    <p class="product_price">$${item.productPrice}</p>
                </div>
        </a>
        `).join("")
    } else if (category == 'Danh muc 2') {
        const listRender = dataCategory.filter(item => item.categoryId == 2)
        document.querySelector('.category_item-option.active') ? document.querySelector('.category_item-option.active')
            .classList.remove('active') : console.log(1)
        nodeEle.classList.add('active')
        document.querySelector('.category_lists').innerHTML = listRender.map(item => `
          <a href="http://localhost/php1_ass_ph29220/home/detail?id=${item.id}">
                <div class="category_card">
                    <div class="product_image-wrapper"><img class="product_image" src="${item.productImage}" alt=""></div>
                    <h3 class="product_name">${item.productName}</h3>
                    <p class="product_desc">${item.productDesc}</p>
                    <p class="product_price">$${item.productPrice}</p>
                </div>
          </a>
        `).join("")
    } else if (category == 'Danh muc 3') {
        const listRender = dataCategory.filter(item => item.categoryId == 3)
        document.querySelector('.category_item-option.active') ? document.querySelector('.category_item-option.active')
            .classList.remove('active') : console.log(1)
        nodeEle.classList.add('active')
        document.querySelector('.category_lists').innerHTML = listRender.map(item => `
          <a href="http://localhost/php1_ass_ph29220/home/detail?id=${item.id}">
                <div class="category_card">
                    <div class="product_image-wrapper"><img class="product_image" src="${item.productImage}" alt=""></div>
                    <h3 class="product_name">${item.productName}</h3>
                    <p class="product_desc">${item.productDesc}</p>
                    <p class="product_price">$${item.productPrice}</p>
                </div>
          </a>
        `).join("")
    } else if (category == 'Danh muc 4') {
        const listRender = dataCategory.filter(item => item.categoryId == 4)
        document.querySelector('.category_item-option.active') ? document.querySelector('.category_item-option.active')
            .classList.remove('active') : console.log(1)
        nodeEle.classList.add('active')
        document.querySelector('.category_lists').innerHTML = listRender.map(item => `
          <a href="http://localhost/php1_ass_ph29220/home/detail?id=${item.id}">
                <div class="category_card">
                    <div class="product_image-wrapper"><img class="product_image" src="${item.productImage}" alt=""></div>
                    <h3 class="product_name">${item.productName}</h3>
                    <p class="product_desc">${item.productDesc}</p>
                    <p class="product_price">$${item.productPrice}</p>
                </div>
          </a>
        `).join("")
    }
}


const listCate = document.querySelectorAll('.category_item-option')

for (const item of listCate) {
    item.onclick = () => {
        renderCate(item.innerText, item)
    }
}

document.body.onload = () => {
    renderCate('Danh muc 1', document.querySelector('.category_item-option'))
}

// handle search
const ipt_search = document.getElementById('ipt_search')
ipt_search.onkeyup = (e) => {
    const text = e.target.value.toLowerCase()
    const arr = []
    dataCategory.forEach(item => {
        const fullName = item.productName.toLowerCase()
        if (fullName.indexOf(text) > -1) {
            arr.push(item)
        }
    })

    renderSearch(arr)
}

function renderSearch(arr) {
    const sameArray = JSON.stringify(dataCategory) === JSON.stringify(arr);
    if (sameArray) {
        renderCate('Danh muc 1', document.querySelector('.category_item-option'))

    } else {
        document.querySelector('.category_lists').innerHTML = arr.map(item => `
          <a href="http://localhost/php1_ass_ph29220/home/detail?id=${item.id}">
                <div class="category_card">
                    <div class="product_image-wrapper"><img class="product_image" src="${item.productImage}" alt=""></div>
                    <h3 class="product_name">${item.productName}</h3>
                    <p class="product_desc">${item.productDesc}</p>
                    <p class="product_price">$${item.productPrice}</p>
                </div>
          </a>
        `).join("")
    }


}
</script>

<?php ipView('frontend.component.footer') ?>
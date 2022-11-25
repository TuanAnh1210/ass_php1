<?php ipView('admin.component.header') ?>

<div class="dashBoard_content">
    <?php ipView('admin.component.acc') ?>
    <div class="dashBoard_banner">
        <h2>Welcome to Dashboard</h2>
    </div>

    <div class="prdManage_header">
        <div class="prdManage_tit">
            <h3>Danh sách sản phẩm</h3>
            <div class="prdManage_form">
                <div class="prdManage_form-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search product">
                </div>
                <button class="btn_addPrd">Add New Product</button>
            </div>
        </div>



        <table class="table_prd">
            <thead>
                <tr>
                    <td width="5%">STT</td>
                    <td width="15%">Product Name</td>
                    <td width="25%">Product Image</td>
                    <td width="15%">Product Price</td>
                    <td width="20%">Product Description</td>
                    <td width="20%">Action</td>
                </tr>
            </thead>
            <tbody>



            </tbody>
        </table>

        <div class="pagination">

        </div>
    </div>



</div>



<script>
// handle get data from db and convert arr php to arr js
const data = <?= json_encode($listPrd) ?>

data.forEach(element => {
    for (let i in element) {
        if (!isNaN(Number(i))) {
            delete element[i];
        }
    }
});

// handle quantity btn pagination
let numberData = 3

const pagination = document.querySelector('.pagination')

for (let i = 0; i < Math.ceil(data.length / numberData); i++) {
    pagination.innerHTML += `
        <button class="btn-page">${i + 1}</button>
    `
}

// handle pagination 

let temp = 0

function render(temp) {
    let target = temp > 0 ? temp * numberData : numberData

    const newData = data.slice(target - numberData, target)

    document.querySelector('tbody').innerHTML = newData.map((ele, index) => `
             <tr>
                    <td>${ele.id}</td>
                    <td class="productNameItem">${ele.productName}</td>
                    <td>
                        <img class="prdMana_image" src="${ele.productImage}"
                            alt="">
                    </td>
                    <td>${ele.productPrice}</td>
                    <td>${ele.productDesc}</td>
                    <td style="text-align: center;">
                        <button class="btn-update">Update</button>
                        <button class="btn-delete">Delete</button>
                    </td>
                </tr>

    `).join('')
}

document.body.onload = () => {
    render(temp)
}

const btns = document.querySelectorAll('.btn-page')

for (let i = 0; i < btns.length; i++) {
    btns[i].onclick = () => {

        render(btns[i].innerText)
    }
}
</script>


<?php ipView('admin.component.footer') ?>

const addProduct = document.getElementById("add-product");
const productsEl = document.getElementById("product-holder");

const inputLinkImage = document.getElementById("link-image");
inputLinkImage.addEventListener("change", function () {
    document.getElementById("thumbnail-adding").src = inputLinkImage.value;
})

let prod = JSON.parse(localStorage.getItem("PRODUCTS")) || [];
renderProducts();


addProduct.addEventListener("click", function () {

    let e = document.getElementById("select-cate");
    let tname = document.getElementById("name").value;
    let tprice = document.getElementById("price").value;
    let tdes = document.getElementById("description").value;
    let tisTopProduct = document.getElementById("top-product").checked;

    prod.unshift({
        id: Math.random().toString(36).slice(2),
        name: tname,
        price: tprice,
        des: tdes,
        isTopProduct: tisTopProduct,
        cate: e.options[e.selectedIndex].value,
        imgSrc: document.getElementById("link-image").value,
    });

    document.getElementById("name").value = "";
    document.getElementById("price").value = undefined;
    document.getElementById("description").value = "";
    document.getElementById("top-product").checked = false;
    document.getElementById("link-image").value = "";

    localStorage.setItem("PRODUCTS", JSON.stringify(prod));
    renderProducts();
})

function insert(str, index, value) {
    return str.substr(0, index) + value + str.substr(index);
}

function renderProducts() {
    productsEl.innerHTML = "";
    prod.forEach((product) => {
        productsEl.innerHTML += `
        <div class="col-md-4 col-sm-6 col-lg-offset-1 col-6">
        <div class="card">
          <div class="card-body">
            <img class="imageCard" src=${product.imgSrc} alt="Card image" style="width:100%">
            <p class="card-text">
              ${product.name}<br>
              ${String(product.price).length === 5 ? insert(String(product.price), 2, ".") + "đ" : insert(String(product.price), 3, ".") + "đ"}
            </p>
            <button type="button" class="btn btn-danger">Chỉnh sửa</button>
          </div>
        </div>
    `;
    });
}


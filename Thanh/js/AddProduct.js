
// const addProduct = document.getElementById("add-product");
// const productsEl = document.getElementById("product-holder");
// // delete localStorage.PRODUCTS;
// const inputLinkImage = document.getElementById("link-image");
// var category = "Sản phẩm hàng đầu";

// inputLinkImage.addEventListener("input", function () {
//     document.getElementById("thumbnail-adding").src = inputLinkImage.value;
// })

// let prod = JSON.parse(localStorage.getItem("PRODUCTS")) || [];

// addProduct.addEventListener("click", function () {

//     let e = document.getElementById("select-cate");
//     let tname = document.getElementById("name").value;
//     let tprice = document.getElementById("price").value;
//     let tdes = document.getElementById("description").value;
//     let tisTopProduct = document.getElementById("top-product").checked;
//     let tid = Math.floor(Math.random() * 100000);

//     prod.push({
//         id: tid,
//         name: tname,
//         price: tprice,
//         des: tdes,
//         isTopProduct: tisTopProduct,
//         cate: e.options[e.selectedIndex].value,
//         imgSrc: document.getElementById("link-image").value,
//     });

//     document.getElementById("modal-products").innerHTML += `
//   <div class="modal fade" id="sp${prod[0].id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
//   <div class="modal-dialog">
//       <div class="modal-content">
//           <div class="modal-header">
//               <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin sản phẩm</h5>
//               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
//           </div>
//           <div class="modal-body">
//             <div class="container-fluid">
//               <div class="row">
//                 <div class="col-6">
//                   <img id="thumbnail-adding-${tid}" src="${prod[0].imgSrc}" class="bg-info img-fluid">
//                   <input id="link-image-update-${tid}" oninput="upthumb(${tid})" type="text" class="btn news linkimg" value="${prod[0].imgSrc}">
//                   <select id="select-cate-update-${tid}" class="form-select" aria-label="Default select example">
//                     <option value="0" ${prod[0].cate === "0" ? "selected" : null}>Cà Phê</option>
//                     <option value="1" ${prod[0].cate === "1" ? "selected" : null}>Trà Trái Cây - Trà Sữa</option>
//                     <option value="2" ${prod[0].cate === "2" ? "selected" : null}>Đá Xay - Choco - Matcha</option>
//                     <option value="3" ${prod[0].cate === "3" ? "selected" : null}>Thưởng Thức Tại Nhà</option>
//                 </select>
//               </div>

//               <div class="col-6">
//                 <form>
//                   <div class="mb-3">
//                     <label for="name" class="form-label">Tên sản phẩm</label>
//                     <input id="name-update-${tid}" type="text" class="form-control" value="${prod[0].name}">
//                   </div>
//                   <div class="mb-3">
//                     <label for="description" class="form-label">Mô tả</label>
//                     <textarea id="description-update-${tid}" name="description" cols="22" rows="5">${prod[0].des}</textarea>
//                   </div>
//                   <div class="mb-3">
//                     <label for="price" class="form-label">Giá</label>
//                     <input id="price-update-${tid}" type="number" class="form-control" value="${prod[0].price}">
//                   </div>
//                   <div class="mb-3 form-check">
//                     <input id="top-product-update-${tid}" type="checkbox" class="form-check-input" ${prod[0].isTopProduct ? "checked" : null}>
//                     <label class="form-check-label" for="exampleCheck1">Sản phẩm hàng đầu</label>
//                   </div>
//                 </form>
//               </div>
//             </div>
//           </div>
//           <div class="modal-footer">
//               <button onclick="xoa(${tid})" type="button" class="btn btn-danger" data-bs-dismiss="modal">Xóa sản phẩm</button>
//               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
//               <button onclick="sua(${tid})" type="button" class="btn btn-primary" data-bs-dismiss="modal">Lưu</button>
//           </div>
//       </div>
//   </div>
// </div>
//   `

//     document.getElementById("name").value = "";
//     document.getElementById("price").value = undefined;
//     document.getElementById("description").value = "";
//     document.getElementById("top-product").checked = false;
//     document.getElementById("link-image").value = "";
//     document.getElementById("thumbnail-adding").src = "../images/add-image.png";

//     localStorage.setItem("PRODUCTS", JSON.stringify(prod));
//     renderProducts(category);
// })

// function upthumb(pid) {
//     document.getElementById(`thumbnail-adding-${pid}`).src = document.getElementById(`link-image-update-${pid}`).value;
// }

// function xoa(pid) {
//     prod = prod.filter(item => item.id != pid);
//     localStorage.setItem("PRODUCTS", JSON.stringify(prod));
//     renderProducts(category);
// }

// function sua(pid) {
//     let e = document.getElementById(`select-cate-update-${pid}`);
//     let tname = document.getElementById(`name-update-${pid}`).value;
//     let tprice = document.getElementById(`price-update-${pid}`).value;
//     let tdes = document.getElementById(`description-update-${pid}`).value;
//     let tisTopProduct = document.getElementById(`top-product-update-${pid}`).checked;
//     let timgSrc = document.getElementById(`link-image-update-${pid}`);

//     for (let x in prod) {
//         if (prod[x].id == pid) {
//             prod[x].name = tname;
//             prod[x].price = tprice;
//             prod[x].des = tdes;
//             prod[x].isTopProduct = tisTopProduct;
//             prod[x].cate = e.options[e.selectedIndex].value;
//             prod[x].imgSrc = timgSrc.value;
//             break;
//         }
//     }
//     localStorage.setItem("PRODUCTS", JSON.stringify(prod));
//     renderProducts(category);

// }


// document.getElementById("toppr").addEventListener("click", function () {
//     document.getElementById("toppr").className = "active";
//     document.getElementById("cof").className = "";
//     document.getElementById("tea").className = "";
//     document.getElementById("choco").className = "";
//     document.getElementById("athome").className = "";
//     category = "Sản phẩm hàng đầu";
//     renderProducts(category);
// })

// document.getElementById("cof").addEventListener("click", function () {
//     document.getElementById("toppr").className = "";
//     document.getElementById("cof").className = "active";
//     document.getElementById("tea").className = "";
//     document.getElementById("choco").className = "";
//     document.getElementById("athome").className = "";
//     category = "Cà Phê";
//     renderProducts(category);
// })

// document.getElementById("tea").addEventListener("click", function () {
//     document.getElementById("toppr").className = "";
//     document.getElementById("cof").className = "";
//     document.getElementById("tea").className = "active";
//     document.getElementById("choco").className = "";
//     document.getElementById("athome").className = "";
//     category = "trà";
//     renderProducts(category);
// })

// document.getElementById("choco").addEventListener("click", function () {
//     document.getElementById("toppr").className = "";
//     document.getElementById("cof").className = "";
//     document.getElementById("tea").className = "";
//     document.getElementById("choco").className = "active";
//     document.getElementById("athome").className = "";
//     category = "Đá Xoay";
//     renderProducts(category);
// })

// document.getElementById("athome").addEventListener("click", function () {
//     document.getElementById("toppr").className = "";
//     document.getElementById("cof").className = "";
//     document.getElementById("tea").className = "";
//     document.getElementById("choco").className = "";
//     document.getElementById("athome").className = "active";
//     category = "Thưởng Thức Tại Nhà";
//     renderProducts(category);
// })

// function insert(str, index, value) {
//     return str.substr(0, index) + value + str.substr(index);
// }

// function checkCate(currentValue) {
//     return currentValue.isTopProduct;
// }

// function renderProducts(category) {
//     productsEl.innerHTML = "";
//     let result = [];
//     if (category === "Sản phẩm hàng đầu") {
//         result = prod.filter(checkCate);
//     } else if (category === "Đá Xoay") {
//         result = prod.filter(function (currentValue) { return currentValue.cate === "2" });
//     } else if (category === "Thưởng Thức Tại Nhà") {
//         result = prod.filter(function (currentValue) { return currentValue.cate === "3" });
//     } else if (category === "Cà Phê") {
//         result = prod.filter(function (currentValue) { return currentValue.cate === "0" });
//     } else if (category === "trà") {
//         result = prod.filter(function (currentValue) { return currentValue.cate === "1" });
//     }

//     result.forEach((product) => {
//         productsEl.innerHTML += `
//     <div class="col-md-4 col-sm-6 col-lg-offset-1 col-6">
//         <div class="card">
//           <div class="card-body">
//             <img class="imageCard" src=${product.imgSrc} alt="Card image" style="width:100%">
//             <p class="card-text">
//               ${product.name}<br>
//               ${String(product.price).length === 5 ? insert(String(product.price), 2, ".") + "đ" : insert(String(product.price), 3, ".") + "đ"}
//             </p>
//             <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#sp${product.id}">Chỉnh sửa</button>
//           </div>
//         </div>
//     </div>
//     `;
//     });
// }
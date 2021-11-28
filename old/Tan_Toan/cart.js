var modal = document.getElementById("myCart");
var btn = document.getElementById("cart");
var close = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
close.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var quantity_input = document.getElementsByClassName("cart-quantity-input");
for (var i = 0; i < quantity_input.length; i++) {
    var input = quantity_input[i];
    input.addEventListener("change", function(event) {
        var input = event.target
        if (isNaN(input.value) || input.value <= 0) {
            input.value = 1;
        }
        updatecart()
    });
}
var add_cart = document.getElementsByClassName("btn-cart");
for (var i = 0; i < add_cart.length; i++) {
    var add = add_cart[i];
    add.addEventListener("click", function(event) {
        var button = event.target;
        var product = button.parentElement.parentElement;
        var img = product.parentElement.getElementsByClassName("imageCard")[0];
        var title = product.getElementsByClassName("card-text")[0]
        var price = product.getElementsByClassName("price")[0]
        addItemToCart(title, price, img)
        modal.style.display = "block";
        updatecart()
    })
}

function addItemToCart(title, price, img) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cart_title = cartItems.getElementsByClassName('cart-item-title')
    for (var i = 0; i < cart_title.length; i++) {
        if (cart_title[i].innerText == title) {
            alert('Sản Phẩm Đã Có Trong Giỏ Hàng')
            return
        }
    }
    var cartRowContents = `
    <div class="cart-item cart-column">
        <img class="cart-item-image" src="${img}" width="100" height="100">
        <span class="cart-item-title">${title}</span>
    </div>
    <span class="cart-price cart-column">${price}</span>
    <div class="cart-quantity cart-column">
        <input class="cart-quantity-input" type="number" value="1">
    </div>
    <span class="cart-totalprice cart-column">${price}</span>
    <div class="cart-delete cart-column">
        <button class="btn erase-cart" type="button" >Xóa</button>
    </div>`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('erase-cart')[0].addEventListener('click', function() {
        var button_remove = event.target
        button_remove.parentElement.parentElement.remove()
        updatecart()
    })
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', function(event) {
        var input = event.target
        if (isNaN(input.value) || input.value <= 0) {
            input.value = 1;
        }
        updatecart()
    })
}

function updatecart() {
    var cart_item = document.getElementsByClassName("cart-items")[0];
    var cart_rows = cart_item.getElementsByClassName("cart-row");
    var total = 0;
    var totalprice = 0;
    for (var i = 0; i < cart_rows.length; i++) {
        var cart_row = cart_rows[i]
        var price_item = cart_row.getElementsByClassName("cart-price")[0]
        var quantity_item = cart_row.getElementsByClassName("cart-quantity-input")[0]
        var price = parseFloat(price_item.innerText)
        var quantity = quantity_item.value
        total = total + (price * quantity)
        totalprice = price * quantity
        document.getElementsByClassName("cart-totalprice")[i + 1].innerText = totalprice + 'đ'
    }
    document.getElementsByClassName("cart-total-price")[0].innerText = total + 'VNĐ'
}
var remove_cart = document.getElementsByClassName("erase-cart");
for (var i = 0; i <= remove_cart.length; i++) {
    var button = remove_cart[i];
    button.addEventListener("click", function() {
        var button_remove = event.target
        button_remove.parentElement.parentElement.remove()
        updatecart()
    });
}
const addToCartBtn = document.querySelectorAll(".add-to-cart-btn");
const deleteFromCartBtn = document.querySelectorAll(".delete-from-cart-btn");
const itemCountCart = document.querySelector("#item-count-cart");

const cartItemsList = document.querySelector(".cart-items-list");
const containerOrder = document.querySelector(".container-order");

console.log(itemCountCart.textContent);

addToCartBtn.forEach((button) => {
    button.addEventListener("click", () => {
        if (itemCountCart.textContent < 20) {
            const itemId = button.dataset.itemId;
            // send AJAX request to server to add item to cart
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "/cart/add");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = xhr.responseText;
                    console.log(response);
                    button.textContent = 'added';
                    button.disabled = true;
                    button.className = "add-to-cart-btn text-slate-100 bg-orange-500 px-3 py-1 rounded";
                    itemCountCart.textContent = response;
                    console.log("Item added to cart!");
                }
            };
            xhr.send("item_id=" + itemId);
        }
    });
});

deleteFromCartBtn.forEach((button) => {
    button.addEventListener("click", (event) => {
    const li = event.target.parentNode;
    const ul = li.parentNode;
    
    const itemId = button.dataset.itemId;
    // send AJAX request to server to add item to cart
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/cart/delete");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = function () {
        if (xhr.status === 200) {
            const response = xhr.responseText;
            ul.removeChild(li);
            itemCountCart.textContent = response;
            if (response == 0) {
                cartItemsList.remove();
                containerOrder.remove();
            }
        }
    };
    xhr.send("item_id=" + itemId);
  });
});
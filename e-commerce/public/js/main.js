// // add to cart function

// function addToCart(productId, productName, productPrice, productImage) {
//     let btn = document.querySelector('.btn-cart');
//     let quantity = parseInt(document.getElementById('qty').value);
//     let cart = JSON.parse(sessionStorage.getItem('cartProducts')) || [];
//     let found = false;
//     // console.log(productId)
//     // console.log(productName)
//     // console.log(productPrice)
//     // console.log(productImage)
//     var newCart = new Object();
//     newCart.productId = productId;
//     newCart.productName = productName;
//     newCart.productPrice = productPrice;
//     newCart.productImage = productImage;
//     newCart.quantity = quantity;
//     for (let i = 0; i < cart.length; i++) {
//         if (cart[i].productId == newCart.productId) {
//             cart[i].quantity = parseInt(cart[i].quantity) + parseInt(newCart.quantity);
//             found = true;
//             break
//         }
//     }
//     if (!found)
//         cart.push(newCart);
//     sessionStorage.setItem('cartProducts', JSON.stringify(cart))
//     var retrievedObject = sessionStorage.getItem('cartProducts');
//     console.log('retrievedObject: ', JSON.parse(retrievedObject));
//     console.log('retrievedObject: ', (JSON.parse(retrievedObject).length));

// }


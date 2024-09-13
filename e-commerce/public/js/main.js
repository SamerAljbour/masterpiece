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
document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll('.stars i');
    const ratingInput = document.getElementById('rating-value');

    // Initialize the stars based on the current rating value
    function updateStars(rating) {
        stars.forEach(star => star.classList.remove('selected'));
        for (let i = 0; i < rating; i++) {
            stars[i].classList.add('selected');
        }
    }

    // Set initial rating
    updateStars(ratingInput.value);

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const selectedValue = parseInt(this.getAttribute('data-value'));

            // Update the hidden input with the selected rating value
            ratingInput.value = selectedValue;

            console.log(`Star clicked: ${selectedValue}`); // Debugging output

            // Update stars
            updateStars(selectedValue);
        });

        // Handle hover effects
        star.addEventListener('mouseover', function () {
            const hoverValue = parseInt(this.getAttribute('data-value'));

            console.log(`Star hovered: ${hoverValue}`); // Debugging output

            updateStars(hoverValue);
        });

        // Reset the stars to the saved rating on mouseout
        star.addEventListener('mouseout', function () {
            const ratingValue = parseInt(ratingInput.value);

            console.log(`Mouseout, current rating: ${ratingValue}`); // Debugging output

            updateStars(ratingValue);
        });
    });
});

// increment the quantity in cart page ------------
// Function to subtract quantity
// Function to subtract quantity
function subQua(e) {
    const quantityInput = e.target.closest('.number').querySelector('.inputQua'); // Get the closest input element in the same li
    let quantity = parseInt(quantityInput.value); // Get the current value and convert it to an integer

    if (quantity > 1) { // Prevent the quantity from going below 1
        quantity -= 1; // Decrease quantity by 1
        quantityInput.value = quantity; // Update the input field with the new quantity
    } else {
        alert("Quantity cannot be less than 1");
    }
}

// Function to add quantity
function addQua(e) {
    const quantityInput = e.target.closest('.number').querySelector('.inputQua');
    let quantity = parseInt(quantityInput.value);
    quantity += 1
    quantityInput.value = quantity
}



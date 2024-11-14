var carts = document.querySelectorAll('.btn'); // Asegúrate de que existan botones con la clase 'btn'
var products = [
    { name: 'PIMIENTO', price: 1399, Incart: 0 },
    { name: 'FRESA', price: 1999, Incart: 0 },
    { name: 'HABICHUELA', price: 999, Incart: 0 },
    { name: 'REPOLLO MORADO', price: 2399, Incart: 0 },
    // Agrega más productos según sea necesario
];

// Se agrega un evento a cada botón de carrito
for (var i = 0; i < carts.length; i++) {
    (function(index) {
        carts[index].addEventListener('click', function() {
            cartNumbers(products[index]);
            totalCost(products[index]);
        });
    })(i);
}

function cartNumbers(product) {
    var productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    if (productNumbers) {
        localStorage.setItem('cartNumbers', productNumbers + 1);
    } else {
        localStorage.setItem('cartNumbers', 1);
    }
    setItems(product);
}

function setItems(product) {
    var cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    if (cartItems != null) {
        if (cartItems[product.name] === undefined) {
            cartItems[product.name] = product;
        }
        cartItems[product.name].Incart += 1;
    } else {
        product.Incart = 1;
        cartItems = {};
        cartItems[product.name] = product;
    }
    localStorage.setItem("productInCart", JSON.stringify(cartItems));
}

function totalCost(product) {
    var cartCost = localStorage.getItem('totalCost');

    if (cartCost !== null) {
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost", cartCost + product.price);
    } else {
        localStorage.setItem("totalCost", product.price);
    }
}
function displayCart() {
    var cartItems = localStorage.getItem("productInCart");
    var productContainer = document.querySelector(".productContainer");
    
    if (cartItems) {
        var parsedItems = JSON.parse(cartItems);
        productContainer.innerHTML = '';
        
        Object.keys(parsedItems).forEach(function(key) {
            var item = parsedItems[key];
            productContainer.innerHTML +=
                '<div>' +
                    '<h3>' + item.name + '</h3>' +
                    '<p>Precio: Rs ' + item.price + '.00</p>' +
                    '<p>Cantidad: ' + item.Incart + '</p>' +
                    '<p>Total: Rs ' + (item.price * item.Incart) + '.00</p>' +
                '</div>';
        });
    }
}

// Llamar a la función para mostrar el carrito al cargar la página
displayCart();

// Restablecer el localStorage al cerrar la página
/*
window.addEventListener('beforeunload', function () {
    localStorage.setItem('cartNumbers', 0);
    localStorage.setItem('productInCart', JSON.stringify({}));
    localStorage.setItem('totalCost', 0); 
});*/

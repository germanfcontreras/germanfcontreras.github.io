var cart = JSON.parse(localStorage.getItem('cart')) || [];

function addToCart(productName, productPrice) {
    var product = null;

    for (var i = 0; i < cart.length; i++) {
        if (cart[i].name === productName) {
            product = cart[i];
            break;
        }
    }

    if (product) {
        product.quantity++;
        product.total = product.quantity * productPrice;
    } else {
        cart.push({
            name: productName,
            price: productPrice,
            quantity: 1,
            total: productPrice
        });
    }
    saveCart();
    renderCart();
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

function renderCart() {
    var cartTableBody = document.getElementById('cart-table').getElementsByTagName('tbody')[0];
    cartTableBody.innerHTML = '';

    var totalPrice = 0;

    for (var i = 0; i < cart.length; i++) {
        var item = cart[i];
        var row = cartTableBody.insertRow();
        var cellName = row.insertCell(0);
        var cellQuantity = row.insertCell(1);
        var cellTotal = row.insertCell(2);

        cellName.textContent = item.name;
        cellQuantity.textContent = item.quantity;
        cellTotal.textContent = '$' + item.total;

        totalPrice += item.total;
    }

    document.getElementById('cart-total').textContent = '$' + totalPrice;
}

var buttons = document.querySelectorAll('.btn');
var clickCount = 0;

function handleClick() {
    clickCount++;
    document.getElementById('contador').innerText = ' ' + clickCount;
}

for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', handleClick);
}

// Render the cart when the page loads
renderCart();


/*
var cart = [];

function addToCart(productName, productPrice) {
    var product = cart.find(function(item) {
        return item.name === productName;
    });

    if (product) {
        product.quantity++;
        product.total = product.quantity * productPrice;
    } else {
        cart.push({
            name: productName,
            price: productPrice,
            quantity: 1,
            total: productPrice
        });
    }
    renderCart();
}

function renderCart() {
    var cartTableBody = document.getElementById('cart-table').getElementsByTagName('tbody')[0];
    cartTableBody.innerHTML = '';

    var totalPrice = 0;

    cart.forEach(function(item) {
        var row = cartTableBody.insertRow();
        var cellName = row.insertCell(0);
        var cellQuantity = row.insertCell(1);
        var cellTotal = row.insertCell(2);

        cellName.textContent = item.name;
        cellQuantity.textContent = item.quantity;
        cellTotal.textContent = '$' + item.total;

        totalPrice += item.total;
    });

    document.getElementById('cart-total').textContent = '$' + totalPrice;
}

// Selecciona todos los botones con la clase 'btn'
var buttons = document.querySelectorAll('.btn');

// Inicializa el contador
var clickCount = 0;

// Función para manejar el click
function handleClick() {
    // Incrementa el contador
    clickCount++;
    
    // Actualiza el elemento en el DOM
    document.getElementById('contador').innerText = ' ' + clickCount;
}

// Añade el evento de click a cada botón
buttons.forEach(function(button) {
    button.addEventListener('click', handleClick);
});
*/
		 
/*
let carts = document.querySelectorAll('.btn');
// Selecciona todos los elementos con la clase btn (que deberían ser los botones de "Agregar al carrito").
let products =[
// Define un arreglo de objetos que representan productos, cada uno con nombre,
// precio e inicialización de la cantidad en el carrito (Incart).
                 {
                  name:'PIMIENTO',
                  prise:'1399',
                  Incart: 0
                 },
                 {
                  name:'FRESA',
                  prise:'1999',
                  Incart: 0
                 },
                 {
                  name:'HABICHUELA',
                  prise:'999',
                  Incart: 0
                 },
                 {
                  name:'REPOLLO MORADO',
                  prise:'2399',
                  Incart: 0
                 },
                 {
                  name:'TOMATE',
                  prise:'1100',
                  Incart: 0
                 },
                 {
                  name:'BROCOLLI ROJO',
                  prise:'700',
                  Incart: 0
                 },
                 {
                  name:'ZANAHORIAS',
                  prise:'800',
                  Incart: 0
                 },
                 {
                  name:'ZUMO',
                  prise:'5000',
                  Incart: 0
                 },
                 {
                  name:'CEBOLLA CABEZONA ROJA',
                  prise:'1000',
                  Incart: 0
                 },
                 {
                  name:'MANZANAS',
                  prise:'2500',
                  Incart: 0
                 },
                 {
                  name:'AJO',
                  prise:'1000',
                  Incart: 0
                 },
                 {
                  name:'PICANTE',
                  prise:'2000',
                  Incart: 0
                 },
                 {
                  name:'FRIJOL NEGRO',
                  prise:'3000',
                  Incart: 0
                 },
                 {
                  name:'LENTEJA',
                  prise:'2500',
                  Incart: 0
                 },
			     {
                  name:'FRIJOL VERDE',
                  prise:'3000',
                  Incart: 0
                 },
			     {
                  name:'FRIJOL DE PALO',
                  prise:'4000',
                  Incart: 0
                 },
			     {
                  name:'FRIJOL NEGRO',
                  prise:'1800',
                  Incart: 0
                 },
		   	     {
                  name:'FRUTA DESHIDRATADA',
                  prise:'800',
                  Incart: 0
                 },]

for(let i=0; i<carts.length;i++)
   {
    carts[i].addEventListener('click', () => {cartNumbers(products[i]);totalCost(products[i]);})
   }
// Agrega un evento click a cada botón. Cuando se hace clic, se ejecutan las 
// funciones cartNumbers y totalCost, pasando el producto correspondiente.

function onload(){
                  let productNumbers = localStorage.getItem('cartNumbers');
                  if (productNumbers)
                     {
                      document.querySelector('.navbar  span').textContent = productNumbers;
                     }

                 }
// Al cargar la página, verifica si hay productos en el carrito guardados en 
// localStorage y actualiza la visualización del número de productos en la barra de navegación.
				 
function cartNumbers(product)
   {  
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);
       if(productNumbers)
          {
           localStorage.setItem('cartNumbers', productNumbers + 1);
           document.querySelector('.navbar  span').textContent = productNumbers + 1;
          }
       else
	      {
           localStorage.setItem('cartNumbers', 1);
           document.querySelector('.navbar span').textContent = 1;
          }
    setItems(product);
   }
// Esta función incrementa el número de productos en el carrito y 
// actualiza el localStorage y la visualización en la barra de navegación.

function setItems(product)
   {
    let cartItems = localStorage.getItem('productInCart');
    cartItems = JSON.parse(cartItems);

    if (cartItems != null)
       {
        if(cartItems[product.name] == undefined)
           {
            cartItems={...cartItems,[product.name]:product}
           }
        cartItems[product.name].Incart += 1;
       }
   
    else
	   {
        product.Incart = 1;
        cartItems={[product.name]:product}
       }

    localStorage.setItem("productInCart",JSON.stringify(cartItems));
   }
// Guarda los artículos en el carrito en el localStorage. 
// Si el artículo ya existe, aumenta la cantidad.

function totalCost(product)
   {
    let cartCost = localStorage.getItem('totalCost');

    if(cartCost!=null)
       {
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost" , cartCost + parseInt(product.prise));
       }
    else
	   {
        localStorage.setItem("totalCost" , parseInt(product.prise));
       }
   }
// Actualiza el costo total del carrito en el localStorage.

function displayCart()
   {
    let cartItems = localStorage.getItem("productInCart");
	// Obtiene los artículos del carrito almacenados en el localStorage bajo la clave "productInCart" y 
	// los almacena en la variable cartItems. Esta información se guarda como una cadena de texto.
	cartItems = JSON.parse(cartItems);console.log(cartItems);
	// Convierte la cadena de texto cartItems de nuevo a un objeto JavaScript usando JSON.parse(). 
	// Si cartItems es null (es decir, si no hay productos en el carrito), se convertirá en null.
    let productConitainer= document.querySelector(".productConitainer");
	// Selecciona el elemento del DOM con la clase .productConitainer y lo almacena en la variable 
	// productConitainer. Este elemento es donde se mostrarán los artículos del carrito.	
    if(cartItems && productConitainer)
	// Comprueba si cartItems no es null (es decir, hay productos en el carrito) y si productConitainer existe en el DOM.
       {
        productConitainer.innerHTML = '';
		// Si hay artículos en el carrito, vacía el contenido actual de productConitainer para 
		// asegurarse de que no se dupliquen los productos mostrados en cada llamada a displayCart().
        Object.values(cartItems).map(item =>{productConitainer.innerHTML+=`
        // Usa Object.values(cartItems) para obtener un arreglo de los valores (los productos) del objeto cartItems. 
		// Luego, se itera sobre cada producto usando map().
        <table style="margin-left: 200px; color: black;">
        <tbody>
          <tr class="text-center">
            <td class="product-remove">
			   <a href="#"><span class="ion-ios-close"></span></a>
			</td>
            <td>
               <div class="image">
               <img src="cart/${item.name}.jpg" width="145px" height="125px" style="padding-left: 6em;">
               </div>
            </td>
            <td style="padding-right: 6em; padding-left: 10em; text-align: center;">
               <h3 style="color: black; text-align: center;">${item.name}</h3>
               <p style="color: gray;" style="padding-right: 15px;">Muy, muy lejos, 
			   <br>detrás de las montañas de palabras,
			   <br>lejos de los países.</p>
            </td>
            <td style="color: black; padding-right: 2em; font-weight: 700;">Rs ${item.prise}.00</td>
            <td>
               <div class="input-group mb-3">
               <input type="text" style="padding: 10px; color: black; text-align: center;" name="quantity" class="quantity form-control input-number" value="${item.Incart}" min="1" max="100">
               </div>
            </td>
            <td style="color: black; padding-left: 4em; font-weight: 700;" class="total">Rs ${item.prise * item.Incart}.00</td>
          </tr><!-- FIN TR-->
        </tbody>
        </table>` }) } }
onload();
displayCart();
*/
/*
// Esta funcion pone en cero el carro cada vez que se cierre la centana
window.addEventListener('beforeunload', function () {
    // Eliminar elementos específicos del localStorage al cerrar la página
    localStorage.setItem('cartNumbers', 0);
    localStorage.setItem('productInCart', JSON.stringify({}));
    localStorage.setItem('totalCost', 0);
});
*/

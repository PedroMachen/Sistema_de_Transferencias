let totalPrice=0;
function goBack() {
    window.history.back();
}

const products = [
    {
        name:"Curso Premium",
        price:1500
    },
    {
        name:"Curso Económico",
        price:750
    },
    {
        name:"Curso Pobre",
        price:450
    }
    
];

let cart = {
    items:[],
    totalPrice:0
}

function renderAllProducts () {
    const productTable  = document.getElementById("productos");
    productTable.innerHTML = ''
    products.forEach((product, index)=>{
        productTable.innerHTML += `
            <tr>
                <td>${product.name}</td>
                <td>${product.price}</td>
                <td>
                    <button class="btn btn-success"
                    onclick="addToCart(${index})">
                        Agregar al carrito
                    </button>
                </td>
            </tr>
        `
    })
}
function renderAllCartItems() {
    const cartItemTable  = document.getElementById("canasta-items");
    const totalPriceElement = document.getElementById("precio-total");
    totalPrice = 0
    cartItemTable.innerHTML = ''
    if(cart.items.length===0){
        cartItemTable.innerHTML = `
        <tr>
            <td colspan="5">
                Su carrito está vacío.
            </td>
        </tr>
        `
    }
    cart.items.forEach((cartItem , index)=>{
        totalPrice += cartItem.total
        cartItemTable.innerHTML += `
            <tr>
                <td>${cartItem.name}</td>
                <td>${cartItem.price}</td>
                <td>${cartItem.quantity}</td>
                <td>${cartItem.total}</td>
                <td>
                    <button class="btn btn-danger"
                    onclick="removeFromCart('${cartItem.name}')">
                        Eliminar del carrito
                    </button>
                </td>
            </tr>
        `
    })

    totalPriceElement.innerText = `Total : $${totalPrice}`
}

function addToCart(productIndex){
    const product = products[productIndex];
    let isAlreadyInCart = false;
    let newCartItems = cart.items.reduce((state, item)=>{
        if(item.name === product.name){
            isAlreadyInCart = true;
            const newItem = {
                ...item,
                quantity: item.quantity + 1,
                total:(item.quantity + 1) * item.price 
            }
            return [...state, newItem];
        }
        return [...state, item];
    }, []);
    if(!isAlreadyInCart){
        newCartItems.push({
            ...product,
            quantity:1,
            total:product.price,
        })
    }
    cart = {
        ...cart,
        items: newCartItems,
    }
    renderAllCartItems();
}

function removeFromCart(productName) {
    let newCartItems = cart.items.reduce((state, item)=>{
        if(item.name === productName){
            const newItem = {
                ...item,
                quantity: item.quantity - 1,
                total:(item.quantity - 1) * item.price 
            }
            if(newItem.quantity > 0){
                return [...state, newItem];
            }
            return state;
        }
        return [...state, item];
    }, []);
    cart = {
        ...cart,
        items:newCartItems,
    }
    renderAllCartItems();    
}
function comprar(){
    var iva=0.16;
    var precio=(totalPrice)+(totalPrice*iva);
    alert("El total a pagar es de $"+precio);

}
function suscrip(){
    var desc=0.2;
    var precio=(totalPrice)-(totalPrice*desc);
    alert("El total a pagar es de $"+precio+"\nTiene un "+0.2*100+"% de descuento por susripcion");

}
renderAllProducts();
renderAllCartItems();

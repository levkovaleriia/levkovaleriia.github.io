let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'Рукавички Mil-Tec® Green',
        image: '1.png',
        price: 280,
        category: 'accessories'
    },
    {
        id: 2,
        name: 'Військова форма Gen3',
        image: '2.png',
        price: 2450,
        category: 'clothes'
    },
    {
        id: 3,
        name: 'Балаклава RIBANA 36l',
        image: '3.png',
        price: 200,
        category: 'accessories'
    },
    {
        id: 4,
        name: 'Черевики Mil-Tec® II',
        image: '4.png',
        price: 1200,
        category: 'shoes'
    },
    {
        id: 5,
        name: 'Рюкзак Mil-Tec® ',
        image: '5.png',
        price: 1800,
        category: 'bags'
    },
    {
        id: 6,
        name: 'Шолом NIJ IIIA',
        image: '6.png',
        price: 3700,
        category: 'hats'
    }
];
let listCards  = [];
// Функція для ініціалізації сторінки з товарами
function initApp(category = null) {
    list.innerHTML = ''; // Очищуємо список товарів

    // Якщо категорія не передана, відображаємо всі товари
    if (!category) {
        products.forEach((value, key) => {
            createProductElement(value, key);
        });
    } else {
        // Якщо передана категорія, відображаємо лише товари цієї категорії
        products.forEach((value, key) => {
            if (value.category === category) {
                createProductElement(value, key);
            }
        });
    }
}

// Створюємо елемент товару та додаємо його до списку
function createProductElement(product, key) {
    let newDiv = document.createElement('div');
    newDiv.classList.add('it');
    newDiv.innerHTML = `
        <img src="${product.image}">
        <div class="title">${product.name}</div>
        <div class="price">${product.price.toLocaleString()} грн</div>
        <button onclick="addToCard(${key})">Add To Card</button>`;
    list.appendChild(newDiv);
}

// Обробник подій для кнопок фільтрації
document.querySelectorAll('.kat button').forEach(button => {
    button.addEventListener('click', function() {
        const category = this.dataset.category; // Отримуємо категорію з data-атрибута кнопки
        initApp(category); // Ініціалізуємо сторінку з відповідною категорією
    });
});
initApp();
// Функция для поиска товаров по названию
function searchProducts(query) {
    // Преобразуем запрос в нижний регистр для регистронезависимого поиска
    const searchTerm = query.toLowerCase();
    // Очищаем список товаров перед добавлением найденных
    list.innerHTML = '';
    // Проходим по всем товарам
    products.forEach((product, key) => {
        // Преобразуем название товара в нижний регистр для регистронезависимого сравнения
        const productName = product.name.toLowerCase();
        // Если название товара содержит запрос, добавляем его в список
        if (productName.includes(searchTerm)) {
            let newDiv = document.createElement('div');
            newDiv.classList.add('it');
            newDiv.innerHTML = `
                <img src="${product.image}">
                <div class="title">${product.name}</div>
                <div class="price">${product.price.toLocaleString()} грн</div>
                <button onclick="addToCard(${key})">Add To Card</button>`;
            list.appendChild(newDiv);
        }
    });
}

// Получаем элемент поля для поиска
const searchInput = document.querySelector('.js-search');

// Слушаем событие ввода в поле поиска
searchInput.addEventListener('input', (event) => {
    // Получаем значение поля ввода
    const query = event.target.value.trim();
    // Вызываем функцию поиска с переданным запросом
    searchProducts(query);
});

function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
                listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}
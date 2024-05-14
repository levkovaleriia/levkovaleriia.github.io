<!DOCTYPE html>
<html>
    <head>
        <title>Головна</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="in.css" rel="stylesheet">
        <link href="tov.css" rel="stylesheet">
        <link href="main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <div id="cap">
                <div class="pho">
                <i class="fas fa-phone"> +380957039933</i>
                </div>
                <div class="mail">
                <i class="fas fa-envelope"> valerylevko645@gmail.com</i>
                </div>
                <div class="prof">
                    <button onclick="openModal()" class="but">
                <i class= "fas fa-user"> Профіль</i>
            </button>
                </div>
                <?php
// Підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "14112004"; // Залиште порожнім, якщо ви не встановили пароль для користувача root
$dbname = "registration";

// Створення з'єднання
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Реєстрація користувача
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Хешування паролю перед зберіганням у базі даних
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Підготовлений SQL-запит для вставки даних користувача
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Реєстрація успішна!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Авторизація користувача
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Запит до бази даних для отримання інформації про користувача
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "<script>alert('Успішний вхід!');</script>";
            echo "<script>document.getElementById('myModal').style.display = 'none';</script>";
        } else {
            echo "<script>alert('Неправильний пароль!');</script>";
        }
    } else {
        echo "<script>alert('Користувача з таким email не існує!');</script>";
    }
}

// Закриття з'єднання
$conn->close();
?>

<!-- Форма для реєстрації -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span onclick="closeModal()" style="float:right;">&times;</span>
        <h2>Реєстрація</h2>
    <form method="post">
        <label for="username">Ім'я:</label>
        <input type="tex" id="username" name="username"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password"><br><br>
        <button type="submit">Зареєструватися</button>
    </form>
   
        <h2>Вхід</h2>
    <form method="post">
        <label for="email_login">Email:</label>
        <input type="email" id="email_login" name="email"><br><br>
        <label for="password_login">Пароль:</label>
        <input type="password" id="password_login" name="password"><br><br>
        <button type="submit">Увійти</button>
    </form>
    </div>
</div>


            </div>
                <nav class="header-menu">
                    <div class="logo">
                    <strong>
                    NoWar
                </strong></div>
                <div class="main-menu">
                    <div id="menuIcons" class="main-menu_icons">
                        <i id="iconOpen" class= "fa-solid fa-bars"></i>
                        <i id="iconClose"></i>
                    </div>
                    <ul id="mainMenu" class="menu-list hide">
                        <li><a href="index.html">Головна</a></li>
                        <li><a href="about.html">Про нас</a></li>
                        <li><a href="blog.html">Блог</a></li>
                        <li><a href="shop.html">Магазин</a></li>
                    </ul>
                </div>
            </nav>
        </header>
            <p class="way"><a class="gl">Головна</a></p> 
          <div class="slider-container">
    <div class="slider">
        <div class="slide"><img src="im1.jpg" alt="NoWar"></div>
        <div class="slide"><img src="im2.jpg" alt="Comfort"></div>
        <div class="slide"><img src="im3.jpg" alt="assortment"></div>
    </div>
    <button class="prev-btn" onclick="prevSlide()">‹</button>
    <button class="next-btn" onclick="nextSlide()">›</button>
</div>
<div class="wrap">
    <div class="product">
      <img src="1.png" alt="gloves">
      <h3>Тактичні рукавички Warrior Mil-Tec® Dark Green  </h3>
      <span class="price1">280 грн</span>
          <button id="button1" onclick="window.location.href='shop.html';">В корзину</button>
</div>
    <div class="product">
      <img src="2.png" alt="uniform">
      <h3>Військова форма (убакс та штани) з наколінниками та налокітниками </h3>
      <span class="price2"><s>2 450 грн</s></span>
          <button id="button2" onclick="window.location.href='shop.html';">Немає на складі</button>
</div>
    <div class="product">
      <img src="3.png" alt="balaclava">
      <h3>Балаклава RIBANA Black</h3>
      <span class="price3">200 грн</span>
          <button id="button3" onclick="window.location.href='shop.html';">В корзину</button>
</div>
<div class="new">
<div class="layout-cell-plugin layout-cell-plugin" id="f02k7">
<div class="plugin-layout-inner">
<p><strong>Висока якість</strong></p>
<p class="n">Ми працюємо з виробниками, які дотримуються високих виробничих стандартів.</p>
</div>
</div>

<div class="layout-cell-plugin layout-cell-plugin" id="pca0s">
<div class="plugin-layout-inner">
<p><strong>Зручність покупок</strong></p>
<p class="n">Можливість замовляти товари з будь-якого місця і в будь-який час.</p>
</div>
</div>


<div class="layout-cell-plugin layout-cell-plugin" id="g59hw">
<div class="plugin-layout-inner">
<p><strong>Експертні знання</strong></p>
<p class="n">Ми експерти в цій справі та розуміємо потреби та вимоги професіоналів.</p>
</div>
</div>

</div>
<script src="top.js"></script>
      </div>
      <button onclick="topFunction()" id="myBtn" title="Go to top">▲</button> 
        <footer>
        <div id="contact">
             <div class="lo"><strong>
                    NoWar
                </strong></div>
   <div class="log">
    <div class="plugin-default social-networks social-networks-vld0p" id="social-networks">

                <div class="plugin-default-social-networks with-style" style="margin-left: 5px; margin-right: 5px; display: inline-block;">
                            <div class="social-networks" style="display: inline-block;">
                                <a href="https://www.facebook.com/" target="Blank" rel="nofollow" aria-label="Facebook">
                                        <span class="fill facebook custom" onmouseover="this.style.backgroundColor = '';" onmouseout="this.style.backgroundColor = '#dccdbe';" style="background: #dccdbe; width: 33px; height: 33px; border-radius: 0; padding: 20%; display: block; min-height: 20px; min-width: 20px;">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="100%" height="100%" x="0" y="0" viewbox="0 0 24 24" xml:space="preserve" class="">
        <g>
        <path xmlns="http://www.w3.org/2000/svg" d="m15.997 3.985h2.191v-3.816c-.378-.052-1.678-.169-3.192-.169-3.159 0-5.323 1.987-5.323 5.639v3.361h-3.486v4.266h3.486v10.734h4.274v-10.733h3.345l.531-4.266h-3.877v-2.939c.001-1.233.333-2.077 2.051-2.077z" fill="#283c28" data-original="#000000"></path></g>
        </svg>
    </span>

                                </a>
                            </div>
                </div>
                <div class="plugin-default-social-networks with-style" style="margin-left: 5px; margin-right: 5px; display: inline-block;">
                            <div class="social-networks" style="display: inline-block;">
                                <a href="https://www.instagram.com/" target="Blank" rel="nofollow" aria-label="Instagram">
                                    <span class="fill instagram custom" onmouseover="this.style.backgroundColor = '';" onmouseout="this.style.backgroundColor = '#dccdbe';" style="background: #dccdbe; width: 33px; height: 33px; border-radius: 0; padding: 20%; display: block; min-height: 20px; min-width: 20px;">
        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 511 511.9">
            <path fill="#283c28" d="M510.949219 150.5c-1.199219-27.199219-5.597657-45.898438-11.898438-62.101562-6.5-17.199219-16.5-32.597657-29.601562-45.398438-12.800781-13-28.300781-23.101562-45.300781-29.5C407.851562 7.199219 389.25 2.800781 362.050781 1.601562 334.648438.300781 325.949219 0 256.449219 0s-78.199219.300781-105.5 1.5C123.75 2.699219 105.050781 7.101562 88.851562 13.398438 71.648438 19.898438 56.25 29.898438 43.449219 43c-13 12.800781-23.097657 28.300781-29.5 45.300781C7.648438 104.601562 3.25 123.199219 2.050781 150.398438.75 177.800781.449219 186.5.449219 256s.300781 78.199219 1.5 105.5c1.199219 27.199219 5.601562 45.898438 11.902343 62.101562 6.5 17.199219 16.597657 32.597657 29.597657 45.398438C56.25 482 71.75 492.101562 88.75 498.5c16.300781 6.300781 34.898438 10.699219 62.101562 11.898438 27.296876 1.203124 36 1.5 105.5 1.5s78.199219-.296876 105.5-1.5C389.050781 509.199219 407.75 504.800781 423.949219 498.5c34.402343-13.300781 61.601562-40.5 74.902343-74.898438C505.148438 407.300781 509.550781 388.699219 510.75 361.5c1.199219-27.300781 1.5-36 1.5-105.5s-.101562-78.199219-1.300781-105.5zm-46.097657 209c-1.101562 25-5.300781 38.5-8.800781 47.5-8.601562 22.300781-26.300781 40-48.601562 48.601562-9 3.5-22.597657 7.699219-47.5 8.796876-27 1.203124-35.097657 1.5-103.398438 1.5s-76.5-.296876-103.402343-1.5c-25-1.097657-38.5-5.296876-47.5-8.796876C94.550781 451.5 84.449219 445 76.25 436.5c-8.5-8.300781-15-18.300781-19.101562-29.398438-3.5-9-7.699219-22.601562-8.796876-47.5-1.203124-27-1.5-35.101562-1.5-103.402343s.296876-76.5 1.5-103.398438c1.097657-25 5.296876-38.5 8.796876-47.5C61.25 94.199219 67.75 84.101562 76.351562 75.898438c8.296876-8.5 18.296876-15 29.398438-19.097657 9-3.5 22.601562-7.699219 47.5-8.800781 27-1.199219 35.101562-1.5 103.398438-1.5 68.402343 0 76.5.300781 103.402343 1.5 25 1.101562 38.5 5.300781 47.5 8.800781 11.097657 4.097657 21.199219 10.597657 29.398438 19.097657 8.5 8.300781 15 18.300781 19.101562 29.402343 3.5 9 7.699219 22.597657 8.800781 47.5 1.199219 27 1.5 35.097657 1.5 103.398438s-.300781 76.300781-1.5 103.300781zm0 0"></path>
            <path fill="#283c28" d="M256.449219 124.5c-72.597657 0-131.5 58.898438-131.5 131.5s58.902343 131.5 131.5 131.5c72.601562 0 131.5-58.898438 131.5-131.5s-58.898438-131.5-131.5-131.5zm0 216.800781c-47.097657 0-85.300781-38.199219-85.300781-85.300781s38.203124-85.300781 85.300781-85.300781C303.550781 170.699219 341.75 208.898438 341.75 256s-38.199219 85.300781-85.300781 85.300781zM423.851562 119.300781c0 16.953125-13.746093 30.699219-30.703124 30.699219-16.953126 0-30.699219-13.746094-30.699219-30.699219 0-16.957031 13.746093-30.699219 30.699219-30.699219 16.957031 0 30.703124 13.742188 30.703124 30.699219zm0 0"></path>
        </svg>
</span>

                                </a>
                            </div>
                </div>
                <div class="plugin-default-social-networks with-style" style="margin-left: 5px; margin-right: 5px; display: inline-block;">
                            <div class="social-networks" style="display: inline-block;">
                                <a href="viber://chat?number=%2B380999999999" target="Blank" rel="nofollow" aria-label="Viber">
                                    <span class="fill viber custom" onmouseover="this.style.backgroundColor = '';" onmouseout="this.style.backgroundColor = '#dccdbe';" style="background: #dccdbe; width: 33px; height: 33px; border-radius: 0; padding: 20%; display: block; min-height: 20px; min-width: 20px;">
    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 152 152">
        <path fill="#283c28" d="M89 11H63c-25.2 0-45.5 20.3-45.5 45.5V76c0 17.6 10.1 33.6 26 41.1v21.8c0 1.1 1 2.1 2.3 2.1.5 0 1.1-.2 1.5-.6l18.8-18.9H89c25.2 0 45.5-20.3 45.5-45.5V56.5C134.5 31.3 114.2 11 89 11zm17.1 85.3-6.5 6.5c-7 6.8-25-1-40.9-17.2s-23-34.5-16.3-41.3l6.5-6.5c2.6-2.4 6.7-2.3 9.3.2l9.4 9.8c2.4 2.6 2.4 6.5-.2 9.1-.7.7-1.5 1.1-2.4 1.5-3.3 1-5 4.2-4.2 7.5 1.6 7.2 10.7 16.2 17.6 18 3.2.8 6.5-1 7.6-4.1 1.1-3.2 4.7-5 8.1-3.9 1 .3 1.8 1 2.6 1.6l9.4 9.8c2.4 2.4 2.4 6.4 0 9zM81.8 41.9c-.7 0-1.3 0-1.9.2-1.1.2-2.3-.7-2.4-2s.7-2.3 1.9-2.4c.8-.2 1.6-.2 2.4-.2 12 0 21.6 9.8 21.8 21.6 0 .8 0 1.6-.2 2.4-.2 1.1-1.1 2.1-2.4 1.9s-2.1-1.1-1.9-2.4c0-.7.2-1.3.2-1.9-.1-9.4-7.9-17.2-17.5-17.2zm13 17.4c-.2 1.1-1.1 2.1-2.4 1.9-1-.2-1.9-1-1.9-1.9 0-4.7-3.9-8.6-8.6-8.6-1.1.2-2.3-.8-2.4-2-.2-1.1.8-2.3 1.9-2.4h.3c7.5 0 13.1 5.8 13.1 13zm16.6 6.9c-.2 1.1-1.3 1.9-2.4 1.8s-1.9-1.3-1.8-2.4v-.3c.5-1.9.7-3.9.7-6 0-14.3-11.7-26-26-26H80c-1.1.2-2.3-.8-2.3-2-.2-1.1.8-2.3 1.9-2.3.8 0 1.6-.2 2.3-.2 16.7 0 30.4 13.6 30.4 30.4-.1 2.3-.4 4.8-.9 7z"></path>
    </svg>
</span>

                                </a>
                            </div>
                </div>
                <div class="plugin-default-social-networks with-style" style="margin-left: 5px; margin-right: 5px; display: inline-block;">
                            <div class="social-networks" style="display: inline-block;">
                                <a href="tg://resolve?domain=username/" target="Blank" rel="nofollow" aria-label="Telegram">
                                    <span class="fill telegram custom" onmouseover="this.style.backgroundColor = '';" onmouseout="this.style.backgroundColor = '#dccdbe';" style="background: #dccdbe; width: 33px; height: 33px; border-radius: 0; padding: 20%; display: block; min-height: 20px; min-width: 20px;">
    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24">
    <path fill="#283c28" d="m9.417 15.181-.397 5.584c.568 0 .814-.244 1.109-.537l2.663-2.545 5.518 4.041c1.012.564 1.725.267 1.998-.931L23.93 3.821l.001-.001c.321-1.496-.541-2.081-1.527-1.714l-21.29 8.151c-1.453.564-1.431 1.374-.247 1.741l5.443 1.693L18.953 5.78c.595-.394 1.136-.176.691.218z"></path>
    </svg>
</span>

                                </a>
                            </div>
                </div>
                <div class="plugin-default-social-networks with-style" style="margin-left: 5px; margin-right: 5px; display: inline-block;">
                            <div class="social-networks" style="display: inline-block;">
                                <a href="https://api.whatsapp.com/send?phone=+380999999999" target="Blank" rel="nofollow" aria-label="WhatsApp">
                                    <span class="fill whatsapp custom" onmouseover="this.style.backgroundColor = '';" onmouseout="this.style.backgroundColor = '#dccdbe';" style="background: #dccdbe; width: 33px; height: 33px; border-radius: 0; padding: 20%; display: block; min-height: 20px; min-width: 20px;">
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="enable-background:new 0 0 512 512" viewbox="0 0 512 512">
        <path fill="#283c28" d="M256.064 0h-.128C114.784 0 0 114.816 0 256c0 56 18.048 107.904 48.736 150.048l-31.904 95.104 98.4-31.456C155.712 496.512 204 512 256.064 512 397.216 512 512 397.152 512 256S397.216 0 256.064 0zm148.96 361.504c-6.176 17.44-30.688 31.904-50.24 36.128-13.376 2.848-30.848 5.12-89.664-19.264-75.232-31.168-123.68-107.616-127.456-112.576-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624 26.176-62.304c6.176-6.304 16.384-9.184 26.176-9.184 3.168 0 6.016.16 8.576.288 7.52.32 11.296.768 16.256 12.64 6.176 14.88 21.216 51.616 23.008 55.392 1.824 3.776 3.648 8.896 1.088 13.856-2.4 5.12-4.512 7.392-8.288 11.744-3.776 4.352-7.36 7.68-11.136 12.352-3.456 4.064-7.36 8.416-3.008 15.936 4.352 7.36 19.392 31.904 41.536 51.616 28.576 25.44 51.744 33.568 60.032 37.024 6.176 2.56 13.536 1.952 18.048-2.848 5.728-6.176 12.8-16.416 20-26.496 5.12-7.232 11.584-8.128 18.368-5.568 6.912 2.4 43.488 20.48 51.008 24.224 7.52 3.776 12.48 5.568 14.304 8.736 1.792 3.168 1.792 18.048-4.384 35.52z"></path>
    </svg>
</span> </a>
                            </div>
                </div>
    </div>
</div>
<div class="layout-cell desktop--3 tablet--6 tablet-hide mobile-hide min-hide max-3 desktop-3 tablet-2 mobile-3 min-3" id="y7bkc">
<div class="layout-inner">
<div class="layout-cell-plugin layout-cell-plugin" id="wms7b">
<div class="plugin-layout-inner">
<p><strong>Особистий кабінет</strong></p>
</div>
</div>

<div class="layout-cell-plugin layout-cell-plugin" id="vua7p">
<div class="plugin-layout-inner">
<p class="q"><a class="v" href="/account/userprofile/">Профіль</a></p>
<p class="s"><a class="p" href="/accountshop/orders/">Мої замовлення</a></p>
</div>
</div>

</div>
</div>
<div class="layout-cell max-3 desktop-2 tablet-1 mobile-3 min-3" id="r8cms">
<div class="layout-inner">
<div class="layout-cell-plugin layout-cell-plugin" id="r4m9x">
<div class="plugin-layout-inner">
<p><strong>Меню</strong></p>
</div>
</div>

<div class="layout-cell-plugin layout-cell-plugin" id="oz1hs">
<div class="plugin-layout-inner">



    <div id="menu-vertical-oz1hs" class="plugin-menu align-left fontsize-16 rowspacing-6 itemsspacing-0 color-#1d1d1d hovercolor-rgba(29, 29, 29, 0.7)">
        <nav class="menu-vertical">
            <ul list-style-type:  none;>
                    <li id="menu-item-shop" class="common has-no-submenu has-no-widget">
                        <a class="m" href="/shop/" target="_self">
                            Магазин
                        </a>
                    </li>
                    <li id="menu-item-for-customers" class="common has-no-submenu has-no-widget">
                        <a class="k" href="about.html" target="_self">
                            Про нас
                        </a>
                    </li>
                    <li id="menu-item-blog" class="common has-no-submenu has-no-widget">
                        <a class="b" href="blog.html" target="_self">
                            Блог
                        </a>
                    </li>
                    <li id="menu-item-contacts" class="common has-no-submenu has-no-widget">
                        <a class="c" href="/contacts/" target="_self">
                            Контакти
                        </a>
                    </li>
            </ul>
        </nav>
    </div>


</div>
</div>

</div>
</div>

<div class="layout-cell max-3 desktop-3 tablet-2 mobile-3 min-3" id="c07ay">
<div class="layout-inner">
<div class="layout-cell-plugin layout-cell-plugin" id="o698y">
<div class="plugin-layout-inner">
<p><strong>Контакти</strong></p>
</div>
</div>

<div class="layout-cell-plugin layout-cell-plugin" id="d7a3l">
<div class="plugin-layout-inner">
<p class="location">м.Івано-Франківськ, вул.Пулюя 15</p>
<p class="phone"><a class="te" href="tel">+38 (096) 703 99 33</a></p>
<p class="ma"><a class="l" href="mal">valerylevko645@gmail.com</a></p>
</div>
</div>
</div>
</div>
 <p class="pra">&copy; 2024 Інтернет-магазин. Всі права захищені.</p>
</div>
 
    </footer>

    <script src="script2.js"></script>
        <script src="script1.js"></script>
         <script src="script3.js"></script>
         <script>
             function openModal() {
  document.getElementById('myModal').style.display = 'block';
}

// Функція для закриття модального вікна
function closeModal() {
  document.getElementById('myModal').style.display = 'none';
}

// Закриття модального вікна при кліці на позачергову область
window.onclick = function(event) {
  if (event.target == document.getElementById('myModal')) {
    document.getElementById('myModal').style.display = 'none';
  }
}
         </script>
    </body>

    </html>
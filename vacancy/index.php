<?php
$ROOT = $_SERVER['DOCUMENT_ROOT'] . '/';
$BASE_HREF = '//' . $_SERVER['HTTP_HOST'] . (!empty($_SERVER['DOCUMENT_URI']) ? str_replace( substr(str_replace('index.php', '', $_SERVER['DOCUMENT_URI']), 1), '', $_SERVER['REQUEST_URI'] ) : '');
$QUERY_STRING = http_build_query($_GET);
$QUERY_PARAM = $QUERY_STRING ? '?' . $QUERY_STRING : '';
$BASE_HREF_QUERY = $BASE_HREF . $QUERY_PARAM;
$lang = $get_lang = isset($_GET['lang']) && $_GET['lang'] != '' ? urldecode(strtolower($_GET['lang'])) : 'en';
$URL = '//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$version = isset($_GET['version']) ? urldecode( strtolower($_GET['version']) ) : '';
$partner = isset($_GET['partner']) ? urldecode( strtolower($_GET['partner']) ) : '';
$title_h1 = isset($_GET['h1']) ? urldecode($_GET['h1']) : '';
$title_h2 = isset($_GET['h2']) ? urldecode($_GET['h2']) : '';
$title_h3 = isset($_GET['h3']) ? urldecode($_GET['h3']) : '';
$title_h4 = isset($_GET['h4']) ? urldecode($_GET['h4']) : '';

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <base href="<?=$BASE_HREF?>">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    
    <title itemscope itemprop="headline">Справочник вакансий</title>
    <meta property="og:title" content="Справочник вакансий">
    <meta itemprop="description" name="description" content="">
    <meta property="og:description" content="">
    

    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">

</head>

<body class="p-vacancy" id="body">

    <div class="wrapper" id="wrapper">
    
    <header class="header">
    <div class="container">
        <div class="header__content">
            <div class="header__logo">
                <img src="img/header/logo.svg" alt="" class="header__logo-img">
            </div>
        </div>
    </div>
</header>
    <section class="p-vacancy">
    <div class="p-vacancy__main">
        <div class="p-vacancy__main-container container">
            <h1 class="p-vacancy__main-title">Загрузка...</h1>
        </div>
        <img data-src="img/@pages/vacancy/bg.png" alt="" class="p-vacancy__main-bg lazy">
        <img data-src="img/@pages/vacancy/bg-words.svg" alt="" class="p-vacancy__main-bg-words lazy">
    </div>
    <div class="p-vacancy__content">
        <div class="container">
            <h2 class="p-vacancy__title">Подробнее о&nbsp;вакансии</h2>
            <div class="p-vacancy__desc-wrap">
                <p class="p-vacancy__subtitle">Опыт работы</p>
                <p class="p-vacancy__desc" id="experience"></p>
            </div>
            <div class="p-vacancy__desc-wrap">
                <p class="p-vacancy__subtitle">График</p>
                <p class="p-vacancy__desc" id="work-schedule"></p>
            </div>
            <div class="p-vacancy__desc-wrap">
                <p class="p-vacancy__subtitle">Оплата труда и&nbsp;оформление</p>
                <p class="p-vacancy__desc" id="payment"></p>
            </div>
            <div class="p-vacancy__desc-wrap">
                <p class="p-vacancy__subtitle">Оборудование</p>
                <p class="p-vacancy__desc" id="equipment"></p>
            </div>
            <div class="p-vacancy__desc-wrap">
                <p class="p-vacancy__subtitle">Стажировка и&nbsp;обучение</p>
                <p class="p-vacancy__desc" id="internship"></p>
            </div>
            <div class="p-vacancy__desc-wrap">
                <p class="p-vacancy__subtitle">Скрипт</p>
                <p class="p-vacancy__desc" id="script"></p>
            </div>
            <div class="p-vacancy__button-wrap">
                <a href="/" class="p-vacancy__button button">На главную</a>
                <a href="#" class="p-vacancy__button button button--accent" id="crm-button">CRM</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="p-vacancy__map-wrap">
            <p class="p-vacancy__map-title">Карта вакансий</p>
        </div>
    </div>
    <div class="p-vacancy__map" id="map"></div>
</section>
    <footer class="footer">
    <div class="container">
        <div class="footer__logo">
            <img src="img/footer/logo.svg" alt="" class="footer__logo-img">
        </div>
    </div>
</footer>

    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.1?apikey=b21f9430-79fc-4854-96d4-2fe363d2b09f&load=package.standard&lang=ru_RU"
          type="text/javascript"></script>

    
    <script src="js/vacancy.js"></script>
    <script src="js/lazy.js"></script>


</body>
</html>
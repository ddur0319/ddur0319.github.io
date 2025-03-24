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

<body class="" id="body">

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
    <section class="main">
    <div class="container">
        <div class="main__content">
            <div class="main__title-wrap">
                <h1 class="main__title">Справочник вакансий</h1>
            </div>
            <div class="main__vacancies-wrap">
                <div class="main__vacancies">
                    <p class="main__vacancies-title">Менеджер</p>
                    <a href="#" class="main__vacancies-button">Мне подходит</a>
                    <img data-src="img/main/img-1.svg" alt="" class="main__vacancies-img main__vacancies-img-1 lazy">
                </div>
                <div class="main__vacancies">
                    <p class="main__vacancies-title">Вакансия для вас</p>
                    <a href="#" class="main__vacancies-button">Мне подходит</a>
                    <img data-src="img/main/img-2.svg" alt="" class="main__vacancies-img main__vacancies-img-2 lazy">
                </div>
                <div class="main__vacancies">
                    <p class="main__vacancies-title">Менеджер</p>
                    <a href="#" class="main__vacancies-button">Мне подходит</a>
                    <img data-src="img/main/img-3.svg" alt="" class="main__vacancies-img main__vacancies-img-3 lazy">
                </div>
            </div>
        </div>
    </div>
    <img data-src="img/main/bg.svg" alt="" class="main__bg lazy">
</section>


    <section class="catalog">
    <div class="container">
        <div class="loader">Загрузка...</div>
        <div class="catalog__filter-wrap">
            <button class="catalog__filter-button button">Очистить</button>
        </div>
        <div class="catalog__content"></div>
        <p class="catalog__map-title">Карта вакансий</p>
    </div>
    <div class="container">
        <div class="catalog__map-filter-wrap">
            <div class="catalog__map-filter" id="map-city">
                <div class="catalog__map-filter-current">
                    <span class="catalog__map-filter-current-text">Город</span>
                    <svg class="catalog__map-filter-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 10" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.77775 9.29549L0.666503 2.12545L2.444 0.333252L8.6665 6.6072L14.889 0.333252L16.6665 2.12545L9.55525 9.29549C9.31952 9.5331 8.99983 9.66659 8.6665 9.66659C8.33317 9.66659 8.01349 9.5331 7.77775 9.29549Z" fill="black"/></svg></div>
                <div class="catalog__map-filter-list"></div>
            </div>
            <div class="catalog__map-filter" id="map-metro" style="display: none">
                <div class="catalog__map-filter-current">
                    <span class="catalog__map-filter-current-text">Метро</span>
                    <svg class="catalog__map-filter-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 10" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.77775 9.29549L0.666503 2.12545L2.444 0.333252L8.6665 6.6072L14.889 0.333252L16.6665 2.12545L9.55525 9.29549C9.31952 9.5331 8.99983 9.66659 8.6665 9.66659C8.33317 9.66659 8.01349 9.5331 7.77775 9.29549Z" fill="black"/></svg></div>
                <div class="catalog__map-filter-list"></div>
            </div>
        </div>
    </div>
    <div class="catalog__map" id="catalog-map"></div>
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

    
    <script src="js/script.js"></script>
    <script src="js/lazy.js"></script>


</body>
</html>
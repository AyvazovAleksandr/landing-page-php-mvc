<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Рога и Копыта</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- App styles CSS -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- App Icons CSS -->
    <link href="/css/icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>

<body>
    <header class="blog-header py-3">
        <div class="container">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-2 pt-1">
                    <img class="logo" src="/img/logo.jpg">
                </div>
                <div class="col-6 text-center">
                    <h2>Рога и Копыта</h2>
                </div>
                <div class="col-4 text-center">
                </div>
            </div>
        </div>
    </header>
<!-- Begin page content -->
<main role="main" class="container">
    <section>
        <p class="lead">Разнообразный и богатый опыт курс на социально-ориентированный национальный проект требует от нас системного анализа форм воздействия. Практический опыт показывает, что выбранный нами инновационный путь требует от нас анализа модели развития. Дорогие друзья, сложившаяся структура организации способствует подготовке и реализации модели развития.

            Соображения высшего порядка, а также сложившаяся структура организации играет важную роль в формировании форм воздействия!

            Значимость этих проблем настолько очевидна, что выбранный нами инновационный путь обеспечивает широкому кругу специалистов участие в формировании модели развития! Значимость этих проблем настолько очевидна, что постоянный количественный рост и сфера нашей активности способствует повышению актуальности всесторонне сбалансированных нововведений! Повседневная практика показывает, что постоянный количественный рост и сфера нашей активности обеспечивает актуальность системы масштабного изменения ряда параметров.

            Равным образом сложившаяся структура организации требует определения и уточнения существующих финансовых и административных условий. Значимость этих проблем настолько очевидна, что повышение уровня гражданского сознания требует от нас системного анализа существующих финансовых и административных условий. Таким образом, сложившаяся структура организации влечет за собой процесс внедрения и модернизации существующих финансовых и административных условий! Таким образом, рамки и место обучения кадров в значительной степени обуславливает создание всесторонне сбалансированных нововведений. Таким образом, консультация с профессионалами из IT влечет за собой процесс внедрения и модернизации направлений прогрессивного развития? Соображения высшего порядка, а также...
        </p>
    </section>

    <section>
        <ul id="list_comments" class="list-unstyled">

        </ul>

        <div class="alert alert-danger alert-dismissible fade show" id="alert_ajax_error" role="alert" style="display: none;">
            <strong>Ошибка сохранения!</strong> Произошла не известная ошибка, попробуйте повторить ввод данных.
            <button type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="alert alert-warning alert-dismissible fade show" id="alert_user_name" role="alert" style="display: none;">
            <strong>Ошибка в имени пользователя!</strong> Корректно заполните имя пользователя.
            <button type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="alert alert-warning alert-dismissible fade show" id="alert_user_email" role="alert" style="display: none;">
            <strong>Ошибка в email!</strong> Корректно заполните email.
            <button type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="alert alert-warning alert-dismissible fade show" id="alert_user_title" role="alert" style="display: none;">
            <strong>Ошибка в заголовке!</strong> Корректно заполните заголовок.
            <button type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="alert alert-warning alert-dismissible fade show" id="alert_user_comment" role="alert" style="display: none;">
            <strong>Ошибка в комментарии!</strong> Корректно заполните комментарий.
            <button type="button" class="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="form-group">
            <label for="user_name">Имя пользователя</label>
            <input type="text" class="form-control" id="user_name" placeholder="Введите ваше имя">
        </div>

        <div class="form-group">
            <label for="user_email">Email address</label>
            <input type="email" class="form-control" id="user_email" placeholder="Введите email">
        </div>

        <div class="form-group">
            <label for="post_title">Заголовок</label>
            <input type="text" class="form-control" id="post_title" placeholder="Введите заголовок комментария">
        </div>

        <div class="form-group">
            <label for="post_comment">Ваш комментарий</label>
            <textarea class="form-control" id="post_comment" rows="5"></textarea>
        </div>
        <button id="submit_comment" class="btn btn-primary">Отправить</button>

    </section>
</main>
<footer class="footer">
    <div class="container">
        <a href="https://www.facebook.com/" class="btn btn-social-icon btn-outline-facebook"><i class="fa fa-facebook"></i></a>
        <a href="https://www.youtube.com/" class="btn btn-social-icon btn-outline-youtube"><i class="fa fa-youtube"></i></a>
        <a href="https://twitter.com/" class="btn btn-social-icon btn-outline-twitter"><i class="fa fa-twitter"></i></a>
        <a href="https://ru.linkedin.com/" class="btn btn-social-icon btn-outline-linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.instagram.com/" class="btn btn-social-icon btn-outline-instagram"><i class="fa fa-instagram"></i></a>
    </div>
</footer>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>

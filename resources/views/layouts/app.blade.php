<!DOCTYPE html>
<html lang="ru">
    <head>
        @if(config('app.env') != 'local')
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function(m, e, t, r, i, k, a) {
                m[i] =
                    m[i] ||
                    function() {
                        (m[i].a = m[i].a || []).push(arguments);
                    };
                m[i].l = 1 * new Date();
                (k = e.createElement(t)),
                    (a = e.getElementsByTagName(t)[0]),
                    (k.async = 1),
                    (k.src = r),
                    a.parentNode.insertBefore(k, a);
            })(
                window,
                document,
                "script",
                "https://mc.yandex.ru/metrika/tag.js",
                "ym"
            );

            ym(65202709, "init", {
                clickmap: true,
                trackLinks: true,
                accurateTrackBounce: true,
                webvisor: true
            });
        </script>
        <noscript
            ><div>
                <img
                    src="https://mc.yandex.ru/watch/65202709"
                    style="position:absolute; left:-9999px;"
                    alt=""
                /></div
        ></noscript>
        <!-- /Yandex.Metrika counter -->
        @endif

        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
            crossorigin="anonymous"
        />
        <link rel="shortcut icon" href="{{{ asset('favicon.png') }}}" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/zoomove/1.2.1/zoomove.min.css"
        />
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
        <title>@yield('title')</title>
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
            body {
                padding-top: 5rem;
            }
            .starter-template {
                padding: 3rem 1.5rem;
                text-align: center;
            }
        </style>
        <!-- fancybox -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
            integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
            crossorigin="anonymous"
        />
    </head>
    <body>
        <nav
            class="navbar navbar-expand-md navbar-dark bg-dark fixed-top text-light"
        >
            <a class="navbar-brand" href="{{ url('/') }}">
                <img
                    src="{{ asset('favicon.png') }}"
                    alt=""
                    style="width: 2rem;"
                />
                &nbsp; GrandCore</a
            >
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li
                        class="nav-item @if(Request::is('/about')) active @endif"
                    >
                        <a class="nav-link" href="{{ url('/about') }}"
                            >О Фонде</a
                        >
                    </li>
                    <li class="nav-item @if(Request::is('mvp')) active @endif">
                        <a class="nav-link" href="{{ url('/mvp') }}"
                            >MVP Платформы</a
                        >
                    </li>
                    <li
                        class="nav-item nav-item-edem @if(Request::is('edem')) active @endif"
                    >
                        <a class="nav-link" href="{{ url('/edem') }}"
                            >EDem фреймворк</a
                        >
                    </li>

                    @guest
                    <li class="nav-item nav-item-login">
                        <a class="nav-link">Войти</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a
                            id="navbarDropdown"
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            v-pre
                        >
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div
                            class="dropdown-menu dropdown-menu-right"
                            aria-labelledby="navbarDropdown"
                        >
                            <a
                                class="dropdown-item"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >
                                Выйти
                            </a>

                            <form
                                id="logout-form"
                                action="{{ route('logout') }}"
                                method="POST"
                                style="display: none;"
                            >
                                @csrf
                            </form>

                            @if(Auth::user()->id === 1)
                            <a
                                class="dropdown-item"
                                href="{{ url('/users-list') }}"
                            >
                                Пользователи
                            </a>
                            <a
                                class="dropdown-item"
                                href="{{ url('/invites') }}"
                            >
                                Инвайты
                            </a>
                            @endif @endguest
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <p class="view-error">{{ session()->get( 'error' ) }}</p>

        <main role="main" class="container">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="page-footer font-small teal pt-4 bg-dark text-light">
            <!-- Footer Text -->
            <div class="container-fluid text-center text-md-left">
                <!-- Grid row -->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-6 mt-md-0 mt-3">
                        <!-- Content -->
                        <h5 class="text-uppercase font-weight-bold">
                            Подпишитесь
                        </h5>

                        <p>
                            GitHub репозиторий -
                            <a href="https://github.com/grandcore"
                                >@grandcore</a
                            >
                        </p>

                        <p>
                            Telegram канал -
                            <a href="https://t.me/grandcore">@grandcore</a>
                        </p>

                        <p>
                            YouTube канал -
                            <a
                                href="https://www.youtube.com/channel/UCCcI0eNBhfd0qHIzZLDvKVA"
                                >@UCCcI0eNBhfd0qHIzZLDvKVA</a
                            >
                        </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none pb-3" />

                    <!-- Grid column -->
                    <div class="col-md-6 mb-md-0 mb-3">
                        <!-- Content -->
                        <h5 class="text-uppercase font-weight-bold">
                            Напишите
                        </h5>

                        <p>
                            Telegram -
                            <a href="https://t.me/i0zgMRV49fX">@i0zgMRV49fX</a>
                        </p>

                        <p>
                            Email -
                            <a href="mailto:ru@grandcore.org"
                                >ru@grandcore.org</a
                            >
                        </p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
            <!-- Footer Text -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">2019-2020 MIT</div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <div class="modal fade" id="loginModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST" action="/auth/login">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Логин</label>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    required
                                    placeholder="Введите email"
                                />
                            </div>
                            <div class="form-group">
                                <label>Пароль</label>
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    required
                                    placeholder="Введите пароль"
                                />
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Войти
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <p class="modal-footer-register">Регистрация</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="registerModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST" action="/auth/register">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Логин</label>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    required
                                    placeholder="Введите email"
                                />
                            </div>
                            <div class="form-group">
                                <label>Пароль</label>
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    required
                                    placeholder="Введите пароль"
                                />
                            </div>
                            <div class="form-group">
                                <label>Повторите пароль</label>
                                <input
                                    type="password"
                                    name="rePassword"
                                    class="form-control"
                                    required
                                    placeholder="Повторите пароль"
                                />
                            </div>
                            <div class="form-group">
                                <label>Invite код</label>
                                <input
                                    type="text"
                                    name="inviteCode"
                                    class="form-control"
                                    required
                                    placeholder="Введите invite код"
                                />
                            </div>
                            <b>
                                Нету invite кода ? Обратитесь к администратору!
                            </b>
                            <br />
                            <br />
                            <button type="submit" class="btn btn-primary">
                                Регистрация
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"
        ></script>

        <script>
            $(".nav-item-login").click(() => {
                $("#loginModal").modal("show");
            });

            $(".modal-footer-register").click(() => {
                $("#loginModal").modal("hide");
                $("#registerModal").modal("show");
            });

            $(".create-invite").click(() => {
                $("#createInviteModal").modal("show");
            });
        </script>
        <!-- fancybox -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
            integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
            crossorigin="anonymous"
        ></script>

        <!-- slider -->
        <script>
            jQuery(document).ready($ => {
                $("a.screenshot").fancybox();
            });
        </script>
    </body>
</html>
<!-- session()->get( 'jwtToken' ) -->

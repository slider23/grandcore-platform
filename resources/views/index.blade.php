
@extends('layouts.app')

@section('title', 'GrandCore Foundation | Open Source Корпорация')


@section('content')


<style>
    .slider img {
        object-fit: cover;
        width: 100%;
        height: 120px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
    }
    .slider img:hover {
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }
    .slider .thumb {
        height: 120px;
    }
    .promo-panes {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: wrap;
        align-content: stretch;
    }
    .promo-panes .pane {
        box-sizing: border-box;
        width:50%;
    }
    .promo-panes .pane:nth-child(odd) {
        padding:0 15px 30px 0;
    }
    .promo-panes .pane:nth-child(even) {
        padding:0 0 30px 15px;
    }
    .promo-panes .pane .inner {
        background: #ddd;
        min-height:150px;
        height:100%
    }
    .video {
        background: #ddd;
        margin-bottom:15px;
        height:200px;
    }
    .video a {
        width: 100%;
        height: 100%;
        display: grid;
        place-items: center;
    }
    .pane-1 .title {
        font-size: 32px;
        line-height: 32px;
    }
    .pane-1 .description {
        font-size: 16px;
        line-height: 24px;
        display: grid;
        place-items: center;
    }
    .pane-2 {
        background: #eee;
        padding:30px;
        box-sizing: border-box;
    }
    .pane-2 .inner {
        background: #ddd;
        height: 100%;
        padding:15px;
    }
    .pane-2 h3 {
        font-weight: bold;
        font-size: 16px;
        line-height: 24px;
    }
    .pane-3 .description {
        font-size: 36px;
        line-height: 42px;
    }
    .conveyor {
        background: #ddd;
        padding:15px;
    }
    .conveyor h3 {
        font-size: 24px;
        line-height: 24px;
        text-align: center;
        margin:20px 0;
    }
    .conveyor ul {
        list-style: none;
        padding:0;
        margin: 30px 0 0;
    }
    .conveyor li {
        text-align:center;
    }
    .conveyor li::after {
        content: '';
        width:30px;
        height:30px;
        display: block;
        margin:5px auto;
        transform: rotate(90deg);
        background: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0yNC4yOTEsMTQuMjc2TDE0LjcwNSw0LjY5Yy0wLjg3OC0wLjg3OC0yLjMxNy0wLjg3OC0zLjE5NSwwbC0wLjgsMC44Yy0wLjg3OCwwLjg3Ny0wLjg3OCwyLjMxNiwwLDMuMTk0ICBMMTguMDI0LDE2bC03LjMxNSw3LjMxNWMtMC44NzgsMC44NzgtMC44NzgsMi4zMTcsMCwzLjE5NGwwLjgsMC44YzAuODc4LDAuODc5LDIuMzE3LDAuODc5LDMuMTk1LDBsOS41ODYtOS41ODcgIGMwLjQ3Mi0wLjQ3MSwwLjY4Mi0xLjEwMywwLjY0Ny0xLjcyM0MyNC45NzMsMTUuMzgsMjQuNzYzLDE0Ljc0OCwyNC4yOTEsMTQuMjc2eiIgZmlsbD0iIzUxNTE1MSIvPjwvc3ZnPg==') 50% 50% no-repeat;
    }
    .conveyor li:last-child::after {
        background: none;
    }
    .conveyor .slogan {
        font-size: 24px;
        line-height: 32px;
        text-decoration-line: underline;
        font-style: italic;
        padding: 0 30px;
    }

    @media (max-width: 991px) {
        .promo-panes .pane {
            width:100%;
        }
        .promo-panes .pane:last-child {
            padding-bottom:15px;
        }
        .promo-panes .pane:nth-child(odd),
        .promo-panes .pane:nth-child(even) {
            padding:0 0 30px;
        }
    }

    @media (max-width: 767px) {
        .promo-panes .pane {
            padding-left:0;
            padding-right:0;
        }
        .promo-panes .pane:last-child {
            padding-bottom:30px;
        }
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Кратко о GrandCore Foundation</h1>
        </div>
    </div>

    <div class="row py-5 pane-1">
        <div class="col-12 col-lg-4 title">
            Открытые технологии, вклад в которые смогут внести все в меру своих возможностей.
        </div>
        <div class="col-12 col-lg-8 py-3 description">Мы хотим вывести идеи Open Source на качественно новый уровень, создав фонд и удобную онлайн платформу для работы над любыми открытыми проектами: общественно значимых онлайн сервисами, персональным и корпоративным софтом, открытыми стандартами в виде чертежей и описания техпроцессов производства любых изделий, от тостера до космического корабля с возможностью купить готовые изделия или его составные части для самостоятельной сборки или ремонта сделанных производителями со всего мира.</div>
    </div>

    <div class="pane-2 mb-5">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="inner">
                    <h3>Наши ссылки</h3>
                    <ul>
                        <li>GitHub;</li>
                        <li>что-то еще...</li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="inner">
                    <h3>Связь с фондом</h3>
                    <ul>
                        <li>GitHub;</li>
                        <li>что-то еще...</li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="inner">
                    <h3>Материальная помощь</h3>
                    <p>Деньги пойдут на продвижение проекта и оплату серверов.</p>
                    <p>Яндекс.Деньги 4400234921098014<br />(вы можете сделать перевод в своём онлайн банке)</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-8 promo-panes">
            <div class="pane">
                <div class="inner"></div>
            </div>
            <div class="pane">
                <div class="inner"></div>
            </div>
            <div class="pane">
                <div class="inner"></div>
            </div>
            <div class="pane">
                <div class="inner"></div>
            </div>
            <div class="pane">
                <div class="inner"></div>
            </div>
            <div class="pane">
                <div class="inner"></div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="video">
                <a data-fancybox href="https://www.youtube.com/watch?v=ScMzIvxBSi4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="110px" height="110px"><path fill="#FF3D00" d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z"/><path fill="#FFF" d="M20 31L20 17 32 24z"/></svg>
                </a>
            </div>
            <div class="slider">
                <div class="row pb-3">
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" data-fancybox="gallery" href="{{ asset('img/index-01.png') }}">
                            <img src="{{ asset('img/index-01.png') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" data-fancybox="gallery" href="{{ asset('img/index-02.jpg') }}">
                            <img src="{{ asset('img/index-02.jpg') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" data-fancybox="gallery" href="{{ asset('img/index-02.jpg') }}">
                            <img src="{{ asset('img/index-02.jpg') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" data-fancybox="gallery" href="{{ asset('img/index-01.png') }}">
                            <img src="{{ asset('img/index-01.png') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" data-fancybox="gallery" href="{{ asset('img/index-01.png') }}">
                            <img src="{{ asset('img/index-01.png') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" data-fancybox="gallery" href="{{ asset('img/index-02.jpg') }}">
                            <img src="{{ asset('img/index-02.jpg') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" data-fancybox="gallery" href="{{ asset('img/index-02.jpg') }}">
                            <img src="{{ asset('img/index-02.jpg') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" data-fancybox="gallery" href="{{ asset('img/index-01.png') }}">
                            <img src="{{ asset('img/index-01.png') }}" alt="GrandCore" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row pane-3">
        <div class="col-12 col-lg-8">
            <h2>Главное</h2>
            <p class="description">GrandCore Foundation - cвободная информационная и промышленная альтернатива. </p>
            <p>Основные идеи:</p>
            <ul>
                <li>Все сделанное в рамках фонда становится общественным достоянием</li>
                <li>Деньги на реализацию проектов собираются с помощью краудфандинга, а так же с комиссии платных сервисов</li>
                <li>Основатели и руководители фонда НЕ получают дивиденты</li>
                <li>Управление фодом осуществляется сооюществом с помощью инструментов электронной демократии</li>
                <li>Пользователи имеют рейтинг, который влияет в том числе на вес его голоса при принятии решений</li>
                <li>Над проектами фонда смогут работать только участники подтвердившие свою квалификацию.</li>
                <li>В рамках фонда и платформы будут доступны все инструменты для разработки, финансирования и поддержки пользователей.</li>
            </ul>
            <p>Про фонд GrandCore - Подробнее о философии фонда, вопросах финансирования и управления, работе над проектами и других его сервисах.</p>
            <p>MVP платформы - первая, разрабатываемая mvp вервия платформы на базе фреймворка Laravel. Визуализация: проект в виде схемы, дизайн экранов, Git-репозиторий</p>
            <p>Edem - CRM/ERP Фреймворк на основе которого будет строиться платформа фонда в дальнейшем.</p>
        </div>
        <div class="col-12 col-lg-4">
            <div class="conveyor">
                <h3>Open Source конвейер</h3>
                <ul>
                    <li>Генерация идей</li>
                    <li>Проектирование</li>
                    <li>Финансирование</li>
                    <li>Разработка</li>
                    <li>Распространение</li>
                    <li>Поддержка пользователей</li>
                </ul>
                <p class="slogan">Открытые технологии, вклад в которые смогут внести все в меру своих возможностей.</p>
            </div>
        </div>
    </div>

</div>

<div class="card">
  <div class="card-body"><h4>
  	Как вам идея создать фонд для любых Open Source проектов и универсальную платформу для работы над ними?<br><br>
<ul>
	<li>
<b>Софт</b> <em>(пользовательский, корпоративный, промышленный...)</em>
</li>
	<li>
<b>Этичные веб сервисы</b> <em>(мессенджеры, соцсети, поисковики...)</em>
</li>
	<li><b>Электроника</b> (смартфоны, нотубуки,умный дом ...)</li>
	<li><b>Что-то неожиданное</b> (тостеры, табуретки, космические корабли...)</li>
</ul>
  </h4>
  </div>
</div>
<br><br>

<div class="card">
  <div class="card-body">
<h2 class="text-center">Open Source конвейер</h2>
<br>
<h4 class="text-center">
Генерация идей <b>=></b> Проектирование <b>=></b>  Финансирование <b>=></b> Разработка <b>=></b>
Распространение <b>=></b>
Поддержка пользователей
</h3>
<br>
<em>
Открытые технологии, вклад в которые смогут внести все в меру своих возможностей.</em>

  </div>
</div>

<br><br>
<p>Мы хотим вывести идеи Open Source на качественно новый уровень, создав фонд и удобную онлайн платформу для работы над любыми открытыми проектами: общественно значимых онлайн сервисами, персональным и корпоративным софтом, открытыми стандартами в виде чертежей и описания техпроцессов производства любых изделий, от тостера до космического корабля с возможностью купить готовые изделия или его составные части для самостоятельной сборки или ремонта сделанных производителями со всего мира.</p>

<blockquote class="blockquote text-center">
  <p class="mb-0">Цель фонда - дать людям свободную информационную и промышленную альтернативу.</p>
</blockquote>


<h2>Главное</h2>

<ul>
<li>Все сделанное в рамках фонда будет общественным достоянием.</li>

<li>Никто не будет получать какие либо дивиденты, только оплату труда.</li>

<li>Финансирование проектов будет осуществляться как от прямых разовых или регулярных пожертвований определенным проектам или фонду в целом, так и от распределения денег полученных от продаж изделий или их составных частей в маркетплейсе, а также услуг гаранта на бирже платных услуг по внедрению и доработке свободных проектов фонда.</li>

<li>Управление фондом будет осуществляться с помощью демократических инструментов, голос участника будет иметь вес пропорциональный его материальному и созидательному вкладу в фонд.</li>

<li>Над проектами фонда смогут работать только участники подтвердившие свою квалификацию.</li>

<li>Вся работа над проектами будет вестись с помощью автоматизированных бизнес-процессов, в рамках фонда и платформы будут доступны все инструменты для разработки, финансирования и поддержки пользователей.    </li>
</ul>

<p>
<a href="{{ asset('img/index-01.png') }}" target="_blank"><img src="{{ asset('img/index-01.png') }}" alt="Пример страницы проекта" class="img-fluid"/></a>

<strong>Прототип страницы проекта Космической ракеты</strong> Можно купить готовое изделие, набор для самостоятельной сборки или скачать чертежи и описания техпроцессов. Запустить процесс по доработке проекта и исправлению ошибок.</p>

<p><a href="{{ asset('img/index-01.png') }}" target="_blank"><img src="{{ asset('img/index-02.jpg') }}" alt="Пример страницы таска" class="img-fluid"/></a>
<strong>Прототип страницы сервиса принятия решений в рамках задачи ветки бизнес-процесса</strong>. В данном случае показан сервис голосования и обсуждения. С левой стороны указаны все актуальные для пользователя задачи. Каждый тип задачи имеет свой интерфейс для пользователей.

<h2 id="-2">Читайте далее</h2>

<p><a href="https://grandcore.org/about/">Про фонд GrandCore</a> - Подробнее о философии фонда, вопросах финансирования и управления, работе над проектами и других его сервисах.</p>

<p><a target="_blank" href="https://grandcore.org/mvp">MVP платформы</a> - первая, разрабатываемая mvp вервия платформы на базе фреймворка Laravel. <span class="d-block p-2 bg-danger text-white"><b>Визуализация:</b> <a target="_blank" href="https://www.mindomo.com/mindmap/83798b37459848089f13a01522e84907" class="text-white"><u>проект в виде схемы</u></a>, <a class="text-white" href="https://www.figma.com/file/NlikNEJQHliYlxI3MHhiSW/Share?node-id=0%3A1" target="_blank"><u>дизайн экранов</u></a>, <a  class="text-white" href="https://github.com/grandcore/grandcore-platform" target="_blank"><u>Git-репозиторий</u></a>
</span>
</p>




<p><a href="https://grandcore.org/edem/">Edem</a> - CRM/ERP Фреймворк на основе которого будет строиться платформа фонда в дальнейшем.</p>


@endsection

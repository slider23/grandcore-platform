
@extends('layouts.app')

@section('title', 'GrandCore Foundation | Open Source Корпорация')


@section('content')



<h1>Кратко о GrandCore Foundation</h1>

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
        padding:0 15px 30px;
        width:50%;
    }
    .promo-panes .pane .inner {
        background: silver;
        min-height:150px;
        height:100%
    }
    .video {
        background: silver;
        margin-bottom:15px;
        height:200px;
    }
    @media (max-width: 991px) {
        .promo-panes .pane {
            width:100%;
        }
        .promo-panes .pane:last-child {
            padding-bottom:15px;
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

            </div>
            <div class="slider">
                <div class="row">
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" rel="group1" href="{{ asset('img/index-01.png') }}">
                            <img src="{{ asset('img/index-01.png') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" rel="group1" href="{{ asset('img/index-02.jpg') }}">
                            <img src="{{ asset('img/index-02.jpg') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" rel="group1" href="{{ asset('img/index-02.jpg') }}">
                            <img src="{{ asset('img/index-02.jpg') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" rel="group1" href="{{ asset('img/index-01.png') }}">
                            <img src="{{ asset('img/index-01.png') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" rel="group1" href="{{ asset('img/index-01.png') }}">
                            <img src="{{ asset('img/index-01.png') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" rel="group1" href="{{ asset('img/index-02.jpg') }}">
                            <img src="{{ asset('img/index-02.jpg') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" rel="group1" href="{{ asset('img/index-02.jpg') }}">
                            <img src="{{ asset('img/index-02.jpg') }}" alt="GrandCore" />
                        </a>
                    </div>
                    <div class="col-6 col-md-12 col-lg-6 my-3 thumb">
                        <a class="screenshot" rel="group1" href="{{ asset('img/index-01.png') }}">
                            <img src="{{ asset('img/index-01.png') }}" alt="GrandCore" />
                        </a>
                    </div>
                </div>
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


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
        text-decoration: none;
        color:#444;
    }
    .video a:hover {
        color: black;
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
        padding:30px 15px 45px;
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
            <h1>Что за GrandCore Foundation</h1>
        </div>
    </div>

    <div class="row py-5 pane-1">
        <div class="col-12 col-lg-4 title">
            Свободная информационная и промышленная альтернатива. 
        </div>
        <div class="col-12 col-lg-8 py-3 description">

<p class="lead">
    
    Как вам идея создать фонд для любых Open Source проектов и универсальную платформу для работы над ними?
</p>

            <p>Мы хотим вывести идеи Open Source на качественно новый уровень, создав фонд и удобную онлайн платформу для работы над любыми открытыми проектами:

             общественно значимыми онлайн сервисами, персональным и корпоративным софтом, открытыми стандартами любых изделий в виде чертежей и описания техпроцессов производства (от тостера до космического корабля). 
</p><p>
            Пользователи смогут зарабатывать выполняя текущие задачи по проектам на которые были собраны деньги с помощью краундфандинга, продавая изделия и их составные части сделанные по свободным стандартам в маркетплейсе, беря задачи на бирже услуг, выполняя задачи по доработке проектов фонда и их поддержке.</p>


                  




        </div>
    </div>

    <div class="pane-2 mb-5">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="inner">


                    <!-- Социальные сети начало -->
                <h3>Подпишитесь на нас</h3>
                <div>
                    <div class="social-networks-item">
                    <svg role="img" class="github" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>GitHub icon</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                        - <a href="https://github.com/grandcore">Github</a>
                    </div>
                    <div class="social-networks-item">
                    <svg role="img" xmlns="http://www.w3.org/2000/svg" class="telegram" viewBox="0 0 24 24"><title>Telegram icon</title><path d="M23.91 3.79L20.3 20.84c-.25 1.21-.98 1.5-2 .94l-5.5-4.07-2.66 2.57c-.3.3-.55.56-1.1.56-.72 0-.6-.27-.84-.95L6.3 13.7l-5.45-1.7c-1.18-.35-1.19-1.16.26-1.75l21.26-8.2c.97-.43 1.9.24 1.53 1.73z"/></svg>
                        - <a href="https://t.me/grandcore">Telegram</a>
                    </div>
                    <div class="social-networks-item">
                    <svg role="img" xmlns="http://www.w3.org/2000/svg" class="youtube" viewBox="0 0 24 24"><title>YouTube icon</title><path fill-rule="evenodd" d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/></svg>
                        - <a href="https://www.youtube.com/channel/UCCcI0eNBhfd0qHIzZLDvKVA">YouTube</a>
                    </div>
                </div>
                    <!-- Социальные сети конец -->

                    
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="inner">
                    <h3>Напишите Нам</h3>
                    <ul>
                        <li>Telegram - <a href="https://t.me/i0zgMRV49fX">@i0zgMRV49fX</a></li>
                        <li>E-mail - <a href="mailto:ru@grandcore.org">ru@grandcore.org</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="inner">
                    <h3>Материальная помощь</h3>

                    <p>Яндекс.Деньги - <a href="https://money.yandex.ru/to/410019594133149">410019594133149</a><br />(вы можете сделать перевод в своём онлайн банке)</p>
                    <p><i>Деньги пойдут на продвижение проекта и оплату серверов. Ваши 100 рублей действительно серьезно помогут.</i></p>                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">



 <!--        <div class="col-12 col-md-8 promo-panes">
     <div class="pane">
         <div class="inner">
       
         </div>
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
  -->


        <div class="col-12 col-md-12">
            <div class="video">
                <a data-fancybox href="https://www.youtube.com/watch?v=dv1QFTSCrHo">
                    <span class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="110px" height="110px"><path fill="#FF3D00" d="M43.2,33.9c-0.4,2.1-2.1,3.7-4.2,4c-3.3,0.5-8.8,1.1-15,1.1c-6.1,0-11.6-0.6-15-1.1c-2.1-0.3-3.8-1.9-4.2-4C4.4,31.6,4,28.2,4,24c0-4.2,0.4-7.6,0.8-9.9c0.4-2.1,2.1-3.7,4.2-4C12.3,9.6,17.8,9,24,9c6.2,0,11.6,0.6,15,1.1c2.1,0.3,3.8,1.9,4.2,4c0.4,2.3,0.9,5.7,0.9,9.9C44,28.2,43.6,31.6,43.2,33.9z"/><path fill="#FFF" d="M20 31L20 17 32 24z"/></svg><br />
                        Посмотреть видео презентации проекта
                    </span>
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
           
                </div>
            </div>
        </div>
    </div>

    <div class="row pane-3">
        <div class="col-12 col-lg-8">

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


<br>
<h2 id="-2">Читайте далее</h2>

<p><a href="https://grandcore.org/about/">Про фонд GrandCore</a> - Подробнее о философии фонда, вопросах финансирования и управления, работе над проектами и других его сервисах.</p>

<p><a target="_blank" href="https://grandcore.org/mvp">MVP платформы</a> - первая, разрабатываемая mvp вервия платформы на базе фреймворка Laravel. <span class="d-block p-2 bg-danger text-white"><b>Визуализация:</b> <a target="_blank" href="https://www.mindomo.com/mindmap/83798b37459848089f13a01522e84907" class="text-white"><u>проект в виде схемы</u></a>, <a class="text-white" href="https://www.figma.com/file/NlikNEJQHliYlxI3MHhiSW/Share?node-id=0%3A1" target="_blank"><u>дизайн экранов</u></a>, <a  class="text-white" href="https://github.com/grandcore/grandcore-platform" target="_blank"><u>Git-репозиторий</u></a>
</span>
</p>




<p><a href="https://grandcore.org/edem/">Edem</a> - CRM/ERP Фреймворк на основе которого будет строиться платформа фонда в дальнейшем.</p>


@endsection

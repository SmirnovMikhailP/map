<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';
require_once __DIR__ . '/../local/templates/teboil/parts/header_map-page.php';
?>
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs__body this--desktop">
                <a href="/" class="breadcrumbs__link">Главная</a>
                <span class="breadcrumbs__arrow"></span>
                <a href="/" class="breadcrumbs__link">Топливные карты</a>
                <span class="breadcrumbs__arrow"></span>
                <a href="#" class="breadcrumbs__link breadcrumbs__link--disabled">Сеть АЗС</a>
            </div>
            <div class="breadcrumbs__body this--mobile">
                <span class="breadcrumbs__arrow"></span>
                <a href="#" class="breadcrumbs__link">Главная</a>
            </div>
        </div>
    </div>
    <section class="main_title">
        <div class="container">
            <h2>Сеть АЗС по Мультикарте Teboil</h2>
            <a href="/" class="button this--icon">Стать клиентом
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.33333 8H12.6667" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 3.33325L12.6667 7.99992L8 12.6666" stroke="white" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </section>
    <section class="map">
        <div class="container">

            <div class="map__filters">
                <div class="map__select_city">
                    <select name="city" id="city"></select>
                </div>
                <div class="map__address">
                    <select name="shops" id="shops">
                        <option selected disabled value="">Введите адрес</option>
                    </select>
                </div>
                <form action="#" name="filter_form" class="map__filters_group js_filter_form">
                    <div class="map__filter">
                        <span class="map__filter_count"></span>
                        <button class="map__filter_btn js_filter_btn"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.6654 2H1.33203L6.66536 8.30667V12.6667L9.33203 14V8.30667L14.6654 2Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>Топливо</button>
                        <div class="map__filter_body this--fuel">
                            <div class="map__filter_body_items">
                                <div class="map__filter_body_item">
                                    <input type="checkbox" id="1-1" name="fuel" value="92">
                                    <label for="1-1">92<span class="map__filter_cross"></span></label>
                                </div>
                                <div class="map__filter_body_item">
                                    <input type="checkbox" id="1-2" name="fuel" value="95">
                                    <label for="1-2">95<span class="map__filter_cross"></span></label>
                                </div>
                                <div class="map__filter_body_item">
                                    <input type="checkbox" id="1-3" name="fuel" value="95+">
                                    <label for="1-3">95+<span class="map__filter_cross"></span></label>
                                </div>
                                <div class="map__filter_body_item">
                                    <input type="checkbox" id="1-5" name="fuel" value="98">
                                    <label for="1-5">98<span class="map__filter_cross"></span></label>
                                </div>
                                <div class="map__filter_body_item">
                                    <input type="checkbox" id="1-4" name="fuel" value="98+">
                                    <label for="1-4">98+<span class="map__filter_cross"></span></label>
                                </div>
                                <div class="map__filter_body_item"></div>
                                <div class="map__filter_body_item">
                                    <input type="checkbox" id="1-6" name="fuel" value="DT">
                                    <label for="1-6">ДТ<span class="map__filter_cross"></span></label>
                                </div>
                                <div class="map__filter_body_item">
                                    <input type="checkbox" id="1-7" name="fuel" value="DT+">
                                    <label for="1-7">ДТ+<span class="map__filter_cross"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="map__filter">
                        <span class="map__filter_count"></span>
                        <button class="map__filter_btn js_filter_btn"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.6654 2H1.33203L6.66536 8.30667V12.6667L9.33203 14V8.30667L14.6654 2Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>категория АЗС</button>
                        <div class="map__filter_body this--right this--others">
                            <div class="map__filter_body_items">

                                <div class="map__filter_body_item">
                                    <input type="checkbox" id="2-1" name="service" value="teboil">
                                    <label for="2-1">Торговые точки Teboil<span class="map__filter_cross"></span></label>
                                </div>
                                <div class="map__filter_body_item">
                                    <input type="checkbox" id="2-2" name="service" value="lukoil">
                                    <label for="2-2">Торговые точки «ЛУКОЙЛ»<span class="map__filter_cross"></span></label>
                                </div>
                                <div class="map__filter_body_item">
                                    <input type="checkbox" id="2-3" name="service" value="partners">
                                    <label for="2-3">Торговые точки Партнеров<span class="map__filter_cross"></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="map__download_link">
                    <a href="/documents/Teboil_AZS-list_26052023.xlsx">Скачать Список АЗС</a>
                </div>
            </div>
        </div>
        <div class="map__map" id="map"></div>
    </section>
<?php require_once __DIR__ . '/../local/templates/teboil/parts/footer_map-page.php';?>

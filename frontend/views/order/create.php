<?php
use yii\helpers\Html;

/* @var \yii\web\View $this */
/* @var \common\models\ar\ShopOrder $model */

$this->params['bodyOptions'] = [
    'class' => 'no-footer-page body-color-grey2'
];
$this->params['showFooter'] = FALSE;

$js = <<<JS
$(document).ready(function() {
    $('[data-cv-rq]').on('blur', function() {
        var el = $(this);
        var container = el.parents('.cart__steps-forms-box');
        var ttl = container.find('.ttl');
        if (el.val() == '') {
            el.addClass('error').removeClass('success');
            ttl.addClass('error').removeClass('done');
        } else {
            el.addClass('success').removeClass('error');
            if (container.find('.error[data-cv-rq]').length == 0) {
                ttl.removeClass('error');
                if(container.find('.success[data-cv-rq]').length == container.find('[data-cv-rq]').length){
                    ttl.addClass('done');
                }
            }
        }
    });
});
JS;

$this->registerJs($js);

?>

<div class="cart__steps-form">
    <div class="cart__top-nav">
        <div class="container">
            <div class="cart__back-btn">Назад</div>
            <div class="shop__swich">
                <ul class="text-center">
                    <li><a class="arrow " href="">1  Корзина</a></li>
                    <li><a class="arrow active" href="">2  Контакты</a></li>
                    <li><a class="" href="">3  Подтвердить заказ</a></li>
                </ul>
            </div>
            <div class="cart__close-btn">Закрыть</div>
        </div>
    </div>
</div>
<div class="cart__steps-forms">
    <div class="container">
        <?= Html::beginForm(); ?>
        <div class="row cart__steps-forms-boxs">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="cart__steps-forms-box">
                    <div class="ttl">Контакты</div>
                    <?= Html::activeTextInput($model, 'firstname',
                        ['class' => 'about-us__form-input ico-men',
                            'data-cv-rq' => '',
                            'placeholder' => 'Имя']); ?>
                    <?= Html::activeTextInput($model, 'lastname',
                        ['class' => 'about-us__form-input ico-men',
                            'data-cv-rq' => '',
                            'placeholder' => 'Фамилия']); ?>
                    <?= Html::activeInput('email', $model, 'email',
                        ['class' => 'about-us__form-input ico-mail',
                            'data-cv-rq' => '',
                            'placeholder' => 'Email']) ?>
                    <?= Html::activeInput('tel', $model, 'phone',
                        ['class' => 'about-us__form-input ico-tel',
                            'data-cv-rq' => '',
                            'placeholder' => '( 099 ) 800 80 80']) ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="cart__steps-forms-box">
                    <div class="ttl">Адрес Доставки</div>
                    <?= Html::activeTextInput($model, 'city',
                        ['class' => 'about-us__form-input ico-sity',
                            'data-cv-rq' => '',
                            'placeholder' => 'Город']); ?>
                    <?= Html::activeTextInput($model, 'np_number',
                        ['class' => 'about-us__form-input ico-num',
                            'data-cv-rq' => '',
                            'placeholder' => 'Отделения Новой Почты']); ?>
                    <?= Html::activeTextInput($model, 'street',
                        ['class' => 'about-us__form-input ico-street',
                            'data-cv-rq' => '',
                            'placeholder' => 'Улица']); ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 padding-right-none">
                            <?= Html::activeTextInput($model, 'house_number',
                                ['class' => 'about-us__form-input ico-house',
                                    'data-cv-rq' => '',
                                    'placeholder' => 'Дом / Корпус']); ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 padding-left-none">
                            <?= Html::activeTextInput($model, 'apartment_number',
                                ['class' => 'about-us__form-input ico-flat',
                                    'data-cv-rq' => '',
                                    'placeholder' => 'Квартира']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="cart__steps-forms-box">
                    <div class="ttl">Комментарий к заказу</div>
                    <?= Html::activeTextarea($model, 'comment', [
                        'class' => 'about-us__form-input',
                        'placeholder' => 'Комментарий',
                        'rows' => 8,
                        'cols' => 40
                    ]) ?>
                </div>
            </div>
        </div>
        <div class="row cart__steps-bottom-btns">
            <div class="col-lg-8 col-md-8 col-sm-8 text-right">
                <!--<span>Заполненные данные будут сохранены в</span>
                <a class="my-profile-link" href="">Ваш Профиль</a>
                <a class="btn-07" href="">Сохранить</a>-->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 text-right">
                <button class="btn-02" href="">Продолжить</button>
            </div>
        </div>
        <?= Html::endForm(); ?>
    </div>
</div>

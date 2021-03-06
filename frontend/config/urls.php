<?php
return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'hostInfo' => 'http://manly.inimini.ru',
    'scriptUrl' => 'http://manly.inimini.ru',
    'baseUrl' => 'http://manly.inimini.ru',
    /*'hostInfo' => 'http://manly.local',
    'scriptUrl' => 'http://manly.local',
    'baseUrl' => 'http://manly.local',*/
    'rules' => [
        'partners' => 'site/partners',
        'blog' => 'blog/list',
        'blog/<slug:.*>' => 'blog/post',
        'shop' => 'shop/catalog',
        'shop/<productSlug:.*>/faq' => 'shop/faq',
        'shop/<slug:.*>' => 'shop/product',
        'cart-item' => 'order/cart-item',
        'cart/contacts' => 'order/create',
        'cart' => 'order/cart',
        'about' => 'site/about',
    ],
];
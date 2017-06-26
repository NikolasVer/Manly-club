<?php
return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'hostInfo' => 'http://manly.inimini.ru',
    'scriptUrl' => 'http://manly.inimini.ru',
    'baseUrl' => 'http://manly.inimini.ru',
    'rules' => [
        'blog' => 'blog/list',
        'blog/<slug:.*>' => 'blog/post',
        'shop' => 'shop/catalog',
        'shop/<productSlug:.*>/faq' => 'shop/faq',
        'shop/<slug:.*>' => 'shop/product'
    ],
];
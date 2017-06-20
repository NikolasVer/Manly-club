<?php
return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    //'hostInfo' => 'http://manly.local',
    //'scriptUrl' => 'http://manly.local',
    //'baseUrl' => 'http://manly.local',
    'rules' => [
        'blog' => 'blog/list',
        'blog/<slug:.*>' => 'blog/post'
    ],
];
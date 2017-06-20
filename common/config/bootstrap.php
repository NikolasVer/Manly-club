<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');

Yii::setAlias('@uploads/storage', dirname(dirname(__DIR__)) . '/frontend/web/uploads/storage');
Yii::setAlias('@uploads/posts', dirname(dirname(__DIR__)) . '/frontend/web/uploads/posts');
Yii::setAlias('@uploads/categories', dirname(dirname(__DIR__)) . '/frontend/web/uploads/categories');
Yii::setAlias('@uploads/varieties', dirname(dirname(__DIR__)) . '/frontend/web/uploads/varieties');

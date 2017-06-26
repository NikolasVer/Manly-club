<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "shop_faq".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property array $parsedContent
 */
class ShopFaq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_faq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }

    public function getParsedContent()
    {
        preg_match_all('/<h1.*\>.*\<\/h1\>?/', $this->content, $headers);

        $headers = $headers[0];
        $cnt = count($headers);
        $res = [];

        foreach ($headers as $i => $header) {
            $header = trim($header);
            $start = mb_strpos($this->content, $header, NULL, 'UTF-8');
            $end = $i < $cnt - 2
                ? mb_strpos($this->content, $headers[$i+1], NULL, 'UTF-8') : mb_strlen($this->content);
            $end--;
            $res[] = [
                preg_replace('/<h1.*>(.*)<\/h1>/', '$1', $header),
                mb_substr($this->content, $start, $end - $start, 'UTF-8')
            ];
        }

        return $res;
    }

}

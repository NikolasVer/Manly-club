<?php

use yii\db\Migration;

class m170709_155610_load_countries_and_cities extends Migration
{
    public function up()
    {

        $data = [
            'Украина' => [
                "Харьков",
                "Днепропетровск",
                "Кривой Рог",
                "Донецк",
                "Краматорск",
                "Макеевка",
                "Мариуполь",
                "Запорожье и область",
                "Луганск и область",
                "Харьков и область",
                "Ивано-Франковск и область",
                "Луцк и Волынская область",
                "Львов и область",
                "Харьков",
                "Днепропетровск",
                "Кривой Рог",
                "Донецк",
                "Краматорск",
                "Макеевка",
                "Мариуполь",
                "Запорожье и область",
                "Луганск и область",
                "Харьков и область",
                "Ивано-Франковск и область",
                "Луцк и Волынская область",
                "Львов и область",
                "Харьков",
                "Днепропетровск",
                "Кривой Рог",
                "Донецк",
                "Краматорск",
                "Макеевка",
                "Мариуполь",
                "Запорожье и область",
                "Луганск и область",
                "Харьков и область",
                "Ивано-Франковск и область",
                "Луцк и Волынская область",
                "Львов и область",
            ],
            'Россия' => [],
            'Беларусь' => [],
            'Казахстан' => [],
            'Армения' => [],
            'Польша' => [],
        ];

        foreach ($data as $country => $cities) {
            $this->db->createCommand('insert into country (name) values ("' . $country . '")')->execute();
            $id = $this->db->getLastInsertID();
            foreach ($cities as $city) {
                $this->db->createCommand('insert into city (country_id, name) values (' . $id
                    . ',"' . $city . '")')->execute();
            }
        }

    }

    public function down()
    {
        return FALSE;
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%buildings}}`.
 */
class m190725_115907_create_buildings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT "Здания"';
        }

        $this->createTable('buildings', [
            'id' => $this->primaryKey(),
            'url_detail_building' => $this->string()->comment('Урл здания'),
            'metro' => $this->integer()->comment('Метро'),
            'number_of_floors' => $this->integer()->comment('Количество этажей'),
            'name' => $this->string()->comment('Название здания'),
            'image' => $this->string()->comment('Изображение'),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)->comment('Статус'),
            'order' => $this->integer()->comment('Сортировка'),

            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'order',
            'buildings',
            'order'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('buildings');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartments}}`.
 */
class m190725_123038_create_apartments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB COMMENT "Квартиры"';
        }

        $this->createTable('apartments', [
            'id' => $this->primaryKey(),
            'building_id' => $this->integer()->comment('ИД здания'),
            'number_of_rooms' => $this->integer()->comment('Количество комнат'),
            'floor' => $this->integer()->comment('Этаж'),
            'price' => $this->decimal(19, 2)->comment('Цена'),
            'number_apartment' => $this->integer()->comment('Номер квартиры'),
            'status' => $this->smallInteger()->notNull()->defaultValue(1)->comment('Статус'),
            'order' => $this->integer()->comment('Сортировка'),
            'rent_sale' => "ENUM('rent', 'sale')",

            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
        ], $tableOptions);

        $this->createIndex(
            'order',
            'apartments',
            'order'
        );

        $this->createIndex(
            'building_id',
            'apartments',
            'building_id'
        );

        $this->addForeignKey(
            'FK_building_id',
            'apartments',
            'building_id',
            'buildings',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('apartments');
    }
}

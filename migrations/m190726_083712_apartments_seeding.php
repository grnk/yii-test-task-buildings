<?php

use yii\db\Migration;

/**
 * Class m190726_083712_apartments_seeding
 */
class m190726_083712_apartments_seeding extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for($j = 1; $j <= 20; $j++) {
            for ($i = 1; $i <= rand(50, 100); $i++) {
                $this->insert('apartments', [
                    'building_id' => $j,
                    'number_of_rooms' => rand(1, 6),
                    'floor' => rand(1, 3),
                    'price' => rand(1000000, 10000000),
                    'number_apartment' => $i,
                    'status' => rand(0, 1),
                    'order' => rand(1, 100),
                    'rent_sale' => rand(0, 1) ? 'rent' : 'sale',

                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
            }
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable('apartments');
    }
}

<?php

use yii\db\Migration;

/**
 * Class m190725_145939_building_seeding
 */
class m190725_145939_building_seeding extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for ($i = 1; $i <= 20; $i++) {
            $this->insert('buildings', [
                'id' => $i,
                'url_detail_building' => 'build-' . $i,
                'metro' => rand(0, 9),
                'number_of_floors' => rand(3, 20),
                'name' => 'Здание номер ' . $i,
                'image' => 'image_build' . $i . '.jpg',
                'status' => rand(0, 1),
                'order' => rand(1, 100),

                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('buildings', []);
    }

}

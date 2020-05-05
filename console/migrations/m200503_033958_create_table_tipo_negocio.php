<?php

use yii\db\Migration;

/**
 * Class m200503_033958_create_table_tipo_negocio
 */
class m200503_033958_create_table_tipo_negocio extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tipo_negocio', [
            'id' =>  $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'nombre' => $this->string(),
            'descripcion' => $this->text(),
            'activo' => $this->tinyInteger(1)->defaultValue(0),
            'fecha_alta' => $this->dateTime()->notNull(),
            'fecha_actualizacion' => $this->dateTime()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200503_033958_create_table_tipo_negocio cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_033958_create_table_tipo_negocio cannot be reverted.\n";

        return false;
    }
    */
}

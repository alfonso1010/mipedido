<?php

use yii\db\Migration;

/**
 * Class m200503_034200_create_table_licencias
 */
class m200503_034200_create_table_licencias extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('licencias', [
            'id' => $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'tipo_licencia' => $this->integer(),
            'duracion_dias' => $this->integer(),
            'dias_aviso_pago' => $this->integer(),
            'precio' => $this->double(),
            'porcentaje_descuento' => $this->integer(),
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
        echo "m200503_034200_create_table_licencias cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_034200_create_table_licencias cannot be reverted.\n";

        return false;
    }
    */
}

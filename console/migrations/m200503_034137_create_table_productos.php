<?php

use yii\db\Migration;

/**
 * Class m200503_034137_create_table_productos_pedido
 */
class m200503_034137_create_table_productos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('productos', [
            'id' => $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'nombre' => $this->string(),
            'unidad_medida' => $this->integer(),
            'id_cliente' => $this->integer(),
            'id_negocio' => $this->integer(),
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
        echo "m200503_034137_create_table_productos_pedido cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_034137_create_table_productos_pedido cannot be reverted.\n";

        return false;
    }
    */
}

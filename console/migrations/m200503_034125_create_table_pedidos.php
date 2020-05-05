<?php

use yii\db\Migration;

/**
 * Class m200503_034125_create_table_pedidos
 */
class m200503_034125_create_table_pedidos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('pedidos', [
            'id' => $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'id_cliente_negocio' => $this->integer(11)->unsigned()->notNull(),
            'no_pedido' => $this->integer(),
            'fecha_retiro' => $this->date(),
            'hora_retiro' => $this->time(),
            'estatus' => $this->tinyInteger(1)->defaultValue(0),
            'activo' => $this->tinyInteger(1)->defaultValue(0),
            'fecha_alta' => $this->dateTime()->notNull(),
            'fecha_actualizacion' => $this->dateTime()->notNull()
        ]);

        $this->createIndex(
            'idx-pedidos-cliente_negocio',
            'pedidos',
            'id_cliente_negocio'
        );

        $this->addForeignKey(
            'fk-pedidos-id_cliente_negocio',
            'pedidos',
            'id_cliente_negocio',
            'clientes_negocio', //tbl_foranea
            'id', // pk tbl_foranea
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200503_034125_create_table_pedidos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_034125_create_table_pedidos cannot be reverted.\n";

        return false;
    }
    */
}

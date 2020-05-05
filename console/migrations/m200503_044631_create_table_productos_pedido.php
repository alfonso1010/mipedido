<?php

use yii\db\Migration;

/**
 * Class m200503_044631_create_table_productos_pedido
 */
class m200503_044631_create_table_productos_pedido extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('productos_pedidos', [
            'id' => $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'id_producto' => $this->integer(11)->unsigned()->notNull(),
            'id_pedido' => $this->integer(11)->unsigned()->notNull(),
            'cantidad' => $this->integer(),
            'comentarios' => $this->text(),
            'activo' => $this->tinyInteger(1)->defaultValue(0),
            'fecha_alta' => $this->dateTime()->notNull(),
            'fecha_actualizacion' => $this->dateTime()->notNull()
        ]);

        $this->createIndex(
            'idx-productos_pedidos_producto',
            'productos_pedidos',
            'id_producto'
        );

        $this->createIndex(
            'idx-productos_pedidos_pedido',
            'productos_pedidos',
            'id_pedido'
        );

        $this->addForeignKey(
            'fk-productos_pedidos-id_producto',
            'productos_pedidos',
            'id_producto',
            'productos', //tbl_foranea
            'id', // pk tbl_foranea
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-productos_pedidos-id_pedido',
            'productos_pedidos',
            'id_pedido',
            'pedidos', //tbl_foranea
            'id', // pk tbl_foranea
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200503_044631_create_table_productos_pedido cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_044631_create_table_productos_pedido cannot be reverted.\n";

        return false;
    }
    */
}

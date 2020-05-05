<?php

use yii\db\Migration;

/**
 * Class m200503_034110_create_table_clientes_negocio
 */
class m200503_034110_create_table_clientes_negocio extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('clientes_negocio', [
            'id' => $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'id_cliente' => $this->integer(11)->unsigned()->notNull(),
            'id_negocio' => $this->integer(11)->unsigned()->notNull(),
            'calificacion' => $this->integer(),
            'activo' => $this->tinyInteger(1)->defaultValue(0),
            'fecha_alta' => $this->dateTime()->notNull(),
            'fecha_actualizacion' => $this->dateTime()->notNull()
        ]);


        $this->createIndex(
            'idx-cliente_negocio-cliente',
            'clientes_negocio',
            'id_cliente'
        );

        $this->createIndex(
            'idx-cliente_negocio-negocio',
            'clientes_negocio',
            'id_negocio'
        );

        $this->addForeignKey(
            'fk-cliente_negocio-id_cliente',
            'clientes_negocio',
            'id_cliente',
            'clientes', //tbl_foranea
            'id', // pk tbl_foranea
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-cliente_negocio-id_negocio',
            'clientes_negocio',
            'id_negocio',
            'negocios', //tbl_foranea
            'id', // pk tbl_foranea
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200503_034110_create_table_clientes_negocio cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_034110_create_table_clientes_negocio cannot be reverted.\n";

        return false;
    }
    */
}

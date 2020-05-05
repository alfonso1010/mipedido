<?php

use yii\db\Migration;

/**
 * Class m200503_041848_create_table_comentarios_clientes
 */
class m200503_041848_create_table_comentarios_clientes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comentarios_clientes', [
            'id' => $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'id_cliente' => $this->integer(11)->unsigned()->notNull(),
            'id_negocio' => $this->integer(11)->unsigned()->notNull(),
            'tipo_comentario' => $this->integer(),
            'comentario' => $this->text(),
            'activo' => $this->tinyInteger(1)->defaultValue(0),
            'fecha_alta' => $this->dateTime()->notNull(),
            'fecha_actualizacion' => $this->dateTime()->notNull()
        ]);

        $this->createIndex(
            'idx-comnetarios_clientes-cliente',
            'comentarios_clientes',
            'id_cliente'
        );

        $this->createIndex(
            'idx-comnetarios_clientes-negocio',
            'comentarios_clientes',
            'id_negocio'
        );

        $this->addForeignKey(
            'fk-comnetarios_clientes-id_cliente',
            'comentarios_clientes',
            'id_cliente',
            'clientes', //tbl_foranea
            'id', // pk tbl_foranea
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-comnetarios_clientes-id_negocio',
            'comentarios_clientes',
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
        echo "m200503_041848_create_table_comentarios_clientes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_041848_create_table_comentarios_clientes cannot be reverted.\n";

        return false;
    }
    */
}

<?php

use yii\db\Migration;

/**
 * Class m200503_034210_create_table_licencia_negocios
 */
class m200503_034210_create_table_licencia_negocios extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('licencia_negocios', [
            'id' => $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'id_licencia' => $this->integer(11)->unsigned()->notNull(),
            'id_negocio' => $this->integer(11)->unsigned()->notNull(),
            'fecha_inicio_licencia' => $this->dateTime()->notNull(),
            'fecha_fin_licencia' => $this->dateTime()->notNull(),
            'vencida' => $this->tinyInteger(1)->defaultValue(0),
            'activo' => $this->tinyInteger(1)->defaultValue(0),
            'fecha_alta' => $this->dateTime()->notNull(),
            'fecha_actualizacion' => $this->dateTime()->notNull()
        ]);

        $this->createIndex(
            'idx-licencia_negocios-licencia',
            'licencia_negocios',
            'id_licencia'
        );

        $this->createIndex(
            'idx-licencia_negocios-negocios',
            'licencia_negocios',
            'id_negocio'
        );

        $this->addForeignKey(
            'fk-licencia_negocios-id_licencia',
            'licencia_negocios',
            'id_licencia',
            'licencias', //tbl_foranea
            'id', // pk tbl_foranea
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-licencia_negocios-id_negocio',
            'licencia_negocios',
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
        echo "m200503_034210_create_table_licencia_negocios cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_034210_create_table_licencia_negocios cannot be reverted.\n";

        return false;
    }
    */
}

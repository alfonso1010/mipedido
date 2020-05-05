<?php

use yii\db\Migration;

/**
 * Class m200503_035215_create_table_licencias_codigos_promocionales
 */
class m200503_035215_create_table_licencias_codigos_promocionales extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->createTable('licencia_codigos', [
            'id' => $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'id_licencia' => $this->integer(11)->unsigned()->notNull(),
            'codigo' => $this->string(25),
            'descuento_aplicar' => $this->integer(),
            'vigencia' => $this->dateTime()->notNull(),
            'activo' => $this->tinyInteger(1)->defaultValue(0),
            'fecha_alta' => $this->dateTime()->notNull(),
            'fecha_actualizacion' => $this->dateTime()->notNull()
        ]);

        $this->createIndex(
            'idx-licencia_codigos-licencia',
            'licencia_codigos',
            'id_licencia'
        );

        $this->addForeignKey(
            'fk-licencia_codigos-id_licencia',
            'licencia_codigos',
            'id_licencia',
            'licencias', //tbl_foranea
            'id', // pk tbl_foranea
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200503_035215_create_table_licencias_codigos_promocionales cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_035215_create_table_licencias_codigos_promocionales cannot be reverted.\n";

        return false;
    }
    */
}

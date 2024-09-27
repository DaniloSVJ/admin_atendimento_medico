<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Atendimentos extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table( 'atendimento');
        $table->addColumn('medico_id','integer', ['null' => false]);
        $table->addColumn('paciente_id','integer', ['null' => false]);
        $table->addColumn('sala','string', ['null' => false]);

        $table->addColumn('created_at','timestamp', ['null' => false,'default'=>'CURRENT_TIMESTAMP']);
        $table->addColumn('updated_at', 'timestamp', ['null' => true,'default'=>'CURRENT_TIMESTAMP','update'=>'CURRENT_TIMESTAMP']);
        $table->create();

    }
}

<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Pacientes extends AbstractMigration
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
        $table = $this->table( 'pacientes');
        $table->addColumn('nome','string', ['null' => false]);
        $table->addColumn('cpf','string', ['null' => false]);
        $table->addColumn('created_at','timestamp', ['null' => false,'default'=>'CURRENT_TIMESTAMP']);
        $table->addColumn('updated_at', 'timestamp', ['null' => true,'default'=>'CURRENT_TIMESTAMP','update'=>'CURRENT_TIMESTAMP']);
        $table->create();

    }
}

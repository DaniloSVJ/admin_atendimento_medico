<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddComunnInAtendimentos extends AbstractMigration
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
        $table = $this->table('atendimento');
        $table ->addColumn('diagnostico', 'text', ['null' => false])
        ->addColumn('tratamento', 'text', ['null' => false])
        ->addColumn('data_inicio', 'date', ['null' => false])
        ->addColumn('data_fim', 'date', ['null' => true])
        ->addColumn('status', 'string', ['limit' => 50, 'default' => 'ativo', 'null' => false])
        ->addColumn('observacoes', 'text', ['null' => true])
        ->update();
    }
}

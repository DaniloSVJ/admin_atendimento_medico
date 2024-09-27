<?php
declare(strict_types=1);
namespace App\Seeds; // ou o namespace apropriado para seu projeto

use Migrations\AbstractSeed;
use Cake\ORM\TableRegistry;

use Faker\Factory;
/**
 * Pacientes seed.
 */
class PacientesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void // Altere aqui
    {
        // Cria uma instância do Faker
        $faker = Factory::create();

        $pacientes = [];

        // Gera 10 registros fictícios
        for ($i = 0; $i < 10; $i++) {
            $pacientes[] = [
                'nome' => $faker->name,
                'cpf' => $faker->unique()->numerify('###########'), // CPF com 11 dígitos
                'created_at' => $faker->dateTimeThisYear(),
                'updated_at' => $faker->dateTimeThisYear(),
            ];
        }

        // Salva os dados na tabela Pacientes
        $table = TableRegistry::getTableLocator()->get('Pacientes');
        $entities = $table->newEntities($pacientes);
        foreach ($entities as $paciente) {
            $table->save($paciente);
        }
    }
}

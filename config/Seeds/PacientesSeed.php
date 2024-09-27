<?php
declare(strict_types=1);

namespace App\Seeds; // Certifique-se de que o namespace está correto

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
     * @return void
     */
    public function run(): void
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

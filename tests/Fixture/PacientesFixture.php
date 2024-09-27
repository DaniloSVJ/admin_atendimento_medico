<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PacientesFixture
 */
class PacientesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nome' => 'Lorem ipsum dolor sit amet',
                'cpf' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1727212531,
                'updated_at' => 1727212531,
            ],
        ];
        parent::init();
    }
}

<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MedicosFixture
 */
class MedicosFixture extends TestFixture
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
                'crm' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1727212517,
                'updated_at' => 1727212517,
            ],
        ];
        parent::init();
    }
}

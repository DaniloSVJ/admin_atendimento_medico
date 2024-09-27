<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TratamentoFixture
 */
class TratamentoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tratamento';
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
                'tipo' => 'Lorem ipsum dolor sit amet',
                'descricao' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

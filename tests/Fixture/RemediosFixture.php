<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RemediosFixture
 */
class RemediosFixture extends TestFixture
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
                'tipo' => 'Lorem ipsum dolor sit amet',
                'quantidade' => 'Lorem ipsum dolor sit amet',
                'dosagem' => 'Lorem ipsum dolor sit amet',
                'created_at' => 1727402088,
                'updated_at' => 1727402088,
                'fabrica' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'preco' => 1.5,
            ],
        ];
        parent::init();
    }
}

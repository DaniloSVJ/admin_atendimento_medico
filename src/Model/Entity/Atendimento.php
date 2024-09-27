<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Atendimento Entity
 *
 * @property int $id
 * @property int $medico_id
 * @property int $paciente_id
 * @property string $sala
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime|null $updated_at
 * @property string $diagnostico
 * @property string $tratamento
 * @property \Cake\I18n\FrozenDate $data_inicio
 * @property \Cake\I18n\FrozenDate|null $data_fim
 * @property string $status
 * @property string|null $observacoes
 *
 * @property \App\Model\Entity\Medico $medico
 * @property \App\Model\Entity\Paciente $paciente
 */
class Atendimento extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'medico_id' => true,
        'paciente_id' => true,
        'sala' => true,
        'created_at' => true,
        'updated_at' => true,
        'diagnostico' => true,
        'tratamento' => true,
        'data_inicio' => true,
        'data_fim' => true,
        'status' => true,
        'observacoes' => true,
        'medico' => true,
        'paciente' => true,
    ];
}

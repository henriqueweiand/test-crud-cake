<?php
namespace  App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ItemsTable extends Table
{
    public function validationDefault(Validator $validator)
    {
        $validator->add('name', [
            'maxLength' => [
                'rule' => ['maxLength', 50],
                'message' => 'Field must be 50 characters max'
            ],
            'minLength' => [
                'rule' => ['minLength', 3],
                'message' => 'Field must be at least 3 characters'
            ],
            'custom' => [
                'rule' => ['custom', '/^([a-zA-Z\s]+)$/m'],
                'message' => 'Only letters allowed'
            ]
        ]);
        $validator->requirePresence('unit_of_measurement', true)->notEmpty('unit_of_measurement');
        $validator->add('price', [
            'decimal' => [
                // 'rule' => ['decimal', 2],
                'message' => 'decimal value must ,'
            ]
        ]);
        $validator->requirePresence('date_of_manufacture', true)->notEmpty('date_of_manufacture');

        $validator->add('expiration_date', [
            'valid' => [
                'rule' => function ($value) {
                    $date = $value['year'].'-'.$value['month'].'-'.$value['day'];

                    return strtotime($date) > strtotime(date('Y-m-d'));
                },
                'message' => 'date must be greater than current date'
            ]
        ]);

        if(!empty($_POST['perishable_product'])) {
            $validator->add('date_of_manufacture', [
                'valid' => [
                    'rule' => function ($value) {
                        $date = $value['year'].'-'.$value['month'].'-'.$value['day'];
                        $expirationDate = $_POST['expiration_date']['year'].'-'.$_POST['expiration_date']['month'].'-'.$_POST['expiration_date']['day'];

                        return strtotime($date) < strtotime($expirationDate);
                    },
                    'message' => 'cannot exceed the expiration date'
                ]
            ]);
        }
        return $validator;
    }
}
?>

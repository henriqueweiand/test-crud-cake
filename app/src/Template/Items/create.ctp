<?php
    echo $this->Form->create($item, ['action' => 'save']);
    echo $this->Form->input('id');
    echo $this->Form->input('name');
    echo $this->Form->input('unit_of_measurement',
        array(
            'options' => [
                'unit' => 'unit',
                'liter' => 'liter',
                'kilogram' => 'kilogram'
            ],
            'default' => $item->unit_of_measurement
        )
    );
    echo $this->Form->input('amount');
    echo $this->Form->input('price', array( 'type' => 'number', 'step' => '0.01' ));
    echo $this->Form->input('perishable_product', array('type'=>'checkbox'));
    echo $this->Form->input('expiration_date');
    echo $this->Form->input('date_of_manufacture');
    echo $this->Form->button('Save');
    echo $this->Html->link("Cancel", array('controller' => 'Items','action'=> 'index'), array('class' => 'button'));
    echo $this->Form->end();
?>

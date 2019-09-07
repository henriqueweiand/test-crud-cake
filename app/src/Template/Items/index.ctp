<table class="table"">
    <thead>
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Unit of measurem') ?></th>
            <th><?= __('Amount') ?></th>
            <th><?= __('Price') ?></th>
            <th><?= __('Perishable product') ?></th>
            <th><?= __('Expiration date') ?></th>
            <th><?= __('Date of manufact') ?></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($items as $item) {
        ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['unit_of_measurement'] ?></td>
                <td><?= $item['amount'] ?></td>
                <td><?= $this->Price->format($item['price']) ?></td>
                <td><?= $item['perishable_product'] ? __('Yes')  : __('No') ?></td>
                <td><?= $item['expiration_date'] ?></td>
                <td><?= $item['date_of_manufacture'] ?></td>
                <td>
                    <?php
                        echo $this->Html->Link(__('Edit '), ['controller' => 'items', 'action'=>'show', $item['id']]);
                        echo '&nbsp;';
                        echo $this->Form->postLink(
                            __('Delete'),
                            [
                                'controller' => 'items',
                                'action' => 'destroy',
                                $item['id']
                            ],
                            [
                                'confirm' => __('Do you really want to remove ').$item['name'].'?'
                            ]);
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
    echo $this->Html->Link(__('New item'), ['controller' => 'items', 'action'=>'create']);
?>
<div class="paginator">
    <ul class="pagination">
        <?php
        echo $this->Paginator->prev(__('Back'));
        echo $this->Paginator->numbers();
        echo $this->Paginator->next(__('Next'));
        ?>
    <ul>
<div>

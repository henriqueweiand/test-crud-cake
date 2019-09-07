<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ItemsController extends AppController
{
    public $paginate = [
        'limit' => 10
    ];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
    }

    public function index()
    {
        $itemsTable = TableRegistry::get('Items');
        $items = $itemsTable -> find('all');

        $this->set('items', $this->paginate($items));
    }

    public function create()
    {
        $itemsTable = TableRegistry::get('Items');
        $item = $itemsTable -> newEntity();

        $this->set('item', $item);
    }

    public function show($id)
    {
        $itemsTable = TableRegistry::get('Items');
        $item = $itemsTable -> get($id);

        $this->set('item', $item);

        $this->render('create');
    }

    public function save()
    {
        $itemsTable = TableRegistry::get('Items');
        $item = $itemsTable -> newEntity($this->request->data());

        if (!$item->errors() && $itemsTable->save($item)) {
            $msg = __('Save success');
            $element = 'success';

            $this->Flash->set($msg, ['element' => $element]);
            $this->redirect('Items/index');
        } else {
            $msg = __('Error saving');
            $element = 'error';

            $this->set('item', $item);
            $this->render('create');
        }

    }

    public function destroy($id)
    {
        $itemsTable = TableRegistry::get('Items');
        $item = $itemsTable -> get($id);
        $itemsTable->delete($item);

        if($this->set('item', $item)) {
            $msg = __('Delete success');
            $element = 'success';
        } else {
            $msg = __('Error delete');
            $element = 'error';
        }

        $this->Flash->set($msg, ['element' => $element]);
        $this->redirect('Items/index');
    }

}

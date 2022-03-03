<?php

namespace App\BaseRepo\Order;

use App\Models\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderRepository implements OrderRepositoryInterface
{

    protected $model;

    public function __construct(Order $order)
    {
        $this->model = $order;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        if (null == $order = $this->model->find($id)) {
            throw new ModelNotFoundException("Order not found");
        }

        return $order;
    }


    public function findByCreted($date)
    {
        return $this->model->where('created_at', '>=', $date . ' 00:00:00')->get();
    }
}

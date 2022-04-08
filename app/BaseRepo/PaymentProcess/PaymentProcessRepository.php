<?php

namespace App\BaseRepo\PaymentProcess;

use App\Models\PaymentProcess;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PaymentProcessRepository implements PaymentProcessRepositoryInsterface
{
    protected $model;

    public function __construct(PaymentProcess $paymentProcess)
    {
        $this->model = $paymentProcess;
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
        if (null == $paymentProcess = $this->model->find($id)) {
            throw new ModelNotFoundException("Product not found");
        }

        return $paymentProcess;
    }

    public function findByAttributes(array $attributes)
    {
        try {
            $query = $this->buildQueryByAttributes($attributes);
            return $query->first();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    private function buildQueryByAttributes(array $attributes)
    {
        $query = $this->model->query();
        if (method_exists($this->model, 'translations')) {
            $query = $query->with('translations');
        }
        foreach ($attributes as $field => $value) {
            $query = $query->where($field, $value);
        }
        return $query;
    }
}

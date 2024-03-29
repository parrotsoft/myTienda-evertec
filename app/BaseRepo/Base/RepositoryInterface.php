<?php

/**
 * @description Basic operations interface for models
 */

// CRUD USers.


namespace App\BaseRepo\Base;

interface RepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find(int $id);
}

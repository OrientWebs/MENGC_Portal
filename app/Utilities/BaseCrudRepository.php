<?php

namespace App\Utilities;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

abstract class BaseCrudRepository
{
    /*
     * Author : Ye Htun
     * Date   : 2025-8-14
     * Base repository class for CRUD operations.
     * This class should be extended by specific repositories.
     */
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Author : Ye Htun
     * Date   : 2025-8-22
     * Get all records.
     * This method can be overridden in child classes to implement specific retrieval logic.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Author : Ye Htun
     * Date   : 2025-8-22
     * Get a record by ID.
     * This method can be overridden in child classes to implement specific retrieval logic.
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Author : Ye Htun
     * Date   : 2025-8-22
     * Search for records based on a query.
     * This method can be overridden in child classes to implement specific search logic.
     */
    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            $record = $this->model->create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating record: ' . $e->getMessage());
            throw $e; // Re-throw the exception after rolling back
        }
        DB::commit();
        return $record;
    }

    /**
     * Author : Ye Htun
     * Date   : 2025-8-22
     * Update a record by ID.
     * This method can be overridden in child classes to implement specific update logic.
     */
    public function update($id, array $data)
    {
        $record = $this->getById($id);
        $record->update($data);

        DB::beginTransaction();
        try {
            $record = $this->getById($id);
            $record->update($data);
            DB::commit();
            return $record;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating record: ' . $e->getMessage());
            throw $e; // Re-throw the exception after rolling back
        }
    }

    /**
     * Author : Ye Htun
     * Date   : 2025-8-22
     * Delete a record by ID.
     * This method can be overridden in child classes to implement specific delete logic.
     */
    public function delete($id)
    {
        // return $this->getById($id)->delete();
        DB::beginTransaction();
        try {
            $this->getById($id)->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting record: ' . $e->getMessage());
            throw $e; // Re-throw the exception after rolling back
        }
    }
}

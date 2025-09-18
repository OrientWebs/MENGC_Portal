<?php

namespace App\Repositories;

use App\Models\State;
use App\Models\Township;
use App\Traits\AuthorizeRequests;
use App\Utilities\BaseCrudRepository;

class TownshipRepository extends BaseCrudRepository
{
    use AuthorizeRequests;
    public State $state;
    public  function __construct(Township $model, State $state)
    {

        $this->authorizeAccess('township-access');
        parent::__construct($model);
        $this->state = $state;
    }
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
    public function states()
    {
        return $this->state;
    }
    public function search($prePage = null, $search = null, $states = null)
    {
        $query = $this->model->query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhereHas('state', function ($q2) use ($search) {
                        $q2->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if ($states) {
            $query->where('state_id', $states);
        }

        return $query->paginate($prePage);
    }
}

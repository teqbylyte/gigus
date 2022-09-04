<?php

namespace App\Helpers;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class ModelHelper
{
    public function __construct(public string $name, public Model $model)
    {
        $this->name = ucwords(strtolower($this->name));
    }

    /**
     * Get the Model of the specified name instance
     *
     * If the Model does not exist, create another Model and return it.
     *
     * @return Model
     */
    public function getModel(): Model
    {
        $model = $this->model->newQuery()->where('name', $this->name)->first();

        return $model ?? $this->createModel();
    }

    /**
     * Create the Model of the name instance
     * @return Model
     */
    private function createModel(): Model
    {
        $company = [
            'name' => $this->name,
            'slug' => General::generateSlug($this->name, $this->model, 'name'),
        ];

        return $this->model->newQuery()->create($company);
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GigRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return $this->routeIs('gigs.store') ?
            $this->createGig() : $this->updateGig();
    }


    /**
     * Handle validation when gig is to be created.
     *
     * @return array<string, mixed> validation params
     */
    public function createGig(): array
    {
        return [
            'role'          => 'required|string',
            'company'       => 'required|string',
            'country'       => 'required|string',
            'state'         => 'required|string',
            'address'       => 'nullable|string',
            'tags'          => 'required|string',
            'min_salary'    => 'required|numeric',
            'max_salary'    => 'required|numeric'
        ];
    }


    /**
     * Handle validation when a gig is to be updated.
     * @return array validation params
     */
    public function updateGig(): array
    {
        return [
            'status' => 'required|in:pending,active,completed,rejected'
        ];
    }
}

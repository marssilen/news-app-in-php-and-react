<?php

namespace App\Containers\AppSection\News\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class SearchNewsRequest extends ParentRequest
{
    /**
     * Define which Roles and/or Permissions has access to this request.
     */
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     */
    protected array $decode = [
        // 'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     */
    protected array $urlParameters = [
        // 'id',
    ];

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
             'providers' => 'required|array|min:1',
             'providers.*' => 'in:bbc,theguardian,nytimes',
             'query' => 'required',
             'page' => 'required|integer|min:1',
             'categories' => 'array|min:1',
             'authors' => 'array|min:1',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}

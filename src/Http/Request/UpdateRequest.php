<?php

namespace Rowjat\Installer\Http\Request;


class UpdateRequest extends CoreRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'hostname' => 'required',
            'username' => 'required',
            'database' => 'required',
        ];
    }

}

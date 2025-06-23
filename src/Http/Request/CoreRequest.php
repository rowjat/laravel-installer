<?php

namespace Rowjat\Installer\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Rowjat\Installer\Utils\Utils;
use Illuminate\Contracts\Validation\Validator;

class CoreRequest extends FormRequest
{

    protected function formatErrors(Validator $validator): array
    {
        return Utils::formErrors($validator);
    }

}

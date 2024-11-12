<?php

namespace App\Http\Traits;

trait ValidationRules
{
    public function getNameValidationRules()
    {
        return
            [
                ['name' => 'required|min:3|max:255',],
                [
                    'name.min' => 'A megnevezés legalább 3 karakter hosszú kell legyen.',
                    'name.max' => 'A megnevezés maximum 255 karakter hosszú kell legyen.',
                    'name.required' => 'A megnevezést kötelezően meg kell adni!'
                ]
            ];
    }
}

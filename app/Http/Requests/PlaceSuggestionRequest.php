<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class PlaceSuggestionRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'place_name' => 'required',
            'place_address' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        $this->sendErrorToLog('Validation error',[parent::messages()]);
        return parent::messages(); // TODO: Change the autogenerated stub
    }

    private function sendInfoToLog($message,$context){
        Log::channel('requestlog')->info($message,$context);
    }

    private function sendErrorToLog($message,$context){
        Log::channel('requestlog')->error($message,$context);

    }
}
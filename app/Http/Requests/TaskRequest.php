<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', Rule::unique('tasks')
                ->where('user_id', auth()->id())
                ->where('created_date', now()->toDateString())],
            'description' => ['nullable', 'string'],
            'completed' => ['boolean']
        ];
    }

    public function messages(): array{
        return [
            'title.required' => 'Le nom du tâche est obligatoire',
            'title.unique' => 'Ce tâche existe déjà pour vos tâches journaliers',
        ];
    }
}

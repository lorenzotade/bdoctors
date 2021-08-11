<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'education' => 'nullable|string|min:3|max:65535',
            'experience' => 'nullable|string|min:3|max:65535',
            'specs' => 'array|exists:specs,id|required',
            'telephone' => 'nullable',
            'cellphone' => 'nullable|numeric|digits:10',
            'image' => 'nullable|image|max:32000'
        ];
    }


    public function messages()
    {
        return [
          'education.min' => 'Il testo deve essere lungo almeno :min caratteri.',
          'education.max' => 'Il testo può essere lungo al massimo :max caratteri.',
          'experience.min' => 'Il testo deve essere lungo almeno :min caratteri.',
          'experience.max' => 'Il testo può essere lungo al massimo :max caratteri.',
          'specs.required' => 'Selezionare almeno una specializzazione.',
          'specs.exists' => 'La specializzazione scelta non è presente',
          'telephone.numeric' => 'Caratteri non validi: il campo può contenere solo cifre.',
          'telephone.digits_between' => 'Il numero di telefono fisso deve avere tra le 7 e le 11 cifre.',
          'cellphone.numeric' => 'Caratteri non validi: il campo può contenere solo cifre.',
          'cellphone.digits' => 'Numero invalido: il numero deve essere di :digits cifre.',
          'image.image' => 'Il file caricato non è un\'immagine.',
          'image.max' => 'Immagine troppo pesante! Sono consentiti al massimo :max kb.',
        ];
    }
}

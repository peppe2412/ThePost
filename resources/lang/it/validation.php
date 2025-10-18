<?php

return [

    'required' => 'Campo :attribute obbligatorio',
    

    'custom' => [
        'email' => [
            'required' => 'L’indirizzo email è obbligatorio.',
            'email' => 'Inserisci un indirizzo email valido.',
        ],
        'password' => [
            'required' => 'La password è obbligatoria.',
        ],
    ]
];

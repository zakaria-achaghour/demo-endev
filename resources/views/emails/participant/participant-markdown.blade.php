@component('mail::message')
# Bounjour  {{ $user->name }} 


Votre inscription à la formation  **{{ $designation }}** a bien été confirmée.
@component('mail::panel')
    **Email** :{{ $user->email }}
@endcomponent

@component('mail::panel')
    **PASSWORD** : {{ $password }}
@endcomponent

@component('mail::button',['url'=>  route('login') ])
    Conexien
@endcomponent

Merci  pour votre intérêt!
Centre de formation 
**{{ config('app.name') }}**,
@endcomponent

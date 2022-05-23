@component('mail::message')
# Kolejne zgłoszenie ze strony
## Temat: {{ $title }}

@component('mail::panel')
    {{ $message }}
@endcomponent

Pozdrawiamy,<br>
MKWM
@endcomponent

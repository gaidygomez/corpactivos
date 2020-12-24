@component('mail::message')
# Ha sido detectado un inicio de sesión en nuestro aplicativo. 
# Por eso le envíamos este código de verificación.

Si no ha sido usted, por favor pongáse en contacto con nosotros

{{ $token }}

Gracias,<br>
Corpactivos
@endcomponent

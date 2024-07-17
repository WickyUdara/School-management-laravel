@component('mail::message')
Hello {{ $user->name }},

<p>We understand it happens</p>

@component('mail::button',['url'=>('http://127.0.0.1:8000/reset/'.$user->remember_token)])
Reset Your password
@endcomponent

<p>In case you have any issues recovering your password, please contact us. </p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent

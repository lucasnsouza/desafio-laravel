@component('mail::message')
<h1>Olá {{$user->name}}!</h1>

<p>Você está recebendo este e-mail porque recebemos uma solicitação de redefinição de senha para sua conta.</p>

@component('mail::button', [
    'url' => 'https://laravel.com/docs/8.x/mail',
    ])
Modificar senha
@endcomponent

<p>Se você não solicitou a redefinição de senha, nenhuma ação adicional será necessária.</p>

<p>Saudações,
Equipe Administrativa</p>
@endcomponent
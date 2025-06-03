@component('mail::message')
# Halo {{ $user->name ?? 'User' }}!

Klik tombol di bawah ini untuk memverifikasi alamat email Anda dan mulai menggunakan aplikasi kami.

@component('mail::button', ['url' => $url])
Verifikasi Email
@endcomponent

Jika Anda tidak membuat akun, Anda bisa mengabaikan email ini.

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent

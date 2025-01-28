<x-mail::message>
# Hello, {{ $user_name }}

We received a request to reset your password for your Yummy account. Don’t worry—we’re here to help!

To reset your password, simply click the button below:

<x-mail::button :url="route('reset_password', $reset_code)">
Reset Password
</x-mail::button>

This link will expire in 24 hours for your security. If you didn’t request a password reset, please ignore this email, and your password will remain unchanged.

If you need further assistance, feel free to contact us at support@yummy.com.

Thank you for being a part of Yummy, where every meal is a delight! 🍽️

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

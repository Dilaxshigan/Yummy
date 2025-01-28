<x-mail::message>
# Hello, {{ $user->first_name }}

Thank you for signing up to join Yummy, where we bring delicious experiences to your plate! 🎉

To complete your registration and activate your membership, please verify your email address by clicking the link below:

<x-mail::button :url="route('verify_mail', ['verification_code' => $user->email_verification_code])">
Verify Email
</x-mail::button>

Once verified, you’ll enjoy exclusive benefits such as:

    🍽️ Special discounts and promotions
    🍽️ Priority reservations
    🍽️ Invitations to members-only events

If you did not sign up for a Yummy account, please disregard this email.

Should you have any questions, feel free to reach out to us at yummy@yahoo.com.

We’re excited to have you as part of the Yummy family!

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

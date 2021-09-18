@component('mail::message')

<div>
    <p>
        User with username {{$username}} has signed in to play on court {{$address}}
    </p>
</div>

<div>
    <p>
        ===========================
        <br>
        Please do not reply to this email.
        <br>
        This message was sent to you from Sport court website because your preferences are set to receive email when a new conversation message is received.
    </p>
</div>


@endcomponent
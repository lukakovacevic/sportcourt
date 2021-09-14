@component('mail::username')

<div>
    <p>
        User with {{$username}} has signed in to play on court {{$field_address}}
    </p>
</div>

<p>
    Sincerely,
    <br>
    YVOO team
</p>
<div>
    <p>
        ===========================
        <br>
        Please do not reply to this email.
        <br>
        This message was sent to you from <a href="https://app.yvoo.io">yvoo</a> because your preferences are set to receive email when a new conversation message is received.
    </p>
</div>


@endcomponent
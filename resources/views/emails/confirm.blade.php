@component('mail::layout')

{{-- Header --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        {{ config('app.name') }}
    @endcomponent
@endslot

<table align="left" width="570" cellpadding="0" cellspacing="0" style="color: black;">
    <tr>
        <td align="left" style="font-size: 16px; font-family: Avenir,sans-serif;">
			<p style="color: black;">
				<b style="font-size: 18px;">{{__('notification.auth.confirm_email.mail.greeting', ['user' => $user]) }}</b>
			</p>
			<p style="color: black;">{{__('notification.auth.confirm_email.mail.line.0')}}</p>

			@component('mail::button', ['url' => $url])
				{{__('notification.auth.confirm_email.mail.action'), $url}}
			@endcomponent

			<p style="color: black;">
				{{__('notification.auth.confirm_email.mail.line.1')}}
			</p>

			<p style="color: black;">
				{{__('notification.auth.confirm_email.mail.line.2', ['email' => config('mail.from.address')])}}
			</p>

			<p style="color: black;">
				Thanks for using 2HEX!
				<br>
				Regards,
				2HEX
			</p>
        </td>
    </tr>
</table>

<table align="left" width="570" cellpadding="0" cellspacing="0" style="margin-top: 15px;">
    <tr>
        <td align="left">
			<hr>
			<p style="font-size: 10px; color: #7b7e7d; font-family: Verdana,sans-serif;">
				If you’re having trouble clicking the "{{__('notification.auth.confirm_email.mail.action')}}" 
				button, copy and paste the URL below into your web browser: 
				<a href="{{$url}}">{{$url}}</a>
			</p>
        </td>
    </tr>
</table>

{{-- Subcopy --}}
@isset($subcopy)
    @slot('subcopy')
        @component('mail::subcopy')
            {{ $subcopy }}
        @endcomponent
    @endslot
@endisset

{{-- Footer --}}
@slot('footer')
    @component('mail::footer')
        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    @endcomponent
@endslot

@endcomponent

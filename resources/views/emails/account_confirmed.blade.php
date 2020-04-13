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
			<h1 style="color: #E35D6F">WELCOME TO 2HEX</h1>
			<p style="color: black;">Your new business account is ready!</p>


			<br>


			<p style="color: black; margin-top: 20px;">
				Plan your next production order now:<br>
				→ <a href="https://www.2hex.com/skateboard-deck-manufacturer">Custom Skateboard Decks</a><br>
				→ <a href="https://www.2hex.com/skateboard-wheels-manufacturer">Custom Skateboard Wheels</a><br>
				→ <a href="https://www.2hex.com/skateboard-griptape-manufacturer">Custom Grip Tapes</a>
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

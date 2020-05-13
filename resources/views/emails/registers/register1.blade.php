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
			<h1 style="color: #E35D6F">Welcome to your new 2HEX account!</h1>
			<p style="color: black;">I'm excited for you to get started with this incredible resource.</p>

            <br>
            <p style="color: black;">Meet our CEO and head of sales, Niklas:</p>
			<video poster="{{asset('img/2HEX-Video.png')}}" width="100%" controls="controls" style="display: block">
				<source src="https://www.youtube.com/watch?v=cJs7LPAxLeI" type="video/mp4" />
				<a href="https://www.youtube.com/watch?v=cJs7LPAxLeI">
					<img src="{{asset('img/2HEX-Video.png')}}" width="100%" alt="2HEX welcome message" title="2HEX welcome message" />
				</a>
			</video>
			<br>

            <h4>Place your custom production order now:  </h4>

            <p style="color: #576ad5;"><b>
                    → <a href="https://www.2hex.com/skateboard-deck-manufacturer">Custom Decks </a><br>

                    → <a href="https://www.2hex.com/skateboard-griptape-manufacturer">Custom Grip Tapes</a><br>

                    → <a href="https://www.2hex.com/skateboard-wheels-manufacturer">Custom Wheels</a><br>
                </b></p>

            <br>
            <p style="color: black;">2HEX does not have the product you are looking for? </p>
            <p style="color: black;">Send us a custom productions inquiry <a href="https://www.2hex.com/mail"><font style="color: #576ad5;"><b>here</b></font></a> </p>



            <p style="color: black; margin-top: 20px;">
			Enjoy the speed and transparency of 2HEX.com! 
			</p>

			<p style="color: black; margin-top: 20px;">
                To your success! <br>
                The 2HEX Team
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

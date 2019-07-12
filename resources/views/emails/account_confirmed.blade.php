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
			<p style="color: black;">Congrats for registering on 2HEX!</p>
			<p style="color: black;">Meet Niklas, your personal sales contact:</p>

			<video poster="{{asset('img/2HEX-Video.png')}}" width="100%" height="50%" controls="controls">
				<source src="https://www.youtube.com/watch?v=cJs7LPAxLeI" type="video/mp4" />
				<a href="https://www.youtube.com/watch?v=cJs7LPAxLeI">
					<img src="{{asset('img/2HEX-Video.png')}}" width="100%" height="50%" alt="2HEX welcome message" title="2HEX welcome message" />
				</a>
			</video>
			<br>
			<ol style="padding: 0 15px; margin-top: 25px;">
			    <li>Download your 2HEX Products Catalog 2019 
			    	<a href="http://skateboard-factory.com/skateboardcatalog2019-1.pdf">here</a>!
			    </li>
			    <li>Arrange a Skype call with Niklas 
			    	<a href="https://calendly.com/niklasv/15min">here</a>.
			    </li>
			    <li>Add Niklas on Skype: <a href="skype:niklasvesely?call">niklasvesely</a></li>
			 </ol>

			<p style="color: black; margin-top: 20px;">
				Let’s not loose anymore time: Place your brand’s custom production order now!<br>
				→ <a href="https://www.2hex.com/skateboard-deck-manufacturer">Custom Skateboard Decks</a><br>
				→ <a href="https://www.2hex.com/skateboard-griptape-manufacturer">Custom Grip Tapes</a>
			</p>

			<p style="color: black; margin-top: 20px;">
			And remember: You can add multiple batches of the same product in different sizes.
			The more batches you add, the cheaper each product gets!
			</p>

			<p style="color: black; margin-top: 20px;">
				Thanks for using 2HEX! <br>
				Regards, your 2HEX team
			</p>
        </td>
    </tr>
</table>

<table align="left" width="570" cellpadding="0" cellspacing="0" style="margin-top: 15px;">
    <tr>
        <td align="left">
			<hr>
			<p style="font-size: 10px; color: #7b7e7d; font-family: Verdana,sans-serif;">
				If the links do not work, please copy and paste the URL into your browser: <br>
				Catalog: <a href="http://skateboard-factory.com/skateboardcatalog2019-1.pdf">http://skateboard-factory.com/skateboardcatalog2019-1.pdf</a> 
				<br>
				Make an appointment: <a href="https://calendly.com/niklasv/15min">https://calendly.com/niklasv/15min</a>
				<br>
				Link to video: <a href="https://www.youtube.com/watch?v=cJs7LPAxLeI">https://www.youtube.com/watch?v=cJs7LPAxLeI</a>
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

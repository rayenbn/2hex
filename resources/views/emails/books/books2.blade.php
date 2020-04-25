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
			
            <p style="color: black;">Hi {{$data['name']}}</p>
            <p style="color: black;">I hope you enjoy reading The Skateboard Company Founders Book I wrote.</p>
            <p style="color: black;">Did you register on 2HEX.com yet? If not, I suggest you do so today!</p>
            <p style="color: black;">The 2HEX.com configurator lets you create your company’s custom fitted skateboard components. Take for example step 8 of the 11-step-deck configurator:</p>
            <img src="{{asset('skateboard-deck-production/deckstep8.png')}}" width="100%" alt="2HEX welcome message" title="2HEX welcome message" />
            <p style="color: black;">The 2HEX.com configurator lets you create your company’s custom fitted skateboard components. Take for example step 8 of the 11-step-deck configurator:</p>
            <img src="{{asset('skateboard-deck-production/summarypage.png')}}" width="100%" alt="2HEX welcome message" title="2HEX welcome message" />
            <p style="color: black;">Skateboard manufacturing has never been this accessible and transparent to skateboarders.</p>
            <p style="color: black;">Be sure to be one of the first skateboarders in your city to build a skateboard company by starting today!</p>
            <p style="color: black;">Your first step: Register!<br>
            2HEX.com/register, to learn about production options and prices!
            </p>
            <p style="color: black;">I look forward to seeing your brand in skateshops soon.</p>
            <p style="color: black;">
                Cheers! <br>
				Niklas
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

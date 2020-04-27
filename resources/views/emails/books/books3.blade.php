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
            <p style="color: black;">I suppose by now you have finished the complete book on how to build your own skateboard company.</p>
            <p style="color: black;"><b>Now comes a big question:</b></p>
            <p style="color: #f4526c;">How much money would your skateboard company make?</p>
            <br>
            <p style="color: black;">1.	Register on 2HEX.com/register to see your production costs.</p>
            <p style="color: black;">2.	Fill these numbers into the 2HEX Profit Calculator <a href="{{asset('skateboard-deck-production/2HEX Profit Calculator.xlsx')}}" style="color: black">(download here).</a></p>
            <p style="color: black;">3.	See how much profit your company would make in three months.</p>
            <img src="http://skateboard-factory.com/2hex_form.png" width="400px" />
            <p style="color: black;">Making money is important.</p>
            <p style="color: black;">I don’t mean that it is important to get rich (even though we will try to get you there), but for your business to survive and thrive, and for you to have a real impact on skateboarding, your business must make enough money to enable you and your team to work fulltime. </p>
            <p style="color: black;">Use the calculator to see how many products you need to sell, and what budget is required to get started!</p>
            <p style="color: black;">
                To your success! <br>
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

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
            <p style="color: black;">Congrats on signing up to receive The Skateboard Company Founders Book!</p>
            <p style="color: black;">This resource + all price and product information for registered users on 2HEX.com will bring you a big step closer to building a big and profitable skateboard company.</p>
            <img src="{{asset('skateboard-deck-production/2hex-book.jpg')}}" width="100%" alt="2HEX welcome message" title="2HEX welcome message" />
            <p style="color: black;">Download your copy here:</p>
            <a href="https://www.2hex.com/skateboard-deck-production/The_Skateboard_Company_Founders_Book_2020-05-06.pdf" style="color: white; width: 80%; display: inline-block; margin: auto; background: #f4526c; padding: 10px 50px; border-radius: 10px" >SKATEBOARD COMPANY FOUNDERS BOOK</a>
            <p style="color: black;">Remember to register on 2HEX.com/register</p>
            <p style="color: black;">This way you have access to all information you need to build a successful skateboard company, including product variations and production costs.</p>
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

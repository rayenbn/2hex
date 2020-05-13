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
            <p style="color: black;">As promised by email yesterday, here comes the email you don’t want to miss! </p>

            <p style="color: black;">To get you started I am giving you a 50 USD discount on your first production order.</p>
            <p style="color: black;"><b>Discount code: VF289BJK</b></p>
            <img src="{{asset('img/discount.png')}}" width="100%"/>
            <br>

            <p style="color: black;">Login, and add this code on the bottom of your <a href="https://2hex.com/summary">summary page.</a></p>
            <p style="color: black;">This discount can only be used within the next two weeks, so make sure to place your production order now!</p>

            <p style="color: black; margin-top: 20px;">
                Cheers<br>
                Josh
			</p>
            <p><i>Please note that the 50 USD discount can only be used for production orders of 500 USD or more.<i></p>
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

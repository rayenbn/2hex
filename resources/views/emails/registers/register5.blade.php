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
            <p style="color: black;">Hi <i>{{$data['name']}}</i></p>
            <p style="color: black;">I just wanted to remind you that your 50 USD discount will expire in 7 days.</p>
            <p>We believe that speed is a strong competitive advantage. </p>
            <p>Make sure to send us your order before the deadline </p>
            <p style="color: black;"><b>Discount code: VF289BJK</b></p>
            <img src="{{asset('img/discount.png')}}" width="100%"/>
            <p style="color: black;">Login, and add this code on the bottom of your <a href="https://2hex.com/summary">summary page.</a></p>

            <p style="color: black; margin-top: 20px;">
                Cheers<br>
                Josh
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

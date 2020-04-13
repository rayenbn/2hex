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
            <p style="color: black;">Just a quick last reminder that your 50 USD discount for a custom production at 2HEX will expire in a little more than a day!</p>

            <p style="color: black;"><b>I have an idea:</b><br>
            If you are unsure if you want to run a custom production, place the order anyway!
            </p>
            <ol>
                <li>If you place your order today, you will still get the 50 USD discount.</li>
                <li>After placing your order, you have two weeks to pay a down payment of 60%. </li>
                <li>If we do not receive your down payment, your order will be cancelled automatically.</li>
            </ol>
            <br>
            <p style="color: black;">This means, placing your order now will give you another 2 weeks to re-consider your production without losing the 50 USD.</p>

            <p style="color: black; margin-top: 20px;">
                Cheers<br>
                Josh
			</p>

            <p style="color: black;"><b>Discount code: VF289BJK</b></p>
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

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
            <p style="color: black;">I'm Josh with 2HEX. </p>
            <p style="color: black;">As you're customizing your skateboard components on 2HEX, let me give you a heads up:</p>

            <p style="color: black;"><b>We at 2HEX believe that a perfect production order should</b></p>
            <ol>
                <li>attract new customers</li>
                <li>retain existing customers </li>
                <li>sell quickly </li>
                <li>grow your business</li>
                <li>push skateboarding</li>
            </ol>
            <p style="color: black;">These are the 5 points we make sure all our customers achieve</p>
            <p style="color: black;">Having products that fulfill your customers’ needs and push skateboarding, will be a game changer for your company.</p>
            <p style="color: black;">If you have questions about how to move your productions to 2HEX, fill in 2hex.com/mail. Our team’s most suitable member will then guide you forwards.</p>
            <p style="color: black;">I’ll check in on you in a few days to see how things are going!</p>
            <p style="color: black;">
                To your success, <br>
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

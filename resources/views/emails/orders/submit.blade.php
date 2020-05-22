@component('mail::layout')

{{-- Header --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        {{ config('app.name') }}
    @endcomponent
@endslot

{{-- Body --}}
<table align="left" width="570" cellpadding="0" cellspacing="0" style="color: black;">
    <tr>
        <td align="left" style="font-size: 16px; font-family: Avenir,sans-serif;">
            <p style="color: black;">Dear {{Auth::user()->name}}</p>

			<p style="color: black;">Congrats on your order at 2HEX. <br>
			We have already received your product details.<p>

			<p style="color: black;">Attached you can find your invoice.<br>
			You can also find a summary of your order <a href="{{ route('profile') }}#submitted_orders">here</a></p>

			<p style="color: black;">Please pay the invoice within two weeks.<br>
			Your production will be started right after we receive your payment.</p>

			Cheers <br>
			Niklas
        </td>
    </tr>
</table>

<table align="left" width="570" cellpadding="0" cellspacing="0" style="margin-top: 15px;">
    <tr>
        <td align="left" style="font-size: 10px; color: #7b7e7d; font-family: Verdana,sans-serif;">
            <b>Niklas Vesely</b> <br>
			HKUST & Cornell MBA <br>
			<br>
			CN: +86 18823444751<br>
			Europe & China<br>
			2HEX.com
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
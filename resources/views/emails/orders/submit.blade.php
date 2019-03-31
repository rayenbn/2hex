@component('mail::message')

<table align="left" width="570" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left" style="font-size: 16px; color: #000000; font-family: Avenir,sans-serif;">
            <p class="black">Dear {{ $data['name'] }}</p>

			<p  class="black">Congrats on your order at 2HEX. <br>
			We have already received your product details.<p>

			<p  class="black">Attached you can find your invoice.<br>
			You can also find a summary of your order <a href="{{route('summary')}}">here</a></p>

			<p  class="black">Please pay the invoice within two weeks.<br>
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

@endcomponent
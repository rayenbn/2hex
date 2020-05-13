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
            <p style="color: black;">Is everything going well and has Josh been able to help you move forward?</p>

            <p style="color: black;">Josh told me, that your 50 USD discount expired.
                No worries though! At 2HEX we make sure that all of your productions have the quality and price to:</p>
            <ol>
                <li>attract new customers</li>
                <li>retain existing customers</li>
                <li>sell quickly </li>
                <li>grow your business</li>
                <li>push skateboarding</li>
            </ol>
            <br>
            <p style="color: black;">If you have any questions while planning your production order on 2HEX, please fill in this form: <a href="https://www.2hex.com/mail">https://www.2hex.com/mail</a><br>
                We will get back to you quickly!
            </p>
            <p style="color: black;">By the way, the person answering will stay your point of contact at 2HEX and support you during your journey of building up a big skateboard company.</p>

            <p style="color: black; margin-top: 20px;">
                Keep up the good work!<br>
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

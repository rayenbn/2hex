@component('mail::layout')

{{-- Header Book 5 MOCKUP --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        {{ config('app.name') }}
    @endcomponent
@endslot

<table align="left" width="570" cellpadding="0" cellspacing="0" style="color: black;">
    <tr>
        <td align="left" style="font-size: 16px; font-family: Avenir,sans-serif;">
            <font style="color: black;">


                <table align="left" width="570" cellpadding="0" cellspacing="0" style="color: black;">
                    <tr>
                        <td align="left" style="font-size: 16px; font-family: Avenir,sans-serif;">
                            <font style="color: black;">

                                <p style="color: black;">Hi {{$data['name']}}</p>

                                <p>I wanted to give you a quick heads up on the GFRP deck technology!</p>

                                <p><img src="https://www.2hex.com/skateboard-deck-production/fiberglass-skateboard-deck-manufacturer-2hex.jpg" alt="skateboard deck design mockup psd" width="500" height="303" /></p>

                                You can select deck specials like GFRP on step 8 of <a href="https://www.2hex.com/skateboard-deck-configurator"><b>2HEX' deck configurator</b></a>!

                                <p>Let me know if you have any questions while using the configurator!</p>

                                <p style="color: black;">
                                    To your success! <br>
                                    Niklas
                                </p>


                            </font>
                        </td>
                    </tr>
                </table>




            </font>
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

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
            <p>Is everything going well</p>
            <p style="color: black;">Your 50 USD discount has expired. But don’t worry, at 2HEX we make sure that all of your productions have the quality and price to:</p>
            <ol>
                <li>1.	attract new customers</li>
                <li>2.	retain existing customers</li>
                <li>3.	sell quickly </li>
                <li>4.	grow your business</li>
                <li>5.	push skateboarding</li>
            </ol>
            <br>
            <p>If you have any questions while planning your production order on 2HEX.com, please fill in this form: <a href="https://www.2hex.com/mail">https://www.2hex.com/mail</a><br>
                We will get back to you quickly! 
            </p>
            <p>By the way, the person answering you will stay your point of contact at 2HEX and support you during your journey of building up a big skateboard company.</p>

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

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
            <p style="color: black;">Last week you downloaded the Skateboard Company Founders’ Book.</p>
            <p style="color: black;">Do you have any suggestions on how you would improve the book?</p>
            <p style="color: black;">Is there anything you don’t agree with or something important you feel I missed?</p>
            <p style="color: black;"><b>By the way, let me know if you have any production related questions!</b></p>
            <p style="color: black;">If you want to skip the questions I would send you by email and directly get your answer, use this form: <a href="https://www.2hex.com/mail">https://www.2hex.com/mail</a> ☺</p>
            <p style="color: black;">
                Cheer <br>
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

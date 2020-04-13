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
            <p style="color: black;">Your discount code has expired.</p>

            <p style="color: black;">If your not yet ready to run your own production but you still want to stay up to date on all production options,<br>
                follow us on <font style="color: #576ad5;"><b> <a href="https://www.instagram.com/2hexskateboardfactory/">Instagram</a> </b></font>!

            <p style="color: black;">We set up this form for production questions: <a href="https://www.2hex.com/mail">https://www.2hex.com/mail</a><br>
               This form includes everything we need to know in order to give you the right answer.
            </p>
            <p style="color: black;">My colleagues and I are ready to answer any question coming through this form.</p>

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

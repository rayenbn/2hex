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
            <font style="color: black;">

            <p style="color: black;">Hi {{$data['name']}}</p>
            <p>I just saw that you haven't signed up to our configurator yet.</p>
                <p>If you have any questions or if anything is unclear, let me know.</p>
                <p>However generally my team and I tried to answer all questions that might come up within the configurator.</p>
                <p>Give it a shot when you have time. :-)<br></p>

            <p>
                To your skateboard company's success! <br>
				Niklas
			</p>

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

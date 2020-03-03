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
            <p style="color: black;">Hey <i>{{$data['name']}}</i></p>
            <p style="color: black;">A message was added to your production order!</p>
            <br>
            <p style="color: black;">Order number: {{$data['created_number']}}</p>
            <p style="color: black;">Date: {{$data['date']}}</p>
            <p style="color: black;">Message: {{$data['comment']}}</p>
            <br>
            <p>Track your production’s updates on your <a href="https://www.2hex.com/profile#submitted_orders">Current Productions Page.</a></p>
            <br>
            <p>Questions? Feel free to answer to this email.</p>
            <br>
            <p>Your 2HEX Team</p>
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
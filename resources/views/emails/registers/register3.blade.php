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
            <p>do you want to build a big skateboard company? <br>
              And do you want the best products without unclear lengthy negotiations?</p>
            <p style="color: black;">To accomplish this goal, you need access to the highest quality skateboard components now. You need to know what can be manufactured and how much it costs. And the skateboard parts must be so good, that they grow your sales and push skateboarding.</p>
            <p style="color: black;">But there's a problem...</p>
            <p style="color: black;">Most suppliers out there are slow, unreliable, offer low quality, are incredibly expensive, or sell products that are just flat-out boring.</p>
            <p style="color: black;">It doesn't have to be that way. It shouldn't be that way.</p>
            <p style="color: black;">We here at 2HEX make the best products and the highest quality. We value <b>transparency, simplicity and speed</b>.</p>
            <p style="color: black;"><b>High Quality Products</b><br/>
                Our number one priority is to offer the best products and quality. We do so by inventing, testing and pushing the limits of what skateboards can be. We monitor leading skateboard companies and we track the best-selling products in skate shops worldwide. And lastly, we only merge the best of the best into our products.
            </p>
            <p style="color: black;"><b>Speed, transparency and simplicity</b><br/>
            Customize your products online and see costs calculate in real time. Check the prices of all product variations and find the perfect fit for your company. By email this would take months and over the phone this would be impossible. 2HEX customers are well informed and fast – and now you know why!
            </p>
            <p style="color: black;">If you're ready to solve your skateboard production problems for good -- <b>keep an eye on your inbox tomorrow</b>. I'm sending something that you don't want to miss.</p>
            
            <p style="color: black; margin-top: 20px;">
                To your success, Josh
			</p>
            <p>P.S. The important thing I'm sending your way also comes with a limited time offer. Be sure to check your email tomorrow.</p>
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

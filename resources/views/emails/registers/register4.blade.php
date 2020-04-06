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
            <p style="color: black;">As promised by email yesterday, here comes the email you don’t want to miss! </p>
            <p>To get you started I am giving you a 50 USD discount on your first production order.</p>
            <p style="color: black;"><b>Discount code: VF289BJK</b></p>
            <img src="{{asset('img/discount.png')}}" width="100%"/>
            <p style="color: black;">Login, and add this code on the bottom of your <a href="https://2hex.com/summary">summary page.</a></p>
            <p style="color: black;">This discount can only be used within the next two weeks, so make sure to place your production order now!/p>
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
                Cheers<br>
                Josh
			</p>
            <p><i>Please note: The 50 USD discount can only be used for production orders of 500 USD or more.<i></p>
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

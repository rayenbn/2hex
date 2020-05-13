@php $authUser = auth()->user(); @endphp
<thead style="background-color: #52a3f0; color: white;">
<tr>
    @if(isset($batches))
        <th>Select</th>
    @endif
    <th>Transfers Batch</th>
    <th>Sheets</th>
    <th colspan="2">Name</th>
    <th colspan="5">Preview</th>
    <th colspan="2">Colors</th>
    <th colspan="2">Artwork File</th>
    <th colspan="4">Color Codes</th>
    <th colspan="2">Films Made</th>

    @if(!isset($batches))
        <th>Transfer Price</th>
        <th>Batch Total</th>
    @endif

    @if(Session::get('viewonly') == null && !isset($batches))
        <th>Edit</th>
    @endif

</tr>
</thead>
@foreach($transfers1 as $batch => $transfer)

    <tr>
        @if(isset($batches))
            <td>
                <label class="m-checkbox">
                    <input type="checkbox" value="{{$transfer->id}}" name="transferBatches[]"/>
                    <span></span>
                </label>
            </td>
        @endif
        <td class="align-middle">Heat Transfers Batch #{{++$batch}}</td>
        <td class="align-middle text-center">{{$transfer->quantity}}</td>
        <td colspan="2" class="align-middle">{{$transfer->design_name}}</td>
        <td colspan="5" class="align-middle">
            @if(isset($authUser))
                <img
                    width="100%"
                    src="{{sprintf('/uploads/%s/transfers-small-preview/%s', $authUser->name, $transfer->small_preview)}}"
                    alt="Preview"
                    title="Preview"
                    style="margin: 0 auto;width: auto;max-height: 100px;display: block;"
                >
            @endif
        </td>
        <td colspan="2">
            Transparency: {{$transfer->transparency ? 'Yes' : 'No'}}<br>
            <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
            <br>
            {{$transfer->colors_count}} Colors
        </td>
        <td colspan="2">
            <span title="{{$transfer->small_preview}}">{{$transfer->small_preview}}</span><br>
            <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
            <br>
            <span title="{{$transfer->large_preview}}">{{$transfer->large_preview}}</span>
        </td>
        @php
            /** @var App\Models\HeatTransfer\ $transfer */
            $colors = explode(';', $transfer->colors);
        @endphp
        <td class="p-0 border-0" {{count($colors) > 5 ? 'colspan=2' : 'colspan=4'}}>
            <table style=" {{count($colors) > 5 ? '' : 'border: hidden;'}}" class="w-100">
                @foreach(array_slice($colors, 0, 5) as $color)
                    <tr>
                        <td>{{$color}}</td>
                    </tr>
                @endforeach
            </table>
        </td>
        @if (count($colors) > 5)
            <td class="p-0 border-0" colspan="2">
                <table class="w-100">
                    @foreach(array_slice($colors, 5) as $color)
                    <tr>
                        <td>{{$color}}</td>
                    </tr>
                    @endforeach
                </table>
            </td>
        @endif
        <td colspan="2" class="align-middle text-center"><time>{{$transfer->date ?? 'New'}}</time></td>
        @if(!isset($batches))
            <td class="align-middle text-center">{{ isset($authUser) ? money_format('%.2n', $transfer->cost_per_transfer) : '$?.??' }}</td>
            <td class="align-middle text-center">{{ isset($authUser) ? money_format('%.2n', $transfer->total) : '$?.??' }}</td>
        @endif
        @if(Session::get('viewonly') == null && !isset($batches))
            <td>
                <div class="btn-group" role="group" aria-label="First group">
                    <form action="{{route('transfers.copy', $transfer->id)}}" method="POST">
                        {!! csrf_field() !!}
                        <button type="submit" class="m-btn btn btn-secondary" title="Duplicate">
                            <i class="la la-files-o"></i>
                        </button>
                    </form>
                    <form action="{{route('transfers.destroy', $transfer->id)}}" method="GET">
                        {!! csrf_field() !!}
                        <button type="submit" class="m-btn btn btn-secondary" title="Delete">
                            <i class="la la-scissors"></i>
                        </button>
                    </form>
                </div>
                <div class="btn-group" role="group" aria-label="First group">
                    <form action="{{route('transfers.save', $transfer->id)}}" method="POST">
                        {!! csrf_field() !!}
                        <button type="submit" class="m-btn btn btn-secondary" title="Save">
                            <i class="la la-floppy-o"></i>
                        </button>
                    </form>
                    <a class="m-btn btn btn-secondary" href="{{route('transfers.update', $transfer->id)}}" title="Edit">
                        <i class="la la-italic"></i>
                    </a>
                </div>

            </td>
        @endif

    </tr>
@endforeach

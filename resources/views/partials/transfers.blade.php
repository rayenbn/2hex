<thead style="background-color: #52a3f0; color: white;">
<tr>
    @if(isset($batches))
        <th>Select</th>
    @endif
    <th>Transfers Batch</th>
    <th>Sheets</th>
    <th>Name</th>
    <th colspan="3">Preview</th>
    <th>Colors</th>
    <th>Artwork File</th>
    <th>Color Codes</th>
    <th>Colors</th>
    <th>Films Made</th>
    <th>Transfer Price</th>
    <th>Batch Total</th>

    @if(Session::get('viewonly') == null && !isset($batches))
        <th>Edit</th>
    @endif

</tr>
</thead>
@foreach($transfers as $batch => $transfer)

    <tr>
        <td class="align-middle">Heat Transfers Batch #{{++$batch}}</td>
        <td class="align-middle text-center">{{$transfer->quantity}}</td>
        <td class="align-middle">{{$transfer->design_name}}</td>
        <td colspan="3" class="align-middle" title="{{$transfer->small_preview}}">{{$transfer->small_preview}}</td>
        <td>
            Transparency: {{$transfer->transparency ? 'Yes' : 'No'}}<br>
            <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
            <br>
            {{$transfer->colors_count}} Colors
        </td>
        <td>
            <span title="{{$transfer->small_preview}}">{{$transfer->small_preview}}</span><br>
            <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
            <br>
            <span title="{{$transfer->large_preview}}">{{$transfer->large_preview}}</span>
        </td>
        <td>
            Pantone 234567C
            <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
            <br>
        </td>
        <td>
            <ul class="list-group list-group-flush">
                @foreach(explode(';', $transfer->colors) as $color)
                    <li class="list-group-item p-0" style="background-color: inherit;">{{$color}}</li>
                @endforeach
            </ul>
        </td>
        <td class="align-middle text-center">{{$transfer->reorder_at ?? 'New'}}</td>
        @if(!isset($batches))
            <td class="align-middle text-center">{{ auth()->check() ? money_format('%.2n', $transfer->cost_per_transfer) : '$?.??' }}</td>
            <td class="align-middle text-center">{{ auth()->check() ? money_format('%.2n', $transfer->total) : '$?.??' }}</td>
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
{{--                    <a class="m-btn btn btn-secondary" href="#" title="Save">--}}
{{--                        <i class="la la-floppy-o"></i>--}}
{{--                    </a>--}}
                    <form action="{{route('transfers.save', $transfer->id)}}" method="POST">
                        {!! csrf_field() !!}
                        <button type="submit" class="m-btn btn btn-secondary" title="Save">
                            <i class="la la-floppy-o"></i>
                        </button>
                    </form>
                    <a class="m-btn btn btn-secondary" href="#" title="Edit">
                        <i class="la la-italic"></i>
                    </a>
                </div>

            </td>
        @endif

    </tr>
@endforeach

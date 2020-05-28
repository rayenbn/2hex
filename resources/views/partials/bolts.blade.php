<thead style="background-color: #52a3f0; color: white;">
        <tr>
            @if(isset($batches))
            <th>Select</th>
            @endif
            <th>Nuts and Bolt Batch</th>
            <th>Sets</th>
            <th colspan="2">Style</th>
            <th colspan="2">Colors</th>
            <th colspan="2">Bolts Color Allocation</th>
            <th colspan="2">Nuts Color Allocation</th>
            <th colspan="2">Material</th>
            <th colspan="2">Size</th>
            <th>Phillips Or Allen</th>
            <th colspan="4">Packing</th>
            @if(!isset($batches))
            <th>Bolt Price</th>
            <th>Batch&nbspTotal</th>
            @endif
            @if(Session::get('viewonly') == null && !isset($batches))
            <th>Edit</th>
            @endif

        </tr>
    </thead>
       @foreach($bolts1 as $batch => $bolt)

        <tr>
            @if(isset($batches))
            <td>
                <label class="m-checkbox">
                    <input type="checkbox" value="{{$bolt->id}}" name="boltBatches[]"/>
                    <span></span>
                </label>
            </td>
            @endif
            <td class="align-middle">Bolt and Nuts Batch #{{++$batch}}</td>
            <td class="align-middle text-center">{{$bolt->quantity}}</td>
            <td colspan="2" class="align-middle" title="{{$bolt->costset}}">
                {{$bolt->costset}}
            </td>
            <td colspan="2"  class="align-middle text-center">
                @php 
                    $colors = json_decode($bolt->color, true);
                @endphp
                {{$colors['title']}}
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                @if(isset($colors['colors']))
                    @foreach($colors['colors'] as $i => $color)
                        <p>{{$color == "Custom Color" ? "Custom Color: ".$colors['customcolors'][$i] : $color}}</p>
                        <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                        <br>
                    @endforeach
                @endif
            </td>
            <td colspan="2" class="align-middle text-center">

                @foreach(array_slice(explode(',',$bolt->allocation),0, 10) as $i => $allocation)
                    @if($allocation)
                        <p>{{$allocation}}</p>
                    @else
                        <p>/</p>
                    @endif
                    @if($i != 9)
                        <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                    @endif
                @endforeach
            </td>
            <td colspan="2" class="align-middle text-center">
                @foreach(array_slice(explode(',',$bolt->allocation),10, 10) as $i => $allocation)
                    @if($allocation)
                        <p>{{$allocation}}</p>
                    @else
                        <p>/</p>
                    @endif
                    @if($i != 9)
                        <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                    @endif
                @endforeach
            </td>
            <td colspan="2" class="align-middle text-center">{{$bolt->material}}</td>
            <td colspan="2" class="align-middle text-center">{{$bolt->size}}</td>
            <td class="text-center align-middle">
                {{$bolt->phil_allen ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                {{$bolt->allen_type ?? ''}}
            </td>
            <td colspan="2" class="align-middle text-center">{{$bolt->pack}}</td>
            
            <td colspan="2"  class="align-middle text-center">
                {{$bolt->designname}}
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                @php 
                    $packcolors = json_decode($bolt->pack_color, true);
                @endphp
                @if(isset($packcolors['colors']))
                    @foreach($packcolors['colors'] as $i => $packcolor)
                        <p>Color{{($i+1).': '.$packcolor}}</p>
                        <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                        <br>
                    @endforeach
                @endif
                {{$bolt->pack_print ?? ''}}<br>
            </td>
            @if(!isset($batches))
            <td class="align-middle text-center">{{ auth()->check() ? money_format('%.2n', $bolt->price) : '$?.??' }}</td>
            <td class="align-middle text-center">{{ auth()->check() ? money_format('%.2n', $bolt->total) : '$?.??' }}</td>
            @endif
            @if(Session::get('viewonly') == null && !isset($batches))
            <td>
                <div class="btn-group" role="group" aria-label="First group">
                    <form action="{{route('bolts.copy', $bolt->id)}}" method="POST">
                        {!! csrf_field() !!}
                        <button type="submit" class="m-btn btn btn-secondary" title="Duplicate">
                            <i class="la la-files-o"></i>
                        </button>
                    </form>
                    <form action="{{route('bolts.destroy', $bolt->id)}}" method="GET">
                        {!! csrf_field() !!}
                        <button type="submit" class="m-btn btn btn-secondary" title="Delete">
                            <i class="la la-scissors"></i>
                        </button>
                    </form>
                </div>
                <div class="btn-group" role="group" aria-label="First group">
                    <a class="m-btn btn btn-secondary" href="{{route('bolts.save', $bolt->id)}}" title="Save">
                        <i class="la la-floppy-o"></i>
                    </a>
                    <a class="m-btn btn btn-secondary" href="{{route('bolts.show', $bolt->id)}}" title="Edit">
                        <i class="la la-italic"></i>
                    </a>
                </div>

                {{--
                <a href="{{route('bolts.show', $bolt->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
                <a href="{{route('bolts.show', $bolt->id)}}" class="btn btn-outline-info btn-sm">Save</a>
                <a href="{{route('bolts.destroy', $bolt->id)}}" class="btn btn-outline-danger btn-sm">Remove</a>
                --}}
            </td>
            @endif
            
        </tr>
        @endforeach

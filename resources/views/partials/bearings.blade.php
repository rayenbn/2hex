<thead style="background-color: #52a3f0; color: white;">
        <tr>
            @if(isset($batches))
            <th>Select</th>
            @endif
            <th>Bearing Batch</th>
            <th>Quantity</th>
            <th>Material</th>
            <th>Abec</th>
            <th>Race</th>
            <th>Race Print</th>
            <th>Retainer</th>
            <th>Shield Material</th>
            <th>Shield Branding</th>
            <th>Shield Print</th>
            <th>Spacers Material</th>
            <th>Spacers Color</th>
            <th>Bearing Packing1</th>
            <th>Shield Branding1</th>
            <th>Bearing Packing2</th>
            <th>Shield Branding2</th>
            <th>Outer Packing</th>
            <th>Packing Colors</th>
            <th>Packing Print</th>
            @if(!isset($batches))
            <th>Bearing Price</th>
            <th>Batch&nbspTotal</th>
            @endif
            @if(Session::get('viewonly') == null && !isset($batches))
            <th>Edit</th>
            @endif

        </tr>
    </thead>
       @foreach($bearings1 as $batch => $bearing)

        <tr>
            @if(isset($batches))
            <td>
                <label class="m-checkbox">
                    <input type="checkbox" value="{{$bearing->id}}" name="bearingBatches[]"/>
                    <span></span>
                </label>
            </td>
            @endif
            <td>Bearing Batch #{{++$batch}}</td>
            <td>{{$bearing->quantity}}</td>
            <td>{{$bearing->material}}</td>
            <td>{{$bearing->abec}}</td>
            <td>{{$bearing->race}}</td>
            <td @if(isset($fees['race_print'][$bearing->race_print]['paid']) && $fees['race_print'][$bearing->race_print]['paid'] == 1) class="paid" @endif>
                
                    <p>{{$bearing->raceprintvalue ?? ''}}</p>
                @if(isset($bearing->race_print))
                    <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                    <br>
                    {{$bearing->race_print ?? ''}}<br>
                @endif
                
            </td>
            <td>{{$bearing->retainer}}</td>
            <td>{{$bearing->shield}}
                @if(isset($bearing->shieldcolor))
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                Color: {{$bearing->shieldcolor}}
                @endif</td>
            <td>{{$bearing->shield_brand}}
                @if(isset($bearing->firstbrandcolor))
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                Color: {{$bearing->firstbrandcolor}}
                @endif
                @if(isset($bearing->secondbrandcolor))
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                Color: {{$bearing->secondbrandcolor}}
                @endif
            </td>
            <td @if(isset($fees['shield_brand_print'][$bearing->shield_brand_print]['paid']) && $fees['shield_brand_print'][$bearing->shield_brand_print]['paid'] == 1) class="paid" @endif>
                {{$bearing->shield_brand_print ?? ''}}<br>
            </td>
            <td>{{$bearing->spamaterial}}</td>
            <td>{{$bearing->spacolor}}</td>
            <td @if(isset($fees['cardbox_print'][$bearing->cardbox_print]['paid']) && $fees['cardbox_print'][$bearing->cardbox_print]['paid'] == 1) class="paid" @endif>
                
                    <p>{{$bearing->packfirst ?? ''}}</p>
                @if(isset($bearing->cardbox_print))
                    <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                    <br>
                    {{$bearing->cardbox_print ?? ''}}<br>
                @endif
                
            </td>
            <td @if(isset($fees['sticker_print'][$bearing->sticker_print]['paid']) && $fees['sticker_print'][$bearing->sticker_print]['paid'] == 1) class="paid" @endif>
                
                    <p>{{$bearing->brandfirst ?? ''}}</p>
                @if(isset($bearing->sticker_print))
                    <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                    <br>
                    {{$bearing->sticker_print ?? ''}}<br>
                @endif
                
            </td>
            <td @if(isset($fees['cardboxtwo_print'][$bearing->cardboxtwo_print]['paid']) && $fees['cardboxtwo_print'][$bearing->cardboxtwo_print]['paid'] == 1) class="paid" @endif>
                
                    <p>{{$bearing->packsecond ?? ''}}</p>
                @if(isset($bearing->cardboxtwo_print))
                    <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                    <br>
                    {{$bearing->cardboxtwo_print ?? ''}}<br>
                @endif
                
            </td>
            <td>{{$bearing->brandsecond}}</td>
            <td>{{$bearing->designname}}</td>
            <td>
                @php 
                    $pantonecolors = json_decode($bearing->pantone_color, true);
                @endphp
                @if(isset($pantonecolors['colors']))
                    @foreach($pantonecolors['colors'] as $i => $pantonecolor)
                        <p>Color{{($i+1).': '.$pantonecolor}}</p>
                    @endforeach
                @endif
                
            </td>
            <td @if(isset($fees['pantone_print'][$bearing->pantone_print]['paid']) && $fees['pantone_print'][$bearing->pantone_print]['paid'] == 1) class="paid" @endif>
                {{$bearing->pantone_print ?? ''}}<br>
            </td>
            @if(!isset($batches))
            <td>{{ auth()->check() ? money_format('%.2n', $bearing->price) : '$?.??' }}</td>
            <td>{{ auth()->check() ? money_format('%.2n', $bearing->total) : '$?.??' }}</td>
            @endif
            @if(Session::get('viewonly') == null && !isset($batches))
            <td>
                <div class="btn-group" role="group" aria-label="First group">
                    <form action="{{route('bearings.copy', $bearing->id)}}" method="POST">
                        {!! csrf_field() !!}
                        <button type="submit" class="m-btn btn btn-secondary" title="Duplicate">
                            <i class="la la-files-o"></i>
                        </button>
                    </form>
                    <form action="{{route('bearings.destroy', $bearing->id)}}" method="GET">
                        {!! csrf_field() !!}
                        <button type="submit" class="m-btn btn btn-secondary" title="Delete">
                            <i class="la la-scissors"></i>
                        </button>
                    </form>
                </div>
                <div class="btn-group" role="group" aria-label="First group">
                    <a class="m-btn btn btn-secondary" href="{{route('bearings.save', $bearing->id)}}" title="Save">
                        <i class="la la-floppy-o"></i>
                    </a>
                    <a class="m-btn btn btn-secondary" href="{{route('bearings.show', $bearing->id)}}" title="Edit">
                        <i class="la la-italic"></i>
                    </a>
                </div>

                {{--
                <a href="{{route('bearings.show', $bearing->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
                <a href="{{route('bearings.show', $bearing->id)}}" class="btn btn-outline-info btn-sm">Save</a>
                <a href="{{route('bearings.destroy', $bearing->id)}}" class="btn btn-outline-danger btn-sm">Remove</a>
                --}}
            </td>
            @endif
            
        </tr>
        @endforeach
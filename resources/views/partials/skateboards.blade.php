    <thead style="background-color: #52a3f0; color: white;">
        <tr>
            @if(isset($batches))
            <th>Select</th>
            @endif
            <th>Deck Batch</th>
            <th>Pcs</th>
            <th>Size</th>
            <th>Concave</th>
            <th>Materials</th>
            <th>Print</th>
            <th>Top Engravery</th>
            <th>Veneer&nbspColors</th>
            <th>Specials</th>
            <th>Cardboard Wrap</th>
            <th>Carton Print</th>
            @if(!isset($batches))
            <th>Deck&nbspPrice</th>
            <th>Batch&nbspTotal</th>
            @endif
            @if(Session::get('viewonly') == null && !isset($batches))
            <th>Edit</th>
            @endif

        </tr>
    </thead>
        @foreach($skateboards as $batch => $skateboard)

        <tr>
            @if(isset($batches))
            <td>
                <label class="m-checkbox">
                    <input type="checkbox" value="{{$skateboard->id}}" name="orderBatches[]"/>
                    <span></span>
                </label>
            </td>
            @endif
            <td>Skateboard Deck Batch #{{++$batch}}</td>
            <td>{{$skateboard->quantity}}</td>
            <td>{{$skateboard->size}}</td>
            <td>{{$skateboard->concave}}</td>
            <td>
                <div>
                    <span style="margin-top: 15px; display: block;">
                        {{$skateboard->wood}}<br>
                    </span>
                </div>
                <hr style="border-color: #f4f5f8; margin: 0 -5px 0 -3px">
                <div>
                    <span style="margin-top: 15px; display: block;">
                        {{$skateboard->glue}}<br>
                    </span>
                </div>
            </td>
            <td>
                <div>
                    <span style="margin-top: 15px; display: block;">
                        <b>Bottom</b><br>
                        {{$skateboard->bottomprint ? $skateboard->bottomprint : 'None'}}<br>
                        <hr style="border-color: #f4f5f8; margin: 0 -5px 0 -3px">
                    </span>
                    <span>
                        colors: {{$skateboard->bottomprint_color ?? ''}}
                        <hr style="border-color: #f4f5f8; margin: 0 -5px 0 -3px">
                    </span>
                </div>
                <div>
                    <span style="margin-top: 15px; display: block;">
                        <b>Top</b><br>
                        {{$skateboard->topprint ? $skateboard->topprint : 'None'}}<br>
                        <hr style="border-color: #f4f5f8; margin: 0 -5px 0 -3px">
                    </span>
                    <span>
                        colors: {{$skateboard->topprint_color ?? ''}}
                    </span>
                </div>
            </td>

            <td>{{$skateboard->engravery ? $skateboard->engravery : 'None'}}</td>
            <td>
                <ol style="padding-left:0; list-style-position:inside;">
                    @foreach(json_decode($skateboard->veneer) as $veneer)
                        <li>{{$veneer}}</li>
                    @endforeach 
                </ol>
            </td>
            <td>
                <?php 
                    $count = 0;
                    $extraTitle = [
                        'fulldip' => 'Fulldip',
                        'transparent' => 'Transp. F.dip',
                        'metallic' => 'Metallic dip',
                        'blacktop' => 'Top Fiberglass',
                        'blackmidlayer' => 'Mid Fiberglass',
                        'pattern' => 'Pattern Press',
                    ];
                ?>
                @foreach(json_decode($skateboard->extra) as $key => $extra)
                    @if($extra->state == true)
                        @if($count != 0)
                        <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px">
                        @endif
                        {{ $extraTitle[$key] }}
                        {{ isset($extra->color) 
                                ? " :" . preg_replace( '/[^0-9a-zA-Z]/', '', $extra->color) 
                                : ' : Yes' 
                        }} 
                        <br>
                        <?php $count ++ ?>
                    @endif
                @endforeach
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px">
                Shrink Wrap: Yes
            </td>
            <td>{{$skateboard->cardboard ? $skateboard->cardboard : 'None'}}</td>
            <td>
                <div>
                    <p style="margin: 30px 0px;">
                        {{$skateboard->carton ? $skateboard->carton : 'None'}}
                        <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                    </p>
                    <p>colors: {{$skateboard->carton_color ?? ''}}</p>
                </div>
            </td>
            @if(!isset($batches))
            <td>{{ auth()->check() ? money_format('%.2n', $skateboard->perdeck) : '$?.??' }}</td>
            <td>{{ auth()->check() ? money_format('%.2n', $skateboard->total) : '$?.??' }}</td>
            @endif
            @if(Session::get('viewonly') == null && !isset($batches))
                <td>
                    {{--
                    <a href="skateboard-deck-configurator/{{$order->id}}" class="btn btn-outline-info btn-sm">Edit Batch</a>
                    <a href="skateboard-deck-configurator/{{$order->id}}" class="btn btn-outline-info btn-sm">Save Batch</a>
                    <a href="skateboard-deck-configurator/{{$order->id}}" class="btn m-btn--pill btn-outline-success btn-sm">+</a>
                    <a href="skateboard-remove/{{$order->id}}" class="btn m-btn--pill btn-outline-danger btn-sm">-</a>
                    --}}
                    
                    <div class="btn-group" role="group" aria-label="First group">
                        <form action="{{route('copy.skateboard.configurator', $skateboard->id)}}" method="POST">
                            {!! csrf_field() !!}
                            <button type="submit" class="m-btn btn btn-secondary" title="Duplicate">
                                <i class="la la-files-o"></i>
                            </button>
                        </form>
                        <form action="{{route('delete.skateboard.configurator', $skateboard->id)}}" method="GET">
                            {!! csrf_field() !!}
                            <button type="submit" class="m-btn btn btn-secondary" title="Delete">
                                <i class="la la-scissors"></i>
                            </button>
                        </form>
                    </div>
                    <div class="btn-group" role="group" aria-label="First group">
                        <a type="button" class="m-btn btn btn-secondary"  href="{{route('show.skateboard.save', $skateboard->id)}}" title="Save">
                            <i class="la la-floppy-o"></i>
                        </a>
                        <a class="m-btn btn btn-secondary" href="{{route('show.skateboard.configurator', $skateboard->id)}}" title="Edit">
                            <i class="la la-italic"></i>
                        </a>
                    </div>

                </td>
            @endif
        </tr>
        
        @endforeach

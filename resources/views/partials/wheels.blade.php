    <thead style="background-color: #52a3f0; color: white;">
        <tr>
            @if(isset($batches))
            <th>Select</th>
            @endif
            <th>Wheels Batch</th>
            <th>Sets</th>
            <th>Style</th>
            <th>Shape</th>
            <th>Size</th>
            <th>Material & Hardness</th>
            <th>Print on Front</th>
            <th>Print on Back</th>
            <th>Wheels Placement</th>
            <th>Cardboard Wrap</th>
            <th>Carton Print</th>
            @if(!isset($batches))
            <th>Set Price</th>
            <th>Batch Total</th>
            @endif
            @if(Session::get('viewonly') == null && !isset($batches))
            <th>Edit</th>
            @endif

        </tr>
    </thead>
       @foreach($wheels1 as $batch => $wheel)

        <tr>
            @if(isset($batches))
            <td>
                <label class="m-checkbox">
                    <input type="checkbox" value="{{$wheel->wheel_id}}" name="wheelBatches[]"/>
                    <span></span>
                </label>
            </td>
            @endif
            <td>Skateboard Wheels Batch #{{++$batch}}</td>
            <td>{{$wheel->quantity}}</td>
            <td>{{$wheel->type}}</td>
            <td>{{$wheel->shape}}</td>
            <td>{{$wheel->size}}</td>
            <td>
                {{$wheel->hardness}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                {{$wheel->is_shr ? 'SHR' : ''}}
            </td>
            <td @if(isset($fees['top_print'][$wheel->top_print]['paid']) && $fees['top_print'][$wheel->top_print]['paid'] == 1) class="paid" @endif>
                {{$wheel->top_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                colors: {{$wheel->top_colors ?? ''}}
            </td>
            <td @if(isset($fees['back_print'][$wheel->back_print]['paid']) && $fees['back_print'][$wheel->back_print]['paid'] == 1) class="paid" @endif>
                {{$wheel->back_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                colors: {{$wheel->back_colors ?? ''}}
            </td>
            <td>{{$wheel->placement}}</td>
            <td>{{$wheel->cardboard_print ?? 'No'}}</td>
            <td @if(isset($fees['carton_print'][$wheel->carton_print]['paid']) && $fees['carton_print'][$wheel->carton_print]['paid'] == 1) class="paid" @endif>
                {{$wheel->carton_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                colors: {{$wheel->cardboard_colors ?? ''}}
            </td>
            @if(!isset($batches))
            <td>{{ auth()->check() ? money_format('%.2n', $wheel->price) : '$?.??' }}</td>
            <td>{{ auth()->check() ? money_format('%.2n', $wheel->total) : '$?.??' }}</td>
            @endif
            @if(Session::get('viewonly') == null && !isset($batches))
            <td>
                <div class="btn-group" role="group" aria-label="First group">
                    <form action="{{route('wheels.configurator.copy', $wheel->wheel_id)}}" method="POST">
                        {!! csrf_field() !!}
                        <button type="submit" class="m-btn btn btn-secondary" title="Duplicate">
                            <i class="la la-files-o"></i>
                        </button>
                    </form>
                    <form action="{{route('wheels.configurator.delete', $wheel->wheel_id)}}" method="GET">
                        {!! csrf_field() !!}
                        <button type="submit" class="m-btn btn btn-secondary" title="Delete">
                            <i class="la la-scissors"></i>
                        </button>
                    </form>
                </div>
                <div class="btn-group" role="group" aria-label="First group">
                    <a class="m-btn btn btn-secondary" href="{{route('wheels.configurator.save', $wheel->wheel_id)}}" title="Save">
                        <i class="la la-floppy-o"></i>
                    </a>
                    <a class="m-btn btn btn-secondary" href="{{route('wheels.configurator.show', $wheel->wheel_id)}}" title="Edit">
                        <i class="la la-italic"></i>
                    </a>
                </div>

            </td>
            @endif

        </tr>
        @endforeach

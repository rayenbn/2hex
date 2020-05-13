    <thead style="background-color: #52a3f0; color: white;">
        <tr>
            @if(isset($batches))
            <th>Select</th>
            @endif
            <th>Wheels Batch</th>
            <th>Sets</th>
            <th colspan="2">Style</th>
            <th colspan="2">Shape</th>
            <th colspan="2">Size</th>
            <th colspan="2">Material & Hardness</th>
            <th colspan="2">Print on Front</th>
            <th colspan="2">Print on Back</th>
            <th>Wheels Placement</th>
            <th colspan="2">Cardboard Wrap</th>
            <th colspan="2">Carton Print</th>
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

            <td class="align-middle">Skateboard Wheels Batch #{{++$batch}}</td>
            <td class="align-middle text-center">{{$wheel->quantity}}</td>
            <td colspan="2" class="align-middle text-center">{{$wheel->type}}</td>
            <td colspan="2" class="align-middle text-center">{{$wheel->shape}}</td>
            <td colspan="2" class="align-middle text-center">{{$wheel->size}}</td>
            <td colspan="2">

                {{$wheel->hardness}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                {{$wheel->is_shr ? 'SHR' : ''}}
            </td>
            <td colspan="2" @if(isset($fees['top_print'][$wheel->top_print]['paid']) && $fees['top_print'][$wheel->top_print]['paid'] == 1) class="paid" @endif @if(isset($fees['wheel_top_print'][$wheel->top_print]['paid']) && $fees['wheel_top_print'][$wheel->top_print]['paid'] == 1) class="paid" @endif>
                {{$wheel->top_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                colors: {{$wheel->top_colors ?? ''}}
            </td>
            <td colspan="2" @if(isset($fees['back_print'][$wheel->back_print]['paid']) && $fees['back_print'][$wheel->back_print]['paid'] == 1) class="paid" @endif @if(isset($fees['wheel_back_print'][$wheel->back_print]['paid']) && $fees['wheel_back_print'][$wheel->back_print]['paid'] == 1) class="paid" @endif>
                {{$wheel->back_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                colors: {{$wheel->back_colors ?? ''}}
            </td>
            <td class="align-middle text-center">{{$wheel->placement}}</td>
            <td colspan="2" class="align-middle text-center">{{$wheel->cardboard_print ?? 'No'}}</td>
            <td colspan="2" @if(isset($fees['carton_print'][$wheel->carton_print]['paid']) && $fees['carton_print'][$wheel->carton_print]['paid'] == 1) class="paid" @endif @if(isset($fees['wheel_carton_print'][$wheel->carton_print]['paid']) && $fees['wheel_carton_print'][$wheel->carton_print]['paid'] == 1) class="paid" @endif>
                {{$wheel->carton_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                colors: {{$wheel->cardboard_colors ?? ''}}
            </td>
            @if(!isset($batches))
            <td class="align-middle text-center">{{ auth()->check() ? money_format('%.2n', $wheel->price) : '$?.??' }}</td>
            <td class="align-middle text-center">{{ auth()->check() ? money_format('%.2n', $wheel->total) : '$?.??' }}</td>
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

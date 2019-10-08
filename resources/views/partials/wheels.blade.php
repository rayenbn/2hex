    <thead style="background-color: #52a3f0; color: white;">
        <tr>
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
            <th></th>
            <th>Set Price</th>
            <th>Batch Total</th>

            @if(Session::get('viewonly') == null)
            <th>Edit</th>
            @endif

        </tr>
    </thead>
       @foreach($wheels as $batch => $wheel)

        <tr>
            <td>{{++$batch}}</td>
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
            <td>
                {{$wheel->top_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                colors: {{$wheel->top_colors ?? ''}}
            </td>
            <td>
                {{$wheel->back_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                colors: {{$wheel->back_colors ?? ''}}
            </td>
            <td>{{$wheel->placement}}</td>
            <td>{{$wheel->cardboard_print ?? 'No'}}</td>
            <td>
                {{$wheel->carton_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                colors: {{$wheel->cardboard_colors ?? ''}}
            </td>
            <td></td>
            <td>{{ auth()->check() ? money_format('%.2n', $wheel->price) : '$?.??' }}</td>
            <td>{{ auth()->check() ? money_format('%.2n', $wheel->total) : '$?.??' }}</td>

            @if(Session::get('viewonly') == null)
            <td>
                <div class="btn-group" role="group" aria-label="First group">
                    <button type="button" class="m-btn btn btn-secondary"><i class="la la-files-o"></i></button>
                    <button type="button" class="m-btn btn btn-secondary"><i class="la la-scissors"></i></button>
                </div>
                <div class="btn-group" role="group" aria-label="First group">
                    <button type="button" class="m-btn btn btn-secondary"><i class="la la-floppy-o"></i></button>
                    <button type="button" class="m-btn btn btn-secondary"><i class="la la-italic"></i></button>
                </div>
                
                {{--
                <a href="{{route('griptape.show', $grip->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
                <a href="{{route('griptape.show', $grip->id)}}" class="btn btn-outline-info btn-sm">Save</a>
                <a href="{{route('griptape.destroy', $grip->id)}}" class="btn btn-outline-danger btn-sm">Remove</a>
                --}}
            </td>
            @endif

        </tr>
        @endforeach

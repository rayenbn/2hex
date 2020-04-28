    <thead style="background-color: #52a3f0; color: white;">
        <tr>
            @if(isset($batches))
            <th>Select</th>
            @endif
            <th>Grip Batch</th>
            <th>Pcs</th>
            <th colspan="2">Size</th>
            <th colspan="2">Grip Color</th>
            <th colspan="2">Grit</th>
            <th colspan="2">Perforation</th>
            <th colspan="2">Die Cut</th>
            <th colspan="2">Top Print</th>
            <th>Backpaper</th>
            <th colspan="2">Backpaper Print</th>
            <th colspan="2">Carton Print</th>
            @if(!isset($batches))
            <th>Grip Price</th>
            <th>Batch&nbspTotal</th>
            @endif
            @if(Session::get('viewonly') == null && !isset($batches))
            <th>Edit</th>
            @endif

        </tr>
    </thead>
       @foreach($grips1 as $batch => $grip)

        <tr>
            @if(isset($batches))
            <td>
                <label class="m-checkbox">
                    <input type="checkbox" value="{{$grip->id}}" name="gripBatches[]"/>
                    <span></span>
                </label>
            </td>
            @endif
            <td>Griptape Batch #{{++$batch}}</td>
            <td>{{$grip->quantity}}</td>
            <td colspan="2">{{$grip->size}}</td>
            <td colspan="2">{{$grip->color}}</td>
            <td colspan="2">{{$grip->grit}}</td>
            <td colspan="2">{{$grip->perforation ? 'Yes' : 'None'}}</td>
            <td colspan="2">{{$grip->die_cut}}</td>
            <td  colspan="2" @if(isset($fees['top_print'][$grip->top_print]['paid']) && $fees['top_print'][$grip->top_print]['paid'] == 1) class="paid" @endif>
                {{$grip->top_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                {{$grip->top_print_color ?? ''}}
            </td>
            <td>{{$grip->backpaper}}</td>
            <td colspan="2" @if(isset($fees['backpaper_print'][$grip->backpaper_print]['paid']) && $fees['backpaper_print'][$grip->backpaper_print]['paid'] == 1) class="paid" @endif>
                {{$grip->backpaper_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                {{$grip->backpaper_print_color ?? ''}}
            </td>
            <td colspan="2" @if(isset($fees['carton_print'][$grip->carton_print]['paid']) && $fees['carton_print'][$grip->carton_print]['paid'] == 1) class="paid" @endif>
                {{$grip->carton_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                {{$grip->carton_print_color ?? ''}}
            </td>
            @if(!isset($batches))
            <td>{{ auth()->check() ? money_format('%.2n', $grip->price) : '$?.??' }}</td>
            <td>{{ auth()->check() ? money_format('%.2n', $grip->total) : '$?.??' }}</td>
            @endif
            @if(Session::get('viewonly') == null && !isset($batches))
            <td>
                <div class="btn-group" role="group" aria-label="First group">
                    <form action="{{route('griptape.copy', $grip->id)}}" method="POST">
                        {!! csrf_field() !!}
                        <button type="submit" class="m-btn btn btn-secondary" title="Duplicate">
                            <i class="la la-files-o"></i>
                        </button>
                    </form>
                    <form action="{{route('griptape.destroy', $grip->id)}}" method="GET">
                        {!! csrf_field() !!}
                        <button type="submit" class="m-btn btn btn-secondary" title="Delete">
                            <i class="la la-scissors"></i>
                        </button>
                    </form>
                </div>
                <div class="btn-group" role="group" aria-label="First group">
                    <a class="m-btn btn btn-secondary" href="{{route('griptape.save', $grip->id)}}" title="Save">
                        <i class="la la-floppy-o"></i>
                    </a>
                    <a class="m-btn btn btn-secondary" href="{{route('griptape.show', $grip->id)}}" title="Edit">
                        <i class="la la-italic"></i>
                    </a>
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

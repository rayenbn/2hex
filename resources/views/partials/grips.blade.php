    <thead style="background-color: #52a3f0; color: white;">
        <tr>
            @if(isset($batches))
            <th>Select</th>
            @endif
            <th>Grip Batch</th>
            <th>Pcs</th>
            <th>Size</th>
            <th>Grip Color</th>
            <th>Grit</th>
            <th>Perforation</th>
            <th>Die Cut</th>
            <th>Top Print</th>
            <th>Backpaper</th>
            <th>Backpaper Print</th>
            <th>Carton Print</th>
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
            <td class="align-middle">Griptape Batch #{{++$batch}}</td>
            <td class="align-middle text-center">{{$grip->quantity}}</td>
            <td class="align-middle" title="{{$grip->size}}">{{$grip->size}}</td>
            <td class="align-middle text-center">{{$grip->color}}</td>
            <td class="align-middle text-center">{{$grip->grit}}</td>
            <td class="align-middle text-center">{{$grip->perforation ? 'Yes' : 'None'}}</td>
            <td class="align-middle text-center">{{$grip->die_cut}}</td>
            <td class="text-center" @if(isset($fees['top_print'][$grip->top_print]['paid']) && $fees['top_print'][$grip->top_print]['paid'] == 1) class="paid" @endif>
                {{$grip->top_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                {{$grip->top_print_color ?? ''}}
            </td>
            <td class="align-middle text-center">{{$grip->backpaper}}</td>
            <td  @if(isset($fees['backpaper_print'][$grip->backpaper_print]['paid']) && $fees['backpaper_print'][$grip->backpaper_print]['paid'] == 1) class="paid" @endif>
                {{$grip->backpaper_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                {{$grip->backpaper_print_color ?? ''}}
            </td>
            <td @if(isset($fees['carton_print'][$grip->carton_print]['paid']) && $fees['carton_print'][$grip->carton_print]['paid'] == 1) class="paid" @endif>
                {{$grip->carton_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                {{$grip->carton_print_color ?? ''}}
            </td>
            @if(!isset($batches))
            <td class="align-middle text-center">{{ auth()->check() ? money_format('%.2n', $grip->price) : '$?.??' }}</td>
            <td class="align-middle text-center">{{ auth()->check() ? money_format('%.2n', $grip->total) : '$?.??' }}</td>
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
                    <a class="m-btn btn btn-secondary" href="{{route('griptape.save', $grip->id)}}" title="Edit">
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

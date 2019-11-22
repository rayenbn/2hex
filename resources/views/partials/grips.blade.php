    <thead style="background-color: #52a3f0; color: white;">
        <tr>
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
            <th>Grip Price</th>
            <th>Batch&nbspTotal</th>

            @if(Session::get('viewonly') == null)
            <th>Edit</th>
            @endif

        </tr>
    </thead>
       @foreach($grips as $batch => $grip)

        <tr>
            <td>Griptape Batch #{{++$batch}}</td>
            <td>{{$grip->quantity}}</td>
            <td>{{$grip->size}}</td>
            <td>{{$grip->color}}</td>
            <td>{{$grip->grit}}</td>
            <td>{{$grip->perforation ? 'Yes' : 'None'}}</td>
            <td>{{$grip->die_cut}}</td>
            <td>
                {{$grip->top_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                {{$grip->top_print_color ?? ''}}
            </td>
            <td>{{$grip->backpaper}}</td>
            <td>
                {{$grip->backpaper_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                {{$grip->backpaper_print_color ?? ''}}
            </td>
            <td>
                {{$grip->carton_print ?? ''}}<br>
                <hr style="border-color: #f4f5f8; margin-left:-3px; margin-right:-5px;">
                <br>
                {{$grip->carton_print_color ?? ''}}
            </td>
            <td>{{ auth()->check() ? money_format('%.2n', $grip->price) : '$?.??' }}</td>
            <td>{{ auth()->check() ? money_format('%.2n', $grip->total) : '$?.??' }}</td>

            @if(Session::get('viewonly') == null)
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
                    <button type="button" class="m-btn btn btn-secondary btn-dev">
                        <i class="la la-floppy-o"></i>
                    </button>
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

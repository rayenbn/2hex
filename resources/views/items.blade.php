<table class="table table-striped- table-bordered table-hover table-checkable table-responsive table-sm">
  <thead style="background-color: #52a3f0; color: white;">
    <tr>
                      
      <th>Batch</th>
      <th>Pcs</th>
      <th>Size</th>
      <th>Concave</th>
      <th>Wood</th>
      <th>Glue</th>
      <th>Print</th>
      <th>Top Engravery</th>
      <th>Veneer Colors</th>
      <th>Specials</th>
      <th>Cardboard Wrap</th>
      <th>Carton Print</th>
      <th>Deck Price</th>
      <th>Batch Total</th>
    </tr>
  </thead>
              
  <tbody>
    <?php $total_price = 0; $total_qty = 0; ?>
    @foreach($orders as $order)
    <?php $total_price += $order->total; $total_qty += $order->quantity; ?>
    <tr>
      <td>1</td>
      <td>{{$order->quantity}}</td>
      <td>{{$order->size}}
                      </td>
      <td>{{$order->concave}}</td>
      <td>{{$order->wood}}</td>
      <td>{{$order->glue}}</td>
      <td>
          <b>Bottom </b>
          {{$order->bottomprint?$order->bottomprint:'None'}}<br>
          <b>Top </b>
          {{$order->topprint?$order->topprint:'None'}}
      </td>

      <td>{{$order->engravery?$order->engravery:'None'}}</td>
      <td>
          <ol style="padding-left:0; list-style-position:inside;">
            
          
            @foreach(json_decode($order->veneer) as $veneer)
              <li>{{$veneer}}</li>
              @endforeach 

          </ol>
      </td>
      <td>
        @foreach(json_decode($order->extra) as $index => $extra)
         @if($extra->state == true)
            {{$index}}{{isset($extra->color)?' : '.$extra->color:''}}<br>
           @endif
          @endforeach
      </td>
      <td>{{$order->cardboard?$order->cardboard:'None'}}</td>
      <td>{{$order->carton?$order->carton:'None'}}</td>
      <td>${{$order->perdeck}}</td>
      <td>${{$order->total}}</td>
    </tr>
    @endforeach                          
    <tr></tr>
    <tr></tr>
    <tr></tr>
                  
                  
    <thead style="background-color: #52a3f0; color: white;">
      <tr>
        <td colspan="3">Fixed Cost</td>
        <td colspan="3">Batches</td>
        <td colspan="7">Filename</td>
        <td>Fixed Total</td>
      </tr>
     </thead>
                  
                  <tr>
      <td colspan="3">Bottom Print</td>
      <td colspan="3">1, 2, 3</td>
      <td colspan="7">supermanV2.ai</td>
      <td>$120.00</td>
    </tr>
                  <tr>
      <td colspan="3">Delivery</td>
      <td colspan="3">All</td>
      <td colspan="7">Global Delivery</td>
      <td>$800.00</td>
    </tr>
  <tr>
    <td colspan="14"></td>
  </tr>

                  
                  
                  
                  
  </tbody>
</table>
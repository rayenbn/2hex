<script>

	$(document).ready(function(){
		@if(isset($saved_order))
			@foreach($saved_order as $order)

				$('#saved_order_id').val({{$order->id}});

				app.quantity =decodeHTML("{{$order->quantity}}");
				app.size = decodeHTML("{{$order->size}}");
				app.concave =decodeHTML("{{$order->concave}}");
				if(app.concave == "Deep Concave")
					app.steps[1].state = true;
				else
					app.steps[1].state = false;

				app.wood = decodeHTML("{{$order->wood}}");
				if(app.wood == "European Maple Wood")
					app.steps[2].state = true;
				else
					app.steps[2].state = false;

				app.glue = decodeHTML("{{$order->glue}}");
				if(app.glue == "American Glue")
					app.steps[3].state = true;
				else
					app.steps[3].state = false;

				app.bottomprint = decodeHTML("{{$order->bottomprint}}");
				if(app.bottomprint != "")
					app.steps[4].state = true;
				else
					app.steps[4].state = false;

				app.topprint = decodeHTML("{{$order->topprint}}");
				if(app.topprint != "")
					app.steps[5].state = true;
				else
					app.steps[5].state = false;

				app.engravery = decodeHTML("{{$order->engravery}}");
				if(app.engravery != "")
					app.steps[6].state = true;
				else
					app.steps[6].state = false;

				app.currentColors = JSON.parse(decodeHTML("{{$order->veneer}}"));

				app.steps[8] =JSON.parse(decodeHTML("{{$order->extra}}"));

				app.cardboard =decodeHTML("{{$order->cardboard}}");
				if(app.cardboard != "")
					app.steps[9].state = true;
				else
					app.steps[9].state = false;

				app.carton =decodeHTML("{{$order->carton}}");
				if(app.carton != "")
					app.steps[9].state = true;
				else
					app.steps[9].state = false;

				app.perdeck = +decodeHTML("{{$order->perdeck}}");
				app.total = +decodeHTML("{{$order->total}}");
				
				debugger;
			@endforeach
		@endif
	});

	function decodeHTML(encodedStr){
		var parser = new DOMParser;
		var dom = parser.parseFromString(
		    '<!doctype html><body>' + encodedStr,
		    'text/html');
		var decodedString = dom.body.textContent;

		return decodedString;
	}
</script>
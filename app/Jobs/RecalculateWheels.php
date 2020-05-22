<?php

namespace App\Jobs;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Wheel\{Wheel, Type, Shape, ShapeSize, HardnessPrice, Hardness};
use App\Models\Option;

class RecalculateWheels implements Orderable
{
	/**
	 * Collection $items
	 *
	 * @var Collection $items 
	 */
	protected $items;

	/**
	 * Total sum of the wheels
	 *
	 * @var float $totalSum 
	 */
	protected $totalSum = 0;

	/**
	 * Total sum of the wheels
	 *
	 * @var float $totalQuantity 
	 */
	protected $totalQuantity = 0;

	/**
	 * Total sum of the wheels
	 *
	 * @var float $total
	 */
	protected $total = 0;

	/**
	 * Per set
	 *
	 * @var float $perSet
	 */
	protected $perSet = 0.0;

	/**
	 * All hargnesses
	 *
	 * @var Collection $hardnesses
	 */
	protected $hardnesses;

	/**
	 * All shapes
	 *
	 * @var Collection $shapes
	 */
	protected $shapes;

	/**
	 * All types
	 *
	 * @var Collection $types
	 */
	protected $types;

	/**
	 * Fix cost
	 *
	 * @var float $fixCost
	 */
	protected $fixCost = 0.0; 

	/**	
	 * RecalculateWheels constructor
	 *
	 * @param Collection $items Collection of wheels
	 *
	 * @return void
	 */
	public function __construct(Collection $items)
	{
		$this->items = $items;
	}

	/**	
	 * Set total sum
	 *
	 * @param float $total Total sum of the session
	 *
	 * @return RecalculateWheels
	 */
	public function setTotalSum(float $total) : RecalculateWheels
	{
		$this->totalSum = $total;

		return $this;
	}

	/**	
	 * Set total quantity
	 *
	 * @param float $total Total sum quantity of the session
	 *
	 * @return RecalculateWheels
	 */
	public function setTotalQuantity(float $total) : RecalculateWheels
	{
		$this->totalQuantity = $total;

		return $this;
	}

	/**	
	 * Recalculate wheels
	 *
	 * @return void
	 */
	public function recalculate()
	{
		if ($this->items->count() == false) {
			// skip if wheels not found in order
			return;
		}

		$this->loadDependencies();

		/** @var Collection|Option[] $options All options of wheels */
		$options = Option::query()->where('option_name', 'like', 'wheel%')->get();
		$colorPrice = (float) $options->where('option_name', 'wheel_color_price')->first()->option_value;
		$colorProfit = (float) $options->where('option_name', 'wheel_color_profit_margin')->first()->option_value;
		$cartonPrice = (float) $options->where('option_name', 'wheel_carton_price')->first()->option_value;
		$cartonFixCost = (float) $options->where('option_name', 'wheel_carton_fix_cost')->first()->option_value;
		// Profit margin for type
		$profitMargin = (float) $options->where('option_name', 'wheel_profit_margin')->first()->option_value;
		$shapeFixCost = (float) $options->where('option_name', 'wheel_shape_fix_cost')->first()->option_value;
		$colorFixCost = (float) $options->where('option_name', 'wheel_color_fix_cost')->first()->option_value;
		$cardboardPrice = (float) $options->where('option_name', 'wheel_cardboard_price')->first()->option_value;
		$cardboardFixCost = (float) $options->where('option_name', 'wheel_cardboard_fix_cost')->first()->option_value;

		// total wheels quantity of the session
		$quantitySum = (int) $this->items->sum('quantity');

		// Base Price per set
		// $basePrice = (float) $options->where('option_name', 'wheel_base_price')
		// 	->first()
		// 	->option_value;

		$perSetPrice = 0;

		foreach ($this->items as $key => $wheel) {

			$this->fixCost = 0;

			$perSetPrice = $this->perSet 
				// + $basePrice 
				+ $this->getTypePrice($wheel->type, $profitMargin) 
				+ $this->getHardnessPrice($wheel, $shapeFixCost)
				+ $this->getFrontPrintPrice($wheel, $colorPrice, $colorProfit, $colorFixCost)
				+ $this->getBackPrintPrice($wheel, $colorPrice, $colorProfit, $colorFixCost)
				+ $this->getPlacementPrice($wheel->placement)
				+ $this->getCardboardPrice($wheel->quantity, $cardboardPrice, $cardboardFixCost, $wheel->cardboard_print)
				+ $this->getCartonPrice($cartonPrice, $cartonFixCost, $wheel->carton_print);

			// Update recalculated wheel
			$wheel->update([
				'price' => round($perSetPrice, 2),
				'total' => round($wheel->quantity * $perSetPrice, 2),
				'fix_cost' => $this->fixCost
			]);
		}
	}

	/**	
	 * Load dependencies
	 *
	 * @return void
	 */
	protected function loadDependencies() : void
	{
		$this->perSet = $this->calculatePerSet();

		/** @var Collection $types All types of wheel */
		$this->types = Type::all();
		/** @var Collection|Shape[] $shapes Shapes of the wheels */
		$this->shapes = Shape::query()->whereIn('name', $this->items->pluck('shape'))->get();

		/** @var Collection|Hardness[] $hardnesses Hardnesses of the wheels */
		$this->hardnesses = Hardness::query()->get();
	}

	/**	
	 * Get cardboard price
	 *
	 * @param int $totalQuantity
	 * @param float $cardboardPrice
	 * @param float $cardboardFixCost
	 *
	 * @return float
	 */
	protected function getCardboardPrice(
		int $quantity, 
		float $cardboardPrice, 
		float $cardboardFixCost,
		?string $cardboard = null
	) : float {

		if (empty($cardboard)) {
			return 0;
		}

		$this->fixCost += ($cardboardFixCost - ($cardboardPrice * intval($quantity)));

		return $cardboardPrice;
	}

	/**	
	 * Get type price of the wheel
	 *
	 * @param string $type Type of the wheel
	 *
	 * @return float
	 */
	protected function getTypePrice(string $type, $profitMargin) : float
	{
		/** @var Type $type Type of the wheel */
		$type = $this->types->where('name', '=', $type)->first();

		$typePrice = $type->price * $profitMargin;

		return $typePrice;
	}

	/**	
	 * Get front print price of the wheel
	 *
	 * @param Wheel $wheel
	 * @param float $colorPrice
	 * @param float $colorProfit
	 * @param float $colorFixCost
	 *
	 * @return float
	 */
	protected function getFrontPrintPrice(
		Wheel $wheel, 
		float $colorPrice = 0.0, 
		float $colorProfit = 0.0,
		float $colorFixCost = 0.0
	) : float {

		if (empty($wheel->top_print)) {
			return 0;
		}
		if(!isset($wheel->top_colors))
			$countColors = 4;
		else
			$countColors = $this->parseColors($wheel->top_colors);

		$this->fixCost += $countColors * $colorFixCost * $colorProfit;

		$frontPrice = $countColors  * $colorPrice * $colorProfit;

		return $frontPrice;
	}

	/**	
	 * Get back print price of the wheel
	 *
	 * @param Wheel $wheel
	 * @param float $colorPrice
	 * @param float $colorProfit
	 * @param float $colorFixCost
	 *
	 * @return float
	 */
	protected function getBackPrintPrice(
		Wheel $wheel, 
		float $colorPrice = 0.0, 
		float $colorProfit = 0.0,
		float $colorFixCost = 0.0
	) : float {

		if (empty($wheel->back_print)) {
			return 0;
		}
		if(!isset($wheel->back_colors))
			$countColors = 4;
		else
			$countColors = $this->parseColors($wheel->back_colors);

		// Add if dont same as front of wheel and exists back print
		if ($wheel->top_print != $wheel->back_print && isset($wheel->back_print)) {
			$this->fixCost += $countColors * $colorFixCost * $colorProfit;
		}

		$backPrice = $countColors * $colorPrice * $colorProfit;

		return $backPrice;
	}

	/**	
	 * Parse string colors to digit
	 *
	 * @param string $colors Colors of the wheel
	 *
	 * @return int
	 */
	protected function parseColors(string $colors) : int
	{
		$countColors = preg_replace('~\D~i', '', $colors);

		if (empty($countColors)) {
			// CMYK
			$countColors = 4;
		} else {
			$countColors = (int) $countColors;
		}

		return $countColors;
	}

	/**	
	 * Get palacement price of the wheel
	 *
	 * @param string $placement
	 *
	 * @return float
	 */
	protected function getPlacementPrice(string $placement) : float
	{
		if ($placement == Wheel::PLACEMENT_SQUARE) {
			return 0;

		} else if ($placement == Wheel::PLACEMENT_ROLL) {
			return 0.05;

		} else if ($placement == Wheel::PLACEMENT_LINE) {
			return 0.08;

		} else {
			return 0.08;
		}
	}

	/**	
	 * Get carton price of the wheel
	 *
	 * @param float 	  $cartonPrice
	 * @param float 	  $cartonFixCost
	 * @param string|null $carton
	 *
	 * @return float
	 */
	protected function getCartonPrice(float $cartonPrice, float $cartonFixCost, ?string $carton = null) : float
	{
		if (empty($carton)) {
			return 0;
		}

		$this->fixCost += $cartonFixCost;

		return $cartonPrice;
	}

	/**	
	 * Get hardness
	 *
	 * @param string $wheelHardness
	 * @param bool 	 $isSHR
	 *
	 * @return Hardness
	 */
	protected function getHardness($wheelHardness, $isSHR = false) : Hardness
	{
		preg_match('~([0-9]+)([a-zA-Z]+)~i', $wheelHardness, $hardness);

		$hardnessNum = (int) $hardness[1];

		if ($isSHR == true) {
				
			if ($hardnessNum >= 83 && $hardnessNum <= 84 && $hardness[2] == 'B') {
				// 83-84B
				$hardness = $this->hardnesses->get(4);
			} else {
				// 101 - 102A SHR
				$hardness = $this->hardnesses->get(3);
			}
		} else {
			if ($hardnessNum <= 94 && $hardness[2] == 'A') {
				// 90-94A
				$hardness = $this->hardnesses->get(0);
			} else if ($hardnessNum == 95 && $hardness[2] == 'A') {
				// 95A
				$hardness = $this->hardnesses->get(1);

			} else if ($hardnessNum > 95 && $hardnessNum <= 100 && $hardness[2] == 'A') {
				// 96A - 100A
				$hardness = $this->hardnesses->get(2);

			} else if ($hardnessNum > 100 && $hardnessNum <= 102 && $hardness[2] == 'A') {
				// 101- 102A SHR
				$hardness = $this->hardnesses->get(3);

			} else if ($hardnessNum >= 83 && $hardness[2] == 'B') {
				// 83-84B SHR
				$hardness = $this->hardnesses->get(4);
			} else {
				// 101 - 102A SHR
				$hardness = $this->hardnesses->get(3);
			}
		}

		return $hardness;
	}

	/**	
	 * Get hardness price of the wheel
	 *
	 * @param Wheel $wheel
	 * @param float $shapeFixCost
	 *
	 * @return float
	 */
	protected function getHardnessPrice(Wheel $wheel, $shapeFixCost = 0.0) : float
	{
		/** @var Shape $shape Shape of the wheel */
		$shape = $this->shapes->where('name', '=', $wheel->shape)->first();

		// Plus shape cost, if shape is custom
		if ($shape->is_custom == true) {
			$this->fixCost += $shapeFixCost;
		}

		/** @var ShapeSize $shapeSizes Size of the wheel shape */
		$shapeSize = ShapeSize::query()
			->where('size', '=', $wheel->size)
			->where('shape_id', '=', $shape->shape_id)
			->first();
		
		if(!$shapeSize){
			return (float) 0;
		}
		
		/** @var Hardness $hardness*/	
		$hardness = $this->getHardness($wheel->hardness, $wheel->is_shr);

		/** @var HardnessPrice $hardness */
		$hardnessPrice = HardnessPrice::query()
			->where('size_id', '=', $shapeSize->size_id)
			->where('hardness_id', '=', $hardness->hardness_id)
			->first();

		return (float) $hardnessPrice->price;
	}

	/**
	 * Calculate Per Set for wheels
	 *
	 * @return float
	 */
	protected function calculatePerSet() : float
	{
		if ($this->totalSum < 1170) {

			if ($this->totalQuantity < 600) {
				$this->perSet = 1.55;
			} else if ($this->totalQuantity >= 600 && $this->totalQuantity < 900) {
				$this->perSet = 1;
			} else if ($this->totalQuantity >= 900 && $this->totalQuantity < 1200) {
				$this->perSet = 1;
			} else if ($this->totalQuantity >= 1200 && $this->totalQuantity < 1900) {
				$this->perSet = 1;
			} else if ($this->totalQuantity >= 1900) {
				$this->perSet = 1;
			}

		} else if ($this->totalSum >= 1170 && $this->totalSum < 3000) {

			if ($this->totalQuantity < 600) {
				$this->perSet = 1.5;
			} else if ($this->totalQuantity >= 600 && $this->totalQuantity < 900) {
				$this->perSet = 1.2;
			} else if ($this->totalQuantity >= 900 && $this->totalQuantity < 1200) {
				$this->perSet = 1.1;
			} else if ($this->totalQuantity >= 1200 && $this->totalQuantity < 1900) {
				$this->perSet = 0.94;
			} else if ($this->totalQuantity >= 1900) {
				$this->perSet = 0.94;
			}

		} else if ($this->totalSum >= 3000 && $this->totalSum < 6000) {

			if ($this->totalQuantity < 600) {
				$this->perSet = 1.4;
			} else if ($this->totalQuantity >= 600 && $this->totalQuantity < 900) {
				$this->perSet = 1;
			} else if ($this->totalQuantity >= 900 && $this->totalQuantity < 1200) {
				$this->perSet = 1;
			} else if ($this->totalQuantity >= 1200 && $this->totalQuantity < 1900) {
				$this->perSet = 0.93;
			} else if ($this->totalQuantity >= 1900) {
				$this->perSet = 0.7;
			}

		} else if ($this->totalSum >= 6000 && $this->totalSum < 8000) {

			if ($this->totalQuantity < 600) {
				$this->perSet = 1.2;
			} else if ($this->totalQuantity >= 600 && $this->totalQuantity < 900) {
				$this->perSet = 0.7;
			} else if ($this->totalQuantity >= 900 && $this->totalQuantity < 1200) {
				$this->perSet = 0.7;
			} else if ($this->totalQuantity >= 1200 && $this->totalQuantity < 1900) {
				$this->perSet = 0.65;
			} else if ($this->totalQuantity >= 1900) {
				$this->perSet = 0.6;
			}

		} else if ($this->totalSum >= 8000 && $this->totalSum < 12000) {

			if ($this->totalQuantity < 600) {
				$this->perSet = 1.1;
			} else if ($this->totalQuantity >= 600 && $this->totalQuantity < 900) {
				$this->perSet = 0.65;
			} else if ($this->totalQuantity >= 900 && $this->totalQuantity < 1200) {
				$this->perSet = 0.45;
			} else if ($this->totalQuantity >= 1200 && $this->totalQuantity < 1900) {
				$this->perSet = 0.45;
			} else if ($this->totalQuantity >= 1900) {
				$this->perSet = 0.45;
			}

		} else if ($this->totalSum >= 12000 && $this->totalSum < 20000) {

			if ($this->totalQuantity < 600) {
				$this->perSet = 1;
			} else if ($this->totalQuantity >= 600 && $this->totalQuantity < 900) {
				$this->perSet = 0.6;
			} else if ($this->totalQuantity >= 900 && $this->totalQuantity < 1200) {
				$this->perSet = 0.35;
			} else if ($this->totalQuantity >= 1200 && $this->totalQuantity < 1900) {
				$this->perSet = 0.35;
			} else if ($this->totalQuantity >= 1900) {
				$this->perSet = 0.3;
			}

		} else if ($this->totalSum >= 20000 && $this->totalSum < 30000) {

			if ($this->totalQuantity < 600) {
				$this->perSet = 0.9;
			} else if ($this->totalQuantity >= 600 && $this->totalQuantity < 900) {
				$this->perSet = 0.55;
			} else if ($this->totalQuantity >= 900 && $this->totalQuantity < 1200) {
				$this->perSet = 0.33;
			} else if ($this->totalQuantity >= 1200 && $this->totalQuantity < 1900) {
				$this->perSet = 0.33;
			} else if ($this->totalQuantity >= 1900) {
				$this->perSet = 0.27;
			}

		} else if ($this->totalSum >= 30000 ) {

			if ($this->totalQuantity < 600) {
				$this->perSet = 0.8;
			} else if ($this->totalQuantity >= 600 && $this->totalQuantity < 900) {
				$this->perSet = 0.5;
			} else if ($this->totalQuantity >= 900 && $this->totalQuantity < 1200) {
				$this->perSet = 0.33;
			} else if ($this->totalQuantity >= 1200 && $this->totalQuantity < 1900) {
				$this->perSet = 0.33;
			} else if ($this->totalQuantity >= 1900) {
				$this->perSet = 0.25;
			}

		}

		return $this->perSet;
	}
}
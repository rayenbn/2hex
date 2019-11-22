<?php

namespace App\Jobs;

interface Orderable
{
	/**	
	 * Recalculate items
	 */
	public function recalculate();
}
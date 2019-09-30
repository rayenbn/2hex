<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

class ConfiguratorService
{
    /**	
     * Get orders info for session user
     *
     * @return array
     */
    public static function getOrdersInfo() : array
    {
    	$authId = auth()->id();

    	$auth = (string) $authId ? $authId : csrf_token();

    	$bindings = array_fill(0, 3, $auth);

    	$result = (array) \DB::select(\DB::raw('
	    	SELECT IFNULL(SUM(t.total), 0) AS total, IFNULL(SUM(t.quantity), 0) AS quantity
			FROM (
			  SELECT total, quantity FROM grip_tapes WHERE created_by = ? AND usenow = 1
			  UNION ALL
			  SELECT total, quantity FROM orders WHERE created_by = ? AND usenow = 1
			  UNION ALL
			  SELECT total, quantity FROM wheels WHERE created_by = ? AND usenow = 1) t
			LIMIT 1
		'), $bindings)[0];

		return [
			$result['total'],
			$result['quantity']
		];
    }
}

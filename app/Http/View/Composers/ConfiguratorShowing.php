<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Collection;
use App\Models\Auth\User;

class ConfiguratorShowing
{
	/**
	 * @var Collection $compose
	 */
	protected $compose;

	/**
	 * @var array $bindings
	 */
	protected $bindings = [
		'setOrdersInfo',
    	'setAuthUser'
	];

	/**
	 * @var User|null $authUser
	 */
	protected $authUser;

	/**
     * ConfiguratorShowing constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->compose = collect([]);
        $this->authUser = auth()->user();
    }


	/**
     * Bind data to the view.
     *
     * @param  View  $view
     *
     * @return void
     */
    public function compose(View $view)
    {
    	foreach ($this->bindings as $method) {
    		$this->$method();
    	}

        $view->with($this->compose->toArray());
    }

    /**	
     * Set info for session user
     *
     * @return static
     */
    protected function setOrdersInfo()
    {
    	$auth = (string) $this->authUser ? $this->authUser->id : csrf_token();

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

    	$this->compose->put('totalSum', $result['total']);
    	$this->compose->put('quantityTotal', $result['quantity']);

    	return $this;
    }

    /**	
     * Bind auth user
     *
     * @return static
     */
    protected function setAuthUser()
    {
    	$this->compose->put('authUser', $this->authUser);

    	return $this;
    }
}
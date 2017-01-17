<?php

/**
 *
 * @author Bruno Silva
 * @license MIT Licence
 * @link https://github.com/brunoosilvas/icelus
 *
 */

namespace icelus\orm\type;

use icelus\orm\type\Generic;

class Date extends Generic {

	private $timezone;		
	
	public function __construct($value = null, $timezone = null) {
		$this->value = null;
		$this->timezone = $timezone;
		
		$this->isValid($value);
	}
	
	public function value() {
		return $this->value;
	}
	
	public function isValid($value) {
		try {
			$this->value = new \DateTime($value, new \DateTimeZone($this->timezone));
		} catch (\Exception $e) {
			throw new \ErrorException($e->getMessage());			
		}
	}
	
	public static function now($pattern) {
		$now = new \DateTime("NOW", new \DateTimeZone($this->timezone));
		return $now->format($pattern);
	}
	
	public function format($pattern) {
		return $this->value()->format($pattern);
	}
	
	public function compare(Type $type) {
		$this->compareIsValid($type);
		
		$pattern = "Y-m-d H:i:s";
		$compare = 0;
		if ($this->format($pattern) < $type->format($pattern))
			$compare = -1;
		else if ($this->format($pattern) == $type->format($pattern))
			$compare = 0;
		else if ($this->format($pattern) > $type->format($pattern))
			$compare = 1;
		
		return $compare;
	}	
	
	public function addDays($days = 0) {
		$days = "P{$days}D";
		$this->value()->add(new \DateInterval($days));
	}
	
	public function removeDays($days = 0) {
		$days = "P{$days}D";
		$this->value()->sub(new \DateInterval($days));
	}
		
	public function addMonth($months = 0) {
		$months = "P{$months}M";
		$this->value()->add(new \DateInterval($months));
	}
	
	public function removeMonth($months = 0) {
		$months = "P{$months}M";
		$this->value()->sub(new \DateInterval($months));
	}
	
	public function addYears($years = 0) {
		$years = "P{$years}Y";
		$this->value()->add(new \DateInterval($years));
	}
	
	public function removeYears($years = 0) {
		$years = "P{$years}Y";
		$this->value()->sub(new \DateInterval($years));
	}
	
	public function difference(Type $type) {
		$this->compareIsValid($type);
		
		$timestampOne = $this->timestamp();		
		$timestampSecond = $type->timestamp();
		
		$difference = $timestampOne - $timestampSecond;
		$difference = $difference / (60 * 60 * 24);
		$difference = abs($difference);
		$difference = floor($difference);
		
		return $difference;
	}
	
	public function timestamp() {
		$timestamp = mktime((int) $this->value()->format("H"),
				(int) $this->value()->format("i"),
				(int) $this->value()->format("s"),
				(int) $this->value()->format("m"),
				(int) $this->value()->format("d"),
				(int) $this->value()->format("Y"));
		
		return $timestamp;
	}
}
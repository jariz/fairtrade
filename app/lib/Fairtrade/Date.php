<?php


namespace Fairtrade;

class Date{

	const FORMAT_USER = 'd-m-Y H:i:s';
	const FORMAT_DB   = 'Y-m-d H:i:s';
	public $date      = NULL;

	public function __construct( $date ){
		$this->date = $date;
	}


	/**
	 * Set the input which needs to be formatted
	 * @author  Dmitri Chebotarev
	 * @param  string $date - Timestamp
	 * @return Date - returns itself for method chaining
	 */
	public static function input( $date ){
		return new self( $date );
	}


	public function createDateObject($input_format = 'Y-m-d H:i:s'){

		$dateObject = \DateTime::createFromFormat( $input_format, $this->date );

		/* Something went wrong */
		if( !$dateObject ){
			return false;
		}

		return $dateObject;
	}

	public function forHuman( $length = 'full' ){

		$object = $this->createDateObject( self::FORMAT_DB );
		$data = $this->getValues($object);

		if(!$data){
			return NULL;
		}


		$data['month'] = $this->getMonthName($data['month'], false, false);


		return $data['day']. ' '.$data['month'] .' ' .$data['year'].' '.$data['time'];
	}

	public function getValues( $object ){
		if( !$object ){
			return false;
		}

		$data = [
			'day'   => $object->format('d'),
			'month' => $object->format('m'),
			'year'  => $object->format('Y'),
			'time'  => $object->format('H:i:s')
		];

		return $data;

	}


	public function forDatabase(){
		$object = $this->createDateObject( self::FORMAT_USER );
		return $object->format( self::FORMAT_DB );
	}

	public static function getMonthName($month, $short = false, $capital_letter = false){

		// Voorste 0 weghalen
		$month      = ltrim( $month, '0' );	
		$return     = null;
		$name       = null;
		$short_name = null;

		switch ($month) {
			case '1': 	$name = 'januari'; 		$short_name = 'jan'; break;
			case '2': 	$name = 'februari'; 	$short_name = 'feb'; break;
			case '3': 	$name = 'maart'; 		$short_name = 'mrt'; break;
			case '4': 	$name = 'april';		$short_name = 'apr'; break;
			case '5': 	$name = 'mei'; 			$short_name = 'mei'; break;
			case '6': 	$name = 'juni'; 		$short_name = 'jun'; break;
			case '7': 	$name = 'juli'; 		$short_name = 'jul'; break;
			case '8': 	$name = 'augustus'; 	$short_name = 'aug'; break;
			case '9': 	$name = 'september'; 	$short_name = 'sep'; break;
			case '10': 	$name = 'oktober'; 		$short_name = 'okt'; break;
			case '11': 	$name = 'november'; 	$short_name = 'nov'; break;
			case '12': 	$name = 'december'; 	$short_name = 'dec'; break;			
		}

		$return = $name;

		if($short){
			$return = $short_name;
		}

		if($capital_letter === true){
			$return = ucfirst($return);
		}

		return $return;
	}

}
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



	/**
	 * Create php DateTime object from the input date
	 * @author  Dmitri Chebotarev
	 * @param  string $input_format - the format of the input date
	 * @return \DateTime
	 */
	public function createDateObject($input_format = 'Y-m-d H:i:s'){

		$dateObject = \DateTime::createFromFormat( $input_format, $this->date );

		/* Something went wrong */
		if( !$dateObject ){
			return false;
		}

		return $dateObject;
	}

	/**
	 * Format the date to a better readable format for humans
	 * @author  Dmitri Chebotarev
	 * @param  string $length - Display month, can be either Full or Short
	 * @return [type][description]
	 */
	public function forHuman( $length = 'full' ){

		$object = $this->createDateObject( self::FORMAT_DB );
		$data = $this->getValues($object);

		if(!$data){
			return NULL;
		}


		$data['month'] = $this->getMonthName($data['month'], false, false);


		return $data['day']. ' '.$data['month'] .' ' .$data['year'].' '.$data['time'];
	}

	/**
	 * Convert DateTime object to array to modify the values
	 * @author  Dmitri Chebotarev
	 * @param  \DateTime $object
	 * @return mixed - returns array with values. On fail returns boolean false.
	 */
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


	/**
	 * Convert the input date to a timestamp usable in DB.
	 * NOTE: Input date format must match FORMAT_USER constant
	 * @author  Dmitri Chebotarev
	 * @return string - Formatted date
	 */
	public function forDatabase(){
		$object = $this->createDateObject( self::FORMAT_USER );
		return $object->format( self::FORMAT_DB );
	}


	/**
	 * Get the month name by integer
	 * @author  Dmitri Chebotarev
	 * @param  string  $month          - Month number
	 * @param  boolean $short          - Display month short (true or false)
	 * @param  boolean $capital_letter - First letter of month capital (true or false)
	 * @return string - Month name in Dutch
	 */
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

    public function forFrontEnd(){
        $object = $this->createDateObject( self::FORMAT_DB );

        if( is_object($object)){
            return $object->format( self::FORMAT_USER );
        }
        return NULL;
    }


    public static function validInputDateFormat( $string ){
       return is_object( \DateTime::createFromFormat(self::FORMAT_USER, $string ) );
    }

}
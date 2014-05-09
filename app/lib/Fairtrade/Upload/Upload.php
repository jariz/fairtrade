<?php
namespace Fairtrade\Upload;
use Image, Input, Validator, File, Str;

class Upload{

	/**
	 * Will hold the name of the file input
	 * @author Dmitri Chebotrev
	 * @var string
	 */
	protected $input = false;

	/**
	 * Will hold the max allowed dimensions for the upload files
	 * @author Dmitri Chebotarev
	 * @var array
	 */
	protected $max_dimensions = [
		'width'  => NULL,
		'height' => NULL
	];

	/**
	 * Path of the upload directory
	 * @author Dmitri Chebotarev
	 * @var string
	 */
	protected $path = 'uploads/test';

	/**
	 * Stores the error message
	 * @author Dmitri Chebotarev
	 * @var string
	 */
	private $error = NULL;

	/**
	 * Holds the new filename of the upload file
	 * @author Dmitri Chebotarev
	 * @var string
	 */
	private $filename = NULL;

	/**
	 * Holds the original file extension
	 * @var string
	 * @author Dmitri Chebotarev
	 */
	private $ext = NULL;

	/**
	 * Indicates that the file is missing
	 * @constant ERROR_FILE_MISSING
	 * @author Dmitri Chebotarev
	 */
	const ERROR_FILE_MISSING       = 0;

	/**
	 * Indicates that the no image data could be retrieved from the file
	 * @constant ERROR_NO_DATA
	 * @author Dmitri Chebotarev
	 */
	const ERROR_NO_DATA            = 1;

	/**
	 * Indicates that the width of the file is past the maximum allowed
	 * @constant ERROR_MAX_WIDTH_REACHED
	 * @author Dmitri Chebotarev
	 */
	const ERROR_MAX_WIDTH_REACHED  = 2;

	/**
	 * Indicates that the height of the file is past the maximum allowed
	 * @constant ERROR_MAX_HEIGHT_REACHED
	 * @author Dmitri Chebotarev
	 */
	const ERROR_MAX_HEIGHT_REACHED = 3;

	/**
	 * Indicaties that something happend of which we don't need to inform the user in detail
	 * @constant ERROR_UNKNOWN
	 * @author Dmitri Chebotarev
	 */
	const ERROR_UNKNOWN            = 4;

	/**
	 * Array of the error messages
	 * @var array
	 * @author Dmitri Chebotarev
	 */
	private $error_messages = [

		'file_missing' => 'Er is geen bestand geupload',
		'no_data'      => 'Er ging iets fout tijdens het uploaden',
		'max_width'    => 'Het plaatje is te breed. Maximaal :pixels pixels toegestaan.',
		'max_heigth'   => 'Het plaatje is te hoog. Maximaal :pixels pixels toegestaan.',
		'unknown'      => 'Er is een onbekende fout opgetreden'

	];

    private $error_code = false;

    /*
     * indicates if thumbnail must be created
     * @author Dmitri Chebotarev
     * @var bool
     */
    private $thumbnail = false;


    /**
     * Set the dimensions of the Thumbnail
     * @author Dmitri Chebotarev
     * @var array
     */
    private $thumbnailDimensions = [
         'width' => NULL,
         'height' => NULL
    ];

	/**
	 * Init the upload class with the input name as string
	 * @param string $input_name - Name of the input field
	 * @author Dmitri Chebotarev
	 * @return Upload
	 */
	public function __construct( $input = NULL ){
		
		if( is_array($input) ){
			$this->multi = true;
		}
		
		$this->input = $input;
		
		return $this;
	}

	/**
	 * Set the name of the upload file
	 * @author Dmitri Chebotarev
	 * @param string $name - The new filename
	 */
	public function setFileName( $name ){
		if(is_string( $name ) ){
			$this->filename = Str::slug( $name );
		}

		return $this;
	}

	/**
	 * Set the max dimensions for the uploads in pixels
	 * @param mixed $max_width - Max width in pixels or NULL for no limit
	 * @param mixed $max_heigth - Max height in pixels or NULL for no limit
	 * @author Dmitri Chebotarev
	 * @return Upload
	 */
	public function setMaxSize($max_width = NULL, $max_heigth = NULL){

		if(is_integer($max_width)){
			$this->max_dimensions['width'] = $max_width;
		}

		if(is_integer($max_heigth)){
			$this->max_dimensions['height'] = $max_heigth;
		}

		return $this;
	}
	
	/**
	 * Check if everything is correct, before uploading
	 * @return boolean - Validation status
	 */
	protected function valid(){


		// Laravel Validation
		$file = Input::file( $this->input );
		$rules = [ $this->input => 'image|mimes:jpeg,gif,png' ];
		
		$messages = [
			$this->input.'.image' => 'Het bestand dat u probeerde te uploaden is geen geldige afbeelding',
			$this->input.'.mimes' => 'Deze bestandsextensie wordt niet ondersteund'
		];

		$validation = Validator::make(Input::all(), $rules, $messages);

		if( $validation->fails() ){
			$this->setError( $validation->messages()->first( $this->input ) );
			return false;
		}



		if( is_null( $file) || $file->getSize() === false){
			/* The file could also be too large, tested with 3.24 MB file */
			$this->errorCode( self::ERROR_FILE_MISSING );
			return false;
		}

		$this->setExtension( $file );

		/* Just to make sure no errors will be shown in production environment */
		$data = @getImageSize( $file );

		if( !$data ){
			$this->errorCode( self::ERROR_NO_DATA );
			return false;
		}

	 	/* Check MAX-WIDTH */
	 	if( is_integer( $this->max_dimensions['width']) ){

	 		if( $data[0] > $this->max_dimensions['width'] ){
	 			$this->errorCode( self::ERROR_MAX_WIDTH_REACHED );
	 			return false;
	 		}

	 	}

	 	/* Check MAX-HEIGHT */
	 	if( is_integer( $this->max_dimensions['height']) ){

	 		if( $data[1] > $this->max_dimensions['height'] ){
	 			
	 			$this->errorCode( self::ERROR_MAX_HEIGHT_REACHED );
	 			return false;
	 		}

	 	}



	 	// Check for existince
	 	if( is_null( $this->filename ) || $this->exists($this->filename)){
	 		$this->randomFilename();
	 	}

	 	return true;
	}


	/**
	 * Generate a random filename that doesn't exists yet
	 * @author Dmitri Chebotarev
	 */
	private function randomFilename(){
		$filename = str_random(30);
		
		while( $this->exists($filename) ){
			$this->randomFilename();
		}

		$this->filename = $filename;
	}

	/**
	 * Checks if a file with the same name exists
	 * @author Dmitri Chebotarev
	 * @return boolean
	 */
	protected function exists( $filename ){

		if( File::exists( $this->path.'/'.$filename. '.'.$this->ext ) ){
			return true;
		}

		return false;
	}

	/**
	 * Get extension of the uploaded file
	 * @author Dmitri Chebotarev
	 * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file [description]
	 */
	private function setExtension( \Symfony\Component\HttpFoundation\File\UploadedFile $file ){
		if( !is_null($file) ){
			$this->ext = $file->getClientOriginalExtension();
		}
	}

	/**
	 * Set error by message
	 * @param string $message - A string containing the message
	 * @author Dmitri Chebotarev
	 */
	protected function setError($message = NULL){
		if(is_string($message)){
			$this->error = $message;
		}
	}


	/**
	 * Set error by error code
	 * @param  integer $error_code - An existing error code
	 * @author Dmitri Chebotarev
	 */
	protected function errorCode( $error_code ){
        $this->error_code = $error_code;
		switch ($error_code) {

			case self::ERROR_FILE_MISSING:
				$this->error = $this->error_messages['file_missing'];
			break;

			case self::ERROR_NO_DATA:
				$this->error = $this->error_messages['no_data'];
			break;

			case self::ERROR_MAX_WIDTH_REACHED:
				$this->error = $this->errorArgument( 'max_width', ':pixels', $this->max_dimensions['width'] );
			break;

			case self::ERROR_MAX_HEIGHT_REACHED:
				$this->error = $this->errorArgument( 'max_heigth', ':pixels', $this->max_dimensions['height'] );
			break;

			case self::ERROR_UNKNOWN:
				$this->error = $this->error_messages['unknown'];
			break;
			
		}

	}

	/**
	 * Replace an argument in an error message
	 * @author Dmitri Chebotarev
	 * @param  string $key   - The array key the error message
	 * @param  string $arg   - The argument that needs to be replace
	 * @param  string $value - The replace value
	 * @return string - Return error message with the argument replaced, 
	 * otherwise on failure returns NULL
	 */
	protected function errorArgument($key, $arg, $value){

		if( !array_key_exists($key, $this->error_messages ) ){
			return NULL;
		}

		$message = $this->error_messages[$key];
		$message = str_replace($arg, $value, $message);

		return $message;
	}

	/**
	 * Output the error message
	 * @author Dmitri Chebotarev
	 * @return string - Error message
	 */
	public function error(){
		return $this->error;
	}

	/**
	 * Upload the file
	 * @author  Dmitri Chebotarev
	 * @return boolean - Indicates if upload was successfull
	 */
	public function upload(){
		
		// Validate
		if( !$this->valid()){
			return false;
		}

		$file = Input::file($this->input);
        $this->filename = $this->filename.'.'.$this->ext;
		if( $file->move($this->path, $this->filename)){

            if( $this->thumbnail === true ){
                $this->createThumbnail();
            }

			return true;
		}




		$this->errorCode(self::ERROR_UNKNOWN);
		return false;
		
	}

    /**
     * Get the filename
     */
    public function getFilename(){
        return $this->filename;
    }

    /**
     *
     */
    public function missing(){
        return $this->error_code === self::ERROR_FILE_MISSING;
    }

    public function hasErrors(){
        return $this->error !== NULL;
    }

    public function getPath(){
        return $this->path;
    }

    public function setThumbnail($width = NULL, $height = NULL){
        $this->thumbnail = true;
        $this->thumbnailDimensions = [
            'width'     => $width,
            'height'    => $height
        ];
    }

    private function createThumbnail(){

        // Create Intervention Image instance
        $image = Image::make( $this->getPath(). '/'. $this->filename );

        // Create resized image
        $image->grab( $this->thumbnailDimensions['width'], $this->thumbnailDimensions['height']);

        // Save in sub-directory

        $subDir = $this->getPath() . '/t/';

        if( !File::isDirectory($subDir))
            File::makeDirectory($subDir);

        $image->save($subDir. $this->filename );

    }






}
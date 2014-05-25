<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/25/14
 * Time: 12:50 PM
 */

namespace Fairtrade\Page\Data;
use Model;


class WhereToBuy extends Data{

    public function run( $params = null ){

        $category_id = '';

        if( !is_null ($params) && array_key_exists(0, $params)){

            switch( $params[0] ){
                case 'bedrijf':
                    return $this->detail( $params );
                break;

                case 'categorie':
                   if( array_key_exists(1, $params)){
                       $id = $params[1];
                   }
                   break;
            }

        }

        if(isset($id))
        {
            $companies = Model\Company::where('category', '=', $id)->where('accepted', '=', 1)->paginate(10);
            $category_id = $id;
            //$companies = Model\Category::with('companies')->where('accepted', '=', 1)->find($id);
            //$companies = Model\Company::with('categories')->where('accepted', '=', 1)->find($id);
            /*$companies = Model\Category::with(['companies' => function($query){
                 return $query->where('accepted', '=', 1);
             }])->find($id);*/
        } else{
            // Query all companies from database
            $companies = Model\Company::where('accepted', '=', 1)->paginate(10);
        }

        //$testCompanies = Model\Category::find(1)->companies;
        //print_r($testCompanies);

        $categories = Model\Category::all();

        $this->add('categories', $categories);
        $this->add('companies', $companies);
        $this->add('category_id', $category_id);
    }

    protected function detail ( $params )
    {
        // Kijken over een id is meegegeven
        if( !array_key_exists(1, $params) && is_int($params[1]) ){
            return $this->notFound();
        }

        $company = Model\Company::find( $params[1] );

        if( !$company->exists() )
            return $this->notFound();

        $this->setCustomView( 'front.companydetail' );



        $this->add('title', 'Bedrijf detail' );
        $this->add('company', $company);

    }

} 
<?php

namespace App\Traits;

use App\Models\Country;
use App\Models\Language;
use Illuminate\Support\Facades\Route;

trait PageViewData
{

    public function getPageData()
    {
        $return = array();

        $return['check_session_country'] = false;
        if (!is_null(session()->get('country'))) {
            $return['check_session_country'] = true;
            $return['session_country_code'] = session()->get('country');

            $country_data = Country::where('code', '=', $return['session_country_code'])->get()->first();

            $return['session_country_data'] = $country_data;
        }


        if (!is_null(app()->getLocale())) {

            $return['session_language_code'] = app()->getLocale();

            $language_data = Language::where('code', '=', $return['session_language_code'])->get()->first();

            $return['session_language_data'] = $language_data;
        }

        $return['page_parent_environment'] = null;
        $return['page_child_environment'] = null;
        $route_name = Route::currentRouteName()??'home';


        if (in_array($route_name, array('home', 'about', 'term_of_use', 'contact'))) {
            $return['page_parent_environment'] = $route_name;
        }
        elseif (str_contains($route_name, 'market'))
        {
            $return['page_parent_environment'] = 'market';
            if (str_contains($route_name, 'produts')) {
                $return['page_child_environment'] = 'market_products';
            } elseif (str_contains($route_name, 'collections')) {
                $return['page_child_environment'] = 'market_collecctions';
            }
        }
        elseif(in_array($route_name,
            ['login','register','password.request','password.reset','verification.notice','verification.notice','user.edit-profile','user.edit-password']))
        {
            $return['page_parent_environment']='user';
        }
        elseif(str_contains( url()->current(),'user'))
        {
            $return['page_parent_environment']='user';
        }

        return $return;
    }


    public function PageViewWithData($view=null, $data=[], $mergeData=[])
    {
        return view($view, $data, $mergeData)->with('pageData',$this->getPageData());
    }
}

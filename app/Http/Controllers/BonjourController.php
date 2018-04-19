<?php
/**
 * Created by PhpStorm.
 * User: Samson
 * Date: 22/03/2018
 * Time: 12:40
 */
namespace App\Http\Controllers;

class BonjourController extends Controller
{
    public function niddecoucous($name) {
        return view('coucoutoi', [
            'name' => $name
        ]);
    }
}
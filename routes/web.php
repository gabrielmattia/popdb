<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/



$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->post('logout', 'AuthController@logout');
    $router->post('send_email', "MailController@sendEmail");
    $router->post('resetPassword', "ChangePasswordController@passwordResetProcess");


    $router->group(['middleware' => 'auth'], function ($router) {

        $router->get('category', 'CategoryController@showAllCategory');
        $router->post('category', 'CategoryController@create');


        $router->get('alliance_member/{cnpj}', 'AllianceMemberController@showOne');
        $router->get('alliance_member', 'AllianceMemberController@showAll');
        $router->put('teste', 'AllianceMemberController@getAll');

        $router->post('alliance_member', 'AllianceMemberController@create');
        $router->delete('alliance_member/{id}', 'AllianceMemberController@delete');
        $router->put('alliance_member/{id}', 'AllianceMemberController@update');




        $router->get('business_alliance/{id}', 'BusinessAllianceController@showOne');
        $router->get('business_alliance/{id}', 'BusinessAllianceController@showAll');
        $router->get('business_alliance_public', 'BusinessAllianceController@showPublics');
        $router->get('business_alliance_own/{id}', 'BusinessAllianceController@showOwn');



        $router->post('business_alliance', 'BusinessAllianceController@create');
        $router->delete('business_alliance/{id}', 'BusinessAllianceController@delete');
        $router->put('business_alliance/{id}', 'BusinessAllianceController@update');


        $router->get('internal_collaboration/{id}', 'InternalCollaborationController@showOne');
        $router->get('internal_collaboration', 'InternalCollaborationController@showAll');

        $router->post('internal_collaboration', 'InternalCollaborationController@create');
        $router->put('internal_collaboration/{id}', 'InternalCollaborationController@update');



        $router->get('external_collaboration/{id}', 'ExternalCollaborationController@showOne');
        $router->get('external_collaboration', 'ExternalCollaborationController@showAll');

        $router->post('external_collaboration', 'ExternalCollaborationController@create');
        $router->put('external_collaboration/{id}', 'ExternalCollaborationController@update');



        $router->get('pop/{id}', 'PopsController@showOne');
        $router->get('pop', 'PopsController@showAll');

        $router->post('pop', 'PopsController@create');


        $router->get('constituent_process/{id}', 'ConstituentProcessController@showOne');
        $router->get('constituent_process', 'ConstituentProcessController@showAll');

        $router->post('constituent_process', 'ConstituentProcessController@create');

        $router->get('users', 'AuthController@getUsers');

        $router->get('permissions/{id}', 'PermissionController@showAll');
        $router->post('permission', 'PermissionController@create');



    });
});

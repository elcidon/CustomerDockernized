<?php

Route::get('clientes/{id}/documento', 'Api\ClienteApiController@documento'); 
Route::apiResource('clientes', 'Api\ClienteApiController'); 
Route::get('documento/{id}/cliente', 'Api\DocumentoApiController@cliente'); 
Route::apiResource('documento', 'Api\DocumentoApiController'); 
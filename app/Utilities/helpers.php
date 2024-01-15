<?php

use Illuminate\Database\Eloquent\Model;

if (!function_exists('user')) {
	function user(){
		return request()->user();
	}
}

if (!function_exists('modelId')) {
	function modelId(Model|int $model){
		if($model instanceof Model){
			return $model->id;
		}else{
			return $model;
		}
	}
}

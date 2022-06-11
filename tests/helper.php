<?php

function create($class, $attributes = [], $times = null)
{
	return $class::factory()->count($times)->create($attributes);
}

function make($class, $attributes = [], $times = null)
{
	return $class::factory()->make($times)->make($attributes);
}
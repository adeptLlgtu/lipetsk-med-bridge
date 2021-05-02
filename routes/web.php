<?php

 /*
 |--------------------------------------------------------------------------
 | Файл маршрутизации
 |--------------------------------------------------------------------------
 */

namespace SDFramework\Routes;
$route->before('GET', '/.*', function() {
  //
 });
$route->get('/', function() {
  echo \SDFramework\Controllers\DefaultController::welcome();
});

$route->get('/api/get:(\w+)/from:(\w+)/id:(\w+)', function($field, $table, $id) {
  echo \SDFramework\Controllers\DefaultController::get_request($field, $table,  $id);
});

$route->post('/api/registration', function() {
  echo \SDFramework\Controllers\DefaultController::registration();
});

$route->post('/api/orders', function() {
  echo \SDFramework\Controllers\DefaultController::orders();
});

$route->post('/api/iterate', function() {
  echo \SDFramework\Controllers\DefaultController::iterate();
});

$route->post('/api/new', function() {
  echo \SDFramework\Controllers\DefaultController::newMeds();
});

$route->post('/api/delete', function() {
  echo \SDFramework\Controllers\DefaultController::deleteMeds();
});



?>
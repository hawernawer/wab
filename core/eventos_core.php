<?
include '../includes.php';
include '../classes/methods.php';

/*
 * 
 * Core de gestion de eventos
 * hay que realizarbien el orden del turno:
 * 
 * 1.- movimiento terrestre
 * 2.- movimiento maritimo
 * 3.- aleatorios de navegacion
 * 4.- aleatorios generales
 * 5.- aleatorios poblacion
 * 6.- aleatorios capitales
 * 7.- paso a gestion de batallas
 * 
 * 
 * 
 * */
 
lanzarEventosNavegacion();
lanzarEventosAleatorios();
lanzarEventosPoblacion();
lanzarEventosCapitales();

?>

create database gymnos;

use gymnos;

create table 'usuario'(
    'id' int primaryKey auto_increment, 
    'userName' varchar(30), 
    'password' varchar(30), 
    'Nombre' varchar(30), 
    'tipo' int
);

create table 'tipo'(
    'id' int primaryKey auto_increment, 
    'nombre' varchar(30), 
    'descripcion' varchar(30)
);

<?php
namespace App\Repositories\User;


interface UserInterface {

public function getLength($title);
    public function getAll();


    public function find($id);


    public function delete($id);
}
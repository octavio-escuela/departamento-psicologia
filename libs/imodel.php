<?php

//en la aplicacion habra modelos que necesitaran ciertos metodos especificos
//la interface permite definir metodos que despues tienen que ser implementados
//en los modelos
interface IModel{
    //metodos para hacer el crud
    public function save();
    public function getAll();
    public function get($id);
    public function delete($id);
    public function update();
    public function from($array);
}
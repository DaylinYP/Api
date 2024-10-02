<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseInterface;

class Products extends ResourceController
{

    protected  $modelName = "App\Models\ProductsModel";
    protected $format = "json";
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $products = $this->model->findAll();
        return $this->respond($products);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $products = $this->model->find($id);
        if($products){
            return $this->respond($products);
        }
        return $this->failNotFound("Producto no encontrado");
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    
    public function create()
    {
        $datos = $this->request->getJSON(true);
        if($this->model->insert($datos)){
            return $this->respondCreated($datos, "Datos almacenados");
        }
        return $this->failNotFound("Producto no encontrado");

    }



   
    public function update($id = null)
    {
        $products = $this->model->find($id);
        if(!$products){
            return $this->failNotFound("Producto no encontrado"); 
        }
        $datos = $this->request->getJSON(true);
        if($this->model->update($id, $datos)){
            return $this->respondUpdated($datos, "Producto actualizado");
        }
        return $this->failNotFound("Producto no se puede actualizar, verifique datos");

    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
         $product = $this->model->find($id);
         if($product){
            $this->model->delete($id);
            return $this->respondDeleted($product, 'Producto eliminado');
         }
         return $this->failNotFound("Producto no encontrado");
        }
}

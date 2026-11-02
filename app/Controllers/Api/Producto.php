<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Producto extends ResourceController
{
    protected $modelName = 'App\Models\ProductoModel';
    protected $format    = 'json';

    // GET /api/producto - Lista todos los registros en formato JSON
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /api/producto/{id} - Muestra un registro específico en JSON
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if ($data) {
            return $this->respond($data);
        }
        return $this->failNotFound('No se encontró el producto con el id: ' . $id);
    }

    // POST /api/producto - Crea un producto desde Postman (recibe JSON o form-data)
    public function create()
    {
        $data = $this->request->getJSON(true) ?? $this->request->getPost();

        if ($this->model->insert($data)) {
            return $this->respondCreated($data, 'Producto creado con éxito');
        }

        return $this->failValidationErrors($this->model->errors());
    }

    // PUT/PATCH /api/producto/{id} - Actualiza un producto desde Postman
    public function update($id = null)
    {
        $data = $this->request->getJSON(true) ?? $this->request->getRawInput();

        if (!$this->model->find($id)) {
            return $this->failNotFound('No se encontró el producto con el id: ' . $id);
        }

        if ($this->model->update($id, $data)) {
            return $this->respondUpdated($data, 'Producto actualizado con éxito');
        }

        return $this->failValidationErrors($this->model->errors());
    }

    // DELETE /api/producto/{id} - Elimina un producto desde Postman
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('No se encontró el producto con el id: ' . $id);
        }

        $this->model->delete($id);
        return $this->respondDeleted(['id' => $id, 'mensaje' => 'Producto eliminado con éxito']);
    }
}
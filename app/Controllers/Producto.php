<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class Producto extends BaseController
{
    public function index()
    {
        $model = new ProductoModel();
        $data['productos'] = $model->findAll();
        return view('producto', $data);
    }

    public function crear()
    {
        return view('product_create');
    }

    public function guardar()
    {
        $model = new ProductoModel();

        $model->save([
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'stock'       => $this->request->getPost('stock'),
            'precio'      => $this->request->getPost('precio'),
        ]);

        return redirect()->to(site_url('producto'));
    }

    public function editar($id = null)
    {
        $model = new ProductoModel();
        $data['producto'] = $model->find($id);

        if (empty($data['producto'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se encontró el producto con ID: ' . $id);
        }

        return view('product_edit', $data);
    }

    public function actualizar($id = null)
    {
        $model = new ProductoModel();

        $model->update($id, [
            'nombre'      => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'stock'       => $this->request->getPost('stock'),
            'precio'      => $this->request->getPost('precio'),
        ]);

        return redirect()->to(site_url('producto'));
    }

    public function eliminar($id = null)
    {
        $model = new ProductoModel();
        $model->delete($id);

        return redirect()->to(site_url('producto'));
    }
}
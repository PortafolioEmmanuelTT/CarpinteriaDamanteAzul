<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ClientesController extends BaseController
{
    protected $model;


    public function index()
    {
        $response = $this->cliente->get($this->supabaseUrl.'/rest/v1/clientes?select=*', ['headers' => ['apikey' => $this->supabaseKey, 'Authorization' =>'Bearer ' .  $this->supabaseKey],]);
        $data = json_decode($response->getBody(), true);

        return view('clientes', ['clientes' => $data]);
    }
    public function delete($id)
    {
        try {
            $response = $this->cliente->request('DELETE', $this->supabaseUrl . "/rest/v1/clientes?id=eq.$id", [
                'headers' => [
                    'apikey' => $this->supabaseKey,
                    'Authorization' => 'Bearer ' . $this->supabaseKey,
                    'Content-Type' => 'application/json',
                    'Prefer' => 'return=representation'
                ]
            ]);

            $status = $response->getStatusCode();
            $body = $response->getBody();

            if ($status >= 200 && $status < 300) {
                return $this->response->setJSON(['success' => true, 'message' => 'Cliente eliminado correctamente.']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => $body, 'http_code' => $status]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
        }
    }



    public function update($id)
    {
        $data = $this->request->getJSON(true);

        try {
            $response = $this->cliente->request('PATCH', $this->supabaseUrl . "/rest/v1/clientes?id=eq.$id", [
                'headers' => [
                    'apikey' => $this->supabaseKey,
                    'Authorization' => 'Bearer ' . $this->supabaseKey,
                    'Content-Type' => 'application/json',
                    'Prefer' => 'return=representation'
                ],
                'json' => $data
            ]);

            $status = $response->getStatusCode();

            if ($status >= 200 && $status < 300) {
                return $this->response->setJSON(['success' => true, 'message' => 'Cliente actualizado correctamente.']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => $response->getBody(), 'http_code' => $status]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function add()
    {
        try {
            $data = $this->request->getJSON(true);

            // Validación rápida
            if (empty($data['nombre']) || empty($data['telefono']) || empty($data['direccion'])) {
                return $this->response->setStatusCode(400)
                    ->setJSON(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
            }

            // Petición POST a Supabase REST API
            $response = $this->cliente->request('POST', $this->supabaseUrl . '/rest/v1/clientes', [
                'headers' => [
                    'apikey' => $this->supabaseKey,
                    'Authorization' => 'Bearer ' . $this->supabaseKey,
                    'Content-Type' => 'application/json',
                    'Prefer' => 'return=representation'
                ],
                'body' => json_encode($data)
            ]);

            $status = $response->getStatusCode();

            if ($status >= 200 && $status < 300) {
                return $this->response->setJSON(['success' => true, 'message' => 'Cliente agregado correctamente.']);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Error al agregar el cliente.']);
            }

        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)
                ->setJSON(['success' => false, 'message' => 'No se pudo agregar el cliente.']);
        }
    }


}

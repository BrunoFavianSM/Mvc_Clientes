<?php
require 'models/client.php';
class ClientController {
    private $modelo;

    public function __construct(){
        $this->modelo = new Client();
    }

    public function index() {
        $clients = $this->modelo->getAllClients();
        require 'views/client_view.php';
    }

    public function crearCliente(){
        header('Content-Type: application/json');
        try{
            $nombre = $_POST['txt_cliente'];
            $email = $_POST['txt_email'];
            $telefono = $_POST['txt_telefono'];
            $resultado = $this->modelo->insertarRegistroCliente($nombre, $email, $telefono);
            echo json_encode(['success' => $resultado]);
        }catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function editar(){
        header('Content-Type: application/json');
        try {
            $id = $_POST['id'];
            $nombre = $_POST['txt_editnombre'];
            $email = $_POST['txt_editemail'];
            $telefono = $_POST['txt_edittelefono'];
            $resultado = $this->modelo->actualizarCliente($id,$nombre, $email, $telefono);
            echo json_encode(['success' => $resultado]);
           
        } catch (Exception $e) {
           echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function eliminar(){
        header('Content-Type: application/json');
        try {
            $id = $_POST['id'];
            $resultado = $this->modelo->eliminarCliente($id);
            echo json_encode(['success' => $resultado]);
           
        } catch (Exception $e) {
           echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
?>
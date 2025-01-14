<?php
class Client {
    private $db;
    private $tabla = "clientes";

    public function __construct(){
        $this->db = new PDO("mysql:host=localhost;dbname=bdejemplo", "root", "");
    }

    public function getAllClients() {
        $datos_procesados = $this->db->query("select * from clientes");
        return $datos_procesados->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insertarRegistroCliente($nombre, $email, $telefono){
        $insertarCliente = $this->db->prepare('INSERT INTO clientes(nombre, email, telefono) VALUES(?, ?, ?)');
        return $insertarCliente->execute([$nombre, $email, $telefono]);
    }

    public function actualizarCliente($id, $nombre, $email, $telefono){
        $query = "UPDATE " . $this->tabla . " SET nombre = :nombre, email = :email, telefono = :telefono WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function eliminarCliente($id){
        $query = "DELETE FROM " . $this->tabla . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
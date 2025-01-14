<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Clientes</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <h1 class="text-center mb-4">Lista de Clientes</h1>
            <p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearClienteModal"> Agregar Cliente</button>
            </p>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Fecha de registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $cliente): ?>
                    <tr>
                        <td><?php echo $cliente['id']; ?></td>
                        <td><?php echo $cliente['nombre']; ?></td>
                        <td><?php echo $cliente['email']; ?></td>
                        <td><?php echo $cliente['telefono']; ?></td>
                        <td><?php echo $cliente['fecha_registro']; ?></td>
                        <td>
                        <button type="button" class="btn btn-warning" 
                        data-toggle="modal"
                        data-target="#editarClienteModal"
                        data-id="<?php echo $cliente['id']; ?>"
                        data-nombre="<?php echo $cliente['nombre']; ?>"
                        data-email="<?php echo $cliente['email']; ?>"
                        data-telefono="<?php echo $cliente['telefono']; ?>">                 
                        <i class="fas fa-edit"></i> 
                            Editar
                        </button>

                        <button type="button" class="btn btn-danger" 
                            data-toggle="modal"
                            data-target="#eliminarClienteModal"
                            data-id="<?php echo $cliente['id']; ?>">                 
                            Eliminar
                        </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    
        <div class="modal fade" id="crearClienteModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <div class="modal-header">
                    <h4 class="modal-title">Agregar Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                
                    <div class="modal-body">
                        <form id="crearClienteForm">
                            <div class="form-group">
                                <label for="txt_cliente">Cliente</label>
                                <input type="text" class="form-control" placeholder="Nombre del Cliente" id="txt_cliente" name="txt_cliente" required>
                            </div>
                            <div class="form-group">
                                <label for="txt_email">Email:</label>
                                <input type="text" class="form-control" placeholder="Correo del Cliente" id="txt_email" name="txt_email" required>
                            </div>
                            <div class="form-group">
                                <label for="txt_telefono">Teléfono:</label>
                                <input type="text" class="form-control" placeholder="Teléfono del Cliente" id="txt_telefono" name="txt_telefono" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                
                </div>
            </div>
        </div>

        <!-- MODAL EDITAR CLIENTES -->
        <div class="modal fade" id="editarClienteModal" tabindex="-1">
            <div class="modal-dialog">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Editar CLIENTES</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                <form id="editarClienteForm">
                    <div class="form-group">
                        <input type="hidden" id="editClienteId" name="id">
                        <label for="txt_editcombre">Nombre Cliente</label>
                        <input type="text" class="form-control" placeholder="Nombre del cliente" id="editnombre" name="txt_editnombre" required>
                    </div>
                    <div class="form-group">
                        <label for="txt_editemail">Precio:</label>
                        <input type="text" class="form-control" placeholder="Correo del cliente" id="editemail" name="txt_editemail" required>
                    </div>
                    <div class="form-group">
                        <label for="txt_edittelefono">Teléfono:</label>
                        <input type="text" class="form-control" placeholder="Teléfono del cliente" id="edittelefono" name="txt_edittelefono" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                
            </div>
            </div>
        </div>


            <!-- MODAL ELIMINAR CLIENTES -->
        <div class="modal fade" id="eliminarClienteModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Eliminar Cliente</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                        
                    <!-- Modal body -->
                    <form id="eliminarClienteForm">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="eliminarClienteId">
                            <p>¿Estas seguro que deseas eliminar el Cliente?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- manejar js para insertar los datos -->
        <script>
            document.addEventListener('DOMContentLoaded',function(){
                $(document).on('show.bs.modal','#editarClienteModal',function (event){
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const nombre = button.getAttribute('data-nombre');
                const email = button.getAttribute('data-email');
                const telefono = button.getAttribute('data-telefono');
                document.getElementById('editClienteId').value = id;
                document.getElementById('editnombre').value = nombre;
                document.getElementById('editemail').value = email;
                document.getElementById('edittelefono').value = telefono
                });
            
            //ELIMINAR
            $(document).on('show.bs.modal','#eliminarClienteModal',function (event){
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            document.getElementById('eliminarClienteId').value = id;
            });

            //EDITAR
            document.getElementById('editarClienteForm').addEventListener('submit',function(e){
                e.preventDefault();
                const formData = new FormData(this);

                fetch('index.php?action=editar',{
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        $('#editarClienteModal').modal('hide');
                        location.reload();
                    }else{
                        alert("Error al Editar el Cliente");
                    }
                });

            });

            //Eliminar
            document.getElementById('eliminarClienteForm').addEventListener('submit',function(e){
                e.preventDefault();
                const formData = new FormData(this);

                fetch('index.php?action=eliminar',{
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if(data.success){
                        $('#eliminarClienteModal').modal('hide');
                        location.reload();
                    }else{
                        alert("Error al Eliminar el Cliente");
                    }
                });
            });

                

                document.getElementById('crearClienteForm').addEventListener('submit',function(e){
                    e.preventDefault();
                    const formData = new FormData(this);
    
                    fetch('index.php?action=crear',{
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if(data.success){
                            location.reload();
                        }else{
                            alert("Error al agregar el cliente");
                        }
                    });
                });
            });
    
        </script>   
    </body>
</html>



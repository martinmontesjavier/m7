<?php
// Configuración de la conexión a la base de datos
$dsn = "pgsql:host=localhost;dbname=usuaris";
$username = "postgres";
$password = "root";

try {
    // Crear una nueva conexión PDO
    $dbh = new PDO($dsn, $username, $password);
    // Establecer el modo de error para lanzar excepciones
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En caso de error, mostrar un mensaje de error y terminar la ejecución del script
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Obtener las tres tablas específicas de la base de datos
$tables = ['actor', 'film_actor', 'logdata']; // Coloca aquí los nombres de las tablas específicas

$errors = [];
$data = [];
$results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí procesas el formulario y generas la respuesta JSON
    if (empty($_POST['action'])) {
        $errors['action'] = 'Action is required.';
    } else {
        $action = $_POST['action'];
        switch ($action) {
            case 'create':
                if (!empty($_POST['table'])) {
                    $tableName = $_POST['table'];
                    $fields = [];
                    $values = [];
                    // Construir la lista de campos y valores a insertar
                    switch ($tableName) {
                        case 'actor':
                            if (!empty($_POST['first-name'])) {
                                $fields[] = 'first_name';
                                $values[] = $_POST['first-name'];
                            } else {
                                $errors['first-name'] = 'First Name is required.';
                            }
                            if (!empty($_POST['last-name'])) {
                                $fields[] = 'last_name';
                                $values[] = $_POST['last-name'];
                            } else {
                                $errors['last-name'] = 'Last Name is required.';
                            }
                            $fields[] = 'last_update';
                            $values[] = $_POST['last-update'];
                            break;
                        case 'film_actor':
                            if (!empty($_POST['actor-id'])) {
                                $fields[] = 'actor_id';
                                $values[] = $_POST['actor-id'];
                            } else {
                                $errors['actor-id'] = 'Actor ID is required.';
                            }
                            if (!empty($_POST['film-id'])) {
                                $fields[] = 'film_id';
                                $values[] = $_POST['film-id'];
                            } else {
                                $errors['film-id'] = 'Film ID is required.';
                            }
                            $fields[] = 'last_update';
                            $values[] = $_POST['last-update'];
                            break;
                        case 'logdata':
                            if (!empty($_POST['message'])) {
                                $fields[] = 'message';
                                $values[] = $_POST['message'];
                            } else {
                                $errors['message'] = 'Message is required.';
                            }
                            if (!empty($_POST['loglevel'])) {
                                $fields[] = 'loglevel';
                                $values[] = $_POST['loglevel'];
                            } else {
                                $errors['loglevel'] = 'Log Level is required.';
                            }
                            if (!empty($_POST['logdate'])) {
                                $fields[] = 'logdate';
                                $values[] = $_POST['logdate'];
                            } else {
                                $errors['logdate'] = 'Log Date is required.';
                            }
                            if (!empty($_POST['module'])) {
                                $fields[] = 'module';
                                $values[] = $_POST['module'];
                            } else {
                                $errors['module'] = 'Module is required.';
                            }
                            break;
                        default:
                            $errors['table'] = 'Invalid table specified for create action.';
                    }
                    if (empty($errors)) {
                        // Construir la consulta de inserción
                        $fieldsString = implode(', ', $fields);
                        $placeholders = implode(', ', array_fill(0, count($values), '?'));
                        $stmt = $dbh->prepare("INSERT INTO $tableName ($fieldsString) VALUES ($placeholders)");
                        $stmt->execute($values);
                        $data['message'] = 'New record has been successfully inserted into ' . $tableName . '.';
                    }
                } else {
                    $errors['table'] = 'Table is required for create action.';
                }
                break;
            case 'read_all':
                if (!empty($_POST['table'])) {
                    $tableName = $_POST['table'];
                    $stmt = $dbh->prepare("SELECT * FROM $tableName");
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $errors['table'] = 'Table is required for read all action.';
                }
                break;
            case 'read_id':
                if (!empty($_POST['table']) && !empty($_POST['id'])) {
                    $tableName = $_POST['table'];
                    $id = $_POST['id'];
                    $stmt = $dbh->prepare("SELECT * FROM $tableName WHERE id = :id");
                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $errors['table'] = 'Table and ID are required for read by ID action.';
                }
                break;
            case 'update':
                // Lógica para la acción de actualización
                break;
            case 'delete':
                if (!empty($_POST['table']) && !empty($_POST['delete-id'])) {
                    $tableName = $_POST['table'];
                    $deleteId = $_POST['delete-id'];
                    $stmt = $dbh->prepare("DELETE FROM $tableName WHERE id = :id");
                    $stmt->bindParam(':id', $deleteId, PDO::PARAM_INT);
                    $stmt->execute();
                    $data['message'] = 'User with ID ' . $deleteId . ' has been successfully deleted.';
                } else {
                    $errors['table'] = 'Table and ID are required for delete action.';
                }
                break;
            default:
                $errors['action'] = 'Invalid action specified.';
        }
    }

    if (!empty($errors)) {
        $data['success'] = false;
        $data['errors'] = $errors;
    } else {
        $data['success'] = true;
        $data['message'] = 'Success!';
    }

    $data['results'] = $results;
    
    echo json_encode($data);
    exit(); // Detiene la ejecución del script PHP después de enviar la respuesta JSON
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>jQuery Form Example</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"/>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
<body>
<div class="col-sm-6 col-sm-offset-3">
  <h1>Processing an AJAX Form</h1>

  <form id="actionForm">
    <div id="action-group" class="form-group">
      <label for="action">Action</label>
      <select class="form-control" id="action" name="action">
        <option value="">Select Action</option>
        <option value="create">Create</option>
        <option value="read_all">Read All</option>
        <option value="read_id">Read by ID</option>
        <option value="update">Update</option>
        <option value="delete">Delete</option>
      </select>
    </div>

    <div id="table-group" class="form-group" style="display: none;">
      <label for="table">Table</label>
      <select class="form-control" id="table" name="table">
        <option value="">Select Table</option>
        <?php foreach ($tables as $table): ?>
            <option value="<?php echo $table; ?>"><?php echo $table; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div id="id-group" class="form-group" style="display: none;">
      <label for="id">ID</label>
      <input type="number" class="form-control" id="id" name="id" placeholder="Enter ID"/>
    </div>

    <!-- Formulario para la tabla 'actor' -->
    <div id="create-actor-form" class="form-group" style="display: none;">
        <label for="first-name">First Name</label>
        <input type="text" class="form-control" id="first-name" name="first-name" placeholder="Enter First Name"/>
        <label for="last-name">Last Name</label>
        <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Enter Last Name"/>
        <input type="hidden" name="last-update" value="<?php echo date('Y-m-d H:i:s'); ?>">
    </div>

    <!-- Formulario para la tabla 'film_actor' -->
    <div id="create-film-actor-form" class="form-group" style="display: none;">
        <label for="actor-id">Actor ID</label>
        <input type="number" class="form-control" id="actor-id" name="actor-id" placeholder="Enter Actor ID"/>
        <label for="film-id">Film ID</label>
        <input type="number" class="form-control" id="film-id" name="film-id" placeholder="Enter Film ID"/>
        <input type="hidden" name="last-update" value="<?php echo date('Y-m-d H:i:s'); ?>">
    </div>

    <!-- Formulario para la tabla 'logdata' -->
    <div id="create-logdata-form" class="form-group" style="display: none;">
        <label for="message">Message</label>
        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter Message"></textarea>
        <label for="loglevel">Log Level</label>
        <input type="number" class="form-control" id="loglevel" name="loglevel" placeholder="Enter Log Level"/>
        <label for="logdate">Log Date</label>
        <input type="text" class="form-control" id="logdate" name="logdate" placeholder="Enter Log Date"/>
        <label for="module">Module</label>
        <input type="text" class="form-control" id="module" name="module" placeholder="Enter Module"/>
    </div>

    <div id="update-form-group" style="display: none;">
      <label for="update-data">Update Data</label>
      <div class="form-group">
        <input type="text" class="form-control" id="update-field1" name="update-field1" placeholder="Field 1"/>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="update-field2" name="update-field2" placeholder="Field 2"/>
      </div>
      <!-- Agrega más campos según tus necesidades -->
    </div>

    <div id="delete-id-group" class="form-group" style="display: none;">
      <label for="delete-id">Delete ID</label>
      <input type="number" class="form-control" id="delete-id" name="delete-id" placeholder="Enter ID to Delete"/>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
  </form>

  <div id="results" style="margin-top: 20px; display: none;">
    <h2>Results</h2>
    <div id="results-table" class="table-responsive">
      <!-- Aquí se mostrarán los resultados de la consulta -->
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    $("#action").change(function() {
        var selectedAction = $(this).val();
        if (selectedAction === "create" || selectedAction === "read_all" || selectedAction === "delete") {
            $("#table-group").show();
            $("#id-group").hide();
            $("#update-form-group").hide();
            $("#delete-id-group").toggle(selectedAction === "delete");
            $("#create-actor-form").toggle(selectedAction === "create" && $("#table").val() === "actor");
            $("#create-film-actor-form").toggle(selectedAction === "create" && $("#table").val() === "film_actor");
            $("#create-logdata-form").toggle(selectedAction === "create" && $("#table").val() === "logdata");
        } else if (selectedAction === "read_id") {
            $("#table-group").show();
            $("#id-group").show(); // Mostrar el grupo de ID aquí
            $("#update-form-group").hide();
            $("#delete-id-group").hide(); // Ocultar el grupo de ID para eliminar
            $("#create-actor-form").hide();
            $("#create-film-actor-form").hide();
            $("#create-logdata-form").hide();
        } else if (selectedAction === "update") {
            $("#table-group").show();
            $("#id-group").show(); // Mostrar el grupo de ID aquí
            $("#update-form-group").show();
            $("#delete-id-group").hide(); // Ocultar el grupo de ID para eliminar
            $("#create-actor-form").hide();
            $("#create-film-actor-form").hide();
            $("#create-logdata-form").hide();
        } else {
            $("#table-group").hide();
            $("#id-group").hide();
            $("#update-form-group").hide();
            $("#delete-id-group").hide();
            $("#create-actor-form").hide();
            $("#create-film-actor-form").hide();
            $("#create-logdata-form").hide();
        }
    }).change(); // Asegura que el cambio se aplique al cargar la página

    $("#actionForm").submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "index.php", // Cambia "index.php" por el nombre de tu archivo PHP
            data: formData,
            dataType: "json",
            encode: true,
            success: function(data) {
                console.log(data);
                if (data.success) {
                    if (data.results && data.results.length > 0) {
                        // Mostrar resultados en la tabla
                        $("#results-table").empty();
                        $("#results-table").append("<table class='table table-bordered'><thead><tr></tr></thead><tbody></tbody></table>");
                        for (var key in data.results[0]) {
                            $("#results-table thead tr").append("<th>" + key + "</th>");
                        }
                        for (var i = 0; i < data.results.length; i++) {
                            var row = "<tr>";
                            for (var key in data.results[i]) {
                                row += "<td>" + data.results[i][key] + "</td>";
                            }
                            row += "</tr>";
                            $("#results-table tbody").append(row);
                        }
                        $("#results").show();
                    } else {
                        // Mostrar mensaje de "No se han encontrado resultados"
                        $("#results-table").empty();
                        $("#results-table").append("<p>No se han encontrado resultados.</p>");
                        $("#results").show();
                    }
                    
                    if (data.message) {
                        // Mostrar el mensaje de eliminación
                        $("#delete-message").text(data.message).show();
                    } else {
                        $("#delete-message").hide();
                    }
                } else {
                    $("#results").hide();
                    $("#delete-message").hide();
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log(xhr.responseText);
                console.log(textStatus);
                console.log(errorThrown);
                $("#results").hide();
                $("#delete-message").hide();
            }
        });
    });
});

</script>
</body>
</html>

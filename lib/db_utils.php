<?php
require_once __DIR__ . '/../config/database.php'; // Asegura que la conexión está disponible


//Gestion tabla users - CRUD USERS

// Insertar un nuevo usuario con sentencias parametrizadas
function insertUser($name, $lastname, $email, $password) {
    global $pdo;

    try {
        // Hashear la contraseña
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
        // Preparar la consulta SQL
        $stmt = $pdo->prepare("INSERT INTO users (name, lastname, email, password) VALUES (?, ?, ?, ?)");
        
        // Ejecutar la consulta
        $stmt->execute([$name, $lastname, $email, $hashedPassword]);

        // Verificar si realmente se insertó un usuario
        return $stmt->rowCount() > 0;

    } catch (PDOException $e) {
        // Si hay un error, mostrarlo (puedes loguearlo en lugar de mostrarlo en producción)
        error_log("Error al insertar usuario: " . $e->getMessage());
        return false;
    }
}


//BORRAR USUARIO
function deleteUser($id) {
    global $pdo;

    try {
        // Preparar la consulta SQL para eliminar el usuario
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        
        // Ejecutar la consulta
        $stmt->execute([$id]);

        // Verificar si realmente se eliminó un usuario
        return $stmt->rowCount() > 0;

    } catch (PDOException $e) {
        // Si hay un error, registrarlo
        error_log("Error al eliminar usuario: " . $e->getMessage());
        return false;
    }
}

function updateUser($id, $name, $lastname, $email, $password = null) {
    global $pdo;

    try {
        // Verificar si se debe actualizar la contraseña
        if ($password) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $sql = "UPDATE users SET name = ?, lastname = ?, email = ?, password = ? WHERE id = ?";
            $params = [$name, $lastname, $email, $hashedPassword, $id];
        } else {
            $sql = "UPDATE users SET name = ?, lastname = ?, email = ? WHERE id = ?";
            $params = [$name, $lastname, $email, $id];
        }

        // Preparar la consulta SQL
        $stmt = $pdo->prepare($sql);
        
        // Ejecutar la consulta con los parámetros
        $stmt->execute($params);

        // Verificar si realmente se actualizó algún usuario
        return $stmt->rowCount() > 0;

    } catch (PDOException $e) {
        // Registrar el error en el log
        error_log("Error al actualizar usuario: " . $e->getMessage());
        return false;
    }
}


//OBTENER USUARIO POR ID

function getUserById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id =?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



// Obtener todos los usuarios

function getAllUsers() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function authUser($email, $password) {
    global $pdo;

    // Buscar el usuario por su email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe y la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        // Iniciar sesión y guardar datos del usuario en $_SESSION
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];

        return true; // Autenticación exitosa
    } else {
        return false; // Email o contraseña incorrecta
    }
}






//FUNCIONES TABLA POST (CRUD)


// Insertar un nuevo post con sentencias parametrizadas


//Revisra funcion!!!!!
function createPost($user_id, $title, $post_content, $image_url) {
    global $pdo;

    try { 
        // Preparar la consulta SQL
        $stmt = $pdo->prepare("INSERT INTO posts (user_id, title, post_content, image_url) VALUES (?, ?, ?, ?)");
        
        // Ejecutar la consulta
        $stmt->execute([$user_id, $title, $post_content, $image_url]);

        // Verificar si realmente se insertó el post
        return $stmt->rowCount() > 0;

    } catch (PDOException $e) {
        // Si hay un error, mostrarlo (puedes loguearlo en lugar de mostrarlo en producción)
        error_log("Error al insertar post: " . $e->getMessage());
        return false;
    }
}


// Obtener todos los posts
function getAllPosts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Obtener un post por ID
function getPostById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//Borrar POST

function deletePostById($post_id) {
    global $pdo; // Conexión a la base de datos
    $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    return $stmt->execute([$post_id]);
}


function getPostsByUser($user_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY created_at DESC");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve un array de posts
}

function getRecentPosts($limit) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM posts ORDER BY created_at DESC LIMIT ?");
    $stmt->bindParam(1, $limit, PDO::PARAM_INT); // Evita inyección SQL
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}



//obtener el autor con el post_id

function getAuthorByPostId($post_id) {
    global $pdo; // Accedemos a la conexión PDO global

    $stmt = $pdo->prepare("SELECT name, lastname FROM users WHERE id = (SELECT user_id FROM posts WHERE id = ?)");
    $stmt->execute([$post_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row ? $row['name'] . " " . $row['lastname'] : "Autor no encontrado";
}


//probar el update en POST
function toggleFavorite($post_id) {
    global $pdo;

    // Obtener el estado actual
    $stmt = $pdo->prepare("SELECT favorito FROM posts WHERE id = ?");
    $stmt->execute([$post_id]);
    $current = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($current) {
        $newStatus = $current['favorito'] ? 0 : 1; // Alternar estado
        $stmt = $pdo->prepare("UPDATE posts SET favorito = ? WHERE id = ?");
        return $stmt->execute([$newStatus, $post_id]); // Devuelve true si la consulta fue exitosa
    }
    return false;
}
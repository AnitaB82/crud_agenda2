<?php

require_once "model/Contact.php";

class ContactController
{

    private $model;

    public function __construct()
    {
        $this->model = new Contact();
    }

    public function index()
    {
        $contacts = $this->model->getAll();
        include "views/contacts/index.php";
    }

    public function create()
    {
        include "views/contacts/create.php";
    }

    public function store()
    {
        $name  = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $phone = $_POST['phone'] ?? null;

        $errors = [];

        // Validaciones
        if (!$name) $errors[] = "El nombre es obligatorio";
        if (!$email) $errors[] = "El email es obligatorio";
        if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "El email no es válido";
        if (!$phone) $errors[] = "El teléfono es obligatorio";
        if (strlen($phone) != 9) $errors[] = "El teléfono debe tener exactamente 9 números";

        if (!empty($errors)) {
            include "views/contacts/create.php";
            return;
        }

        if ($name && $email && $phone) {
            $this->model->create($name, $email, $phone);
        }

        header("Location: index.php");
        exit;
    }

    public function edit($id)
    {
        $contact = $this->model->getById($id);
        include "views/contacts/edit.php";
    }

    public function update()
    {
        $id    = $_POST['id'] ?? null;
        $name  = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $phone = $_POST['phone'] ?? null;

        $errors = [];

        // Validaciones
        if (!$id) $errors[] = "ID inválido";
        if (!$name) $errors[] = "El nombre es obligatorio";
        if (!$email) $errors[] = "El email es obligatorio";
        if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "El email no es válido";
        if (!$phone) $errors[] = "El teléfono es obligatorio";
        if ($phone && !preg_match('/^\d{9}$/', $phone)) $errors[] = "El teléfono debe tener exactamente 9 números";

        if (!empty($errors)) {

            $contact = ['id' => $id, 'name' => $name, 'email' => $email, 'phone' => $phone];
            include "views/contacts/edit.php";
            return;
        }

        if ($id && $name && $email && $phone) {
            $this->model->update($id, $name, $email, $phone);
        }

        header("Location: index.php");
        exit;
    }

    public function destroy($id)
    {
        $this->model->delete($id);
        header("Location: index.php");
        exit;
    }
}

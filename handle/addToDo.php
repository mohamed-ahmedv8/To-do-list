<?php
require_once '../App.php';
if ($request->hasPost($request->post("submit"))) {
    $title = $request->clean($request->post("title"));
    $validation->validate("title", $title, ["Required", "Str"]);
    $errors = $validation->getErrors();
    if (empty($errors)) {
        $stm = $conn->prepare("INSERT INTO todo(`title`) VALUES (:title)");
        $stm->bindParam(":title", $title, PDO::PARAM_STR);
        $out = $stm->execute();
        if ($out) {
            $session->set("success", "Data inserted successfuly");
            $request->header("../index.php");
        } else {
            $session->set("errors", ["error"]);
            $request->header("../index.php");
        }
    } else {
        $session->set("errors", $errors);
        $request->header("../index.php");
    }
} else {
    $request->header("../index.php");
}

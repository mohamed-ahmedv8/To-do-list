<?php
require_once '../App.php';
if ($request->hasPost($request->get("id"))) {
    $id = $request->get("id");
    $stm = $conn->prepare("select `title` from todo where id=:id");
    $stm->bindParam(":id", $id);
    $stm->execute();
    if ($stm->rowCount() > 0) {
        $stm = $conn->prepare("delete from todo where id=:id");
        $stm->bindParam(":id", $id);
        $out = $stm->execute();
        if ($out) {
            $session->set("success", "Data deleted successfuly");
            $request->header("../index.php");
        } else {
            $session->set("errors", ["Error"]);
            $request->header("../index.php");
        }
    } else {
        $session->set("errors", ["Not found"]);
        $request->header("../index.php");
    }
} else {
    $request->header("../index.php");
}

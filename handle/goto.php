<?php
require_once '../App.php';
if ($request->hasPost($request->get("st")) && $request->hasPost($request->get("id"))) {
    $st = $request->get("st");
    $id = $request->get("id");
    $stm = $conn->prepare("select `title` from todo where id=:id");
    $stm->bindParam(":id", $id);
    $stm->execute();
    if ($stm->rowCount() > 0) {
        $stm = $conn->prepare("update todo set `status`=:st where id=:id");
        $stm->bindParam(":st", $st);
        $stm->bindParam(":id", $id);
        $out = $stm->execute();
        if ($out) {
            $session->set("success", "Status updated successfuly");
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

<?php

namespace app\controllers;

use yii\web\Controller;

class CandyController extends Controller {

    public function actionIndex() {
        $command = \Yii::$app->db->createCommand('SELECT * FROM user WHERE id = :id');
        $command->bindValue(':id, 1');

        return $this->render('index');
    }

    public function actionAdd() {
        return "ADD";
    }

    public function actionView($id) {
        var_dump($id);
    }
}
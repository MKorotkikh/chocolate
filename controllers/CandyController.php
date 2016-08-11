<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Candy;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\HttpException;



class CandyController extends Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionCreate () {
        $model = new Candy();
//        $model->setScenario('create');

       $model->image = UploadedFile::getInstance($model, 'image');
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->upload();
            if ($model->save()){
                \Yii::$app->session->setFlash('success', 'Thanks you for new candy');
            }else{
                \Yii::$app->session->setFlash('error', 'Error');
            }
        } else{
            echo "<pre>";
            var_dump($model->errors);
            die;
        }
        return $this->render('create', compact('model'));
    }

    public function actionUpdate ($id) {

        if ($model = Candy::findOne($id)) {
//            if (Yii::$app->request->isPost) {
//                $model->image = UploadedFile::getInstance($model, 'image');
//                if ($model->upload()) {
//                     file is uploaded successfully
//                    return TRUE;
//                }
//            }

            if ($model->load(\Yii::$app->request->post())) {
                if ($model->save()){
                    \Yii::$app->session->setFlash('success', 'Thanks you for candy update');
                }else{
                    \Yii::$app->session->setFlash('error', 'Error');
                }
            }
        }else{
            throw new NotFoundHttpException('CandyNotFound');
        }

        return $this->render('update', compact('model'));
    }

    public function actionList () {

        $model = Candy::find()->asArray()->all();
        return $this->render('list', compact('model'));
    }

    public function actionShow ($id) {

        return $this->render('show');
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'show'],
                'rules' => [
                    [
                        'actions' => ['create', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['show'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],

        ];
    }

}
<?php

namespace app\models;


use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Candy extends ActiveRecord {

    public $image; //Если не понадобится, то удалить!

    public function attributeLabels() {
        return [
            'name' => 'Candy name',
            'price' => 'Price, UAH',
            'discription' => 'About candy',
        ];
    }

    public function rules() {
        return [
            [['name', 'price', 'discription'], 'trim'],
            [['name', 'price', 'discription'], 'required'],
            ['price', 'double'],
            ['image', 'image', 'mimeTypes' => ['image/jpeg', 'image/gif', 'image/png', 'image/gif']],
            ['image', 'safe'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => date('Y-m-d H-i-s'),
            ],
        ];
    }

    public function upload()
    {
       if ($this->image instanceof UploadedFile) {
           $name = $this->image->baseName . '.' . $this->image->extension;
           $this->image->saveAs('uploads/' . $name);
           $this->image = $name;
       }
    }

}

?>
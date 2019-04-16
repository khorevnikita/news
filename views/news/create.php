<?php

/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Creating material';

?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Create news</h1>
    </div>

    <div class="body-content row">
        <div class="col-sm-offset-3 col-sm-6">
            <? $form = ActiveForm::begin([
                'id' => 'news-create',
            ]) ?>
            <?= $form->field($news, 'name') ?>
            <?= $form->field($news, 'description')->textarea() ?>
            <?= $form->field($news, 'content')->textarea() ?>
            <?= $form->field($news, 'date')->input("date") ?>
            <?= $form->field($news, 'activity')->checkbox() ?>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>

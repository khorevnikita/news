<?php

/* @var $this yii\web\View */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Material edit';

?>
<div class="site-index">
    <div class="jumbotron">
        <h1>News edit</h1>
    </div>

    <div class="body-content row">
        <div class="col-sm-offset-3 col-sm-6">
            <? $form = ActiveForm::begin([
                'id' => 'material-create',
            ]) ?>
            <?= $form->field($single_news, 'name') ?>
            <?= $form->field($single_news, 'description')->textarea(['rows'=>7]) ?>
            <?= $form->field($single_news, 'content')->textarea(['rows'=>5]) ?>
            <?= $form->field($single_news, 'date')->input("date") ?>
            <?= $form->field($single_news, 'activity')->checkbox() ?>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>

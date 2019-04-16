<?php

/* @var $this yii\web\View */

$this->title = $single_news->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= $single_news->name ?></h1>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-sm-offset-3 col-sm-6">
                <a href="/admin/news/<?=$single_news->alias?>/edit" class="btn btn-primary pull-right">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <div style="clear:both"></div>
                <p>
                    <?= $single_news->description ?>
                </p>
                <hr>
                <p>
                    <?= $single_news->content ?>
                </p>
                <p>
                    <?= Yii::$app->formatter->asDate($single_news->date,'php:d.m.Y'); ?>
                </p>
            </div>
        </div>
    </div>
</div>

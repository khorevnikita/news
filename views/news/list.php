<?php

/* @var $this yii\web\View */

$this->title = 'Materials';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>News list!</h1>
    </div>

    <div class="body-content">
        <? if (count($news) > 0) : ?>
            <div class="row">
                <? foreach ($news as $single_news) : ?>
                    <div class="col-lg-6">
                        <h2><?= $single_news->name ?></h2>

                        <p>
                            <?= $single_news->description ?>
                        </p>

                        <p>
                            <?= $single_news->content ?>
                        </p>

                        <p>
                            <a class="btn btn-info" href="/news/<?= $single_news->alias ?>">
                                More
                            </a>
                        </p>
                    </div>
                <? endforeach; ?>
            </div>

        <? else: ?>

            <h4>News list is empty</h4>

        <? endif ?>

        <div class="row">
            <div class="col-sm-offset-3 col-sm-6">
                <a href="/admin/news/create" class="btn btn-primary center-block">Create news</a>
            </div>
        </div>
    </div>
</div>

<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
$this->params['breadcrumbs'][] = 'Просмотр новости';
?>
<div class="site-about">
    <h1><?= Html::encode($item->title) ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <p><?=Html::encode($item->text)?></p>
            <div class="row">
                <div class="col-lg-3 ">Автор: <span class="badge"><?=$item->author?></span></div>
                <div class="col-lg-3">Дата публикации: <span class="badge"><?=$item->public_dt?></span></div>
                <div class="col-lg-3">Просмотров: <span class="badge"><?=$item->view_count ?? 0?></span></div>
            </div>
        </div>
    </div>
</div>

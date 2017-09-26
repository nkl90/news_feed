<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Article;

$this->title = $item->title;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">
    <p>
        Новость <b><?= Html::encode($this->title) ?></b> <?=$item->is_verified == Article::IS_VERIFIED ? ' одобрена модератором' : ' еще не одобрена модератором'?>.
        <?=$item->is_verified == Article::IS_VERIFIED ? ' Снять одобрение' : ' Одобрить'?>?
    </p>
    <?=Html::beginForm(['approve', 'id' => $item->id], 'post')?>
    <?=Html::submitButton('Да',['class' => 'btn btn-default'])?>
    <?=Html::a(
        'Нет',
        ['index'], ['class' => 'btn btn-link'])?>
    <?=Html::endForm()?>


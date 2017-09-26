<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Новости в порядке поступления';
?>
<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    foreach ($items as $item) {
        ?>
        <div class="row">
            <div class="col-lg-12">
                <h3><?=$item->title?></h3>
                <p><?=$item->short_text?> <a href="<?=Url::to(['site/news', 'id' => $item->id])?>">Подробнее...</a></p>
                <div class="row">
                    <div class="col-lg-3 ">Автор: <span class="badge"><?=$item->author?></span></div>
                    <div class="col-lg-3">Дата публикации: <span class="badge"><?=$item->public_dt?></span></div>
                    <div class="col-lg-3">Просмотров: <span class="badge"><?=$item->view_count ?? 0?></span></div>
                </div>
            </div>
        </div>

        <?php
    }
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>
</div>

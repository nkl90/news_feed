<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Article;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            // 'description',
            // 'short_text',
            // 'text:ntext',
            // 'author',
            'public_dt',
            'added_dt',
            // 'view_count',
            'is_verified',

            [
                'class' => 'app\components\MyActionColumn',
                'template' => '{view} {update} {delete} {approve}',
                'buttons' => [
                    'approve' => function ($url,$model) {
                        $url = Url::toRoute(['article/approve', 'id' => $model->id]);
                        if($model->is_verified != Article::IS_VERIFIED){
                            return Html::a(
                                '<span class="glyphicon glyphicon-ok"></span>',
                                $url, ['title' => 'Одобрить новость']);
                        }else{
                            return Html::a(
                                '<span class="glyphicon glyphicon-remove"></span>',
                                $url, ['title' => 'Запретить новость']);
                        }

                    }
                ]
            ],
        ],
    ]); ?>
</div>

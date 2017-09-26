<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Предложить новость';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-form">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Заголовок') ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true])->label('Описание') ?>

    <?= $form->field($model, 'short_text')->textInput(['maxlength' => true])->label('Текст (коротенько)') ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6])->label('Основной текст новости') ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true])->label('От кого публикуем') ?>

    <?= $form->field($model, 'public_dt')->textInput()->label('Дата публикации (для отложенной публикации)') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Предложить' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

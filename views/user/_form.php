<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile('@web/js/google_map_addresses.js', ['depends' => 'yii\web\JqueryAsset']);
?>
<div class="user-form">

    <?= Html::hiddenInput('is-address-valid', 0) ?>

    <?php $form = ActiveForm::begin([
            'id' => 'user-form',
            'enableClientValidation' => true,
            'enableAjaxValidation'   => true
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lat')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'lng')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=<?= Yii::$app->params['mapApiKey'] ?>&libraries=places&callback=initAutoComplete"
            async defer></script>
</div>

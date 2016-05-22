<?php
/* @var $this RegistroController */
/* @var $model Registro */

if (!Yii::app()->user->isGuest) {
  $this->redirect('/web');
}

$this->breadcrumbs = array(
	'Registro',
	'Crear',
);
?>

<h1>Crear cuenta</h1>

<div class="form">
  <?php
  $form = $this->beginWidget('CActiveForm', array(
      'method' => 'POST',
      'action' => Yii::app()->createUrl('/registro/create'),
      'enableClientValidation' => true,
      'clientOptions' => array(
          'validateOnSubmit' => true,
          'validateOnChange' => true,
          'validateOnType' => true,
      ),
  ));
?>

  <p class="note">Los campos con <span class="required">*</span> son oblitatorios.</p>

  <div class="row">
    <?php echo $form->labelEx($model, 'username'); ?>
    <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 128)); ?>
    <?php echo $form->error($model, 'username'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'password'); ?>
    <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'password'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'Repetir password'); ?>
    <?php echo $form->passwordField($model, 'repetir_password', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'repetir_password'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'nombre'); ?>
    <?php echo $form->textField($model, 'nombre', array('size' => 45, 'maxlength' => 45)); ?>
    <?php echo $form->error($model, 'nombre'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'email'); ?>
    <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 128)); ?>
    <?php echo $form->error($model, 'email'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'codigo_postal'); ?>
    <?php echo $form->textField($model, 'codigo_postal'); ?>
    <?php echo $form->error($model, 'codigo_postal'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'apellido1'); ?>
    <?php echo $form->textField($model, 'apellido1', array('size' => 45, 'maxlength' => 45)); ?>
    <?php echo $form->error($model, 'apellido1'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'apellido2'); ?>
    <?php echo $form->textField($model, 'apellido2', array('size' => 45, 'maxlength' => 45)); ?>
    <?php echo $form->error($model, 'apellido2'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'telefono'); ?>
    <?php echo $form->textField($model, 'telefono'); ?>
    <?php echo $form->error($model, 'telefono'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'fecha_creacion'); ?>
    <?php echo $form->textField($model, 'fecha_creacion'); ?>
    <?php echo $form->error($model, 'fecha_creacion'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'fecha_modificacion'); ?>
    <?php echo $form->textField($model, 'fecha_modificacion'); ?>
    <?php echo $form->error($model, 'fecha_modificacion'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'vivo'); ?>
    <?php echo $form->textField($model, 'vivo'); ?>
    <?php echo $form->error($model, 'vivo'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'imagen'); ?>
    <?php echo $form->textField($model, 'imagen', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'imagen'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'codigo_activacion'); ?>
    <?php echo $form->textField($model, 'codigo_activacion', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'codigo_activacion'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'activado'); ?>
    <?php echo $form->textField($model, 'activado'); ?>
    <?php echo $form->error($model, 'activado'); ?>
  </div>

  <div class="row">
    <?php
    echo $form->labelEx($model, 'Terminos y condiciones');
    echo $form->checkBox($model, 'terminos', array('style' => 'display:inline'));
    echo $form->error($model, 'terminos');
    ?>
  </div>

  <div class="row buttons">
    <?php
    echo CHtml::submitButton('Crear');
    ?>
  </div>

  <?php $this->endWidget(); ?>
</div>
<script src="/web/js/registroCreate.js" type="text/javascript"></script>
<script src="/web/js/encriptarSHA.js" type="text/javascript"></script>
<script src="/web/protected/extensions/jsSHA/src/sha.js" type="text/javascript"></script>

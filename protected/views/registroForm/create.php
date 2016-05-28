<?php
/* @var $this RegistroFormController */
/* @var $model RegistroForm */

$this->breadcrumbs=array(
	'Registro Forms',
	'Create',
);


?>

<h1>Crear cuenta</h1>






<?php
/* @var $this RegistroFormController */
/* @var $model RegistroForm */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'registro-form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los ampos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

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
    <?php echo $form->labelEx($model, 'Repetir password  <span class="required">*</span>'); ?>
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
    <?php echo $form->labelEx($model, 'Pimer apellido'); ?>
    <?php echo $form->textField($model, 'apellido1', array('size' => 45, 'maxlength' => 45)); ?>
    <?php echo $form->error($model, 'apellido1'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 'Segundo apellido'); ?>
    <?php echo $form->textField($model, 'apellido2', array('size' => 45, 'maxlength' => 45)); ?>
    <?php echo $form->error($model, 'apellido2'); ?>
  </div>

  <div class="row">
    <?php echo $form->labelEx($model, 't&eacute;lefono'); ?>
    <?php echo $form->textField($model, 'telefono'); ?>
    <?php echo $form->error($model, 'telefono'); ?>
  </div>
        
    <div class="row">
    <?php
    echo $form->labelEx($model, 'Acepta: <a title="Más información aquí" id="terminos">T&eacute;rminos y condiciones</a> <span class="required">*</span>&nbsp;&nbsp;', array('style' => 'display:inline'));
    echo $form->checkBox($model, 'terminos', array('style' => 'display:inline'));
    echo $form->error($model, 'terminos');
    ?>
  </div>
  
  <div class="row">
    <div class="span10">
      <div id="div-terminos" style="display: none" class="alert alert-info">
        <?php
        print_r(CActiveRecord::model('otro')->findByAttributes(array('nombre' => 'terminos'))['valor']);
        ?>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="span10">
      <div id="div-lopd" class="alert alert-info">
        <?php
        echo CActiveRecord::model('otro')->findByAttributes(array('nombre' => 'lopd'))['valor'];
        ?>
      </div>
    </div>
  </div>

  <div class="row buttons">
    <?php
    echo CHtml::submitButton('Crear');
    ?>
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->







<script src="/web/js/registroFormCreate.js" type="text/javascript"></script>
<script src="/web/js/encriptarSHA.js" type="text/javascript"></script>
<script src="/web/protected/extensions/jsSHA/src/sha.js" type="text/javascript"></script>
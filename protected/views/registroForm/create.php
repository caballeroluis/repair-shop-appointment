<?php
/* @var $this RegistroFormController */
/* @var $model RegistroForm */

if (!Yii::app()->user->isGuest) { //si es un usuario registrado o admin, no verá esta vista
  $this->redirect('/web');
}

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

	<p class="note">Los campos con asterisco ( <span class="required">*</span> ) son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

  <div class="row">
    <?php echo $form->labelEx($model, 'username'); ?>
    <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 128)); ?>
    <?php echo $form->error($model, 'username'); ?>
  </div>

  <div class="row" style='display: none'> <!-- este campo oculto es el que está funcionado pero lo relleno a través de otro para poder encriptar pass en cliente -->
    <?php echo $form->labelEx($model, 'password'); ?>
    <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'password'); ?>
  </div>
        
  <div class="row" style='display: none'> <!-- este campo oculto es el que está funcionado pero lo relleno a través de otro para poder encriptar pass en cliente -->
    <?php echo $form->labelEx($model, 'Repetir password  <span class="required">*</span>'); ?>
    <?php echo $form->passwordField($model, 'repetir_password', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'repetir_password'); ?>
  </div>
  
  <!-- Estos dos campos van a pedir la pass al usuario, la van a encriptar y van a rellenar los campos de arriba que estan ocultos -->
  <div class="row">
    <label for="miPassword">Contraseña <span class="required">*</span></label>
    <input size="60" maxlength="255" id="miPassword" type="password">
  </div>
        
  <div class="row">
    <label for="repetirMiPassword">Repetir contraseña <span class="required">*</span></label>
    <input size="60" maxlength="255" id="repetirMiPassword" type="password">
  </div>
  
  <div id="div-validar-pass" class="row">
    <a href="#" id="validar-pass" alt="Validar Contrasenias" title="N&uacute;meros, letras, may&uacute;scula/as y s&iacute;mbolo/os" class="btn btn-primary">Validar Contraseñas</a> <span class="required">*</span>
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
    <?php echo $form->labelEx($model, 'Primer apellido'); ?>
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
    echo $form->labelEx($model, 'Acepta: <a title="M&aacute;s informaci&oacute;n aqu&iacute;" id="terminos">T&eacute;rminos y condiciones</a> <span class="required">*</span>&nbsp;&nbsp;', array('style' => 'display:inline'));
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

  <?php if(CCaptcha::checkRequirements()): ?> <!-- para mi captcha -->
  <div class="row">
          <?php echo $form->labelEx($model,'verifyCode'); ?>
          <div>
          <?php $this->widget('CCaptcha'); ?>
          <?php echo $form->textField($model,'verifyCode'); ?>
          </div>
          <div class="hint">Please enter the letters as they are shown in the image above.
          <br/>Letters are not case-sensitive.</div>
          <?php echo $form->error($model,'verifyCode'); ?>
  </div>
  <?php endif; ?>
  
  <div class="row buttons">
    <?php
    echo CHtml::submitButton('Crear cuenta');
    ?>
  </div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<div class="alert alert-danger alerta"></div>




<script src="/web/js/registroFormCreate.js" type="text/javascript"></script>
<script src="/web/js/encriptarSHA.js" type="text/javascript"></script>
<script src="/web/protected/extensions/jsSHA/src/sha.js" type="text/javascript"></script>
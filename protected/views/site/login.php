<?php
if (!Yii::app()->user->isGuest){
  $this->redirect('/web');
}

/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Por favor, rellene el siguiente formulario con sus datos de acceso:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los campos con asterisco ( <span class="required">*</span> ) son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

        <div class="row" style="display: none"> <!-- oculto el input password original -->
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
	</div>
        
        <div class="row"> <!-- muestro mi input password que enviará la password cifrada al original -->
          <label for="miLoginPassword" >Contraseña <span class="required">*</span></label>
          <input id="miLoginPassword" type="password">
          <?php echo $form->error($model,'password'); ?> <!-- utulizo los errores del original -->
        </div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Acceder'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->


<!-- Importo mis scripts para encriptar contraseñas -->
<script src="/web/js/login.js" type="text/javascript"></script>
<script src="/web/js/encriptarSHA.js" type="text/javascript"></script>
<script src="/web/protected/extensions/jsSHA/src/sha.js" type="text/javascript"></script>

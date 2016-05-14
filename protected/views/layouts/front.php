<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

    <title>Dinamo - Cita previa</title>
    <?php echo Yii::app()->bootstrap->init(); ?>
  </head>

  <body class="cuerpo">
    <nav class="navegador">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
            <h1>Cita</h1>
          </div>
      </div>
    </nav>



  <?php echo $content; ?>

  <footer class="pie">
    <p>Luis</p>
  </footer>
</body>
</html>

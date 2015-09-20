<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SpaceLab</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Icons -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/simple-line-icons.css">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- Switchery -->
    <link rel="stylesheet" href="assets/plugins/switchery/switchery.min.css">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="assets/css/main.css">
    
        <link rel="stylesheet" href="assets/plugins/icheck/css/_all.css">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
   <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Feature detection -->
     <script src="assets/js/modernizr-2.6.2.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    </head>
    <body class="off-canvas">
        <div id="container">
            
            <?php
                include_once('./includes/header.php');
                
                include_once('./includes/sidebar.php');
            ?>

            <!--main content start-->
            <section class="main-content-wrapper">
                <section id="main-content">
                    <a class="btn btn-info pull-right" href="https://github.com/Loneska/PHPLab" target="_blank"><i class="fa fa-github"></i> Github</a>
                    
                    <div class="row">
                       <div class="col-md-8 col-md-offset-2">
                            <h1>Obtenir la voiture de papa</h1>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">Tenter votre chance</h2>
                            </div>
                            <div class="panel-body">
                                <h3>Salut à toi visiteur, ta mission, si tu l'acceptes, est de réussir à découvrir la bonne combinaison d'arguments ci-dessous qui me permettra d'obtenir l'approbation de ton père pour emprunter sa voiture. 
                                Ce n'est pas une homme facile à convaincre et en plus il est de mauvaise humeur, alors bonne chance.</h3>
                            
                                <?php
                            
                                    $questions = [
                                        [
                                            'label' => 'À chaque fois que je l\'ai empruntée je l\'ai rendue en bon état', 
                                            'ratio' => 2, 
                                            'responseOf' => 'Encore heureux! Ta mère te pleurerait encore sinon...'
                                        ],
                                        [
                                            'label' => 'Tu auras la paix quelques heures', 
                                            'ratio' => 3, 
                                            'responseOf' => 'En effet, ce n\'est pas négligable. Tu ne veux pas partir quelques jours?'
                                        ],
                                        [
                                            'label' => 'Je dirai à maman que tu as passé l\'aspirateur dans le salon', 
                                            'ratio' => 8, 
                                            'responseOf' => 'Tu avais ma curiosité, là tu as toute mon attention'
                                        ],
                                        [
                                            'label' => 'Ca me rendrait vraiment heureux que tu me la prêtes', 
                                            'ratio' => 1, 
                                            'responseOf' => 'Et moi ça me rendrait vraiment heureux de rencontrer Obi Wan Kenobi'
                                        ],
                                        [
                                            'label' => 'Je suis habitué à ta voiture, mes gestes sont plus sûrs avec', 
                                            'ratio' => 2
                                        ], 
                                        [
                                            'label' => 'Je déposerai mon petit frère à la danse en passant', 
                                            'ratio' => 2, 
                                            'responseOf' => 'Toi tu t\'adaptes mal au coming out de ton frère, c\'est du rubgy qu\'il fait...'
                                        ],
                                        [
                                            'label' => 'En échange, je repeins la clotûre', 
                                            'ratio' => 1, 
                                            'responseOf' => 'Faisant toi aussi partie de la maison, j\'attendais déjà cette contribution de ta part'
                                        ],
                                        [
                                            'label' => 'C\'est pour aller faire de l\'humanitaire en Afrique', 
                                            'ratio' => -1, 
                                            'responseOf' => 'Haha, ne me prends pas pour un con'
                                        ]
                                    ];	
                            
                                    $successMessage = 'prends la, mais dis aussi à ta mère que j\'ai fais les poussières.';
                            
                                    $retryMessage = 'Dégage. Je t\'ai assez écouté jacasser.';
                                    
                                    $yesOrNotMessage = 'En attendant sort les poubelles.';
                                    
                                    function GetCustomResponse($index, $array){
                                        if(array_key_exists('responseOf', $array[$index])){
                                            return $array[$index]['responseOf'];
                                        }	
                                        
                                        return false;
                                    }
                            
                            
                                    if(isset($_GET)){
                            
                                        $responsesRatio = (isset($_GET['responses'])) ? array_sum($_GET['responses']) : 0;
                            
                                        if($responsesRatio > 8 && $responsesRatio < 12){
                                        ?>
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <strong>Oui allez,</strong> <?php echo $successMessage; ?>
                                         </div>
                                        <?php
                                        
                                            echo '<img src="./assets/img/088_BMW_i8-new.jpg" alt="La voiture de papa" />';
                                        ?>
                                            <div class="form-group top-margin">
                                                <a class="btn btn-info pull-right" href="getdaddycar.php">Recommencer</a>
                                             </div>
                                        <?php
                                        }
                                        else if($responsesRatio > 12){
                                        ?>
                                            <div class="alert alert-warning alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <strong>Je vais y réfléchir.</strong> <?php echo $yesOrNotMessage; ?>
                                            </div>
                                            <div class="form-group top-margin">
                                                <a class="btn btn-info pull-right" href="getdaddycar.php">Recommencer</a>
                                             </div>
                                        <?php 
                                        }else{
                            
                                            ?>
                                                <?php
                                                    if(isset($_GET['responses'])){
                                                        ?>
                                                        <div class="alert alert-danger alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                            <strong>Non.</strong> <?php echo $retryMessage; ?>
                                                        </div>
                                                        <?php
                                                    }	
                                                    ?>
                                                    <form method="GET">
                                                        <fieldset>
                                                        <?php
                                                            for($i = 0; $i < count($questions); $i++){
                                                        ?>	     
                                                            <h4><?php echo $questions[$i]['label'] ?></h4>
                                                        
                                                                <div class="radio top-margin-large">
                                
                                                                    <?php
                                                                        if(isset($_GET['responses'][$i]) && GetCustomResponse($i, $questions) != false){
                                                                    ?>
                                                                        <p class="alert alert-info alert-dismissable"><?php echo GetCustomResponse($i, $questions); ?></p>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <input type="radio" class="icheck" id="questionsYes-<?php echo $i ?>" name="responses[<?php echo $i ?>]" value="<?php echo $questions[$i]['ratio'] ?>" required <?php if(isset($_GET['responses'][$i]) && $_GET['responses'][$i] != 0) { echo "checked"; } ?>  />
                                                                            <label for="questionsYes-<?php echo $i ?>">Oui tente ça</label>   
                                                                         </div>
                                                                         <div class="col-md-3">
                                                                             <input type="radio" class="icheck" id="questionsNo-<?php echo $i ?>" name="responses[<?php echo $i ?>]" value="0" required <?php if(isset($_GET['responses'][$i]) && $_GET['responses'][$i] == 0) { echo "checked"; } ?> />
                                                                             <label for="questionsNo-<?php echo $i ?>">Non évite</label>
                                                                         </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                        <?php
                                                            }
                                                        ?>
                                                        <input type="submit" value="Envoyer" class="btn btn-success">
                                                    </fieldset>
                                                </form>
                                            <?php
                                        }
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
            <!--main content end-->
        <!--Global JS-->
        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/navgoco/jquery.navgoco.min.js"></script>
        <script src="assets/plugins/waypoints/waypoints.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/js/application.js"></script>
        
        <script src="assets/plugins/icheck/js/icheck.min.js"></script>
        <script>
        $(document).ready(function() {
            $('input.icheck').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
    
        });
        </script>
    </body>
</html>

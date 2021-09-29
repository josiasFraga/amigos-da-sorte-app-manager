<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Amigos da Sorte | <?php echo $title_for_layout ?></title>

    <style type="text/css">
    @page {
     margin: 0px;
    }
    html, body{height: 100%}
    *{ margin:0; padding: 0; font-family: "Times New Roman", Times, serif; }
    img{ max-width: 100%;}

        .photo{
            width: 100%;
            height: 315px;

        }
        .avatar {
            width: 100%;
            height: 315px;
        }
        .row{width: 100%; clear: both; height: 100%}
        .col{position: relative; float: left; height: 100%}
        h1{ font-size: 30px; color: #4a4a9b}
        h3{ color: #4a4a9b }
        h5{ color: #4a4a9b; margin-bottom: 5px }
        .bgblue{background-color: #4a4a9b}
        .contato-container{padding: 30px; color: #FFF}
        table tbody tr td.white{ color: #FFF}
        table tbody tr td{ color: #4a4a9b}
        .bold{ font-weight: bold}
        .small{ font-size: 10px}
        .upper{ text-transform: uppercase}
        .space{ width: 30px}
        .show-info{ width: 100%;}
    /*.rounded {
	border:0.1mm solid #220044; 
	background-color: #f0f2ff;
	background-gradient: linear #c7cdde #f0f2ff 0 1 0 0.5;
	border-radius: 2mm;
	background-clip: border-box;
}

    #photo{
        border-top-right-radius:    5em;
        width: 200px;

        height: 200px;
    }

    #totais{ padding-top: 15px; font-weight: bold; font-size: 12px; }
    .totais_left{ position: relative; float: right; width: 50% !important; padding-right: 7px; }
    .totais_right{ position: relative; float: right; width: 30% !important; }
    .rel_esc{ font-size: 12px; }
    .cliente-logo{ width: 80px;  }
    .top-left{ position: relative; float: left; width: 65%; }
    .top-right{ position: relative; float: right;  width: 30%; padding-bottom: 7px; }*/
    </style>

	
</head>
<body>
<?php echo $this->fetch('content'); ?>
</body>
</html>
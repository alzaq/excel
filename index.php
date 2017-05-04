<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />  
    <link rel="stylesheet" type="text/css" href="libraries/handsontable/handsontable.full.css">
    <script src="libraries/handsontable/handsontable.full.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <script type="text/javascript" src="libraries/jquery/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="libraries/moment/moment.js"></script>
    <script type="text/javascript" src="libraries/moment/moment-cs.js"></script>
    <script type="text/javascript" src="libraries/ui/ui.js"></script>
    <script type="text/javascript" src="libraries/messages/messages.js"></script>
    <script type="text/javascript" src="libraries/validator/validator.js"></script>
    <script type="text/javascript" src="libraries/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="libraries/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="libraries/waiting/waitingfor.js"></script>
    <script type="text/javascript" src="libraries/sortable/sortable.js"></script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>

    <link type="text/css" rel="stylesheet" href="libraries/ui/ui.css" />
    <link type="text/css" rel="stylesheet" href="libraries/bootstrap/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="libraries/bootstrap/css/bootstrap-theme.min.css" />
    <link type="text/css" rel="stylesheet" href="libraries/datetimepicker/css/bootstrap-datetimepicker.min.css" />
    
    <link type="text/css" rel="stylesheet" href="template/main.csas" />
    <link type="text/css" rel="stylesheet" href="template/style.css" />
    
    <link rel="shortcut icon" href="template/favicon.png">

    <title>České mobilní toalety | Evidenční software</title>

</head>
<body>
<style type="text/css">

    body {
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
    }
    #sheet {
        margin: 50px auto;
    }


</style>

<nav class="navbar navbar-default navbar-fixed-top">

    <div class="container">

        <div class="navbar-pull-left">

            <a id="btnRefresh" href="#" title="Domů" class="btn btn-default" role="button"><span class="glyphicon glyphicon-refresh"></span></a>

            <span class="navbar-divider"></span>

            <div class="btn-group" data-toggle="buttons" id="buttonType">
                <label class="btn btn-default active">
                    <input type="radio" name="typ" id="option1" autocomplete="off" value="kratkodobe" checked> Krátkodobé
                </label>
                <label class="btn btn-default">
                    <input type="radio" name="typ" id="option2" autocomplete="off" value="dlouhodobe"> Dlouhodové
                </label>
            </div>

            <span class="navbar-divider"></span>

            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default active">
                    <input type="radio" name="archiv" id="option1" autocomplete="off" value="aktualni" checked> Aktuální
                </label>
                <label class="btn btn-default">
                    <input type="radio" name="archiv" id="option2" autocomplete="off" value="archiv"> Archiv
                </label>
            </div>


            <!--            <a id="btnRefresh" href="#" title="Domů" class="btn btn-default" role="button"><span class="glyphicon glyphicon-refresh"></span></a>            -->
<!--            <span class="navbar-divider"></span>-->
<!--            <a id="btnSave" href="#" title="Domů" class="btn btn-default" role="button"><span class="glyphicon glyphicon-floppy-disk"></span></a>-->
<!--            <span class="navbar-divider"></span>-->
<!--            <a id="btnUndo" href="#" title="Domů" class="btn btn-default" role="button"><span class="glyphicon glyphicon-chevron-left"></span></a>-->
<!--            <a id="btnRedo" href="#" title="Domů" class="btn btn-default" role="button"><span class="glyphicon glyphicon-chevron-right"></span></a>-->



            <!--<a href="?" title="Domů" class="btn btn-default" role="button">
                <span class="glyphicon glyphicon-home"></span>
            </a>
            <span class="navbar-divider"></span>
            <a href="?cnt=order" title="Zakázky" class="btn btn-default" role="button">
                <span class="glyphicon glyphicon-book"></span>
            </a>
            <span class="navbar-divider"></span>
            <a href="?date={$dateMinus}" title="Předchozí týden" class="btn btn-default" role="button">
                <span class="glyphicon glyphicon-triangle-left"></span>
            </a>
            <a href="?date={$datePlus}" title="Následující týden" class="btn btn-default" role="button">
                <span class="glyphicon glyphicon-triangle-right"></span>
            </a>-->
        </div>
<div class="navbar-pull-right dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuRight" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <span class="glyphicon glyphicon-menu-hamburger"></span>
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuRight">
        <li>                        
            <a href="?cnt=contact">
                <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Kontakty
            </a>
        </li>
        <li>                        
            <a href="?cnt=report">
                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Výkazy
            </a>
        </li>      
        <li>                        
            <a href="?cnt=invoice">
                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Faktury
            </a>
        </li>      
        <li>                        
            <a href="?cnt=plan">
                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Časový plán
            </a>
        </li>                    
        <li>                        
            <a href="?cnt=settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Nastavení
            </a>
        </li>
        <li role="separator" class="divider"></li>
        <li>                        
            <a href="?cnt=account">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Můj účet ({$user.shortcut})
            </a>
        </li>
        <li>                        
            <a href="?logout=1">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span> Odhlásit se
            </a>
        </li>
    </ul>
</div>

    </div>

</nav>


<div id="sheet" style="margin-top: 65px;"></div>

<div id="modal-div"></div>

<h5 id="copyright">Hej! Vytvořil AB 2016. Co vy na to?</h5>

</body>

</html>

<script type="text/javascript" src="https://www.gstatic.com/firebasejs/3.3.0/firebase.js"></script>
<script type="text/javascript" src="scripts/main.js?1"></script>
</body>
</html>
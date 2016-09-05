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

    <script type="text/javascript" src="scriptes/backend.js"></script>

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
            <a id="btnSave" href="#" title="Domů" class="btn btn-default" role="button"><span class="glyphicon glyphicon-floppy-disk"></span></a>
            <span class="navbar-divider"></span>
            <a id="btnUndo" href="#" title="Domů" class="btn btn-default" role="button"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a id="btnRedo" href="#" title="Domů" class="btn btn-default" role="button"><span class="glyphicon glyphicon-chevron-right"></span></a>



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

<script type="text/javascript">
    
    {foreach $messages as $message}
    createMessage("{$message.text}", {$message.type});
    {/foreach}

</script>

<h5 id="copyright">Vytvořil AB 2015. Co vy na to?</h5>

</body>

</html>

<script>
    var currencyCodes = ['EUR', 'JPY', 'GBP', 'CHF', 'CAD', 'AUD', 'NZD', 'SEK', 'NOK', 'BRL', 'CNY', 'RUB', 'INR', 'TRY', 'THB', 'IDR', 'MYR', 'MXN', 'ARS', 'DKK', 'ILS', 'PHP'];
    var flagRenderer = function(instance, td, row, col, prop, value, cellProperties) {
        var currencyCode = value;
        while (td.firstChild) {
            td.removeChild(td.firstChild);
        }
        if (currencyCodes.indexOf(currencyCode) > -1) {
            var flagElement = document.createElement('DIV');
            flagElement.className = 'flag ' + currencyCode.toLowerCase();
            td.appendChild(flagElement);
        } else {
            var textNode = document.createTextNode(value === null ? '' : value);
            td.appendChild(textNode);
        }
    };
    var hotElement = document.querySelector('#sheet');
    var hotElementContainer = hotElement.parentNode;

    var hotSettings = {
        data: [
            {
                date_from: '08/19/2015',
                date_to: '08/19/2015',
                date_in: '08/19/2015',
                date_out: '08/19/2015',
                bill_week: 14,
                company: "Firma",
                name: "Jméno",
                phone: "721 342 282",
                period: 12,
                man_in: "Horák",
                man_out: "Horák",
                type: "typ",
                type_true: "skutecny",
                city: "Mesto",
                trace: "Popis",
                price: 1200,
                ic: 1282483,
                email: "Email",
                note: "poznámka"
            },
            {
                date_from: '08/19/2015',
                date_to: '08/19/2015',
                date_in: '08/19/2015',
                date_out: '08/19/2015',
                bill_week: 14,
                company: "Firma",
                name: "Jméno",
                phone: "721 342 282",
                period: 12,
                man_in: "Horák",
                man_out: "Horák",
                type: "typ",
                type_true: "skutecny",
                city: "Mesto",
                trace: "Popis",
                price: 1200,
                ic: 1282483,
                email: "Email",
                note: "poznámka"
            }
        ],
        columns: [
            { data: 'date_from', type: 'date', dateFormat: 'MM/DD/YYYY'},
            { data: 'date_to', type: 'date', dateFormat: 'MM/DD/YYYY'},
            { data: 'date_in', type: 'date', dateFormat: 'MM/DD/YYYY'},
            { data: 'date_out', type: 'date', dateFormat: 'MM/DD/YYYY'},
            { data: 'bill_week', type: 'numeric'},
            { data: 'company', type: 'text' },
            { data: 'name', type: 'text' },
            { data: 'phone', type: 'text' },
            { data: 'period', type: 'numeric' },
            {data: 'man_in',
                editor: 'select',
                selectOptions: ['Horák', 'Bob', 'Alzaq']
            }, { data: 'man_out',
                editor: 'select',
                selectOptions: ['Horák', 'Bob', 'Alzaq']
            },
            { data: 'type', type: 'text' },
            { data: 'type_true', type: 'text' },
            { data: 'city', type: 'text' },
            { data: 'trace', type: 'text' },
            { data: 'price', type: 'numeric' },
            { data: 'ic', type: 'numeric' },
            { data: 'email', type: 'text' },
            { data: 'note', type: 'text' }
//            {
//                data: 'flag',
//                renderer: flagRenderer
//            },
//            {
//                data: 'currencyCode',
//                type: 'text'
//            },
//            {
//                data: 'currency',
//                type: 'text'
//            },
//            {
//                data: 'level',
//                type: 'numeric',
//                format: '0.0000'
//            },
//            {
//                data: 'units',
//                type: 'text'
//            },
//            {
//                data: 'asOf',
//                type: 'date',
//                dateFormat: 'MM/DD/YYYY'
//            },
//            {
//                data: 'onedChng',
//                type: 'numeric',
//                format: '0.00%'
//            }
        ],
        stretchH: 'all',
  //      width: 1140,
        autoWrapRow: true,
//        height: 441,
        maxRows: 22,
        rowHeaders: true,
        colHeaders: [
            'Datum od',
            'Datum do',
            'Závoz',
            'Odvoz',
            'Fakturováno',
            'Firma',
            'Jméno',
            'Telefon',
            'Perioda',
            'Zavezl',
            'Odvezl',
            'Typ',
            'Typ skutečný',
            'Město',
            'Popis trasy',
            'Cena',
            'IČ',
            'Email',
            'Poznámka'
        ],
        columnSorting: true,
        sortIndicator: true,
        autoColumnSize: {
            samplingRatio: 23
        },
        minSpareRows: 1
    };
    var hot = new Handsontable(hotElement, hotSettings);


    $('#btnUndo').click(function() {
        hot.undo();
    });

    $('#btnRedo').click(function() {
        hot.redo();
    });

</script>

</body>
</html>
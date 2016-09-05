<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/libraries/handsontable/handsontable.full.css">
    <script src="/libraries/handsontable/handsontable.full.js"></script>
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
<h1>Novej systém</h1>
<div id="sheet"></div>
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
            },
            {
                date_from: '',
                date_to: '',
                date_in: '',
                date_out: '',
                bill_week: 14,
                company: "",
                name: "",
                phone: "",
                period: 12,
                man_in: "",
                man_out: "",
                type: "",
                type_true: "",
                city: "",
                trace: "",
                price: 1200,
                ic: 1282483,
                email: "",
                note: ""
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
//        width: 1170,
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
        }
    };
    var hot = new Handsontable(hotElement, hotSettings);
</script>

</body>
</html>
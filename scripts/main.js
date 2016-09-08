var handsontable;

var database = [];

$(document).ready(function() {

    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyCcs9kL-BkTa3QB-hP1M2JI2rCbtgZiM7o",
        authDomain: "toalety-26a3f.firebaseapp.com",
        databaseURL: "https://toalety-26a3f.firebaseio.com",
        storageBucket: "toalety-26a3f.appspot.com",
    };
    firebase.initializeApp(config);


    var kratkodobe = {
        headers: [
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
            { data: 'man_in', editor: 'select', selectOptions: ['Horák', 'Bob', 'Alzaq'] },
            { data: 'man_out', editor: 'select', selectOptions: ['Horák', 'Bob', 'Alzaq'] },
            { data: 'type', type: 'text' },
            { data: 'type_true', type: 'text' },
            { data: 'city', type: 'text' },
            { data: 'trace', type: 'text' },
            { data: 'price', type: 'numeric' },
            { data: 'ic', type: 'numeric' },
            { data: 'email', type: 'text' },
            { data: 'note', type: 'text' }
        ]
    };

    var dlouhodobe = {
        headers: [
            'Datum od',
            'Datum do',
            'Závoz',
            'Odvoz',
            'Fakturováno',
            'Firma',
            'Jméno',
            'Telefon',
            'Počet',
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
        columns: [
            { data: 'date_from', type: 'date', dateFormat: 'MM/DD/YYYY'},
            { data: 'date_to', type: 'date', dateFormat: 'MM/DD/YYYY'},
            { data: 'date_in', type: 'date', dateFormat: 'MM/DD/YYYY'},
            { data: 'date_out', type: 'date', dateFormat: 'MM/DD/YYYY'},
            { data: 'bill_week', type: 'numeric'},
            { data: 'company', type: 'text' },
            { data: 'name', type: 'text' },
            { data: 'phone', type: 'text' },
            { data: 'number', type: 'numeric' },
            { data: 'man_in', editor: 'select', selectOptions: ['Horák', 'Bob', 'Alzaq'] },
            { data: 'man_out', editor: 'select', selectOptions: ['Horák', 'Bob', 'Alzaq'] },
            { data: 'type', type: 'text' },
            { data: 'type_true', type: 'text' },
            { data: 'city', type: 'text' },
            { data: 'trace', type: 'text' },
            { data: 'price', type: 'numeric' },
            { data: 'ic', type: 'numeric' },
            { data: 'email', type: 'text' },
            { data: 'note', type: 'text' }
        ]
    };

    setHandsontable(kratkodobe);
    loadData();

    $('input[type=radio][name=typ]').change(function() {
        if ($(this).val() == "kratkodobe") {
            updateHandsontable(kratkodobe);
        } else {
            updateHandsontable(dlouhodobe);
        }
        loadData();
    });

    $('input[type=radio][name=archiv]').change(function() {
        loadData();
    });

    $('#btnRefresh').click(function() {
        loadData();
        return false;
    });
});

var setHandsontable = function(definition) {

    handsontable = new Handsontable(
        document.querySelector('#sheet'), {
            data: [],
            colHeaders: definition.headers,
            columns: definition.columns,
            stretchH: 'all',
            rowHeaders: true,
            columnSorting: true,
            sortIndicator: true,
            autoColumnSize: {
                samplingRatio: 40
            },
            minSpareRows: 1,
            afterChange: function (changes, source) {

                if (changes != null) {

                    var rowIndex = changes[0][0];
                    var row = handsontable.getDataAtRow(rowIndex);

                    var key = database[rowIndex]['key'];

                    var columns = handsontable.getSettings().columns;

                    if (key == null || key == "null" || key == "undefined" || key == undefined) {
                        key = firebase.database().ref().child(getRef()).push().key;
                    }

                    var updates = {};

                    for (var i = 0; i < columns.length; i++) {
                        var columnName = columns[i]['data'];
                        updates[getRef() + '/' + key + "/" + columnName] = row[i];
                    }

                    firebase.database().ref().update(updates);
                }

            }
        }
    );
};

var updateHandsontable = function(definition) {

    handsontable.updateSettings({
        colHeaders: definition.headers,
        columns: definition.columns
    });
};

var loadData = function() {

    firebase.database().ref(getRef()).on('value', function(snapshot) {

        database = [];

        var data = snapshot.val();

        var rowIndex = 0;
        for (var key in data) {
            var row = data[key];
            row['row'] = rowIndex;
            row['key'] = key;
            database.push(row);

            rowIndex++;
        }

        handsontable.loadData(database);

    });

};

var getRef = function() {
    var typ = $('input[type=radio][name=typ]:checked').val();
    var archiv = $('input[type=radio][name=archiv]:checked').val();

    return typ + "/" + archiv;
}
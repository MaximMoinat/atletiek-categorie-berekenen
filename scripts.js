function isInteger(num) {
return (num ^ 0) === num;
}

function isIE() { return ((navigator.appName == 'Microsoft Internet Explorer') || ((navigator.appName == 'Netscape') && (new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})").exec(navigator.userAgent) != null))); }

function stringContains(string, substring) {
return (string.indexOf(substring) > -1);
}

function displayCategories(birthYear, birthMonth) {
    $("#birthdate-form button[type=submit]").prop('disabled', true);

    if (i >= 1) {
        var margin = parseInt($('#category-' + i).css('margin'));
        marginTopBeforeAnimation = margin;
        var padding = parseInt($('#category-' + i).css('padding'));
        var height = $('#category-' + i).height() + 2 * margin + 2 * padding;

        $('#category-' + i).animate({
            'marginTop': height
        }, 500, function () {
            fadeInCategories(birthYear, birthMonth);
        });
    } else {
        fadeInCategories(birthYear, birthMonth)
    }

}

function fadeInCategories(birthYear, birthMonth) {
    var thisSeason = currentYear;
    var nextSeason = currentYear + 1;

    if (currentMonth >= 10) {
        thisSeason = currentYear + 1;
        nextSeason = currentYear + 2;
    }

    i++;
    var table = '<div class="card" id="category-' + i + '" style="display: none;">'+
    '          <div class="card-content">'+
    '            <span class="card-title teal-text">Categorie&euml;n <small>voor geboortedatum ' + birthMonth + '-' + birthYear + '<\/small><\/span>'+
    '            <table>'+
    '              <thead>'+
    '                <tr>'+
    '                  <th data-field="season">Seizoen<\/th>'+
    '                  <th data-field="year">Seizoenjaar<\/th>'+
    '                  <th data-field="category">Categorie<\/th>'+
    '                <\/tr>'+
    '              <\/thead>'+
    '              <tbody>'+
    '                <tr>'+
    '                  <td>huidig<\/td>'+
    '                  <td>' + thisSeason + '<\/td>'+
    '                  <td>' + calculateCategory(birthYear, birthMonth, thisSeason) + '<\/td>'+
    '                <\/tr>'+
    '                <tr>'+
    '                  <td>volgend<\/td>'+
    '                  <td>' + nextSeason + '<\/td>'+
    '                  <td>' + calculateCategory(birthYear, birthMonth, nextSeason) + '<\/td>'+
    '                <\/tr>'+
    '              <\/tbody>'+
    '            <\/table>'+
    '          <\/div>'+
    '        <\/div>';

    $('#category-' + (i - 1)).css('margin-top', marginTopBeforeAnimation+'px');
    $('#result-section').prepend(table);

    $('#category-' + i).fadeIn(300, function () {
        $("#birthdate-form button[type=submit]").prop('disabled', false);
    });
}

function calculateCategory(birthYear, birthMonth, seasonYear) {
    var ageYears = seasonYear - birthYear;
    var category = "niet gevonden";

    if (ageYears >= 35) {
        var masterAgeGroup = Math.floor(ageYears/5)*5
        category = "Masters " + masterAgeGroup + "+";
    } else if (ageYears >= 20 && ageYears < 35) {
        category = "Senioren";
    } else if (ageYears < 20) {
        switch (ageYears) {
            case 4:
            case 5:
                category = "Klatjes";
                break;
            case 6:
            case 7:
                category = "Mini pupillen";
                break;
            case 8:
                category = "C-pupillen";
                break;
            case 9:
                category = "B-pupillen";
                break;
            case 10:
            case 11:
                category = "A-pupillen";
                break;
            case 12:
            case 13:
                category = "D-junioren";
                break;
            case 14:
            case 15:
                category = "C-junioren";
                break;
            case 16:
            case 17:
                category = "B-junioren";
                break;
            case 18:
            case 19:
                category = "A-junioren";
                break;
        }
    }

    return category;
}

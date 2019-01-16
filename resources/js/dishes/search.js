$(document).ready(function($) {
    var engine1 = new Bloodhound({
        remote: {
            url: '/tim-kiem/mon-an?value=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    var engine2 = new Bloodhound({
        remote: {
            url: '/tim-kiem/mo-ta?value=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, [
        {
            source: engine1.ttAdapter(),
            name: 'students-name',
            display: function(data) {
                return data.name;
            },
            templates: {
                empty: [
                    '<div class="header-title">Name</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                header: [
                    '<div class="header-title">Name</div><div class="list-group search-results-dropdown"></div>'
                ],
                suggestion: function (data) {
                    return '<a href="/mon-chay/' + data.id + '" class="list-group-item">' + data.name + '</a>';
                }
            }
        }, 
        {
            source: engine2.ttAdapter(),
            name: 'students-email',
            display: function(data) {
                return data.email;
            },
            templates: {
                empty: [
                    '<div class="header-title">Email</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                ],
                header: [
                    '<div class="header-title">Email</div><div class="list-group search-results-dropdown"></div>'
                ],
                suggestion: function (data) {
                    return '<a href="/students/' + data.id + '" class="list-group-item">' + data.email + '</a>';
                }
            }
        }
    ]);
});
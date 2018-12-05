<html>
<head>
    <link href="https://cdn.fancygrid.com/fancy.min.css" rel="stylesheet">
    <script src="https://cdn.fancygrid.com/fancy.min.js"></script>
</head>
<body>
<div id="dbdictionary"></div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new FancyGrid({
            title: 'DB Dictionary',
            renderTo: 'dbdictionary',
            theme: {
                name: 'dark',
            },
            tbar: [{
                type: 'search',
                width: 450,
                emptyText: 'Search',
                paramsMenu: true,
                paramsText: 'Parameters'
            }],
            trackOver: true,
            selModel: 'row',
            textSelection: true,
            data: {!! $data !!},
            defaults: {
                type: 'string',
                resizable: true,
                draggable: true,
                sortable: true
            },
            columnLines: false,
            columnClickData: true,
            grouping: {
                by: 'TABLE_NAME',
                collapsed: false
            },
            columns: [{
                index: 'TABLE_NAME',
                title: 'Table',
                locked: true,
                filter: {
                    header: true
                },
                flex: 1
            }, {
                index: 'COLUMN_NAME',
                title: 'Column',
                filter: {
                    header: true
                },
                flex: 1
            }, {
                index: 'COLUMN_COMMENT',
                title: 'Comment',
                sortable: false,
                flex: 3
            }, {
                index: 'COLUMN_DEFAULT',
                title: 'Default',
            }, {
                index: 'IS_NULLABLE',
                title: 'Nullable',
            }, {
                index: 'COLUMN_TYPE',
                title: 'Type',
            }, {
                index: 'COLUMN_KEY',
                title: 'Key',
            }]
        })
    })
</script>
</body>
</html>

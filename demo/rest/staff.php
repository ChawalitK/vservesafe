var editor = new DataTable.Editor({
    ajax: '../php/staff.php',
    fields: [
        {
            label: 'First name:',
            name: 'first_name'
        },
        {
            label: 'Last name:',
            name: 'last_name'
        },
        {
            label: 'Position:',
            name: 'position'
        },
        {
            label: 'Office:',
            name: 'office'
        },
        {
            label: 'Extension:',
            name: 'extn'
        },
        {
            label: 'Start date:',
            name: 'start_date',
            type: 'datetime'
        },
        {
            label: 'Salary:',
            name: 'salary'
        }
    ],
    table: '#example'
});
 
var table = $('#example').DataTable({
    ajax: {
        url: '../php/staff.php',
        type: 'POST'
    },
    columns: [
        {
            data: null,
            orderable: false,
            render: DataTable.render.select(),
            searchable: false
        },
        { data: 'first_name' },
        { data: 'last_name' },
        { data: 'position' },
        { data: 'office' },
        { data: 'start_date' },
        { data: 'salary', render: DataTable.render.number(null, null, 0, '$') }
    ],
    layout: {
        topStart: {
            buttons: [
                { extend: 'create', editor: editor },
                { extend: 'edit', editor: editor },
                { extend: 'remove', editor: editor }
            ]
        }
    },
    order: [[1, 'asc']],
    select: {
        selector: 'td:first-child',
        style: 'os'
    },
    serverSide: true
});
 
// Activate an inline edit on click of a table cell
$('#example').on('click', 'tbody td:not(:first-child)', function (e) {
    editor.inline(table.cell(this).index(), {
        onBlur: 'submit'
    });
});
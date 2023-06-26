// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
  $('#dataTable2').DataTable();
  $('#dataTable3').DataTable({
    dom: 'Bfrtip',
    buttons: ['csv', 'excel', 'pdf',
        {
            extend: 'print',
            text: 'Print',
            title: 'Summary',
        }
    ]
  });
});


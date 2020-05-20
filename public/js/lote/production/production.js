var $table = $('table');

$(function () {
    $table.bootstrapTable({
        url: window.location+'/getLotes',
        height: '500',
        search: true,
    });
  })



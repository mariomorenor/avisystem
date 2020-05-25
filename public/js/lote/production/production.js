var $table = $('table');

$(function () {
    $table.bootstrapTable({
        url: window.location + '/getLotes',
        height: '500',
        search: true,
    });
})


function date_outFormatter(value, row) {
    if (row.state == "F") {
        return row.date_out;
    } else if (row.state == "W") {
        return 'Lote en Espera'
    } else {
        return 'Lote en Producción'
    }
}

function operateFormatter(value, row) {
    let infoButton = `<a href="production/lote_details/`+row.id+`" class="btn btn-primary shadow">
                        <i class="fas fa-info-circle"></i>
                    </a>`;
        return infoButton;
}


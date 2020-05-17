var $table = $('#usersTable');

$(function(){
    $table.bootstrapTable({
        responseHandler: function (res) {
            // console.log(res)
            return res
        },
        url: '/getusers',
        locale: 'es_ES',
        height:'500',
        toolbar:'#toolbar'
    });
})

    //Formatters*******

    function rolesFormatter(value,row) {
        return value[0].description;
    }


    /////***********FUNCTIONS ***************/

    function delete_User(nameField, id) {
        Swal.fire({
            icon: 'warning',
            title: 'Está Seguro de Eliminar al Usuario?',
            text: 'No se podrá deshacer esta acción.',
            showCancelButton: true
        }).then((result)=>{
            if(result.value){
                $.ajax({
                    type: "delete",
                    url: "/users/"+id,
                    success: function (response) {
                        // console.log(response)
                        Swal.fire('Operación realizada Correctamente!','','success'); 
                        $table.bootstrapTable("remove",{
                            field: 'name',
                            values: nameField
                        })
                    },
                    error: function(error){
                        // console.log(error)
                    }
                });
            }
        });
    }

    
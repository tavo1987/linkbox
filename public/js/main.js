jQuery(document).ready(function(){


    //para los alerts
    $('.alert-box .close').click(function () {
        $(this).parent().fadeOut();
    });


    //ajax users

    $('#search_users').keypress(function(event){

        $user_name = $(this).val();

        $table_users = $('#table_users');

        $url = '/admin/search/'+$user_name+'';

       // alert($url);
        if($user_name)
        {
            $.get($url,function(response){

                for(i=0;i<response.length;i++)

                //$.each(response, function(key, value){
                    $table_users.append('<tr></tr><td>'+response[i].name+'</td></tr>');
                //});

                console.log(response);

            });
        }


    });




    //$:get($route,function(response){
    //    $('response').each(function (key,value) {
    //        $tablaUsers.append(
    //            '<tr><td>'+value.users+'</td><tr>'
    //        );
    //    });
    //});

});
//# sourceMappingURL=main.js.map

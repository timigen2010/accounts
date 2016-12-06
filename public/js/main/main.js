$(document).ready(function(){
    //if($.session.get("login"))
    $('#btn_enter').on('click', function(){
        verifyUser($('#login').val().trim(),$('#password').val().trim());
    });

    $('#btn_exit').on('click', function(){
        var fd = new FormData();
        fd.append("_token",$("input[name='_token']").val());
        $.ajax({
            url: '/logout',
            type: "post",
            dataType: "json",
            contentType: false,
            processData: false,
            data: fd,
            success: function (data) {

                $('#login_block').show();
                $('#bad_input').hide();
                $('#content_block').hide();
            },
            error: function(errors)
            {
                console.log(errors);
            }
        });
    });

    function verifyUser(login,password){
        var fd = new FormData();
        fd.append("login", login);
        fd.append("password", password);
        fd.append("_token",$("input[name='_token']").val());
        $.ajax({
            url: '/login',
            type: "post",
            dataType: "json",
            contentType: false,
            processData: false,
            data: fd,
            success: function (data) {
                if(data==0){
                    $('#bad_input').show();
                    return 0;
                }
                if(data!=null){
                    var include = "";
                    $("#tab").show();
                    for(var key in data){

                        include = include + "<tr><td>"+data[key].login+"</td><td>"+data[key].password+"</td><td>"+
                            data[key].user_types.name+"</td>";
                    }
                    $('#content_table').html("");
                    $('#content_table').append(include);
                }
                else{
                    $("#tab").hide();
                    $('#content_table').html("");
                }
                $('#login_block').hide();
                $('#content_block').show();
            },
            error: function(errors)
            {
                console.log(errors);
            }
        });
    }
});


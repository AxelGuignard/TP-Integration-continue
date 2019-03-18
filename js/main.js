function register()
{
    if($("#password").val() !== $("#passwordConfirm").val())
        return false;

    let data = $("#registerForm").serialize();

    $.ajax
    ({
        url: "serverSide.php?action=register",
        method: "post",
        data: data,
        success: (data) =>
        {
            if(!data)
            {
                alert("problème");
            }
            else
            {
                // console.log(data);
                window.location = "index.php";
            }
        },
        error: () =>
        {

        }
    });
}

function connect()
{
    let data = $("#connectionForm").serialize();

    $.ajax
    ({
        url: "serverSide.php?action=connect",
        method: "get",
        data: data,
        success: (data) =>
        {
            window.location = "index.php";
        },
        error: () =>
        {

        }
    });
}

function disconnect()
{
    $.ajax
    ({
        url: "serverSide.php?action=disconnect",
        method: "post",
        success: (data) =>
        {
            window.location = "index.php";
        },
        error: () =>
        {

        }
    });
}
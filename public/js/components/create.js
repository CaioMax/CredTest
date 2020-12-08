$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('.date').mask('0000-00-00');
    $('.decimal').mask('000000.00', {reverse: true});
    $('#InputAdmin').mask('0.00', {reverse: true});

    $("#ClientSearch").on('click',function () {

        $el = $('#SelectClient');
        $.ajax({
            url : "/clients",
            type : 'get',

            success:function(res){
                $el.empty();
                $el.append(new Option("Selecione o cliente",''))
                $.each(res, function(key,value) {
                    $el.append(new Option(value.name,value.id))
                });
            },
            error: function (res) {
                alert(res.responseJSON.msg)
                $el.empty()
                $el.append(new Option(res.responseJSON.msg, ""))
            }
        })
    });

    $("#OwnerSearch").on('click',function () {

        $el = $('#SelectOwner');
        $.ajax({
            url : "/owners",
            type : 'get',

            success:function(res){
                $el.empty();
                $el.append(new Option("Selecione o propietário",''))
                $.each(res, function(key,value) {
                    $el.append(new Option(value.name,value.id))
                });
            },
            error: function (res) {
                alert(res.responseJSON.msg)
                $el.empty()
                $el.append(new Option(res.responseJSON.msg, ""))
            }
        })
    });

    $("#SelectOwner").on('change',function () {

        $el = $('#SelectPropertie');
        $.ajax({
            url : "/properties/" + $("#SelectOwner").prop('selectedIndex'),
            type : 'get',

            success:function(res){
                $el.empty();
                $el.append(new Option("Selecione o imóvel",''))
                $.each(res, function(key,value) {
                    $el.append(new Option(value.address,value.id))
                });
            },
            error: function (res) {
                alert(res.responseJSON.msg)
                $el.empty()
                $el.append(new Option(res.responseJSON.msg, ""))
            }
        })

    });

    $("#client_form").on('submit',function (evt) {
        evt.preventDefault();
        let data = $(this).serialize()
        $.ajax({
            url: 'clients/store',
            type: 'post',
            data: data,
            success: function( res ) {
                alert(res.message)
            },
            error: function (res) {
                alert(res);
            }
        });
    });

    $("#owner_form").on('submit',function (evt) {
        evt.preventDefault();
        let data = $(this).serialize()
        $.ajax({
            url: 'owners/store',
            type: 'post',
            data: data,
            success: function( res ) {
                alert(res.message)
            },
            error: function (res) {
                alert(res);
            }
        });
    });

    $("#propertie_form").on('submit',function (evt) {
        evt.preventDefault();
        let data = $(this).serialize()
        $.ajax({
            url: 'properties/store',
            type: 'post',
            data: data,
            success: function( res ) {
                alert(res.message)
            },
            error: function (res) {
                alert(res);
            }
        });
    });

    $("#contract_form").on('submit',function (evt) {
        evt.preventDefault();
        let data = $(this).serialize()
        $.ajax({
            url: 'contracts/store',
            type: 'post',
            data: data,
            success: function( res ) {
                alert(res.message)
            },
            error: function (res) {
                alert(res);
            }
        });
    });

    $("#OwnerSearch2").on('click',function () {

        $el = $('#SelectOwner2');
        $.ajax({
            url : "/owners",
            type : 'get',

            success:function(res){
                $el.empty();
                $el.append(new Option("Selecione o propietário",''))
                $.each(res, function(key,value) {
                    $el.append(new Option(value.name,value.id))
                });
            },
            error: function (res) {
                alert(res.responseJSON.msg)
                $el.empty()
                $el.append(new Option(res.responseJSON.msg, ""))
            }
        })
    });

})

$(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $(".payment").on('click', function(){
        let status = this.dataset.status == 0 ? 1 : 0
        let btn = $(this)
        btn.attr('data-status',status)
        $.ajax({
            url : "/months/update",
            type : 'put',
            data: {id : this.dataset.id, payment_status : status },
            success:function(res){

                !status ? btn.attr('class','payment btn btn-danger') : btn.attr('class','payment btn btn-success')

                !status ? btn.text("Não Pago") : btn.text("Pago")

            },
            error: function (res) {
                alert(res.responseJSON.msg)
                $el.empty()
                $el.append(new Option(res.responseJSON.msg, ""))
            }
        })
    })

    $(".transfer").on('click', function(){
        let status = this.dataset.status == 0 ? 1 : 0
        let btn = $(this)
        btn.attr('data-status',status)
        $.ajax({
            url : "/months/update",
            type : 'put',
            data: {id : this.dataset.id, transfer_status : status },
            success:function(res){

                !status ? btn.attr('class','transfer btn btn-danger') : btn.attr('class','transfer btn btn-success')

                !status ? btn.text("Não Realizado") : btn.text("Realizado")

            },
            error: function (res) {
                alert(res.responseJSON.msg)
                $el.empty()
                $el.append(new Option(res.responseJSON.msg, ""))
            }
        })
    })

})

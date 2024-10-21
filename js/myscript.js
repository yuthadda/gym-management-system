$(document).ready(function(){

    $(document).on('click','.btnDeleteUser',function(){
        let btnDeleteUser = $(this);
        let tr = btnDeleteUser.parent().parent();
        let id = tr.attr('id');
        console.log(id);
        let status = confirm("Are you sure to delete?");
        if(status){
            $.ajax(
                {
                    url : 'delete-user.php',
                    method : 'post',
                    data : {id:id},
                    success:function(response){
                        let result = JSON.parse(response);
                        if(result.status=="true"){
                            window.location.reload();
                        }else{
                            alert("You can't delete");
                        }
                    }
                }
            )
        }
    })

    $(document).on('click','.btnDeleteFacility',function(){
        let btnDeleteFacility = $(this);
        let tr = btnDeleteFacility.parent().parent();
        let id = tr.attr('id');
        console.log(id);
        let status = confirm("Are you sure to delete?");
        if(status){
            $.ajax(
                {
                    url : 'delete-facility.php',
                    method : 'post',
                    data : {id:id},
                    success:function(response){
                        let result = JSON.parse(response);
                        if(result.status=="true"){
                            window.location.reload();
                        }else{
                            alert("You can't delete");
                        }
                    }
                }
            )
        }
    })

    $(document).on('click','.btnDeleteTrainer',function(){
        let btnDel = $(this)
        let tr = btnDel.parent().parent()
        let id = tr.attr('id')
        console.log(id);
        let status = confirm("Are you sure to delete this record?")
      if(status){
        $.ajax({
            url: "delete-trainer.php",
            method : 'post',
            data: {id:id},
            success: function (response) {
                let result = JSON.parse(response)
                if(result.status == 'true'){
                    window.location.reload()
                }else{
                    alert('something is wrong!')
                    
                }
            }
        });
      }
    })

    $(document).on('click','.btnDeleteMembership',function(){
        let btnDeleteMembership = $(this);
        let tr = btnDeleteMembership.parent().parent();
        let id = tr.attr('id');
        console.log(id);
        let status = confirm("Are you sure to delete?");
        if(status){
            $.ajax(
                {
                    url : 'delete-membership.php',
                    method : 'post',
                    data : {id:id},
                    success:function(response){
                        let result = JSON.parse(response);
                        if(result.status=="true"){
                            window.location.reload();
                        }else{
                            alert("You can't delete");
                        }
                    }
                }
            )
        }
    })

    $(document).on('click','.btnPlanDelete',function(){
        let btnPlanDelete = $(this);
        let tr = btnPlanDelete.parent().parent();
        let id = tr.attr('id');
        console.log(id);
        let status = confirm("Are you sure to delete?");
        if(status){
            $.ajax(
                {
                    url : 'delete-plan.php',
                    method : 'post',
                    data : {id:id},
                    success:function(response){
                        let result = JSON.parse(response);
                        if(result.status=="true"){
                            window.location.reload();
                        }else{
                            alert("You can't delete");
                        }
                    }
                }
            )
        }
    })

    //------------------------------------
    $(document).on('click','.btnNewCheckIn',function(){
        let btnCheck = $(this);
        let tr = btnCheck.parent().parent();
        // let btn = tr.children()[6];
        // console.log(btn.innerText);
        let id = tr.attr('id');

        let status =confirm("Are you sure to check in?")
        if(status){
            $.ajax({
                method : "post",
                url: "new-check-in-2.php",
                data: {id:id},
                success: function (response) {
                    
                   let msg =JSON.parse(response)
                //    btnCheck.prop('disabled',true).text('already checked')
                   alert(msg.msg)
                   window.location.reload()
                }
            });
        }
    })

    //--------------------------------
    $(document).on('click','.btnCheck',function(){
        let btnCheck = $(this);
        let tr = btnCheck.parent().parent();
        let btn = tr.children()[6];
        console.log(btn.innerText);
        let id = tr.attr('id');

        let status =confirm("Are you sure to check in?")
        if(status){
            $.ajax({
                method : "post",
                url: "new-check-in.php",
                data: {id:id},
                success: function (response) {
                   btn.innerText = response
                //    window.location.reload()
                }
            });
        }
    })

//------------------------------------------------------------------Update Count----------------------------------------------------------
   
$('.btnUserSearch').click(function(){
    let data = $('.UserSearch').val();
    console.log(data);
    let tbody = $('#tbody');
    console.log(tbody);
    if(data.length > 0){
        $.ajax(
            {
                url:'search-user.php',
                method:'post',
                data: {value:data},
                success:function(response){

                    tbody.children().remove();
                    tbody.append(response);
                }
            }
        )
    }
})

$('.btnMemberSearch').click(function(){
    let data = $('.MemberSearch').val();
    console.log(data);
    let tbody = $('#tbody');
    console.log(tbody);
    if(data.length > 0){
        $.ajax(
            {
                url:'search-membership.php',
                method:'post',
                data: {value:data},
                success:function(response){
                    console.log('response',response);
                    tbody.children().remove();
                    tbody.append(response);
                }
            }
        )
    }
})

$('.btnTrainerSearch').click(function(){
    let data = $('.TrainerSearch').val();
    console.log(data);
    let tbody = $('#tbody');
    console.log(tbody);
    if(data.length > 0){
        $.ajax(
            {
                url:'search-trainer.php',
                method:'post',
                data: {value:data},
                success:function(response){
                    tbody.children().remove();
                    tbody.append(response);
                }
            }
        )
    }
})

$('.btnFacSearch').click(function(){
    let data = $('.FacSearch').val();
    console.log(data);
    let tbody = $('#tbody');
    console.log(tbody);
    if(data.length > 0){
        $.ajax(
            {
                url:'search-facility.php',
                method:'post',
                data: {value:data},
                success:function(response){
                    tbody.children().remove();
                    tbody.append(response);
                }
            }
        )
    }
})

$('.btnProgressSearch').click(function(){
    let data = $('.ProgressSearch').val();
    console.log(data);
    let tbody = $('#tbody');
    console.log(tbody);
    if(data.length > 0){
        $.ajax(
            {
                url:'search-progress.php',
                method:'post',
                data: {value:data},
                success:function(response){
                    tbody.children().remove();
                    tbody.append(response);
                }
            }
        )
    }
})

$('.btnPaymentSearch').click(function(){
    let data = $('.PaymentSearch').val();
    console.log(data);
    let tbody = $('#tbody');
    console.log(tbody);
    if(data.length > 0){
        $.ajax(
            {
                url:'search-payment.php',
                method:'post',
                data: {value:data},
                success:function(response){
                
                    tbody.children().remove();
                    tbody.append(response);
                }
            }
        )
    }
})

})
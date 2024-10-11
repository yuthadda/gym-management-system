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
                //    window.location.reload()
                   btnCheck.prop('disabled',true).text('already checked')
                   alert(msg.msg)
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
    $(document).on('click','.btnCheck',function(){
        // let btnCheckIn = $(this);
        // let tr = btnCheckIn.parent().parent();
        // let id = tr.attr('id');
        // console.log(tr);
        // console.log(id);
        
        
                        
                            // window.location.reload();
                        
                    
                
            
        }
     )



})
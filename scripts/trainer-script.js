$(document).ready(function(){

    $(document).on('click','.btnDeleteTrainer',function(){
        let btnDel = $(this)
        let tr = btnDel.parent().parent()
        let id = tr.attr('id')
        let status = confirm("Are you sure to delete this record?")
      if(status){
        $.ajax({
            type: "method",
            method : 'post',
            url: "delete-trainer.php",
            data: {id:id},
            success: function (response) {
                let result = JSON.parse(response)
                if(result.status == 'success'){
                    window.location.reload()
                }else{
                    alert('something is wrong!')
                }
            }
        });
      }
    })
    
})
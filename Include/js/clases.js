var invoice = new Invoice;

function Invoice(){

    Invoice.prototype.setUser = function (variable){
        variable = variable;
        //console.log(personas);
    };

    Invoice.prototype.getUser = function (){
        return variable;
    };   
    
    Invoice.prototype.App = function (){

        var component = 'actocm.php';
        
        $.ajax({url: component, success: function(data){
            $('#contenedor').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });        
        
    };

    var variable;
    
}
invoice.App();


// Tooltips Initialization
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

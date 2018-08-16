$(document).ready(function(){

 var tpaoc = 0;
 var tpamax = 0;
 var tpamed = 0;
 var tpamin = 0;
 var tpa = 0;

 var i3 = parseFloat($("#IGE").html().replace('%',''));
 var i4 = parseFloat($("#ECU").html().replace('%',''));
 var i5 = parseFloat($("#ECN").html().replace('%',''));
 var i6 = parseFloat($("#RET").html().replace('%',''));
 var i7 = parseFloat($("#VEN").html().replace('%',''));
 var i8 = parseFloat($("#TPA").html().replace('%',''));
 var i9 = parseFloat($("#EMP").html().replace('%',''));
 var i10 = parseFloat($("#FAL").html().replace('%',''));

 var EMP = 10;
 var EMPMEDIA = 9;
 var EMPMINIMA = 7;

 if(i9>=EMP){$('#EMPCOLOR').css("background-color","#00695c");};
 if(i9>=EMPMEDIA && i9<EMP){$('#EMPCOLOR').css("background-color","#4db6ac"); };
 if(i9>=EMPMINIMA && i9<EMPMEDIA){$('#EMPCOLOR').css("background-color","#ffbb33");};
 if(i9<EMPMINIMA){$('#EMPCOLOR').css("background-color","#CC0000");  $('#EMP').css("color","#CC0000");};

 var FAL = $('#FALmax').html();
 var FALMEDIA = $('#FALmed').html();
 var FALMINIMA = $('#FALmin').html();

 $('#FalMa').val(FAL);
 $('#FalMe').val(FALMEDIA);
 $('#FalMi').val(FALMINIMA);

 if(i9>=FAL){$('#FALCOLOR').css("background-color","#00695c");};
 if(i9>=FALMEDIA && i9<FAL){$('#FALCOLOR').css("background-color","#4db6ac"); };
 if(i9>=FALMINIMA && i9<FALMEDIA){$('#FALCOLOR').css("background-color","#ffbb33");};
 if(i9<FALMINIMA){$('#FALCOLOR').css("background-color","#CC0000");  $('#FAL').css("color","#CC0000");};

 var TPA = 100;
 var TPAMEDIA = 85;
 var TPAMINIMA = 70;

 if(i8>=TPA){$('#TPACOLOR').css("background-color","#00695c");};
 if(i8>=TPAMEDIA && i8<TPA){$('#TPACOLOR').css("background-color","#4db6ac"); };
 if(i8>=TPAMINIMA && i8<TPAMEDIA){$('#TPACOLOR').css("background-color","#ffbb33");};
 if(i8<TPAMINIMA){$('#TPACOLOR').css("background-color","#CC0000");  $('#TPA').css("color","#CC0000");};

 var IGE = $('#IGEmax').html();
 var IGEMEDIA = $('#IGEmed').html();
 var IGEMINIMA = $('#IGEmin').html();

 $('#IgeMa').val(IGE);
 $('#IgeMe').val(IGEMEDIA);
 $('#IgeMi').val(IGEMINIMA);

 if(i3>=IGE){$('#IGECOLOR').css("background-color","#00695c");};
 if(i3>=IGEMEDIA && i3<IGE){$('#IGECOLOR').css("background-color","#4db6ac"); };
 if(i3>=IGEMINIMA && i3<IGEMEDIA){$('#IGECOLOR').css("background-color","#ffbb33");};
 if(i3<IGEMINIMA){$('#IGECOLOR').css("background-color","#CC0000");  $('#IGE').css("color","#CC0000");};

 var ECU = $('#ECUmax').html();
 var ECUMEDIA = $('#ECUmed').html();
 var ECUMINIMA = $('#ECUmin').html();

 $('#EcuMa').val(ECU);
 $('#EcuMe').val(ECUMEDIA);
 $('#EcuMi').val(ECUMINIMA);

 if(i4>=ECU){$('#ECUCOLOR').css("background-color","#00695c");};
 if(i4>=ECUMEDIA && i4<ECU){$('#ECUCOLOR').css("background-color","#4db6ac");};
 if(i4>=ECUMINIMA && i4<ECUMEDIA){$('#ECUCOLOR').css("background-color","#ffbb33");};
 if(i4<ECUMINIMA){$('#ECUCOLOR').css("background-color","#CC0000");  $('#ECU').css("color","#CC0000");};

 var ECN = $('#ECNmax').html();
 var ECNMEDIA = $('#ECNmed').html();
 var ECNMINIMA = $('#ECNmin').html();

 $('#EcnMa').val(ECN);
 $('#EcnMe').val(ECNMEDIA);
 $('#EcnMi').val(ECNMINIMA);

 if(i5>=ECN){$('#ECNCOLOR').css("background-color","#00695c"); };
 if(i5>=ECNMEDIA && i5<ECN){$('#ECNCOLOR').css("background-color","#4db6ac");  };
 if(i5>=ECNMINIMA && i5<ECNMEDIA){$('#ECNCOLOR').css("background-color","#ffbb33");  };
 if(i5<ECNMINIMA){$('#ECNCOLOR').css("background-color","#CC0000");  $('#ECN').css("color","#CC0000");};

 var RET = $('#RETmax').html();
 var RETMEDIA = $('#RETmed').html();
 var RETMINIMA = $('#RETmin').html();

 $('#RetMa').val(RET);
 $('#RetMe').val(RETMEDIA);
 $('#RetMi').val(RETMINIMA);

 if(i6>=RET){$('#RETCOLOR').css("background-color","#00695c");};
 if(i6>=RETMEDIA && i6<RET){$('#RETCOLOR').css("background-color","#4db6ac"); };
 if(i6>=RETMINIMA && i6<RETMEDIA){$('#RETCOLOR').css("background-color","#ffbb33"); };
 if(i6<RETMINIMA){$('#RETCOLOR').css("background-color","#CC0000");  $('#RET').css("color","#CC0000");};

 var VEN = $('#VENmax').html();
 var VENMEDIA = $('#VENmed').html();
 var VENMINIMA = $('#VENmin').html();

 $('#VenMa').val(VEN);
 $('#VenMe').val(VENMEDIA);
 $('#VenMi').val(VENMINIMA);

 if(i7>=VEN){$('#VENCOLOR').css("background-color","#00695c");};
 if(i7>=VENMEDIA && i7<VEN){$('#VENCOLOR').css("background-color","#4db6ac"); };
 if(i7>=VENMINIMA && i7<VENMEDIA){$('#VENCOLOR').css("background-color","#ffbb33"); };
 if(i7<VENMINIMA){$('#VENCOLOR').css("background-color","#CC0000");  $('#VEN').css("color","#CC0000");};

 $('.tpa').each(function(i){

  var tpaoc = parseFloat($('#tpaoficina').html());
  var tpamax = tpaoc + 1.5;
  var tpamed = tpaoc;
  var tpamin = tpaoc - 2;
  var tpa = parseFloat($(this).val());

  tpaoc = tpaoc.toFixed(2); 
  tpamax = tpamax.toFixed(2); 
  tpamed = tpamed.toFixed(2); 
  tpamin = tpamin.toFixed(2); 
  tpa = tpa.toFixed(2);

  tpaoc = parseFloat(tpaoc); 
  tpamax = parseFloat(tpamax); 
  tpamed = parseFloat(tpamed); 
  tpamin = parseFloat(tpamin); 
  tpa = parseFloat(tpa);


  if(tpa<=tpamin){
    $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val(15);
    $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("color","#ffffff");
    $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("background-color","#00695c");
  };
  if(tpa>tpamin && tpa<=tpamed){
    $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val(12.5);
    $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("color","#ffffff");
    $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("background-color","#4db6ac");
  };

  if(tpa>tpamed && tpa<=tpamax){
    $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val(10);
    $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("color","#ffffff");
    $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("background-color","#ffbb33");
  };

  if(tpa>tpamax){
    $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val(0);
    $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("color","#ffffff");
    $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("background-color","#CC0000");
  };

});

});

$(function(){
  $(document).on('change', 'input', function() {

    var tpaoc = parseFloat($('#tpaoficina').html());

    var id = $(this).parents('#tablaEIAC').eq(0).find( "#idp" ).html();

    var tpamax = tpaoc + 1.5;
    var tpamed = tpaoc;
    var tpamin = tpaoc - 2; 

    var i1 =  $(this).parents('#tablaEIAC').eq(0).find( "#HC" ).val();

    var tpa = parseFloat($(this).parents('#tablaEIAC').eq(0).find( "#TPA" ).val());

    tpaoc = tpaoc.toFixed(2); 
    tpamax = tpamax.toFixed(2); 
    tpamed = tpamed.toFixed(2); 
    tpamin = tpamin.toFixed(2); 
    tpa = tpa.toFixed(2);

    tpaoc = parseFloat(tpaoc); 
    tpamax = parseFloat(tpamax); 
    tpamed = parseFloat(tpamed); 
    tpamin = parseFloat(tpamin); 
    tpa = parseFloat(tpa);

    if(tpa<=tpamin){
      $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val(15);
      var ptpa = $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val();
      $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("color","#ffffff");
      $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("background-color","#00695c");
    };

    if(tpa>tpamin && tpa<=tpamed){
      $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val(12.5);
      var ptpa = $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val();
      $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("color","#ffffff");
      $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("background-color","#4db6ac");
    };

    if(tpa>tpamed && tpa<=tpamax){
      $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val(10);
      var ptpa = $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val();
      $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("color","#ffffff");
      $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("background-color","#ffbb33");
    };

    if(tpa>tpamax){
      $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val(0);
      var ptpa = $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val();
      $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("color","#ffffff");
      $(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).css("background-color","#CC0000");
    };

    var hc =  parseFloat($(this).parents('#tablaEIAC').eq(0).find( "#pTPA" ).val());

    if($( "#EiaIge" ).html()!==''){
      $( "#EiaIge" ).html().replace('%','');
      var ige = parseFloat($( "#EiaIge" ).html().replace('IGE - ',''));
    }else{
      var ige = 0;
    };

    if($( "#EiaEcu" ).html()!==''){
      $( "#EiaEcu" ).html().replace('%','');
      var ecu = parseFloat($( "#EiaEcu" ).html().replace('| ECUF - ',''));
    }else{
      var ecu = 0;
    };

    if($( "#EiaEcn" ).html()!==''){
      $( "#EiaEcn" ).html().replace('%','');
      var ecn = parseFloat($( "#EiaEcn" ).html().replace('| ECN - ',''));
    }else{
      var ecn = 0;
    };

    if($( "#EiaRet" ).html()!==''){
      $( "#EiaRet" ).html().replace('%','');
      var ret = parseFloat($( "#EiaRet" ).html().replace('| RET - ',''));
    }else{
      var ret = 0;
    };

    if($( "#EiaVen" ).html()!==''){
      $( "#EiaVen" ).html().replace('%','');
      var ven = parseFloat($( "#EiaVen" ).html().replace('| VEN - ',''));
    }else{
      var ven = 0;
    };

    var logro =  parseFloat(hc) + parseFloat(ige) + parseFloat(ecu) + parseFloat(ecn) + parseFloat(ret) + parseFloat(ven);

    if(logro>=100){
      $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).val(30);
      var rxp = $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).val();
      $('#trxp').css("background-color","#00695c"); $('#trxp').css("color","#ffffff");
    };

    if(logro>=85 && logro<100){
      $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).val(25);
      var rxp = $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).val();
      $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).css("background-color","#4db6ac");  $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).css("color","#212121");
    };

    if(logro>=69 && logro<85){
      $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).val(20);
      var rxp = $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).val();
      $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).css("background-color","#ffbb33");  $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).css("color","#212121");
    };

    if(logro<69){
      $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).val(0);
      var rxp = $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).val();
      $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).css("background-color","#CC0000"); 
      $(this).parents('#tablaEIAC').eq(0).find( "#trxp" ).css("color","#ffffff");
    };

    $.post( "../Controllers/controllerPost.php", {tpa: tpa, id: id, ptpa: ptpa, logro: logro, rxp: rxp, function: "actualizarEiac" })
    .done(function( data ) {
      if(data!=='1'){
        alert(data);
        alertify.error('Error. Hay falla en la Base de Datos.');
      }
    });

  });
});


$(function(){
  $(document).on('change', '.selectcolectivo', function() {
    $('#btn-colectivo').removeClass('d-none');
  });
});
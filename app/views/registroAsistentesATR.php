<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script>
        function fechador() {
            var hoy = new Date();
            var dd = hoy.getDate();
            var mm = hoy.getMonth() + 1;
            var yyyy = hoy.getFullYear();
            fechaHoy = dd + '/' + mm + '/' + yyyy;
            $("#fechaHoy").html(fechaHoy);
            $("#fechaSesion").html(fechaHoy);
        }
    </script>
    <script>
        function preventFormSubmit() {
            var forms = document.querySelectorAll('form');
            for (var i = 0; i < forms.length; i++) {
                forms[i].addEventListener('submit', function (event) {
                    event.preventDefault();
                });
            }
        }
        window.addEventListener('load', preventFormSubmit);
    </script>

    <script>
        $(document).ready(function () {
            $("#FRM_DATOS").submit(function () {
                setTimeout(google.script.run.withSuccessHandler(daMensaje).addToSheet(this), 100);
            });
        })
    </script>

    <script>
        function activaGrabar() {
            $(':input[type="submit"]').prop('disabled', false);
            $("#thank_you").empty();
        }
    </script>
    
    <script>
        function daMensaje(data) {
            var mensaje = new Array(2);
            mensaje = data;
            $("#thank_you").html(mensaje[0]);
            if (mensaje[1] > 0) {
                document.getElementById("FRM_DATOS").reset();
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            $("#limpiar").click(function () {
                document.getElementById("FRM_DATOS").reset();
                $("#ENTIDAD").prop("disabled", false);
                $("#thank_you").empty();
            });

        })
    </script>
    
<!--    <script>
//    $(function(){
//        var verInstituto = function() {
//            var verRegion = $('#REGION').val();
//            $('#ENTIDAD').empty();
//            //limpiar();
//            google.script.run.withSuccessHandler(listaInstitutos).loadInstitutos(verRegion);
//        }
//        $('#REGION').change(verInstituto);
//     });
//    </script>
//    
//    <script>
//    function listaInstitutos(data) {
//        console.log(data.length);
//        $('#CLAVE').prop('disabled', false);
//        $('#ENTIDAD').append($('<option>').val('0').text('Seleccione instituto o entidad que representa'));
//        for(i=0;i<data.length;i++){
//           $('#ENTIDAD').append($('<option>').val(data[i][2]).text(data[i][4]));
//        }
//        $('#ENTIDAD').append($('<option>').val('GOBNAMINEDU').text('MINEDU'));
//    }
//    </script>-->
    <script>
    $(function(){
        var verEntidades = function() {
            var verRegion = $('#REGION').val();
            console.log(verRegion);
            $('#ENTIDAD').empty();
            $('#TIPO_ENTIDAD').val("");
            //limpiar();
        }
        $('#REGION').change(verEntidades);
     });
    </script>
    
    <script>
    $(function(){
        var verEntidad = function() {
            var verRegion = $('#REGION').val();
            var verTipo = $('#TIPO_ENTIDAD').val();
            console.log(verRegion);
            console.log(verTipo);
            $('#ENTIDAD').empty();
            //limpiar();
            google.script.run.withSuccessHandler(listaInstitutos).loadEntidades(verRegion,verTipo);
        }
        $('#TIPO_ENTIDAD').change(verEntidad);
     });
    </script>
    
    <script>
    function listaInstitutos(data) {
        console.log("lista" + data.length);
        $('#CLAVE').prop('disabled', false);
        $('#ENTIDAD').append($('<option>').val('0').text('Seleccione instituto o entidad que representa'));
        for(i=0;i<data.length;i++){
           $('#ENTIDAD').append($('<option>').val(data[i][2]).text(data[i][4]));
        }
        $('#ENTIDAD').append($('<option>').val('GOBNAMINEDU').text('MINEDU'));
        $('#ENTIDAD').append($('<option>').val('OTROS').text('OTRA INSTITUCIÓN'));
    }
    </script>
   
    <script>
    $(function(){
    var especificaCargo = function(){
       var cargoSelect = $('#CARGO').val();
       //alert(cargoSelect);
       if(cargoSelect=="Otro cargo"){
          //$('#OTRO_CARGO').removeAttr('readonly');
          $('#OTRO_CARGO').prop('disabled', false);
          //document.getElementById("myText").placeholder = "Type name here..";
          $('#OTRO_CARGO').attr('placeholder','Especifique su otro cargo')
          $('#OTRO_CARGO').focus();
       }else if(cargoSelect=="Coordinador(a) de Área Académica"){
          //$('#OTRO_CARGO').removeAttr('readonly');
          $('#OTRO_CARGO').prop('disabled', false);
          $('#OTRO_CARGO').attr('placeholder','Especifique área o programa de estudios')
          $('#OTRO_CARGO').focus();
       }else{
          $('#OTRO_CARGO').prop('disabled', true);
          $('#OTRO_CARGO').val('');
          //$('#OTRO_CARGO').text('');
          $('#OTRO_CARGO').removeAttr('placeholder');
          //$('#grabar').focus();
       }
    }
       $('#CARGO').change(especificaCargo);
       /*$('#CARGO').change(function(){
         alert($(this).val());   
       });
       especificaCargo();*/
    });
    
    </script>
    <script>
        $(document).ready(function () {
            $("#DNI").keydown(function (e) {
                if (e.keyCode === 13 || e.keyCode === 193)
                    document.getElementById('DNI').focus();
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
            
            $("#CELULAR").keydown(function (e) {
                if (e.keyCode === 13 || e.keyCode === 193)
                    document.getElementById('CELULAR').focus();
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
            
            $("#NOMBRES").keydown(function (e) {
                if (e.keyCode === 13 || e.keyCode === 193)
                    document.getElementById('NOMBRES').focus();
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.keyCode >= 48 && e.keyCode <= 57) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
            
            $("#APELLIDOS").keydown(function (e) {
                if (e.keyCode === 13 || e.keyCode === 193)
                    document.getElementById('APELLIDOS').focus();
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.keyCode >= 48 && e.keyCode <= 57) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });
    </script>
</head>

  
  <body onload="fechador()">
  <div class="container">
  <br>
  <!--<h2>ASISTENCIA TÉCNICA REMOTA</h2>-->
  <h2>Asistencia Técnica</h2>
    <div class="card card-default">
    <div class="card-header bg-danger text-white">REGISTRO VIRTUAL: <div class="d-inline" id="fechaHoy"></div></div>
    <div class="card-body">
    
    <form id="FRM_DATOS" name="FRM_DATOS" class="form-horizontal" onsubmit="grabar.disabled = true; return true;">
    <fieldset>
    
    <div class="form-group row">
      <div class="col-md-3">
         <label>Sede de reunión y tipo de entidad</label>
      </div>
      <div class="col-md-3">
         <select name="REGION" id="REGION" class="form-control input-sm" onchange=activaGrabar()>
           <option value="">Seleccione región</option>
           <option value="0100">Amazonas</option>
           <option value="0200">Áncash</option>
           <option value="0300">Apurímac</option>
           <option value="0400">Arequipa</option>
           <option value="0500">Ayacucho</option>
           <option value="0600">Cajamarca</option>
           <option value="0701">Callao</option>
           <option value="0800">Cusco</option>
           <option value="0900">Huancavelica</option>
           <option value="1000">Huánuco</option>
           <option value="1100">Ica</option>
           <option value="1200">Junín</option>
           <option value="1300">La Libertad</option>
           <option value="1400">Lambayeque</option>
           <option value="1501">Lima Metropolitana</option>
           <option value="1502">Lima Provincias</option>
           <option value="1600">Loreto</option>
           <option value="1700">Madre de Dios</option>
           <option value="1800">Moquegua</option>
           <option value="1900">Pasco</option>
           <option value="2000">Piura</option>
           <option value="2100">Puno</option>
           <option value="2200">San Martín</option>
           <option value="2300">Tacna</option>
           <option value="2400">Tumbes</option>
           <option value="2500">Ucayali</option>
         </select>
      </div>
      <div class="col-md-3">
         <select id="TIPO_ENTIDAD" name="TIPO_ENTIDAD" class="form-control input-sm" onchange=activaGrabar()>
           <option value="">Seleccione tipo</option>
           <option value="1">Gobierno Regional</option>
           <option value="2">DRE/GRE</option>
           <option value="3">Instituto</option>
           <option value="4">UGEL</option>
           <option value="7">CETPRO</option>
           <option value="0">Ministerio</option>
           <option value="8">Otra institución</option>
         </select>
      </div>
      
      </div>
    <div class="form-group row">
      
      <div class="col-md-3">
        <label>Entidad que representa (*)</label>
      </div>
      
      <div class="col-md-6">
         <select id="ENTIDAD" name="ENTIDAD" class="form-control input-sm" onchange=activaGrabar()>
         </select>
      </div>
     
    </div>
    <div class="form-group row"> 
      
      <div class="col-md-3">
        <label>DNI - Nombre y apellidos (*)</label>
      </div>
      <div class="col-md-3">
        <input type="text" placeholder="DNI" id="DNI" name="DNI" class="form-control input-sm" maxlength="8" onchange=activaGrabar()>
      </div>
      <div class="col-md-3">
        <input type="text" placeholder="Nombres" id="NOMBRES" name="NOMBRES" style="text-transform: uppercase;" class="form-control input-sm" maxlength="40" onchange=activaGrabar()>
      </div>
      <div class="col-md-3">
        <input type="text" placeholder="Apellidos" id="APELLIDOS" name="APELLIDOS" style="text-transform: uppercase;" class="form-control input-sm" maxlength="40" onchange=activaGrabar()>
      </div>
    </div>
    
    <div class="form-group row">  
        <div class="col-md-3">
          <label>Cargo en la entidad que representa (*)</label>
        </div>
        <div class="col-md-4">
        <select name="CARGO" id="CARGO" class="form-control input-sm" onchange=activaGrabar()>
        <option value="">Seleccione cargo</option>
        <option value="Director General">Director(a) General</option>
        <option value="Director Regional">Director(a) Regional</option>
        <option value="Especialista de Educación Superior">Especialista de Educación Superior</option>
        <option value="Especialista de CETPRO">Especialista de CETPRO</option>
        <option value="Especialista de Educación Superior y CETPRO">Especialista de Educación Superior y CETPRO</option>
        <option value="Subdirector">Subdirector(a)</option>
        <option value="Jefe de Unidad Académica">Jefe de Unidad Académica</option>
        <option value="Coordinador de Área Académica">Coordinador(a) de Área Académica</option>
        <option value="Personal Docente">Personal Docente</option>
        <option value="Personal Administrativo">Personal Administrativo</option>
        <option value="Otro cargo">Otro cargo</option>
        </select>
        </div>
        <div class="col-md-5">
        <input type="text" id="OTRO_CARGO" name="OTRO_CARGO" class="form-control input-sm" maxlength="40" disabled="true" onchange=activaGrabar()>
        </div>
    </div>
    
    <div class="form-group row">  
      <div class="col-md-3">
        <label>Correo electrónico</label>
      </div>
      <div class="col-md-4">
        <input type="email" id="CORREO" name="CORREO" class="form-control input-sm" maxlength="100" onchange=activaGrabar()>
      </div>
      <div class="col-md-2">
        <label>Teléfono celular</label>
      </div>
      <div class="col-md-3">
        <input type="text" id="CELULAR" name="CELULAR" class="form-control input-sm" maxlength="9" placeholder="" onchange=activaGrabar()>
      </div>
    </div>
      
      
    <div class="form-group row">
      <div class="col-md-12">
        <span id="thank_you" name="thank_you"></span>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-3">
        <input type="hidden" id="FECHASESION">     
      </div>
      <div class="col-md-3">
        <button type="submit" id="grabar" class="btn btn-success form-control input-sm">Grabar</button>
      </div>
      <div class="col-md-3">
        <button type="reset" id="limpiar" class="btn btn-warning form-control input-sm">Limpiar</button>
      </div>
    </div>  
    </fieldset>
    </form>
    </div>
    
    </div>

    </div>
  </body>

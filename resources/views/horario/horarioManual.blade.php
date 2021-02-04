<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@extends('layout')
@section('content')

<div class="container-fluid">
    @if(session()->has('message'))
    <div>
        <script>
        swal({
            title: "Horario Registrado!",
            text: "Actualizado",
            icon: "success",
            button: false,
            timer:800,
        });

        </script>
    </div>
    @endif

    <div class="row">
    <!-- Primera fila -->
        <div class="col-lg-12" style="text-align: center; color:rgb(102, 102, 245)"><h1>Ingreso manual de Turnos</h1></div>
    <!-- Segunda fila -->
        <div class="col-lg-2"></div> 
            <form action="/registrarhorarios" method="POST"  class="row col-lg-8"  style="text-align: center">
                @csrf
                <div class="col-lg-1"></div>
                <div class="mb-2 mt-2 col-lg-5">
                    <br>
                    <div class="form-group">
                        <label >Fecha:</label>
                        <div class="input-group">
                            @if (session("fecha_horario_m"))
                                <input id="date" type="date" name="date" max="3000-12-31" 
                                min="1000-01-01" style="font-size: 1.6em; color:#1d59a7" class="form-control" value="{{session("fecha_horario_m")}}"> 
                            @else
                                <input id="date" type="date" name="date" max="3000-12-31" 
                                min="1000-01-01" style="font-size: 1.6em; color:#1d59a7" class="form-control"> 
                            @endif
                            <span class="input-group-btn">
                                <a class="btn btn-danger" href="/horarioManual" style="height: 100%"> 
                                    <span class="fas fa-broom p-1"></span>
                                </a>
                            </span>   
                        </div>
                    </div>
                </div>
                <div class="mb-3 mt-2 col-lg-5">
                    <br>
               
                        <label>Lugar: </label>
                        <select id="seleccionlugar" name="seleccionlugar" style="font-size: 1.6em; width:100%; color:#1d59a7"> 
                            <option value="Gasolina" selected>Gasolina</option>   
                            <option value="Petroleo">Petroleo</option>  
                        </select> 
               
                </div>
                <div class="col-lg-1"></div>
    <!-- Tercera fila -->
                <div class="col-lg-1"></div>
                <div class="mb-4  col-lg-5">
                    <label id="proban3">Atendedor: </label>
                    <br>
                    <select id="seleccionpersonal1" name="seleccionpersonal1" style="font-size: 1.6em; width:100%; color:#1d59a7" disabled> 
                        @foreach ($personalrec as $item) 
                            <option value="{{ $item->rut_atendedor }}">{{ $item->nombre_atendedor }}</option>   
                        @endforeach  
                    </select>      
                </div>
               
                <div class="col-lg-5">
                    <label>Turno: </label>
                        <br>
                        <select id="seleccionturno" name="seleccionturno" style="font-size: 1.6em; width:100%; color:#1d59a7" disabled> 
                            @foreach ($turno as $item) 
                                <option value="{{ $item->id_turno }}">{{ $item->hora_entrada }} - {{ $item->hora_salida }}</option>   
                            @endforeach  
                        </select>    
                </div>
                <div class="col-lg-1"></div>

    <!-- Cuarta fila -->           
                <div class="mb-4 col-lg-1"></div>
                <div class="mb-4 mt-4 col-lg-10">
                    <button type="submit" id="btnagregarTurno" class="btn btn-success btn-lg btn-block" style="font-size: 1.2em; color: aliceblue"><b> Agregar turno</b></button>
                </div>
                <div class="mb-4 col-lg-1"></div>
            </form>             
        <div class="col-lg-2"> </div>

    <!-- Quinta fila --> 
        <div class="col-lg-1"><p id="hora0p">Hora0</p><p id="hora1p">Hora1</p><p id="hora2p">Hora2</p></div>
        <div class="mb-5 mt-5 col-lg-10"  style="text-align: center">
            <form>
                <div id="timeline" style="height: 180px;"><h1 style="color: rgb(245, 69, 38)"><b>No hay Turnos agregados</b></h1></div>
            </form>
        </div>
        <div class="col-lg-1"></div>

    <!-- Sexta fila --> 
        <div class="col-lg-10"></div>
        <div class="col-lg-2 mb-4" style="margin-top: 35em;">
            <a href="/menuHorario"  class="btn btn-danger"><b>Cancelar horario completo</b></a>
        </div>
        

        <!-- Modal -->
                                        
        <div class="modal fade" id="exampleModal" tabindex="-1" style="background: rgba(9, 20, 36, 0.5)" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">                                      
            <form method="POST" id="formmodal" name="formmodal">
            @csrf
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header" style="z-index:90;background: #3955cf">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: whitesmoke">Lista de personal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div style="background: rgba(237, 240, 243, 0.295); width:48%; height:100%; position:absolute;"></div>
                        <div class="modal-body">
                            <div class="container-fluid" style="text-align: center">
                                <h3 style="color: #395ca8"> Seleccione el personal a asignar al turno elegido</h3>                              
                                <div class="col-lg-sm mt-5">
                                
                                    <div class="row" >
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3">
                                            @if (session("fecha_horario_m"))
                                                <input id="date" type="date" name="date" max="3000-12-31" min="1000-01-01" 
                                                style="font-size: 1.6em; color:#1d59a7" class="form-control" value="{{session("fecha_horario_m")}}" readonly> 
                                             @endif
                                        </div>
                                        <div class="col-sm-3"> 
                                            <select id="modlugar" name="modlugar" style="font-size: 1.6em; width:100%; color:#1d59a7"> 
                                                <option value="Gasolina">Gasolina</option>
                                                <option value="Petroleo">Petroleo</option>
                                            </select>    
                                        </div>
                                        <div class="col-sm-3"></div>

                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6 mt-4">
                                            <h3 class="mt-5">Atendedor actual</h3>
                                          
                                            <select class="mt-4" id="personalmodal" name="personalmodal" style="pointer-events:none; font-size: 1.6em; width:100%; color:#1d59a7"> 
                                                @foreach ($personalrec as $item) 
                                                    <option value="{{ $item->rut_atendedor }}">{{ $item->nombre_atendedor }}</option>   
                                                @endforeach  
                                            </select>  
                                            
                                            <h2 class="mt-5">Cambiar Atendedor a</h2>
                                           
                                            <select class="mt-4" id="modificarpersonal" name="modificarpersonal" style="font-size: 1.6em; width:100%; color:#1d59a7"> 
                                                @foreach ($personalrec as $item) 
                                                    <option value="{{ $item->rut_atendedor }}">{{ $item->nombre_atendedor }}</option>   
                                                @endforeach  
                                            </select>  
                                            
                                            <hr class="mt-4">
                                        </div>
                                        <div class="col-sm-3"></div>

                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3">
                                            <button type="submit" id="modificarTurno" style="width: 13em;" class="btn btn-primary btn-lg mb-3 mt-5" onclick="document.formmodal.action = '/modificaturnohorario'; 
                                            document.formmodal.submit()"><b>Modificar</b></button>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" id="btnRemoverTurno" style="width: 13em;" class="btn btn-danger btn-lg mb-3 mt-5 ml-4" onclick="document.formmodal.action = '/eliminarturnohorario'; 
                                            document.formmodal.submit()"><b>Eliminar del horario</b></button>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>   
    </div>
</div>

@endsection


<script>


window.onload = function() {

    
    $("#btnagregarTurno").hide();
    
    if($('#date').val()){
        $("#date").prop( "readonly", true );
        $("#seleccionturno").prop( "disabled", false );
        $("#seleccionpersonal1").prop( "disabled", false );
        $("#btnagregarTurno").show();
    }

    var fHora = document.getElementById("date");
    var agregarTurno = document.getElementById("btnagregarTurno");

    var hr0 = document.getElementById("hora0p");
    var hr1 = document.getElementById("hora1p");
    var hr2 = document.getElementById("hora2p");

    
    //se mantiene siempre lista deseleccionada para evitar errores
    /*var divGraf = document.getElementById("timeline");
    divGraf.addEventListener("mousemove", function(){
        $("#listapersonal").val([]);     
    });*/
    
    document.getElementById("nombrePag").textContent="Horario Manual";
    
    google.charts.load('current', {'packages':['timeline']});
    google.charts.setOnLoadCallback(drawChart);

    //dibujar graf
    function drawChart() {
        
        var chart = new google.visualization.Timeline(document.getElementById('timeline'));
        var dataTable = new google.visualization.DataTable();
        var view = new google.visualization.DataView(dataTable);
        
        dataTable.addColumn({ type: 'string', id: 'id' });
        dataTable.addColumn({ type: 'string', id: 'President' });
        dataTable.addColumn({ type: 'date', id: 'Start' });
        dataTable.addColumn({ type: 'date', id: 'End' });
        dataTable.addColumn({ type: 'string', id: 'Lugar' });
        dataTable.addColumn({ type: 'number', id: 'Turno' });
    
            options = {
                height: 820,
                timeline: { legend: 'none' },
                tooltip: { trigger: 'selection' },              
            };
        //CARGA DE DATOS A GRAFICO CUANDO EXISTA UNA FECHA INGRESADA
        if($('#date').val()){
            @foreach($verificarFecha as $item2)
                dataTable.addRows([
                    [ "{{$item2->rut_atendedor}}",
                      "{{$item2->nombre_atendedor}}",
                      new Date(0, 0, 0, {{$item2->hora_entrada}},
                      {{$item2->min_entrada}}),
                      new Date(0, 0, 0, {{$item2->hora_salida}},
                      {{$item2->min_salida}}),
                      "{{$item2->lugar}}",
                      {{$item2->turno}}
                      ]
                ]);
            @endforeach
            //DIBUJAR GRAFICO SOLO CUANDO EXISTAN 1 O MAS DATOS
            if(dataTable.getNumberOfRows()>0){
                view.setColumns([1,2,3]); 
                chart.draw(view, options);   
            }  
        }

        //escuchar selección barra gráfico
        google.visualization.events.addListener(chart, 'select', selectHandler);
        var opcion = document.getElementById("personalmodal");
        function selectHandler() {
           
            $('#exampleModal').modal('show');
            //se guarda la variable objeto de la barra seleccionada del grafico
            var selection = chart.getSelection();
            
            $("#personalmodal").val(dataTable.getValue(selection[0].row, 0)); 
            $("#modificarpersonal").val(dataTable.getValue(selection[0].row, 0)); 
            $("#modlugar").val(dataTable.getValue(selection[0].row, 4).trim());
           
            //alert(dataTable.getValue(selection[0].row, 2));
                        
          /*  if (opcion.options[opcion.selectedIndex]) {   
                
                var idpersonal = $('select[id="personalmodal"] option:selected').val();   
                var seleccionpersonal = opcion.options[opcion.selectedIndex].text; 

                dataTable.setCell(item.row, 0, idpersonal)
                dataTable.setCell(item.row, 1, seleccionpersonal);  
            
                view.setColumns([1,2,3]);       
                chart.draw(view, options);  
                
        
            }*/
        } 

      /*  opcion.addEventListener("change", function(){    
                var selection = chart.getSelection();             
                for (var i = 0; i < selection.length; i++) {
                    var item = selection[i];             
                }
            
                hr0.innerHTML = dataTable.getValue(item.row,1);
                hr1.innerHTML = dataTable.getValue(item.row,2).getHours()+":"+dataTable.getValue(item.row,2).getMinutes();
                hr2.innerHTML = dataTable.getValue(item.row,3).getHours()+":"+dataTable.getValue(item.row,3).getMinutes();
                view.setColumns([1,2,3]);       
                chart.draw(view, options);  
                $('#exampleModal').modal('hide');   
                      
        });  */  
        
        //agregar turno
       /* agregarTurno.addEventListener("click", function(){
                var idx = "Sin asignar"; 
                var nom = "Sin asignar"; 
                var x = $('select[name="seleccionturno"] option:selected').text();               
                
                var HorIni = x.substr(0,2);
                var MinIni = x.substr(3,2);

                var HorFin = x.substr(8,2);
                var MinFin = x.substr(11,2);

                var Dia = 0;
                if(HorIni>HorFin){
                    Dia = 1;
                }

                dataTable.addRows([
                [idx, nom, new Date(0, 0, 0, HorIni, MinIni), new Date(0, 0, Dia, HorFin, MinFin) ]]);
                view.setColumns([1,2,3]); 
                chart.draw(view, options);       
        });*/
             
        //quitar turno
        var removerTurno = document.getElementById("btnRemoverTurno");
        removerTurno.addEventListener("click", function(){
            
            var seleccion = chart.getSelection();
            for (var i = 0; i < seleccion.length; i++) {       
                    var seleccionfila = seleccion[i];      
            }
              
            if(seleccionfila){             
                    dataTable.removeRow(seleccionfila.row);
                    view.setColumns([1,2,3]); 
                    chart.draw(view, options);
                    
                    if((dataTable.getNumberOfRows()) == 0){
                        location.reload();
                    }
                    $('#exampleModal').modal('hide');        
            }          
        });

        fHora.addEventListener("change", function(){

            
            $("#btnagregarTurno").click();
   
            $("#date").prop( "readonly", true );
            $("#seleccionturno").prop( "disabled", false );
            $("#seleccionpersonal1").prop( "disabled", false );
            $("#btnagregarTurno").show();
        });

    } //final dibujar graf

    
};//final window onload

    
</script>
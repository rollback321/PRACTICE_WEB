<div>

<h2>Agregar participantes</h2>
<br>

<h3>Elija el programa</h3>
<br>

<table border=1>
    <tr>
        <td>Programa</td>
        <td>Versión</td>
        <td>Opcion</td>
    </tr>
    <?php
     if ($enlaces!=FALSE){
         foreach($enlaces->result() as $row){
            echo "<tr>
                         <td>".$row->nombre."</td>
                         <td>".$row->version."</td>
                         <td><a href='/sistemaDegestionDeCursos/index.php/Cparticipantes/seeligioprograma/".$row->id_prog."' ?> Elegir </a></td>
                  </tr>"; 
         }

     }else{
        echo "No hay registros";
     }
?>

</table>



</div>
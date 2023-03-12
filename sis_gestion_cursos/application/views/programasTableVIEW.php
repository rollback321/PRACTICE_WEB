<code>
<div>
<a href="../../">Ir a menu</a>
<table border=1>
    <tr>
        <td>Programa</td>
        <td>Versión</td>
        <td>Sede</td>
        <td>Fecha de inicio</td>
        <td>Duracion de programa</td>
        <td colspan=2 >Opcion</td>
       
    </tr>
    <?php
     if ($enlaces!=FALSE){
         foreach($enlaces->result() as $row){
            echo "<tr>
                         <td>".$row->nombre."</td>
                         <td>".$row->version."</td>
                         <td>".$row->sede."</td>
                         <td>".$row->fecha_de_inicio."</td>
                         <td>".$row->duracion."</td>
                         <td> <a href='/sistemaDegestionDeCursos/index.php/Cprogramas/eliminarRegistro/".$row->id_prog."' ?> Eliminar </a></td>
                         <td> <a href='/sistemaDegestionDeCursos/index.php/Cprogramas/obtenerRegistro/".$row->id_prog."' ?> Modificar </a></td>
                  </tr>"; 
         }

     }else{
        echo "No hay registros";
     }
?>

</table>
</div>
</code>
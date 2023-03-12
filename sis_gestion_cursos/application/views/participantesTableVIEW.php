<code>
<div>
<?php

?>
<a href="../../">Ir a menu</a>
<br>
<table border=1>
    <tr>
        <td>Nombre</td>
        <td>Apellido <br>Paterno</td>
        <td>Apellido <br>Materno</td>
        <td>C.I</td>
        <td>Numero de <br> celular 1 </td>
        <td>Numero de <br>celular 2</td>
        <td>Correo</td>
        <td>Dto. Residencia</td>
        <td>Documentacion</td>
        <td colspan=2>Opciones</td>
       
    </tr>
    <?php
     if ($enlaces!=FALSE){
         foreach($enlaces->result() as $row){
            echo "<tr>
                         <td>".$row->nombre."</td>
                         <td>".$row->apellidoP."</td>
                         <td>".$row->apellidoM."</td>
                         <td>".$row->ci."</td>
                         <td>".$row->nCelular1."</td>
                         <td>".$row->nCelular2."</td>
                         <td>".$row->correo."</td>
                         <td>".$row->dtoResidencia."</td>
                         <td><a href='../../Cdocumentos/listar?id_part=".$row->id_part."&id_prog=".$id_prog."'>Ver documentos</a></td>
                         <td> <a href='/sistemaDegestionDeCursos/index.php/Cparticipantes/eliminarRegistro/".$row->id_part."/? id_prog=".$id_prog."' ?> Eliminar </a></td>
                         <td> <a href='/sistemaDegestionDeCursos/index.php/Cparticipantes/obtenerRegistro/".$row->id_part."/? id_prog=".$id_prog."' ?> Modificar </a></td>
                  </tr>"; 
         }

     }else{
        echo "No hay registros";
     }
?>

</table>
</div>
</code>
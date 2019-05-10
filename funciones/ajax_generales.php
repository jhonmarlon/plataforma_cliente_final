<?php
require '../modelo/conexion.php';

$conn = new conexion();
//si existe un id de categoria de producto para llenar select de subcategoria

if (isset($_POST["id_categoria_crea_sub"])) {
    $id_categoria_crea_sub = $_POST["id_categoria_crea_sub"];
    $sub_categorias = $conn->ejecutar_consulta_simple("SELECT * FROM sub_categorias_producto WHERE id_categoria='" . $id_categoria_crea_sub . "'");

    while ($sub = $sub_categorias->fetch_assoc()) {
        ?>
        <option value="<?php echo $sub["id"] ?>"><?php echo $sub["nombre"] ?></option>
    <?php }
}
?>


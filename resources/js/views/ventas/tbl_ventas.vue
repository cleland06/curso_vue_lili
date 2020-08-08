<template>
    <div>
        <table class="table table-bordered">
            <thead>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Importe</th>
                <th>Acciones</th>
            </thead>
            <tbody>                
                
                <tr v-if="session.length  == 0">
                    <td colspan="5">Lo siento no hay productos en esta sesion</td>
                </tr>
                <tr  v-for="ventas in session">
                    <td>{{ventas.nombre}}</td>
                    <td>{{ventas.precio}}</td>
                    <td>{{ventas.cantidad}}</td>
                    <td>{{ventas.importe}}</td>
                    <td>botones bonitos</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    props:{
        'session':{
            default:[]
        }
    }
}
</script>
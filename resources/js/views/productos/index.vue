<template>
    <div>
        <div class="box">
            <div class="box-header">
                <router-link class="btn btn-primary" :to="{name:'productos.create'}"> agregar producto</router-link>
            </div>
            <div class="box-content">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>CÓDIGO</th>
                        <th>NOMBRE</th>
                        <th>PRECIO</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr :id="'item_'+producto.id" v-for=" producto in productos ">
                        <td>{{producto.id}}</td>
                        <td>{{producto.codigo}}</td>
                        <td>{{producto.nombre}}</td>
                        <td>{{producto.precio}}</td>
                        <td>
                            <router-link class="btn btn-xs btn-info" :to="{path:'productos/'+producto.id}"><i class="fa fa-pencil"></i></router-link>

                            <a href="#" @click="eliminarItem(producto.id)" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</template>
<script>
export default {
    data(){
        return{
            colaloca:'pega de locura',
            productos:[]
        }
    },
    mounted(){
        axios.get('/Admin/productos')
        .then(resp => {
            console.log(resp.data.productos);
            this.productos = resp.data.productos;
        });
    },
    methods:{
        eliminarItem(id){
            
            eliminarItemTbl('/Admin/productos/'+id)
                        .then(resp=>{
                            if(resp){
                                $('#item_'+id).remove();
                            }
                        })
        }
    }
}
</script>
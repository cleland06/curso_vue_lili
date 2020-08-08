<template>
    <div>
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <form @submit.prevent="enviarForm" action="#">

                            <div class="form-group">
                                <label for="">Código:</label>
                                <input v-model="form.codigo" type="text" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="">Nombre:</label>
                                <input v-model="form.nombre" type="text" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="">Precio:</label>
                                <input v-model="form.precio" type="number" class="form-control" required>
                            </div>
                            <btn_aceptar :clickeo="clickeo" :texto="'Actualizar' " ></btn_aceptar> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    data(){
        return{
            clickeo:false,
            form:{
                nombre:"",
                codigo:"",
                precio:""
            }
        }
    },
    mounted(){
        axios.get('/Admin/productos/'+this.$route.params.id+'/edit')
        .then(resp=>{
            console.log(resp)
            this.form.nombre = resp.data.producto.nombre;
            this.form.codigo = resp.data.producto.codigo;
            this.form.precio = resp.data.producto.precio;
        })
    },
    methods:{
        //aquí van todas las funciones programadas
        enviarForm(){
            this.clickeo = true;
            editarGeneral('/Admin/productos/'+this.$route.params.id,this.form)
            .then(resp =>{
                if(resp){
                    //aquí debo de retornar a la tabla
                    this.$router.push({name:'productos'});
                    this.clickeo = false;
                }
            })            
        }
    }
}
</script>
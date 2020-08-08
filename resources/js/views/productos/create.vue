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
                            <btn_aceptar :clickeo="clickeo" :texto="'Holi vengo desde el create' " ></btn_aceptar> 
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
    methods:{
        //aquí van todas las funciones programadas
        enviarForm(){
            //aquí se clickeo 
            this.clickeo = true;
            agregarGeneral('/Admin/productos',this.form)
            .then(resp => {
                //console.log("hola soy la respuesta",resp);
                //retornar a la vista productos
                alertOk("miralo ya quedó tu producto cargado");
                this.$router.push({name:'productos'});
                this.clickeo = false;
            })
        }
    }
}
</script>
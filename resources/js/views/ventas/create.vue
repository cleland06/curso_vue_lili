<template>
    <div>
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <form @submit.prevent="agregarItem()" action="#">
                            <div class="form-group">
                                <input v-model="form.codigo" class="form-control" type="text" placeholder="Código" >
                            </div>
                            <div class="form-group">
                                <input v-model="form.cantidad" class="form-control" type="number" placeholder="cantidad" >
                            </div>
                            <btn_aceptar :texto="'Agregar'"></btn_aceptar>
                        </form>                        
                    </div>

                    <div class="col-md-8">
                        <tbl_ventas :session="session"></tbl_ventas>
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
            session:[],
            form:{
                codigo:"",
                cantidad:"1",
            }
        }
    },
    mounted(){
        axios.get('/Admin/ventas')
        .then(resp=>{
            this.session = resp.data.sessionVentas
        })
    },
    methods:{
        agregarItem(){
            
            agregarSesion('/Admin/ventas',this.form)
            .then(resp=>{
                console.log(resp,"esta es la session de venta")
                this.form.codigo = "";
                this.form.cantidad = 1;
                this.session = resp.data.sessionVentas;

            })
            .catch(error=>{
                //alert(error);
                console.log(error)
                alertError("uy uy uy uy que crees no se va a poder chavo");
            })
        }
    }
}
</script>